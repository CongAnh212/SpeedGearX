<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin'], function () {
    Route::get('/login', [AdminController::class, 'indexSignin'])->name('indexSignin');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [AdminController::class, 'indexProfile'])->name('indexProfile');
    });

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [AdminController::class, 'indexDashboard'])->name('indexDashboard');
    });

    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', [AdminController::class, 'indexBrand'])->name('indexBrand');
        Route::get('/data', [BrandController::class, 'data'])->name('dataBrand');
        Route::post('/create', [BrandController::class, 'add'])->name('createBrand');
        Route::post('/del', [BrandController::class, 'del'])->name('delBrand');
        Route::post('/search', [BrandController::class, 'search'])->name('searchBrand');
        Route::post('/update', [BrandController::class, 'update'])->name('updateBrand');
        Route::post('/status', [BrandController::class, 'status'])->name('statusBrand');
    });

    Route::group(['prefix' => 'vehicles'], function () {
        Route::get('/', [AdminController::class, 'indexVehicle'])->name('indexVehicle');
        Route::get('/data', [VehicleController::class, 'data'])->name('dataVehicle');
        Route::post('/create', [VehicleController::class, 'add'])->name('createVehicle');
        Route::post('/uploadImage', [VehicleController::class, 'upLoad'])->name('upLoadImage');
        Route::post('/search', [VehicleController::class, 'search'])->name('searchVehicle');
        Route::post('/changeStatus', [VehicleController::class, 'changeStatus'])->name('changeStatus');
        Route::post('/del', [VehicleController::class, 'del'])->name('deleteVehicle');
        Route::post('/edit_img', [VehicleController::class, 'upLoadImg'])->name('edit_img');
        Route::post('/update', [VehicleController::class, 'update'])->name('updateVehicle');
    });

    Route::group(['prefix' => 'classification'], function () {
        Route::get('/', [AdminController::class, 'indexClassification'])->name('indexClassification');
    });


    Route::group(['prefix' => 'bookings'], function () {
        Route::get('/', [AdminController::class, 'indexBooking'])->name('indexBooking');
        Route::get('/data', [BookingController::class, 'data'])->name('dataBooking');
    });

    Route::group(['prefix' => 'testimonials'], function () {
        Route::get('/', [AdminController::class, 'indexTestimonial'])->name('indexTestimonial');
    });

    Route::group(['prefix' => 'reports'], function () {
        Route::get('/', [AdminController::class, 'indexReports'])->name('indexReports');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [AdminController::class, 'indexUser'])->name('indexUser');
        Route::get('/data', [ClientController::class, 'data'])->name('dataUser');
        Route::post('/status', [ClientController::class, 'status'])->name('statusUser');
        Route::post('/search', [ClientController::class, 'search'])->name('searchUser');
        Route::post('/del', [ClientController::class, 'del'])->name('delUser');
    });
});

Route::get('/', [CustomerController::class, 'index'])->name('indexHome');
Route::get('/contact', [CustomerController::class, 'indexContact'])->name('indexContact');
Route::get('/detail', [CustomerController::class, 'indexDetail'])->name('indexDetail');
