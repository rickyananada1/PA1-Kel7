    @extends('layouts.app')

    @section('content')
    <style>
        /* Perubahan pada tombol */
        .btn-primary {
            background-color: #363636;
            border-color: #363636;
            color: #fff; /* Mengubah warna teks menjadi putih */
            transition: background-color 0.3s ease;
            font-family: 'Arial', sans-serif; /* Ganti font menjadi Arial */
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
            color: #fff; /* Mengubah warna teks menjadi putih */
            font-size: 24px;
            font-weight: bold;
            padding: 15px;
            text-align: center;
            font-family: 'Arial', sans-serif; /* Ganti font menjadi Arial */
        }
    
        /* Perubahan pada card body */
        .card-body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif; /* Ganti font menjadi Arial */
        }
    
        /* Perubahan pada card title */
        .card-title {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
            font-family: 'Arial', sans-serif; /* Ganti font menjadi Arial */
        }
    
        /* Perubahan pada card text */
        .card-text {
            margin-bottom: 20px;
            text-align: center;
            font-family: 'Arial', sans-serif; /* Ganti font menjadi Arial */
        }
    
        /* Perubahan pada form label */
        .form-label {
            font-weight: bold;
            font-family: 'Arial', sans-serif; /* Ganti font menjadi Arial */
        }
    
        /* Perubahan pada invalid feedback */
        .invalid-feedback {
            color: #dc3545;
            font-family: 'Arial', sans-serif; /* Ganti font menjadi Arial */
        }
    
        /* Perubahan pada content */
        .content {
            text-align: center;
            margin-top: 30px;
            font-family: 'Arial', sans-serif; /* Ganti font menjadi Arial */
        }
    
        /* Perubahan pada content title */
        .content-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            font-family: 'Arial', sans-serif; /* Ganti font menjadi Arial */
        }
    
        /* Perubahan pada content text */
        .content-text {
            margin-bottom: 20px;
            font-family: 'Arial', sans-serif; /* Ganti font menjadi Arial */
        }
    </style>
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <h5 class="card-title">Welcome Back!</h5>
                        <p class="card-text">Please login to access your account.</p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link mt-2" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
