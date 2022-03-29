<?php

use Illuminate\Support\Facades\Route;

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





Route::get('/blog', function () {

    $blog_posts = [
        [
            'title' => 'Blog Posts 1',
            'author' => 'Rifal',
            'slug' => 'blog-post-1',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi consequatur quibusdam sequi. Quod, animi nam! Consequuntur totam delectus rerum fugit, molestias itaque aliquid quasi ratione voluptatum dolores, est ea vitae!'
        ],
        [
            'title' => 'Blog Posts 2',
            'slug' => 'blog-post-2',
            'author' => 'Nurjamil',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi consequatur quibusdam sequi. Quod, animi nam! Consequuntur totam delectus rerum fugit, molestias itaque aliquid quasi ratione voluptatum dolores, est ea vitae!'
        ],
    ];
    return view('blog', [
        'title' => 'Blog',
        'posts' => $blog_posts,
    ]);
});


Route::get('blog/{slug}', function ($slug) {

    $blog_posts = [
        [
            'title' => 'Blog Posts 1',
            'author' => 'Rifal',
            'slug' => 'blog-post-1',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi consequatur quibusdam sequi. Quod, animi nam! Consequuntur totam delectus rerum fugit, molestias itaque aliquid quasi ratione voluptatum dolores, est ea vitae!'
        ],
        [
            'title' => 'Blog Posts 2',
            'slug' => 'blog-post-2',
            'author' => 'Nurjamil',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi consequatur quibusdam sequi. Quod, animi nam! Consequuntur totam delectus rerum fugit, molestias itaque aliquid quasi ratione voluptatum dolores, est ea vitae!'
        ],
    ];


    foreach($blog_posts as $post) {
        if($post['slug'] == $slug) {
           $blog_posts = [];
           $blog_posts = $post;
        }
    }

    return view('blog_detail', [
        'title' => 'Blog Detail',
        'post' => $blog_posts,
    ]);
});




