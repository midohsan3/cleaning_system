@extends('layouts.front')

{{-- 
  ===============
  PAGE CONTENT
  ===============
  --}}
@section('content')


{{-- Page Header Start --}}
<div class="container-fluid page-header py-2" dir="ltr">
  <div class="container text-center py-5">
    <h1 class="display-2 text-white mb-4 animated slideInDown">{{ __('main.Book Now') }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
        <li class="breadcrumb-item"><a href="{{route('front')}}">{{ __('main.Home') }}</a></li>
        <li class="breadcrumb-item text-white" aria-current="page">{{ __('main.Booking') }}</li>
      </ol>
    </nav>
  </div>
</div>
{{-- Page Header End --}}

{{-- Contact Start --}}
<div class="container-fluid py-2">
  <div class="container py-2">
    <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
      <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">
        @if (App::getLocale()=='ar')
        تم استلام طلبك بنجاح
        @else
        We Received Your Booking Successfully
        @endif
      </h5>
      <h1 class="display-5 w-50 mx-auto">Thank You</h1>
    </div>
    <div class="row g-5 mb-5 d-flex justify-content-center">

      <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
        <h4>Our Customer Services Will Contact You Soon</h4>
        <h5>If You Submitted Your E-mail You will receive your loging information and your booking confirmation at your
          email inbox.</h5>

        <div class="mt-2">
          <a class="btn btn-primary border-0 py-3 px-4 rounded-pill" href="{{route('front')}}">Home</a>
        </div>
      </div>
    </div>


  </div>
</div>
{{-- Contact End --}}
@endsection
{{-- 
  ===============
  PAGE CONTENT
  ===============
  --}}