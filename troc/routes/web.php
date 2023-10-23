<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use App\Livewire\Chat\Chatbox;
use App\Livewire\Chat\CreateChat;
use App\Livewire\Chat\Main;
use App\Livewire\Chat\SendMessage;

use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SubcategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\BlogController;
use \App\Http\Controllers\CommentController;
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



