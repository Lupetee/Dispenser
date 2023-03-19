<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NonRestrictedController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestrictedController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('order-count', [OrderController::class, 'getOrderCount'])->name('orders.getCount');


Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::resource('products', ProductController::class);

    Route::resource('customers', CustomerController::class);
    Route::get('customers.medication', [CustomerController::class, 'medication'])->name('customers.medication');
    Route::get('customers/{customer}/editmedication', [CustomerController::class, 'editmedication'])->name('customers.editmedication');
    Route::put('customers.updatemedication', [CustomerController::class, 'updatemedication'])->name('customers.updatemedication');

    Route::resource('orders', OrderController::class);
    Route::get('order-receipt/{order}', [OrderController::class, 'viewReceipt'])->name('order.viewReceipt');
    Route::get('medical-history', [CustomerController::class, 'getDischarged'])->name('medical-history.index');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/change-qty', [CartController::class, 'changeQty']);
    Route::delete('/cart/delete', [CartController::class, 'delete']);
    Route::delete('/cart/empty', [CartController::class, 'empty']);

    Route::resource('messages', MessageController::class);

    Route::resource('restricted', RestrictedController::class);
    Route::get('restricted/{restricted}/replicate', [RestrictedController::class, 'editreplicate'])->name('restricted.editreplicate');
    Route::put('restricted.replicate', [RestrictedController::class, 'replicate'])->name('restricted.replicate');
    

    Route::resource('nonrestricted', NonRestrictedController::class);
    Route::get('nonrestricted/{nonrestricted}/replicate', [NonRestrictedController::class, 'editreplicate'])->name('nonrestricted.editreplicate');
    Route::put('nonrestricted.replicate', [NonRestrictedController::class, 'replicate'])->name('nonrestricted.replicate');
    

    
    // Route::get('/message',[MessageController::class, 'index'])->name('message.index');
    // Route::post('/message',[MessageController::class, 'store'])->name('message.store');


});
