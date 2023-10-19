<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
<<<<<<< Updated upstream
=======
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SubcategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\HistoryController;
use \App\Http\Controllers\ClaimController;
>>>>>>> Stashed changes
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');


Route::get('/', function () {
    return view('frontoffice.welcome');
})->name('welcome');


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {return view('backoffice.index');})->name('dashboard');

// });

Route::middleware([ 
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {return view('frontoffice.home');})->name('home');
});


Route::middleware([ 
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin', // Apply the 'admin' middleware to this route
])->group(function () {
    Route::get('/dashboard', function () {return view('backoffice.welcome');})->name('dashboard');
});


Route::middleware([ 'auth:sanctum',
config('jetstream.auth_session'),
'verified',
'admin',
])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
});


<<<<<<< Updated upstream
=======

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


Route::get('/claims/{product_id}', [ClaimController::class,'create'])->name('claims.create');

Route::post('/claim', [ClaimController::class, 'store'])->name('claims.store');



Route::post('/add-to-history/{userId}/{productId}', [HistoryController::class, 'addToHistory']);
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');



Route::post('/search',[ProductController::class, 'searchP'])->name('search');



//Route::post('categories/update-name/{category}', 'CategoryController@updateName')->name('categories.update-name');
//Route::post('categories/update-name/{id}', 'CategoryController@updateName')->name('categories.update-name');
>>>>>>> Stashed changes
