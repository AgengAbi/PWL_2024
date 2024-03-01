<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;

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
// });

// Route::get('/', function () {
//     return 'Selamat Datang';
// });

// Route::get('/about', function () {
//     return 'NIM 2241720126';
// });

Route::get('/hello', function () {
    return 'Hello';
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
});

Route::get('/posts/{posts}/comments/{comments}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

// Route::get('/articles/{id}', function ($articlesId) {
//     return 'Halaman Artikel dengan ID-' . $articlesId;
// });

// Route::get('/user/{name?}', function ($name = null) {
//     return 'Nama saya ' . $name;
// });

Route::get('/user/{name?}', function ($name = 'Matcha') {
    return 'Nama saya ' . $name;
});

Route::get('/user/profile', function () {
    //
})->name('profile');

// Route::get('/user/profile', [UserProfileController::class, 'show']) -> name('profile');

// // Generating URLs...
// $url = route('profile');
// // Generating Redirects...
// return redirect()->route('profile');

// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second middleware...
//     });

//     Route::get('/user/profile', function () {
//         // Uses first & second middleware...
//     });

//     Route::domain('{account}.example.com') -> group(function(){
//         Route::get('users/{id}', function ($account,$id) {
//             //
//         });
//     });
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [UserController::class, 'index']);
//     Route::get('/event', [UserController::class, 'index']);
// });

// Route::prefix('admin')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [UserController::class, 'index']);
//     Route::get('/event', [UserController::class, 'index']);
// });

// redirect routes
Route::redirect('/here', '/there');

// lanjutan untuk controller
Route::get('/hello', [WelcomeController::class, 'hello']);

// Controller ke routing
// Route::get('/', [PageController::class, 'index']);

// Route::get('/about', [PageController::class, 'about']);

// Route::get('/articles/{id}', [PageController::class, 'articles']);

Route::get('/', HomeController::class);
Route::get('/about', AboutController::class);
Route::get('/articles/{id}', ArticleController::class);

// resource controller
Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);
Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
