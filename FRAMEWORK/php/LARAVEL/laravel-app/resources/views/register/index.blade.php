@extends('layouts.main')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration mt-5">
            <h1 class="h3 mb-3 fw-normal">Registration form</h1>
            <form>
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top" name="name" id="name" placeholder="name@example.com">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="username" placeholder="name@example.com">
                    <label for="floatingInput">username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom" name="password" id="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-4">Already registered? <a href="/login">Login!</a></small>
        </main>
    </div>
</div>


@endsection
