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


// Route::get('blog/{slug}', [PostController::class, 'show']);
// automatic query | routes binding
Route::get('blog/{post:slug}', [PostController::class, 'show']);




