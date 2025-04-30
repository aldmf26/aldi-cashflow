<?php

use App\Http\Controllers\CashflowController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

    // return redirect('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/template1', function () {
        return view('template-notable');
    })->name('template1');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/template2', function () {
        return view('template-table');
    })->name('template2');

    Route::get('/403', function () {
        view('error.403');
    })->name('403');

    Route::get('/subscribe', function () {
        view('subscribe');
    })->name('subscribe');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });


    Route::controller(NavbarController::class)->group(function () {
        Route::get('/buku_besar', 'buku_besar')->name('buku_besar');
    });

    Route::controller(CashflowController::class)
        ->prefix('cashflow')
        ->name('cashflow.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/add', 'add')->name('add');
            Route::get('/edit', 'edit')->name('edit');
            Route::get('/load_tbl', 'load_tbl')->name('load_tbl');
            Route::post('/update', 'update')->name('update');
            Route::get('/keluar', 'keluar')->name('keluar');
            Route::get('/tglChart', 'tglChart')->name('tglChart');
            Route::post('/destroy', 'destroy')->name('destroy');
        });

    Route::controller(UserController::class)
        ->prefix('user')
        ->name('user.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'create')->name('create');
            Route::get('/update', 'update')->name('update');
            Route::get('/delete', 'delete')->name('delete');
            Route::get('/edit', 'edit')->name('edit');
        });

    Route::controller(WalletController::class)
        ->prefix('wallet')
        ->name('wallet.')
        ->middleware('subscription')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'create')->name('create');
            Route::get('/update', 'update')->name('update');
            Route::get('/delete', 'delete')->name('delete');
            Route::get('/edit', 'edit')->name('edit');
        });
    Route::controller(CategoriController::class)
        ->prefix('kategori')
        ->name('kategori.')
        ->middleware('subscription')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'create')->name('create');
            Route::get('/update', 'update')->name('update');
            Route::get('/delete', 'delete')->name('delete');
            Route::get('/edit', 'edit')->name('edit');
        });
});

require __DIR__ . '/auth.php';
