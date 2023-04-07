<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\DeviceController;




use App\Http\Controllers\InteractionController;


Route::group(['prefix' => 'admin', 'as'=>'admin.'], function($route){
    $route->get('/account-manager', [ AdminController::class, 'index'])->name('accountManager');
    $route->any('/create-account/{accountType}', [ AdminController::class, 'createAccount'])->name('createAccount');
    $route->any('/change-info-account/{userId}', [ AdminController::class, 'changeInfoAccount'])->name('changeInfoAccount');
    $route->get('/send-account-detail/{userId}/{pageId}', [ AdminController::class, 'sendAccountDetailToUser'])->name('sendAccountDetail');
    $route->get('/suspend-account/{userId}', [ AdminController::class, 'suspendAccount'])->name('suspendAccount');
    $route->get('/active-account/{userId}', [ AdminController::class, 'activeAccount'])->name('activeAccount');
    $route->post('/change-password', [ AdminController::class, 'changePassword'])->name('changePassword');
    $route->get('/change-status/{type}/{userId}', [ AdminController::class, 'changeStatus'])->name('changeStatus');

    $route->get('/paid-confirm/{userId}/{confirmStatus}', [ AdminController::class, 'paidConfirm'])->name('paidConfirm');
    $route->get('/delete-user/{userId}', [ AdminController::class, 'deleteUser'])->name('deleteUser');


    $route->group(['prefix' => 'display', 'as'=>'display.'], function($route){
        $route->get('/',[DisplayController::class, 'index'])->name('index');
        $route->any('/change-background',[DisplayController::class, 'changeBackground'])->name('changeBackground');
        $route->get('/take-background',[DisplayController::class, 'takeBackground'])->name('takeBackground');
    });

    $route->group(['prefix' => 'third-party', 'as'=>'thirdParty.'], function($route){
        $route->any('/create-account', [ AdminController::class, 'createAccountThirdParty'])->name('createAccount');
        $route->any('/change-account/{userId}', [ AdminController::class, 'changeAccountThirdParty'])->name('changeAccountThirdParty');

    });

    $route->group(['prefix' => 'device', 'as' => 'device.'], function ($route){
        $route->any('/', [DeviceController::class, 'index'])->name('index');
    });
});
