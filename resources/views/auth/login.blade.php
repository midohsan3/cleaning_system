<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Cleaning Booking System </title>
  <meta name="description" content="Smart-Solutions Booking System">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ url('imgs/logo.jpg') }}">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('log/css/bootstrap.min.css') }}">
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{ asset('log/css/fontawesome-all.min.css') }}">
  <!-- Flaticon CSS -->
  <link rel="stylesheet" href="{{ asset('log/font/flaticon.css') }}">
  <!-- Google Web Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('log/css/style.css') }}">
</head>

<body>

  <section class="fxt-template-animation fxt-template-layout1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-12 fxt-bg-color">
          <div class="fxt-content">

            <div class="fxt-form">
              <h2>Log In</h2>
              <p>Log in to continue in Smart-Solutions Booking System</p>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <div class="fxt-transformY-50 fxt-transition-delay-1">
                    <input type="email" class="form-control" name="email" placeholder="Email Address"
                      required="required">
                    <i class="flaticon-envelope"></i>
                  </div>
                  @error('email')
                  <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="fxt-transformY-50 fxt-transition-delay-2">
                    <input type="password" class="form-control" name="password" placeholder="Password"
                      required="required">
                    <i class="flaticon-padlock"></i>
                  </div>
                  @error('password')
                  <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="fxt-transformY-50 fxt-transition-delay-3">
                    <div class="fxt-content-between">
                      <button type="submit" class="fxt-btn-fill">Log in</button>
                      <a href="{{ route('password.request') }}" class="switcher-text2">Forgot
                        Password</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="fxt-footer">
              <ul class="fxt-socials">
                <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-4">
                  <a href="https://www.facebook.com/smartssolutionsystems" title="Facebook"><i
                      class="fab fa-facebook-f"></i></a>
                </li>
                <li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-5">
                  <a href="https://x.com/En_Mohameed" title="twitter"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-7">
                  <a href="https://www.linkedin.com/company/88389984" title="linkedin"><i
                      class="fab fa-linkedin-in"></i></a>
                </li>
                <li class="fxt-pinterest fxt-transformY-50 fxt-transition-delay-8">
                  <a href="https://www.instagram.com/midohsan3/" title="instagram"><i class="fab fa-instagram"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-12 fxt-none-767 fxt-bg-img" data-bg-image="{{ url('imgs/logo.jpg') }}"></div>
      </div>
    </div>
  </section>
  <!-- jquery-->
  <script src="{{ asset('log/js/jquery-3.5.0.min.js') }}"></script>
  <!-- Popper js -->
  <script src="{{ asset('log/js/popper.min.js') }}"></script>
  <!-- Bootstrap js -->
  <script src="{{ asset('log/js/bootstrap.min.js') }}"></script>
  <!-- Imagesloaded js -->
  <script src="{{ asset('log/js/imagesloaded.pkgd.min.js') }}"></script>
  <!-- Validator js -->
  <script src="{{ asset('log/js/validator.min.js') }}"></script>
  <!-- Custom Js -->
  <script src="{{ asset('log/js/main.js') }}"></script>

</body>

</html>
{{-- @extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                    ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
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
@endsection
--}}