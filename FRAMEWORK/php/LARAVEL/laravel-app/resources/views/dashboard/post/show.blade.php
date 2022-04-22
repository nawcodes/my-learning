@extends('dashboard.layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="">
                <h2 class="my-3">
                    <a href="/blog/{{ $post['slug'] }}"> {{$post->title}}</a>
                </h2>

                <a href="/dashboard/posts" class="btn btn-success"> <span data-feather="arrow-left"></span> Back to my posts</a>
                <a href="/dashboard/posts" class="btn btn-warning"> <span data-feather="edit"></span> Edit</a>
                <a href="/dashboard/posts" class="btn btn-danger"> <span data-feather="x-circle"></span> Delete</a>

                <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="" class="img-fluid mt-3">
                <article class="my-3 fs-5" style="text-align:justify">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
</div>
@endsection
