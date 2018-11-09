@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(img/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Halaman Register
                </span>
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">{{ __('Kode Pegawai') }}</span>
                    <input type="text" class="input100{{ $errors->has('kode_pegawai') ? ' is-invalid' : '' }}" name="kode_pegawai" value="{{ old('kode_pegawai') }}" required autofocus>
                    <span class="focus-input100"></span>

                    @if ($errors->has('kode_pegawai'))
                        <span class="merah">
                            <strong>{{ $errors->first('kode_pegawai') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">{{ __('Nama') }}</span>
                    <input type="text" class="input100{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    <span class="focus-input100"></span>

                    @if ($errors->has('name'))
                        <span class="merah">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">{{ __('Email') }}</span>
                    <input type="text" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    <span class="focus-input100"></span>

                    @if ($errors->has('email'))
                        <span class="merah">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">{{ __('Username') }}</span>
                    <input type="text" class="input100{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                    <span class="focus-input100"></span>

                    @if ($errors->has('username'))
                        <span class="merah">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">{{ __('Password') }}</span>
                    <input type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <span class="focus-input100"></span>

                    @if ($errors->has('password'))
                        <span class="merah">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input m-b-26">
                    <span class="label-input100">{{ __('Ulangi Password') }}</span>
                    <input class="input100" type="password" class="form-control" name="password_confirmation" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26">
                    <span class="label-input100">{{ __('Status') }}</span>
                    <input type="text" class="input100{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required autofocus>
                    <span class="focus-input100"></span>

                    @if ($errors->has('status'))
                        <span class="merah">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
