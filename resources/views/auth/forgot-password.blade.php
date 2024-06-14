@extends('layouts.app')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="login-right">
        <div class="login-right-wrap">
            <h1>Masukan Email yang terdaftar</h1>
            <p class="account-subtitle">Sudah Punya Akun? <a href="{{ route('login') }}" class="text-purple">Login</a></p>
            <h2>Forgot Password</h2>
            <form action="{{ route('forgot-password-act') }}" method="POST">
                @csrf
                <div class="form-group local-forms">
                    <label>Email<span class="login-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan alamat email">
                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                </div>
                <div class="form-group local-forms">
                    <button class="btn bg-purple text-white btn-block" type="submit">Submit</button>
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
