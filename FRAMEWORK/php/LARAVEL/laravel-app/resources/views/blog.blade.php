@extends('layouts.main')

@section('content')
@foreach ($posts as $post)
<article class="mb-5">
    <h2>
        <a href="/blog/{{ $post->slug }}"> {{$post->title}}</a>
    </h2>
    <p>By: <a href="/authors/{{ $post->author->username }}"> {{$post->author->name}} </a> In<a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a></p>
    <p>{{$post->excerpt}}</p>
    <p><a href="/blog/{{ $post->slug }}">Readmore</a></p>
    <hr>
</article>
@endforeach

@endsection
