@extends('layouts.main')

@section('content')

<article class="mb-5">
    <h2>
        <a href="/blog/{{ $post['slug'] }}"> {{$post['title']}}
    </h2> </a>
    <h5>By: {{$post['author']}}</h5>
    {!! $post->body !!}
</article>
<a href="/blog">Back to blog</a>


@endsection
