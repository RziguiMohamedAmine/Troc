<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SubcategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\HistoryController;
use \App\Http\Controllers\ClaimController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\PlanController;
use App\Http\Controllers\ReportsController;
use \App\Http\Controllers\OffreController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\BlogController;

use App\Livewire\Chat\Chatbox;
use App\Livewire\Chat\CreateChat;
use App\Livewire\Chat\Main;
use App\Livewire\Chat\SendMessage;

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

Route::get("/chat-users", CreateChat::class)->name("chat-users");
Route::get("/chat{key?}", Main::class)->name("chat");

Route::post('/load-conv', [Chatbox::class, 'loadConversation'])->name('load-conv');
Route::post('/load-send-message', [SendMessage::class, 'loadSendMessage'])->name('load-send-message');
Route::post('/send-message', [SendMessage::class, 'sendMessage'])->name('send-message');

Route::post("/upload-image", [Chatbox::class, 'uploadImage'])->name("upload-image");
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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('offres', OffreController::class);
});
Route::post("/check-conversation", [ProductController::class, 'checkConversation'])->name("check-conversation");

Route::get('/my-products', [ProductController::class, 'userProducts'])->name('user.products');
Route::get('/my-blogs', [BlogController::class, 'userBlogs'])->name('user.blogs');
Route::get('/allblogs', [BlogController::class, 'allBlogs'])->name('all.blogs');
Route::get('/blog/create', [BlogController::class, 'createfront'])->name('frontoffice.blogs.create');
Route::delete('/blogs/{id}', [BlogController::class, 'destroyfront'])->name('blogs.destroyfront');
Route::get('/blog/{id}', [BlogController::class, 'editfront'])->name('blogs.editfront');
Route::post('/backoffice/blogs', [BlogController::class, 'storeBack'])->name('blogs.storeBack');
Route::put('/blogs/{blog}', [BlogController::class, 'updateback'])->name('blogs.updateback');




Route::get('/backoffice/products', [ProductController::class, ''])->name('backoffice.products.index');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/backoffice/products', [ProductController::class, 'showBackofficeProducts'])->name('backoffice.products.index');
Route::get('/backoffice/products/{product}', [ProductController::class, 'showBack'])->name('backoffice.products.show');


Route::get('/claims/{product_id}', [ClaimController::class,'create'])->name('claims.create');

Route::post('/claim', [ClaimController::class, 'store'])->name('claims.store');



Route::post('/add-to-history/{userId}/{productId}', [HistoryController::class, 'addToHistory']);
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');



Route::post('/search',[ProductController::class, 'searchP'])->name('search');



//Route::post('categories/update-name/{category}', 'CategoryController@updateName')->name('categories.update-name');
//Route::post('categories/update-name/{id}', 'CategoryController@updateName')->name('categories.update-name');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('blogs', BlogController::class);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('comments', CommentController::class);
});
Route::resource('comments', CommentController::class)->parameters([
    'comments' => 'comment'
]);

Route::post('/blog/create/', [BlogController::class, 'createFront'])->name('frontoffice.blogs.create');



Route::get('/backoffice/offres', [OffreController::class, 'showAllBackoffice'])->name('backoffice.offres.index');
Route::get('/backoffice/offres/{offre}', [OffreController::class, 'showBack'])->name('backoffice.offres.show');
Route::post('/search',[ProductController::class, 'searchP'])->name('search');

Route::get("/backoffice/reports", [ReportsController::class, 'showBackofficeReports'])->name("backoffice.reports.index");

Route::get("/backoffice/claims", [ClaimController::class, 'showBackofficeClaims'])->name("backoffice.Claims.index");

Route::get('/backoffice/products', [ProductController::class, 'showBackofficeProducts'])->name('backoffice.products.index');
Route::post('/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/my-cart', [CartController::class, 'showCart'])->name('show.cart');
Route::post('/cart/confirm-purchase', [CartController::class, 'confirmPurchase']);
Route::get('/cart/confirm-payment/{clientSecret}', [CartController::class, 'handlePaymentConfirmation']);
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
Route::get('/successCart', [CartController::class, 'successCart'])->name('successCart');
Route::get('/redirectToOffre/{notification}',[OffreController::class, 'redirectToOffre'])->name('backoffice.offres.redirectToOffre');

Route::get('/successSub', [PlanController::class, 'success'])->name('success');


Route::post('/checkoutSub/{planId}', [PlanController::class, 'buyPlan'])->name('payment.process');

Route::post('/backoffice/reports', [ReportsController::class, 'approve'])->name('backoffice.reports.approve');
Route::post('/backoffice/reports/deny', [ReportsController::class, 'deny'])->name('backoffice.reports.deny');


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
