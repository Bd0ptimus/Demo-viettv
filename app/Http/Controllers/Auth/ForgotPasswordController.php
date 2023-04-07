<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;

use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;

use App\Models\User;
use App\Models\ForgotPassword;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }


    private function usernameValidate($request){
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
            $validator = $this->usernameValidate($request->all());
            $user = User::where('username', '=', $request->username)->first();
            if(!isset($user)){
                return redirect()->back()->withErrors($validator->errors()->add('username', 'Tên đăng nhập này không tồn tại'))->withInput($request->all());
            }
            if($user->email !=""){
                $token = $this->userService->createToken($user->id);
                $changePasswordLink = route('auth.password.forget.mail', $token);
                Mail::to($user->email)->send(new ForgotPasswordMail($changePasswordLink, $user->name, $user->username));
                return view('auth.passwords.confirmSendForgetPasswordEmail',[
                    'hasEmail'=>true,
                ]);
            }else{
                return view('auth.passwords.confirmSendForgetPasswordEmail',[
                    'hasEmail'=>false,
                ]);
            }

        }
        return view('auth.passwords.provideUserName');
    }

    private function newPasswordValidate($request){
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

    public function mailHandle(Request $request, $token){
        if($request->isMethod('POST')){
            $validator = $this->newPasswordValidate($request->all());
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                User::whereHas('forgotPassword', function($query) use ($token){
                    $query->where('token', $token);
                })->update([
                    'password' => Hash::make($request->password),
                    'password_raw' =>$request->password,
                ]);
                ForgotPassword::where('token', $token)->delete();
                return view('auth.passwords.changePasswordConfirm');

            }
        }
        $user = User::whereHas('forgotPassword', function($query) use ($token){
            $query->where('token', $token);
        })->first();
        return view('auth.passwords.resetPasswordForgot',[
            'user' => $user,
            'token'=>$token,
        ]);

    }
}
