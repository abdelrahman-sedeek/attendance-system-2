<?php

use App\Http\Controllers\adminController;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\qr_code;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\QrCodeController;

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

route::get('/login', [usercontroller::class, 'index'], 'index')->name('login');




Route::middleware('auth')->group(function () {
    
    route::get("/mod", [adminController::class, 'mod'], 'mod')->name('mod');


});



Route::middleware('auth')->group(function () {
    route::get('/', [usercontroller::class, 'redirect'], 'redirect')->name('redirect');
    route::get('/home', [usercontroller::class, 'user'], 'user')->name('user');
    route::get('/get_qrcode', [usercontroller::class, 'get_qrcode'], 'get_qrcode')->name('get_qrcode'); 
    route::get('/update_qrcode', [usercontroller::class, 'update_qrcode'], 'update_qrcode')->name('update_qrcode'); 
    route::get("/add_attendance/{uuid}", [adminController::class, 'add_attendance'], 'add_attendance')->name('add_attendance');
    route::get("/update_attendance/{uuid}", [adminController::class, 'update_attendance'], 'update_attendance')->name('update_attendance');
    // Route::get('/generate-qrcode', [QrCodeController::class, 'index']);
});

// #################### Admin controller #####################
Route::middleware('authadmin', 'auth')->group(function () {
    
    
    // route::get('/random_qr/{uuid}', [admincontroller::class, 'random_qr'], 'random_qr')->name('random_qr'); 
    route::get("/get_employees", [adminController::class, 'get_employees'], 'get_employees')->name('get_employees');
    route::get("/admin", [adminController::class, 'admin'], 'admin')->name('admin');
    route::post("/add_employee", [adminController::class, 'add_employee'], 'add_employee')->name('add_employee');



 });
 
 Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
    })->name('dashboard');
});







// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
