@extends('layouts.main')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">

        <main class="form-registration mt-5">
            <h1 class="h3 mb-3 fw-normal">Registration form</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name')}}" required>
                    <label for="floatingInput">Name</label>
                    <div class="invalid-feedback">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username')}}" required>
                    <label for="floatingInput">Username</label>
                    <div class="invalid-feedback">
                        @error('username')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email')}}" required>
                    <label for="floatingInput">Email address</label>
                    <div class="invalid-feedback">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    <div class="invalid-feedback">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-4">Already registered? <a href="/login">Login!</a></small>
        </main>
    </div>
</div>


@endsection
