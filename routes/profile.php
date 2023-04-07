<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::group(['prefix' => 'profile', 'as'=>'profile.'], function($route){
    $route->get('/', [ UserController::class, 'index'])->name('index');
});
