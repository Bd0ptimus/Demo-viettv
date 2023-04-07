<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Models\Device;
use App\Services\AccountService;


use App\Models\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
        $this->accountService->suspendAllAccountExpired();
        // $this->middleware('guest')->except('logout');
    }

    private function loginValidate($request){
        $messages = [
            'required' => ':attribute bắt buộc phaỉ được nhập.',
            'username.max' => 'Email chỉ có tối đa 255 ký tự',
            'password.max' => 'Mật khẩu chỉ có tối đa 255 ký tự',

        ];

        $validator = Validator::make($request, [
            'username'    => 'required|max:255',
            'password' => [
                'required',
                'max:255',
            ],

        ], $messages);

        return $validator;
    }

    private function handleDeviceConnected($request){
        $user = Admin::user();
        // dd($user);

        if($user->number_devices != null){
            $devicesConnected = Device::where('user_id', $user->id)->orderBy('created_at', 'ASC')->get();
            $numberDeviceConnected = count($devicesConnected);
            // dd($numberDeviceConnected);
            if($numberDeviceConnected>=$user->number_devices){
                $devicesConnected->first()->delete();
            }
            $isExistedDevice = Device::where('user_id', Admin::user()->id)
                                ->where('ip_device', $request->ip())->first();
            if(!isset($isExistedDevice)){
                Device::create([
                    'user_id'=>$user->id,
                    'ip_device'=>$request->ip(),
                ]);
            }
        }
    }

    public function index(Request $request){
        if($request->isMethod('POST')){
            $validator = $this->loginValidate($request->all());
            if ($validator->fails()) {
                // dd($validator);
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                $user = User::where('username', '=', $request->username)->first();
                // dd($user);
                if(isset($user)){
                    if(Hash::check($request->password, $user->password)){
                        if($user->active == USER_SUSPENDED){
                            return view('layouts.accountSuspended');
                        }else if($user->active == USER_EXPIRED){
                            return view('layouts.accountSuspended');
                        }
                        // auth('web')->attempt(['username'=>$request->username,'password'=>Hash::make($request->password)], $request->remember);
                        Auth::guard('web')->attempt(['username'=>$request->username,'password'=>$request->password], true);
                        $this->handleDeviceConnected($request);
                        return redirect()->route('tv.index');
                    }
                    // if(Hash::check($request->password, $user->password)){
                    //     if($user->status == USER_SUSPENDED){
                    //         return view('warnings.accountSuspended');
                    //     }
                    //     Auth::guard('web')->attempt(['username'=>$request->username,'password'=>$request->password], $request->remember);
                    //     // dd(Admin::user()->inRoles([ROLE_ADMIN]));
                    //     return redirect()->route('home');
                    // }
                    return redirect()->back()->withErrors($validator->errors()->add('password', 'Mật khẩu không đúng'))->withInput($request->all());
                }

                return redirect()->back()->withErrors($validator->errors()->add('username', 'username không tồn tại'))->withInput($request->all());

            }
        }
        return view('auth.login');
    }


    public function logout(Request $request){
        if(Admin::user()!=null){
            Device::where('user_id', Admin::user()->id)
                    ->where('ip_device', $request->ip())->delete();
        }
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }
}
