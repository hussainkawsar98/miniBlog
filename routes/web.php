<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController,TagController,PostController,FrontendController};

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


//__website Route__//
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/category', [FrontendController::class, 'category'])->name('category');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact');
Route::get('/post/{slug}', [FrontendController::class, 'post'])->name('post');



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


//Laravel debuger use for speed
//{{route('frontend.post', ['slug' => $recentPost->slug])}}