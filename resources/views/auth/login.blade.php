@extends('layouts.auth')

@section('content')

    <style>
        input#login_email:hover {
            border: 1px solid #ff9e35;
        }

        input#login_email:focus {
            border-color: #ff9e35 !important;
            box-shadow: 0 0 8px rgba(255, 158, 53, 0.8);
        }

        input#login_password:hover {
            border: 1px solid #ff9e35;
        }

        input#login_password:focus {
            border-color: #ff9e35 !important;
            box-shadow: 0 0 8px rgba(255, 158, 53, 0.8);
        }
    </style>

    <h1>Login</h1>
    <p class="account-subtitle">Access to dashboard</p>

    @if (session('login_error'))
        <x-alerts.danger :error="session('login_error')" />
    @endif

    <!-- Form -->
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="login_email">Email</label>
            <input class="form-control" id="login_email" name="email" type="text" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="login_password">Password</label>
            <input class="form-control" id="login_password" name="password" type="password" placeholder="Password">
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit"
                style="background-color:#ff9e35; color:white; padding:10px 20px; border:none; cursor:pointer;"
                onmouseover="this.style.backgroundColor='#d05003'" onmouseout="this.style.backgroundColor='#ff9e35'">
                Login
            </button>
        </div>
    </form>
    <!-- /Form -->

    <div class="text-center forgotpass">
        <a href="{{ route('forgot-password') }}">Forgot Password?</a>
    </div>

    <div class="text-center dont-have">
        Don’t have an account? <a href="{{ route('register') }}">Register</a>
    </div>
@endsection