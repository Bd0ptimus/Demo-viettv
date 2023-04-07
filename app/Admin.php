<?php

namespace App;
use Illuminate\Support\Facades\Auth;

class Admin{
    public static function user(){
        return Auth::guard('web')->user();
    }
}


