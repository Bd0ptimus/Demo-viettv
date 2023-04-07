<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require_once 'auth.php';
require_once 'admin.php';
require_once 'tv.php';
require_once 'profile.php';


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/test', function () {
    return view('testDrag');
});

Route::get('/storage-link', function(){
    $targetFolder = storage_path('app/public');
    $linkFolder = public_path('storage');
    symlink($targetFolder, $linkFolder);
});

Route::get('/migrate', function(){
    Artisan::call('migrate');
    // dd('migrated!');
});


Route::get('/format-third-party-user', [AdminController::class, 'formatThirdPartyUser'])->name('formatThirdPartyUser');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/take-m3u8', [App\Http\Controllers\VideoController::class, 'check'])->name('takem3u8');
