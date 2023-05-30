@extends('layouts.app')

@section('content')
<style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    .h-custom {
    height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
    height: 100%;
    }
    }
</style>


<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="lead fw-normal mb-0 me-3">Silahkan Lakukan Registrasi Akun</p>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input id="name" type="text"
              class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
              value="{{ old('name') }}" required autocomplete="name" autofocus>
              <label for="email" class="form-label">{{ __('Name') }}</label>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
                <input id="email" type="text"
                class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label for="email" class="form-label">{{ __('Email Address') }}</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-outline mb-3">
                <input id="password" type="password"
                class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                value="{{ old('password') }}" required autocomplete="password" autofocus>
                <label for="password" class="form-label">{{ __('Password') }}</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-outline mb-3">
                <input id="password-confirm" type="password" class="form-control form-control-lg"
                                        name="password_confirmation" required autocomplete="new-password">
                <label for="password" class="form-label">{{ __('Confirm Password') }}</label>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                    {{ __('Register') }}
                </button>
            </div>
  
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
