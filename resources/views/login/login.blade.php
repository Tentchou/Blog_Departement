

@extends('login.base')

@section('content')

    <h2 class="text-center mb-4">Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" >
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" >
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <hr>

    <div class="mt-3 d-flex justify-content-center">
        <p>Forgot Your Password ? <a href="{{ route('password.request') }}">update</a></p><br>
        <p>Don't have an account ? <a href="{{ route('register') }}"> Sign Up</a></p>
    </div>

@endsection
