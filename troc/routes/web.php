<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
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

Route::get("/chat-users", CreateChat::class)->name("chat-users");
Route::get("/chat{key?}", Main::class)->name("chat");

Route::post('/load-conv', [Chatbox::class, 'loadConversation'])->name('load-conv');
Route::post('/load-send-message', [SendMessage::class, 'loadSendMessage'])->name('load-send-message');
Route::post('/send-message', [SendMessage::class, 'sendMessage'])->name('send-message');

Route::post("/upload-image", [Chatbox::class, 'uploadImage'])->name("upload-image");
