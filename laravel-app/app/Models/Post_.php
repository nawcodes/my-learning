<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{

    private static $blog_posts = [
        [
            'title' => 'Blog Posts 1',
            'author' => 'Rifal',
            'slug' => 'blog-post-1',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi consequatur quibusdam sequi. Quod, animi nam! Consequuntur totam delectus rerum fugit, molestias itaque aliquid quasi ratione voluptatum dolores, est ea vitae!'
        ],
        [
            'title' => 'Blog Posts 2',
            'slug' => 'blog-post-2',
            'author' => 'Nurjamilah',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi consequatur quibusdam sequi. Quod, animi nam! Consequuntur totam delectus rerum fugit, molestias itaque aliquid quasi ratione voluptatum dolores, est ea vitae!'
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}

