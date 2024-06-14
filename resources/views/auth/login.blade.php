@extends('layouts.app')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="login-right">
    <div class="login-right-wrap">
        <h1 >Halaman Login</h1>
        <p class="account-subtitle">Perlu Akun? <a href="{{ route('register') }}" class="text-purple">Sign Up</a></p>
        <h2>Sign in</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email<span class="login-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email">
                <span class="profile-views"><i class="fas fa-envelope"></i></span>
            </div>
            <div class="form-group">
                <label>Password <span class="login-danger">*</span></label>
                <input type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" placeholder="Enter your password">
                <span class="profile-views feather-eye toggle-password"></span>
            </div>
            <div class="forgotpass">
                <div class="remember-me">
                    <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Ingatkan Saya
                        <input type="checkbox" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <a href="{{ route('forgot-password') }}" class="text-purple">Lupa Passwoard?</a>
            </div>
            <div class="form-group">
                <button class="btn bg-purple btn-block text-white" type="submit">Login</button>
            </div>
        </form>
        <div class="login-or">
            <span class="or-line"></span>
            <span class="span-or">or</span>
        </div>
        <div class="social-login">
            <a href="#" class="bg-purple text-white"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="bg-purple text-white"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="bg-purple"><i class="fab fa-twitter text-white"></i></a>
            <a href="#" class="bg-purple"><i class="fab fa-linkedin-in text-white"></i></a>
        </div>
    </div>
</div>

@endsection
