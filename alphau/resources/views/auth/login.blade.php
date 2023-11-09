@extends('app.welcome.layout.app')
@section('title')
    AlphaU - Login
@endsection
@section('welcomebody')
    <div class="web_body bg_dm_drk">
        <div class="container mt-5 p-5 ">
            <div class="col-lg-4 col-md-4 col-sm-12  mx-auto">
                <div class="card mt-5 p-2">
                    <div class="card-body">
                        <div class="">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="form-label wb_frm_lbl">{{ __('Email Address') }}</label>
                                    <div class="col-md-12">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="form-label wb_frm_lbl">{{ __('Password') }}</label>
                                    <div class="col-md-12">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label wb_frm_lbl_chck" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0 text-center">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary w-100 btn-block">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-12">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link wb_frm_lbl_pw_rst" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
