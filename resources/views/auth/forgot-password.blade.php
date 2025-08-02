@extends('layouts.auth')

@section('content')

    <style>
        input[type="text"]:hover {
            border: 1px solid #ff9e35;
        }

        input[type="text"]:focus {
            border-color: #ff9e35 !important;
            box-shadow: 0 0 8px rgba(255, 158, 53, 0.8);
        }

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
    <h1>Forgot Password?</h1>
    <p class="account-subtitle">Enter your email to get a password reset link</p>

    @if(Session::has('message'))
        <div id="toast" class="alert alert-{{ Session::get('alert-type', 'info') }}">
            {{ Session::get('message') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{route('password.email')}}" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control" name="email" type="text" placeholder="Email">
        </div>
        <div class="form-group mb-0">
            <button class="btn btn-primary btn-block" type="submit">Send Reset Link</button>
        </div>
    </form>
    <!-- /Form -->

    <div class="text-center dont-have">Remember your password? <a href="{{route('login')}}">Login</a></div>
@endsection