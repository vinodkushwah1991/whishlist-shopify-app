<?php
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::middleware(['verify.shopify'])->group(function () {
  
    Route::get('dashboard', function () {
    $shop = Auth::user();
    $settings = Setting::where("shop_id", Auth::user()->name)->first();
        return view('dashboard', compact('settings'));
    })->name('home');

    Route::view('product','product');
    Route::view('customer','customer');
    Route::view('setting','setting');

    Route::get('login', function () {
        if (Auth::user()) {
            return redirect()->route('home');
        }
        return view('login');
    })->name('login');
    
    Route::post('ConfigureTheme', 'App\Http\Controllers\SettingController@ConfigureTheme');
   
});