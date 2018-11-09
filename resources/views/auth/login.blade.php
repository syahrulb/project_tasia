@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(img/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Halaman Login
                </span>
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">{{ __('Username') }}</span>
                    <input class="input100 {{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" name="username" placeholder="Masukkan Username Anda" name="username" value="{{ old('username') }}" required autofocus>
                    <span class="focus-input100"></span>

                    @if ($errors->has('username'))
                        <span class="merah">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">{{ __('Password') }}</span>
                    <input class="input100 {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Masukkan Password Anda" name="password" required>
                    <span class="focus-input100"></span>

                    @if ($errors->has('password'))
                        <span class="merah">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                    <a href="{{ route('register') }}" class="register100-form-btn">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
