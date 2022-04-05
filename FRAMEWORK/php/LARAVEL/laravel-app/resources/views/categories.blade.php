@extends('layouts.main')

@section('content')

<h2>
    Post Categories
</h2> </a>
@foreach ($categories as $category)

<ul>
    <li>
        <h2>
            <a href="/categories/{{ $category->slug }}"> {{$category->name}}</a>
        </h2>
    </li>
</ul>
@endforeach

@endsection
