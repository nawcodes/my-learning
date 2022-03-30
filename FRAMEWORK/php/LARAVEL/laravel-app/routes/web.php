<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('home',
    ['title' => 'Home', 'name' => 'Rifal', 'email' => 'rifal@gmail.com']);
});

Route::get('/about', function () {
    return view('about',
    ['title' => 'About']
);

});





Route::get('/blog', [PostController::class, 'index']);


Route::get('blog/{slug}', function ($slug) {



    // foreach($blog_posts as $post) {
    //     if($post['slug'] == $slug) {
    //        $blog_posts = [];
    //        $blog_posts = $post;
    //     }
    // }

    return view('blog_detail', [
        'title' => 'Blog Detail',
        'post' => Post::find($slug),
    ]);
});




