<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminPortfolioController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group.
|
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Contact Management
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', [AdminContactController::class, 'index'])->name('index');
        Route::get('/export', [AdminContactController::class, 'export'])->name('export');
        Route::get('/{contact}', [AdminContactController::class, 'show'])->name('show');
        Route::put('/{contact}', [AdminContactController::class, 'update'])->name('update');
        Route::delete('/{contact}', [AdminContactController::class, 'destroy'])->name('destroy');
    });
    
    // Blog Management
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [AdminBlogController::class, 'index'])->name('index');
        Route::get('/create', [AdminBlogController::class, 'create'])->name('create');
        Route::post('/', [AdminBlogController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [AdminBlogController::class, 'edit'])->name('edit');
        Route::put('/{post}', [AdminBlogController::class, 'update'])->name('update');
        Route::delete('/{post}', [AdminBlogController::class, 'destroy'])->name('destroy');
    });
    
    // Portfolio Management
    Route::prefix('portfolio')->name('portfolio.')->group(function () {
        Route::get('/', [AdminPortfolioController::class, 'index'])->name('index');
        Route::get('/create', [AdminPortfolioController::class, 'create'])->name('create');
        Route::post('/', [AdminPortfolioController::class, 'store'])->name('store');
        Route::get('/{project}/edit', [AdminPortfolioController::class, 'edit'])->name('edit');
        Route::put('/{project}', [AdminPortfolioController::class, 'update'])->name('update');
        Route::delete('/{project}', [AdminPortfolioController::class, 'destroy'])->name('destroy');
        Route::post('/update-order', [AdminPortfolioController::class, 'updateOrder'])->name('update-order');
    });
});