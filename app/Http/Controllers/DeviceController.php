<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function __construct(){
        $this->middleware('admin.permission');

    }

    public function index(Request $request){
        return view('admin.device.index');
    }
}
