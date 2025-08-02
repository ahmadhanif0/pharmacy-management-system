<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductExchangeController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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


Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
    // Password Reset Routes
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [LogoutController::class, 'index'])->name('logout');

    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('categories', [CategoryController::class, 'store']);
    Route::put('categories', [CategoryController::class, 'update']);
    Route::delete('categories', [CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('products/create', [ProductController::class, 'create'])->name('add-product');
    Route::get('expired-products', [ProductController::class, 'expired'])->name('expired');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('edit-product');
    Route::get('outstock-products', [ProductController::class, 'outstock'])->name('outstock');
    Route::post('products/create', [ProductController::class, 'store']);
    Route::post('products/{product}', [ProductController::class, 'update']);
    Route::delete('products', [ProductController::class, 'destroy']);

    Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers');
    Route::get('add-supplier', [SupplierController::class, 'create'])->name('add-supplier');
    Route::post('add-supplier', [SupplierController::class, 'store']);
    Route::get('suppliers/{supplier}', [SupplierController::class, 'show'])->name('edit-supplier');
    Route::delete('suppliers', [SupplierController::class, 'destroy']);
    Route::put('suppliers/{supplier}}', [SupplierController::class, 'update'])->name('edit-supplier');

    Route::get('purchases', [PurchaseController::class, 'index'])->name('purchases');
    Route::get('add-purchase', [PurchaseController::class, 'create'])->name('add-purchase');
    Route::post('add-purchase', [PurchaseController::class, 'store']);
    Route::get('purchases/{purchase}', [PurchaseController::class, 'show'])->name('edit-purchase');
    Route::put('purchases/{purchase}', [PurchaseController::class, 'update']);
    Route::delete('purchases', [PurchaseController::class, 'destroy']);

    Route::get('sales', [SalesController::class, 'index'])->name('sales');
    Route::post('sales', [SalesController::class, 'store']);
    Route::put('sales', [SalesController::class, 'update']);
    Route::delete('sales', [SalesController::class, 'destroy']);

    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::post('permissions', [PermissionController::class, 'store']);
    Route::put('permissions', [PermissionController::class, 'update']);
    Route::delete('permissions', [PermissionController::class, 'destroy']);

    Route::get('roles', [RoleController::class, 'index'])->name('roles');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::post('users', [UserController::class, 'store']);
    Route::put('users', [UserController::class, 'update']);
    Route::delete('users', [UserController::class, 'destroy']);

    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('profile', [UserController::class, 'updateProfile']);
    Route::put('profile', [UserController::class, 'updatePassword'])->name('update-password');

    Route::get('settings', [SettingController::class, 'index'])->name('settings');

    Route::get('notification', [NotificationController::class, 'markAsRead'])->name('mark-as-read');
    Route::get('notification-read', [NotificationController::class, 'read'])->name('read');

    Route::get('reports', [ReportController::class, 'index'])->name('reports');
    Route::post('reports', [ReportController::class, 'getData']);

    Route::get('backup', [BackupController::class, 'index'])->name('backup-app');
    Route::get('backup-app', [BackupController::class, 'database'])->name('backup-db');

    Route::resource('returns', ReturnController::class)->except(['show', 'create']);
    Route::get('returns/create/{sale_id}', [ReturnController::class, 'create'])->name('returns.create');
    Route::get('returns/select-sale', [ReturnController::class, 'selectSale'])->name('returns.select-sale');
    Route::put('returns/{id}/approve', [ReturnController::class, 'approve'])->name('returns.approve');

    Route::get('/product_exchanges', [ProductExchangeController::class, 'index'])->name('product_exchanges.index');
    Route::get('/product_exchanges/select-sale', [ProductExchangeController::class, 'selectSale'])->name('product_exchanges.select-sale');
    Route::get('/product_exchanges/create/{saleId}', [ProductExchangeController::class, 'create'])->name('product_exchanges.create');
    Route::post('/product_exchanges', [ProductExchangeController::class, 'store'])->name('product_exchanges.store');
    Route::put('/product_exchanges/{id}', [ProductExchangeController::class, 'update'])->name('product_exchanges.update');
    Route::delete('/product_exchanges/{id}', [ProductExchangeController::class, 'destroy'])->name('product_exchanges.destroy');
    // Admin actions
    Route::put('/product_exchanges/{id}/approve', [ProductExchangeController::class, 'approve'])->name('product_exchanges.approve');
    Route::put('/product_exchanges/{id}/reject', [ProductExchangeController::class, 'reject'])->name('product_exchanges.reject');
});

Route::get('/', function () {
    return redirect()->route('dashboard');
});
