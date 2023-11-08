<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController,TagController,PostController,FrontendController};
use App\Http\Controllers\{ContactController,UserController,SettingController,CommentController,BackendController};
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
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');
Route::post('/comment', [FrontendController::class, 'commentStore'])->name('comment.store');
Route::get('/search', [FrontendController::class, 'search'])->name('search');

//__Admin Route__//
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/', [BackendController::class, 'index'])->name('admin.index');
    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/user', UserController::class);
    Route::get('/user/profile/{slug}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::delete('/comment/{tag}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::get('/comment/{tag}', [CommentController::class, 'show'])->name('comment.show');
    //__Setting Route__//
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/setting/{setting}/edit', [SettingController::class, 'edit'])->name('setting.edit');
    Route::put('/setting/update/{setting}', [SettingController::class, 'update'])->name('setting.update');
    
    //__Contact Route__//
    Route::get('/message', [ContactController::class, 'index'])->name('message.index');
    Route::get('/message/show/{id}', [ContactController::class, 'show'])->name('message.show');
    Route::delete('/message/destroy/{id}', [ContactController::class, 'destroy'])->name('message.destroy');

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

Route::get('/rel/{id}', function($id){
    $post = Post::where('id', $id)->get();
    // $first = First::where('id', $second->first_id)->get();
    // foreach($second as $f)
    return view('frontend.rel', compact('post'));
});
Route::get('/com/{id}', function($id){
    $comment = Comment::where('id', $id)->get();
    // $first = First::where('id', $second->first_id)->get();
    // foreach($second as $f)
    return view('frontend.com', compact('comment'));
});
Route::put('/del/{id}', [FrontendController::class, 'delete']);
