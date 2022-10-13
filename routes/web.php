<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController,TagController,PostController,FrontendController,UserController,SettingController};

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
Route::get('/category/{slug}', [FrontendController::class, 'category'])->name('category');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact');
Route::get('/post/{slug}', [FrontendController::class, 'post'])->name('post');
Route::get('/tag/{slug}', [FrontendController::class, 'tag'])->name('tag');



//__Admin Route__//
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/user', UserController::class);
    
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/setting/{setting}/edit', [SettingController::class, 'edit'])->name('setting.edit');
    Route::put('/setting/update/{setting}', [SettingController::class, 'update'])->name('setting.update');
    
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});

// Route::get('/category', function () {
//     return view('category');

//Laravel debuger use for speed
//{{route('frontend.post', ['slug' => $recentPost->slug])}}


Route::get('/test', function(){
    $id = 60;
    $posts = App\Models\Post;
    foreach($posts as $post){
        $post->image ="https:i.piccsum.photos/id/".$id."50.jpg";
        $post->save();
        $id++;
    }
    return $posts;
});