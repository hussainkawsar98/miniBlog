<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//__website Route__//
Route::get('/', function () {
    return view('index');
});
Route::get('/category', function () {
    return view('category');
});
Route::get('/single', function () {
    return view('single');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});


//__Admin Route__//
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/tag', TagController::class);
});

// Route::get('/category', function () {
//     return view('category');
// });
// Route::get('/single', function () {
//     return view('single');
// });
// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });



