@extends('layouts.app')
@section('content')
<div class="login-right">
    <div class="login-right-wrap">
        <h1>Sign Up</h1>
        <p class="account-subtitle">Enter details to create your account</p>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Full Name <span class="login-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter your full name">
                <span class="profile-views"><i class="fas fa-user-circle"></i></span>
            </div>
            <div class="form-group">
                <label>Email <span class="login-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email">
                <span class="profile-views"><i class="fas fa-envelope"></i></span>
            </div>
            {{-- insert defaults --}}
            <input type="hidden" class="image" name="image" value="photo_defaults.jpg">
            <div class="form-group local-forms">
                <label>Role Name <span class="login-danger">*</span></label>
                <select class="form-control select @error('role_name') is-invalid @enderror" name="role_name" id="role_name" placeholder="Select role type">
                    <option selected disabled>Select Role Type</option>
                    @foreach ($role as $name)
                    <option value="{{ $name->role_type }}">{{ $name->role_type }}</option>
                    @endforeach
                </select>
                @error('role_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Password <span class="login-danger">*</span></label>
                <input type="password" class="form-control pass-input  @error('password') is-invalid @enderror" name="password" placeholder="Enter your password">
                <span class="profile-views feather-eye toggle-password"></span>
            </div>
            <div class="form-group">
                <label>Confirm password <span class="login-danger">*</span></label>
                <input type="password" class="form-control pass-confirm @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm your password">
                <span class="profile-views feather-eye reg-toggle-password"></span>
            </div>
            <div class="dont-have">Already Registered? <a href="{{ route('login') }}" class="text-purple">Login</a></div>
            <div class="form-group mb-0">
                <button class="btn bg-purple btn-block text-white" type="submit">Register</button>
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
