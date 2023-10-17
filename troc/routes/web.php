<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SubcategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\PlanController;
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
    return view('frontoffice.welcome');
})->name('welcome');


Route::get('/chart', function () {
    return view('backoffice.categories.chart');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home',[CategoryController::class, 'indexFront'])->name('home');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin', // Apply the 'admin' middleware to this route
])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'showBackofficeProducts'])->name('dashboard');
});


Route::middleware([ 'auth:sanctum',
config('jetstream.auth_session'),
'verified',
'admin',
])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
});

Route::middleware([ 'auth:sanctum',
config('jetstream.auth_session'),
'verified',
'admin',
])->group(function () {
Route::resource('categories', CategoryController::class);
});


Route::middleware([ 'auth:sanctum',
config('jetstream.auth_session'),
'verified',
'admin',
])->group(function () {
Route::resource('subcategories', SubcategoryController::class);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('products', ProductController::class);
});

Route::get('/my-products', [ProductController::class, 'userProducts'])->name('user.products');
Route::get('/backoffice/plan/show', [PlanController::class, 'showBackofficePlans'])->name('backoffice.subscription.show');
//Route::post('/backoffice/plan/add', [PlanController::class, 'addBackofficePlans'])->name('backoffice.subscription.create');
Route::get('/backoffice/plan/add', [PlanController::class, 'create'])->name('backoffice.subscription.create');
Route::post('/backoffice/plan/add', [PlanController::class, 'addBackofficePlans'])->name('backoffice.subscription.create');
//Route::get('/home/plans', [PlanController::class, 'showHomePlans'])->name('home.plans');

Route::get('/backoffice/plan/{plan}/edit', [PlanController::class, 'edit'])->name('plan.edit');

// Update a plan
Route::put('/backoffice/plan/{plan}', [PlanController::class, 'update'])->name('plan.update');

// Delete a plan
Route::delete('/backoffice/plan/{plan}', [PlanController::class, 'destroy'])->name('plan.destroy');

Route::get('/backoffice/products', [ProductController::class, 'showBackofficeProducts'])->name('backoffice.products.index');
Route::post('/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/my-cart', [CartController::class, 'showCart'])->name('show.cart');
Route::post('/cart/confirm-purchase', [CartController::class, 'confirmPurchase']);
Route::get('/cart/confirm-payment/{clientSecret}', [CartController::class, 'handlePaymentConfirmation']);
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
Route::get('/successCart', [CartController::class, 'successCart'])->name('successCart');

Route::get('/successSub', [CategoryController::class, 'success'])->name('success');


Route::post('/checkoutSub/{planId}', [CategoryController::class, 'buyPlan'])->name('payment.process');



//Route::post('categories/update-name/{category}', 'CategoryController@updateName')->name('categories.update-name');
//Route::post('categories/update-name/{id}', 'CategoryController@updateName')->name('categories.update-name');
