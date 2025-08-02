@extends('layouts.auth')

@section('content')

    <style>
        .btn-primary:active,
        .btn:active {
            background-color: #ff9e35 !important;
            box-shadow: none !important;
            border: none !important;
        }

        button:active,
        .btn:active {
            background-color: inherit !important;
            box-shadow: none !important;
            outline: none !important;
        }
    </style>

    <h1>Reset Password</h1>
    <p class="account-subtitle">Enter your new password</p>

    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="email">Email Address</label>
            <input class="form-control" id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="New Password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"
                placeholder="Confirm Password">
        </div>
        <div class="form-group mb-0">
            <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
        </div>
    </form>
    <div class="text-center dont-have">Remember your password? <a href="{{ route('login') }}">Login</a></div>
@endsection