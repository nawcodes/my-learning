<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{
    public $posts;



    public function render()
    {
        $this->posts = Post::latest()->get();
        return view('livewire.post-index');
    }
}
