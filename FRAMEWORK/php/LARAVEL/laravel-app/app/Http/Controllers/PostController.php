<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('blog', [
            'title' => 'Blog',
            'posts' => Post::all(),
        ]);
    }

    public function show($slug) {
        return view('blog_detail', [
            'title' => 'Blog Detail',
            'post' => Post::find($slug),
        ]);
    }
}
