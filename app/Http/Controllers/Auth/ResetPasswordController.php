<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Admin;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    public function __construct(){
        $this->middleware('user.auth');
    }
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    private function passwordValidate($request){
        $messages = [
            'required' => ':attribute bắt buộc phaỉ được nhập.',
            'password.max' => 'Mật khẩu chỉ có tối đa 255 ký tự',
            'confirmed' => 'Mật khẩu xác nhận không trùng khớp',
        ];

        $validator = Validator::make($request, [
            'password' => [
                'required',
                'max:255',
                'confirmed'
            ],
            'password_confirmation' => 'required',

        ], $messages);

        return $validator;
    }
    public function index(Request $request){
        if($request->isMethod('POST')){
            $validator = $this->passwordValidate($request->all());
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                if(Admin::user()->password_raw != $request->currentPassword){
                    return redirect()->back()->withErrors($validator->errors()->add('currentPassword', 'Mật khẩu hiện tại không đúng'))->withInput($request->all());
                }
                User::find(Admin::user()->id)->update([
                    'password' => Hash::make($request->password),
                    'password_raw' =>$request->password,
                ]);
                return view('auth.passwords.changePasswordConfirm');

            }
        }
        return view('auth.passwords.change');
    }
}
