<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

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
    ['title' => 'Home', 'name' => 'Rifal', 'email' => 'rifal@gmail.com',
            'active' => 'home',

]);
});

Route::get('/about', function () {
    return view('about',
    ['title' => 'About',
            'active' => 'about',
        ]
);

});





Route::get('/blog', [PostController::class, 'index']);


// Route::get('blog/{slug}', [PostController::class, 'show']);
// automatic query | routes binding
Route::get('blog/{post:slug}', [PostController::class, 'show']);


Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
        'active' => 'categories',

    ]);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
// CRUD routes
Route::resource('dashboard/posts', DashboardPostController::class)->middleware('auth');

// admin routes
Route::resource('dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_admin');




