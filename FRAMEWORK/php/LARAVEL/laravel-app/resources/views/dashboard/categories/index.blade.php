@extends('dashboard.layouts.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categories</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@endif


<div class="table-responsive">
    <a href="/dashboard/categories/create" class="btn btn-primary">Create new category</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
            <tr>
                <td>{{$loop->iteration}}}</td>
                @if(strlen($c->title) > 50)
                <td> <?= substr($c->title, 0, 50) ?> ... </td>
                @else
                <td>{{$c->name}}</td>
                @endif
                <td>
                    <a href="/dashboard/categories/{{$c->slug}}" class="badge bg-primary"><span data-feather="eye"></span></a>
                    <a href="/dashboard/categories/{{$c->slug}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/categories/{{$c->slug}}" method="c" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="badge bg-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
