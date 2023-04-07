<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\AccountService;
use App\Admin;
use App\Models\Device;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('user.auth')->only(['index']);
        $this->middleware('device.connected');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('tv.index');
    }

    public function notAllowWatch(){
        return view('layouts.userHasNotLogin');
    }

    public function checkDeviceAllow(Request $request){
        try{
            $isDeviceAllow = Device::where('user_id', request('userId'))
                ->where('ip_device', $request->ip())->first();
            if(!isset($isDeviceAllow)){
                $data['allow_this_device'] = false;
            }else{
                $data['allow_this_device'] = true;
            }
        }catch(\Exception $e){
            response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'Kiểm tra thiết bị thành công', 'data'=>$data]);
    }
}
