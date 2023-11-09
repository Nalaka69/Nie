@extends('app.welcome.layout.app')
@section('title')
    AlphaU - Register
@endsection
@section('welcomebody')
    <div class="web_body bg_dm_drk">
        <div class="container mt-5 p-5 ">
            <div class="col-lg-4 col-md-4 col-sm-12  mx-auto">
                <div class="card mt-5 p-2">
                    <div class="card-body">
                        <div class="">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="first_name" class="form-label wb_frm_lbl">{{ __('First Name') }}</label>
                                    <div class="col-md-12">
                                        <input id="first_name" type="first_name"
                                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                            value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="last_name" class="form-label wb_frm_lbl">{{ __('First Name') }}</label>
                                    <div class="col-md-12">
                                        <input id="last_name" type="last_name"
                                            class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                            value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

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
                                    <label for="school" class="form-label wb_frm_lbl">{{ __('School') }}</label>
                                    <div class="col-md-12">
                                        <input id="school" type="school"
                                            class="form-control @error('school') is-invalid @enderror" name="school"
                                            value="{{ old('school') }}" required autocomplete="school" autofocus>
                                        @error('school')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="student_index" class="form-label wb_frm_lbl">{{ __('Student Index') }}</label>
                                    <div class="col-md-12">
                                        <input id="student_index" type="student_index"
                                            class="form-control @error('student_index') is-invalid @enderror" name="student_index"
                                            value="{{ old('student_index') }}" required autocomplete="student_index" autofocus>
                                        @error('student_index')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="form-label wb_frm_lbl">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="form-label wb_frm_lbl">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="mb-0 text-center">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary w-100 btn-block">
                                            {{ __('Register') }}
                                        </button>
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
