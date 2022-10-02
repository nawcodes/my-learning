@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <h2 class="mb-3">
                    <a href="/blog/{{ $post['slug'] }}"> {{$post['title']}}
                </h2> </a>
                <h5>By: Rifal Nurjamil <a href="/blog?category={{ $post->category->slug }}"> {{ $post->category->name }} </a></h5>
                @if($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid mt-3">
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="" class="img-fluid mt-3">
                @endif
                <article class="my-3 fs-5" style="text-align:justify">
                    {!! $post->body !!}
                </article>
            </div>
            <a href="/blog">Back to blog</a>
        </div>
    </div>
</div>


@endsection
