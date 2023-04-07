<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Admin;
use App\Models\Device;

class DeviceConnected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Admin::user() !== null) {
            $isDeviceAllow = Device::where('user_id', Admin::user()->id)
                ->where('ip_device', $request->ip())->first();
            if (!isset($isDeviceAllow)) {
                Auth::guard('web')->logout();
            }
        }

        // return redirect()->route('home');
        return $next($request);
    }
}
