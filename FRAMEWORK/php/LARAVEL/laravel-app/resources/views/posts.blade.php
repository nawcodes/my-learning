@extends('layouts.main')

@section('content')
<h1 class="mb-5">{{$title}}</h1>
@if($posts->count() > 0)
<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400?{{$posts[0]->category->name}}" class="card-img-top" alt="{{$posts[0]->category->name}}">
    <div class="card-body">
        <h2 class="card-title">
            <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-dark"> {{ $posts[0]->title}} </a>
        </h2>
        <p class="card-text">
            <small>
                By: <a href="/authors/{{ $posts[0]->author->username }}"> {{$posts[0]->author->name}} </a> In<a href="/categories/{{ $posts[0]->category->slug }}"> {{ $posts[0]->category->name }} </a>
                {{ $posts[0]->created_at->diffForHumans() }}
            </small>
        </p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/blog/{{ $posts[0]->slug }}" class="btn btn-sm btn-primary">Readmore</a>

    </div>
</div>
@else
<p class="text-center fs-4">No posts found</p>
@endif


<div class="container">
    <div class="row">
        <?php $n = 1; ?>
        @foreach($posts->skip(1) as $post)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)">
                    <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-white">
                        {{$post->category->name}}
                    </a>
                </div>
                <img src="https://source.unsplash.com/500x40{{$n++}}?{{$post->category->name}}" class="card-img-top" alt="{{$post->category->name}}">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/blog/{{ $post->slug }}" class="text-decoration-none text-dark"> {{ $post->title}} </a>
                    </h5>
                    <p class="card-text">
                        <small>
                            By: <a href="/authors/{{ $post->author->username }}" class="text-decoration-none"> {{$post->author->name}}</a>
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/blog/{{ $posts[0]->slug }}" class="btn btn-sm btn-primary">Readmore</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
