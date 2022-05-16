@extends('layouts.main')

@section('content')
<h1 class="mb-5">{{$title}}</h1>


<div class="row">
    <div class="col-md-6">
        <form action="/blog">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if(request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" name="search" value="{{request('search')}}" class="form-control" placeholder="Search blog .." aria-describedby="button-addon2">
                <button type="submit" class="btn btn-outline-danger">Search</button>
            </div>
        </form>
    </div>
</div>



@if($posts->count() > 0)
<div class="card mb-3">
    @if($posts[0]->image)
    <div style="max-height: 350px; overflow:hidden;">
        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="" class="img-fluid mt-3">
    </div>
    @else
    <img src="https://source.unsplash.com/1200x400?{{$posts[0]->category->name}}" class="card-img-top" alt="{{$posts[0]->category->name}}">
    @endif
    <div class="card-body">
        <h2 class="card-title">
            <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-dark"> {{ $posts[0]->title}} </a>
        </h2>
        <p class="card-text">
            <small>
                By: <a href="/blog?author={{ $posts[0]->author->username }}"> {{$posts[0]->author->name}} </a> In<a href="/blog?category={{ $posts[0]->category->slug }}"> {{ $posts[0]->category->name }} </a>
                {{ $posts[0]->created_at->diffForHumans() }}
            </small>
        </p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/blog/{{ $posts[0]->slug }}" class="btn btn-sm btn-primary">Readmore</a>

    </div>
</div>



<div class="container">
    <div class="row">
        <?php $n = 1; ?>
        @foreach($posts->skip(1) as $post)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)">
                    <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-white">
                        {{$post->category->name}}
                    </a>
                </div>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid mt-3">
                @else
                <img src="https://source.unsplash.com/500x40{{$n++}}?{{$post->category->name}}" class="card-img-top" alt="{{$post->category->name}}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/blog/{{ $post->slug }}" class="text-decoration-none text-dark"> {{ $post->title}} </a>
                    </h5>
                    <p class="card-text">
                        <small>
                            By: <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none"> {{$post->author->name}}</a>
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


@else
<p class="text-center fs-4">No posts found</p>
@endif

<div class="d-flex justify-content-end my-3">
    {{$posts->links()}}
</div>




@endsection
