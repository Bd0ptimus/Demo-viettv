<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;



use App\Http\Controllers\InteractionController;


Route::group(['prefix' => 'auth', 'as'=>'auth.'], function($route){
    $route->any('/login', [ LoginController::class, 'index'])->name('login');
    $route->get('/logout', [ LoginController::class, 'logout'])->name('logout');
    $route->post('/check-device-allow', [ HomeController::class, 'checkDeviceAllow'])->name('checkDeviceAllow');
    $route->any('/register', [ RegisterController::class, 'index'])->name('register');
    $route->get('/extend-use',function () { return view('layouts.extendUse');})->name('extendUse');
    $route->get('/register-extend-use',function () { return view('layouts.registerAndExtendUse');})->name('registerExtendUse');

    $route->get('/cannot-watch', [ HomeController::class, 'notAllowWatch'])->name('cannotWatch');
    $route->group(['prefix' => 'password', 'as'=>'password.'], function($route){
        $route->any('/change', [ ResetPasswordController::class, 'index'])->name('change');
        $route->group(['prefix' => 'forget', 'as'=>'forget.'], function($route){
            $route->any('/', [ ForgotPasswordController::class, 'index'])->name('index');
            $route->any('/mail/{token}', [ ForgotPasswordController::class, 'mailHandle'])->name('mail');
        });

    });
});
