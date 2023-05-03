@extends('layouts.app')

@section('content')
    <style>
        /* Perubahan pada tombol */
        .btn-primary {
            background-color: #363636;
            border-color: #363636;
            color: #fff;
            transition: background-color 0.3s ease;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #292929;
            border-color: #292929;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(54, 54, 54, 0.5);
        }

        /* Perubahan pada card header */
        .card-header {
            background-color: #363636;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            padding: 15px;
            text-align: center;
            font-family: 'Arial', sans-serif;
        }

        /* Perubahan pada card body */
        .card-body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        /* Perubahan pada label form */
        .col-form-label {
            font-weight: bold;
            font-family: 'Arial', sans-serif;
        }

        /* Perubahan pada invalid feedback */
        .invalid-feedback {
            color: #dc3545;
            font-family: 'Arial', sans-serif;
        }

        /* Perubahan pada container */
        .container {
            margin-top: 30px;
            font-family: 'Arial', sans-serif;
        }
    </style>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
@endsection
