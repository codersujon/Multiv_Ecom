<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
})->name('frontend.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin 
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/login', 'adminLogin')->name('admin.login');
});

Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard', 'adminDashboard')->name('admin.dashboard');
        Route::get('/admin/logout', 'adminDestroy')->name('admin.logout');
        Route::get('/admin/profile', 'adminProfile')->name('admin.profile');
        Route::post('/admin/profile/update', 'adminProfileUpdate')->name('admin.profile.update');
        Route::get('/admin/change/password', 'AdminChangePassword')->name('admin.change.password');
        Route::post('/admin/update/password', 'AdminUpdatePassword')->name('admin.update.password');
    });
});


Route::middleware(['auth','role:admin'])->group(function(){
    
    Route::controller(BrandController::class)->group(function(){
        Route::get('/all/brand', 'allBrand')->name('all.brand');
        Route::get('/add/brand', 'addBrand')->name('add.brand');
        Route::post('/store/brand', 'storeBrand')->name('store.brand');
    });

});


//Vendor 
Route::controller(VendorController::class)->group(function(){
    Route::get('/vendor/login', 'vendorLogin')->name('vendor.login');
});

Route::middleware(['auth', 'role:vendor'])->group(function(){
    Route::controller(VendorController::class)->group(function(){
        Route::get('/vendor/dashboard', 'vendorDashboard')->name('vendor.dashboard');
        Route::get('/vendor/logout', 'vendorDestroy')->name('vendor.logout');
    });
});


require __DIR__.'/auth.php';
