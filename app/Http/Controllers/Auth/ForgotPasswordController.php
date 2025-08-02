<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        $title = "Forgot Password";
        return view('auth.forgot-password', compact('title'));
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Send the password reset link
        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            Session::flash('message', 'Password reset link sent successfully! Please check your email.');
            Session::flash('alert-type', 'success');
        } else {
            Session::flash('message', 'Email not found!');
            Session::flash('alert-type', 'danger');
        }

        return back();
    }

    public function showResetForm($token)
    {
        $title = "Reset Password";
        return view('auth.reset-password', compact('title', 'token'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:4',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill(['password' => bcrypt($password)])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with(['message' => 'Password has been reset!', 'alert-type' => 'success'])
            : back()->withErrors(['email' => __($status)]);
    }
}
