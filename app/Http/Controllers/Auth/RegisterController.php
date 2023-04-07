<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterRequestMail;



use App\Models\RegisterRequest;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    private function registerValidate($request){
        $messages = [
            'name.required' => 'Tên bắt buộc phaỉ được nhập.',
            'address.required' => 'Địa chỉ bắt buộc phaỉ được nhập.',
            'phone.required' => 'Điện thoại bắt buộc phaỉ được nhập.',
        ];

        $validator = Validator::make($request, [
            'name'    => 'required',
            'address'    => 'required',
            'phone' => 'required',

        ], $messages);

        return $validator;
    }

    public function index(Request $request){
        if($request->isMethod('POST')){
            $validator = $this->registerValidate($request->all());
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }else{
                if($request->country == '0'){
                    $validator->errors()->add('country', 'Phải chọn quốc gia');
                    return redirect()->back()->withErrors($validator)->withInput($request->all());
                }
                if(!str_contains($request->phoneNumber, '+')){
                    // dd($request->phoneNumber);
                    $validator->errors()->add('phone', 'Định dạng số điện thoại không đúng');
                    return redirect()->back()->withErrors($validator)->withInput($request->all());
                }
                $data=[
                    $request->tv,
                    $request->netfix,
                    $request->ytpremium,
                    $request->vpn,
                ];
                // dd($data);
                $newRequest = RegisterRequest::create([
                    'name' => $request->name,
                    'country' => $request->country,
                    'email'=>$request->email,
                    'phone'=>$request->phoneNumber,
                    'address'=>$request->address,
                    'tv'=>$request->tv=="on"?1:0,
                    'netflix'=>$request->tv=="on"?1:0,
                    'youtube_premium'=>$request->ytpremium=="on"?1:0,
                    'vpn'=>$request->vpn=="on"?1:0,
                ]);
                foreach(REGISTER_REQUEST_EMAIL_TO as $recipientEmail){
                    Mail::to($recipientEmail)->send(new RegisterRequestMail(
                        $newRequest->name,
                        $newRequest->address,
                        $newRequest->country,
                        $newRequest->phone,
                        $newRequest->email,
                        $newRequest->tv == 1? 'Có' : 'Không',
                        $newRequest->netflix == 1? 'Có' : 'Không',
                        $newRequest->youtube_premium == 1? 'Có' : 'Không',
                        $newRequest->vpn == 1? 'Có' : 'Không',
                        route('admin.accountManager'),
                    ));
                }
                return view('layouts.registerRequestConfirm');

            }

        }
        return view('auth.userRegister');
    }
}
