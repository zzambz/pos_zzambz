<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
 // <-- SUDAH DITAMBAHKAN IMPORT-NYA DI SINI

/*
|--------------------------------------------------------------------------
| GUEST (BELUM LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

});

/*
|--------------------------------------------------------------------------
| AUTH (SUDAH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | ADMIN AREA
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // USERS MANAGEMENT
            Route::resource('users', UserController::class);

        });

    /*
    |--------------------------------------------------------------------------
    | ADMIN & KASIR AREA
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin,kasir')->group(function () {
        
        // 1. Kelompok yang memakai URL /admin/...
        Route::prefix('admin')->name('admin.')->group(function () {
            // PRODUK MANAGEMENT
            Route::resource('produk', ProdukController::class);
            
            // ITEM PENJUALAN
            Route::resource('itempenjualan', ItemPenjualanController::class);
        });

        // 2. Taruh penjualan di luar prefix 'admin', tapi tetap beri ->name('admin.') 
        // agar tombol "Create" di file blade Anda tidak rusak/error.
        Route::resource('penjualan', PenjualanController::class)->names([
            'index'   => 'admin.penjualan.index',
            'create'  => 'admin.penjualan.create',
            'store'   => 'admin.penjualan.store',
            'show'    => 'admin.penjualan.show',
            'edit'    => 'admin.penjualan.edit',
            'update'  => 'admin.penjualan.update',
            'destroy' => 'admin.penjualan.destroy',
        ]);

    });

});