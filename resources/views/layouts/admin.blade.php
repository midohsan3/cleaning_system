<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js" @if (App::getLocale()=='ar' ) dir="rtl" @else
  dir="ltr" @endif>

<head>
  <meta charset="utf-8">
  <meta name="author" content="Smart-Solutions">
  <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
  <meta name="description" content="Online Shopping">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Fav Icon  -->
  <link rel="shortcut icon" href="{{ url('imgs/logo.png') }}">
  <!-- Page Title  -->
  <title> @yield('pag-title','Smart-Solutions Cleaning') </title>
  <!-- StyleSheets  -->

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  @if(app()->getLocale()=='ar')
  <link rel="stylesheet" href="{{ asset('admin/css/dashlite.rtl.css?ver=2.4.0') }}">
  @else
  <link rel="stylesheet" href="{{ asset('admin/css/dashlite.css?ver=2.4.0') }}">
  @endif

  <link id="skin-default" rel="stylesheet" href="{{ asset('admin/css/theme.css?ver=2.4.0') }}">

  <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-RT3286QJRS"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RT3286QJRS');
  </script>

  @yield('page-styles')
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
  <div class="nk-app-root">
    {{-- main @s --}}
    <div class="nk-main ">
      @include('incs.adminSid')
      {{-- 
      @if (Auth::user()->role_name=='Owner')
      @include('incs.adminSid')
      @else
      @include('incs.clientSid')
      @endif
--}}

      <!-- wrap @s -->
      <div class="nk-wrap ">
        {{-- main header @s --}}
        @include('incs.adminHeader')
        {{-- main header @e --}}
        {{-- content @s --}}
        @yield('page-content')
        {{-- content @e --}}
        {{-- footer @s --}}
        <div class="nk-footer">
          <div class="container-fluid">
            <div class="nk-footer-wrap">
              <div class="nk-footer-copyright"> &copy; 2024
                By <a href="https://smart-solutions.live" target="_blank">Smart-Solutions</a>
              </div>
              <div class="nk-footer-links">
                <ul class="nav nav-sm">
                  <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        {{-- footer @e --}}
      </div>
      {{-- wrap @e --}}
    </div>
    {{-- main @e --}}
  </div>
  {{-- app-root @e --}}
  {{-- JavaScript --}}

  <script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  -
  <script src="{{ asset('admin/js/bundle.js?ver=2.4.0') }}"></script>
  <script src="{{ asset('admin/js/scripts.js?ver=2.4.0') }}"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}

  @yield('page-scripts')

</body>

</html>