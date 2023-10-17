<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SubcategoryController;
use \App\Http\Controllers\ProductController;
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
Route::get('/backoffice/products', [ProductController::class, 'showBackofficeProducts'])->name('backoffice.products.index');
Route::get('/backoffice/products/{product}', [ProductController::class, 'showBack'])->name('backoffice.products.show');



Route::post('/search',[ProductController::class, 'searchP'])->name('search');



//Route::post('categories/update-name/{category}', 'CategoryController@updateName')->name('categories.update-name');
//Route::post('categories/update-name/{id}', 'CategoryController@updateName')->name('categories.update-name');
