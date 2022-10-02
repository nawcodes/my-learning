@extends('layouts.main')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <main class="form-signin mt-5">
            <h1 class="h3 mb-3 fw-normal">Please login</h1>
            <form method="post" action="/login">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @endif" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}" autofocus required>
                    <label for="email">Email address</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-4">Not registered? <a href="/register">Register now!</a></small>
        </main>
    </div>
</div>


@endsection
