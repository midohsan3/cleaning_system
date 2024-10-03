@extends('layouts.front')

{{-- 
  ===============
  PAGE CONTENT
  ===============
  --}}
@section('content')


{{-- Page Header Start --}}
<div class="container-fluid page-header py-5" dir="ltr">
  <div class="container text-center py-5">
    <h1 class="display-2 text-white mb-4 animated slideInDown">{{ __('main.Contact Us') }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
        <li class="breadcrumb-item"><a href="{{route('front')}}">{{ __('main.Home') }}</a></li>
        <li class="breadcrumb-item text-white" aria-current="page">{{ __('main.Contact Us') }}</li>
      </ol>
    </nav>
  </div>
</div>
{{-- Page Header End --}}

{{-- Contact Start --}}
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
      <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">
        {{__('main.Get In Touch')}}</h5>
      <h1 class="display-5 w-50 mx-auto">{{__('main.Contact for any quer')}}y</h1>
    </div>
    <div class="row g-5 mb-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
        <div class="h-100">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3607.993106640916!2d55.32186257424467!3d25.270817328717012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s7HQQ78CF%2B8Q!5e0!3m2!1sen!2sae!4v1715253902801!5m2!1sen!2sae"
            class="border-0 rounded w-100 h-100" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
        <div class="rounded contact-form">
          <div class="mb-4">
            <input type="text" class="form-control p-3" placeholder="Your Name">
          </div>
          <div class="mb-4">
            <input type="email" class="form-control p-3" placeholder="Your Email">
          </div>
          <div class="mb-4">
            <input type="text" class="form-control p-3" placeholder="Subject">
          </div>
          <div class="mb-4">
            <textarea class="w-100 form-control p-3" rows="6" cols="10" placeholder="Message"></textarea>
          </div>
          <button class="btn btn-primary border-0 py-3 px-4 rounded-pill" type="button">Send Message</button>
        </div>
      </div>
    </div>

    <div class="row g-4 wow fadeInUp" data-wow-delay=".3s">
      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="d-flex bg-light p-3 rounded contact-btn-link">
          <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-primary rounded-circle p-3 ms-3"
            style="width: 64px; height: 64px;">
            <i class="fa fa-share text-dark"></i>
          </div>
          <div class="ms-3 contact-link">
            <h4 class="text-dark">fallow Us</h4>
            <div class="d-flex justify-content-center">
              <a class="pe-2" href="#"><i class="fab fa-facebook-f text-dark"></i></a>
              <a class="px-2" href="#"><i class="fab fa-twitter text-dark"></i></a>
              <a class="px-2" href="#"><i class="fab fa-instagram text-dark"></i></a>
              <a class="px-2" href="#"><i class="fab fa-linkedin-in text-dark"></i></a>
              <a class="px-2" href="#"><i class="fab fa-youtube text-dark"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="d-flex bg-light p-3 rounded contact-btn-link">
          <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle p-3 ms-3"
            style="width: 64px; height: 64px;">
            <i class="fas fa-map-marker-alt text-dark"></i>
          </div>
          <div class="ms-3 contact-link">
            <h4 class="text-dark">Address</h4>
            <a href="#">
              <h5 class="text-dark d-inline fs-6">{{__('main.Salah El-Deen,Dubai,UAE')}}</h5>
            </a>
          </div>
        </div>
      </div>

      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="d-flex bg-light p-3 rounded contact-btn-link">
          <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle p-3 ms-3"
            style="width: 64px; height: 64px;">
            <i class="fa fa-phone text-dark"></i>
          </div>
          <div class="ms-3 contact-link">
            <h4 class="text-dark">{{__('main.Call Us')}}</h4>
            <a class="h5 text-dark fs-6" href="tel:+0123456789">+971 52 364 0356</a>
          </div>
        </div>
      </div>

      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="d-flex bg-light p-3 rounded contact-btn-link">
          <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle p-3 ms-3"
            style="width: 64px; height: 64px;">
            <i class="fa fa-envelope text-dark"></i>
          </div>
          <div class="ms-3 contact-link">
            <h4 class="text-dark">Email Us</h4>
            <a class="h5 text-dark fs-6" href="#">info@jmcleaningserv.net</a>
          </div>
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