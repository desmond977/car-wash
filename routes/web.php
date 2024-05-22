<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\SubscriptionTypeController;
use App\Http\Controllers\SubscriptionController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [CustomerController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [CustomerController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [CustomerController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/car', [CarController::class, 'index'])->name('car.index');
Route::get('/car/create', [CarController::class, 'create'])->name('car.create');
Route::get('/car/{customer}/car', [CarController::class, 'customercar'])->name('car.customercar');

Route::post('/car', [CarController::class, 'store'])->name('car.store');

Route::get('/car/{car}/edit', [CarController::class, 'edit'])->name('car.edit');
Route::put('/car/{car}/update', [CarController::class, 'update'])->name('car.update');
Route::delete('/car/{car}/delete', [CarController::class, 'delete'])->name('car.delete');




Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{customer}/update', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{customer}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
Route::get('/customer/{customer}/view', [CustomerController::class, 'view'])->name('customer.view');



Route::get('/subscription_type', [SubscriptionTypeController::class, 'index'])->name('subscription_type.index');
Route::get('/subscription_type/create', [SubscriptionTypeController::class, 'create'])->name('subscription_type.create');
Route::post('/subscription_type', [SubscriptionTypeController::class, 'store'])->name('subscription_type.store');
Route::get('/subscription_type/{subscription_type}/edit', [SubscriptionTypeController::class, 'edit'])->name('subscription_type.edit');
Route::put('/subscription_type/{subscription_type}/update', [SubscriptionTypeController::class, 'update'])->name('subscription_type.update');
Route::delete('/subscription_type/{subscription_type}/delete', [SubscriptionTypeController::class, 'delete'])->name('subscription_type.delete');



Route::get('/subscription/{customer}/subscription', [SubscriptionController::class, 'customersubscription'])->name('subscription.customersubscription');
Route::get('/customers/{customer}/subscription/create', [SubscriptionController::class, 'create'])->name('subscription.create');
Route::post('/customers/{customer}/subscription', [SubscriptionController::class, 'store'])->name('subscription.store');
// Route::get('/subscription/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('subscription.edit');
// Route::put('/subscription/{subscription}', [SubscriptionController::class, 'update'])->name('subscription.update');
// Route::delete('/subscription/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');



