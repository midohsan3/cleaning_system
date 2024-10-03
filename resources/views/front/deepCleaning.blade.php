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
    <h1 class="display-2 text-white mb-4 animated slideInDown">{{ __('main.Deep Cleaning') }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
        <li class="breadcrumb-item"><a href="{{route('front')}}">{{ __('main.Home') }}</a></li>
        <li class="breadcrumb-item text-white" aria-current="page">{{ __('main.Deep Cleaning') }}</li>
      </ol>
    </nav>
  </div>
</div>
{{-- Page Header End --}}

{{-- About Start --}}
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="row g-5">
      <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay=".3s">
        <div class="about-img">
          <div class="rotate-left bg-dark"></div>
          <div class="rotate-right bg-dark"></div>
          <img src="{{url('imgs/serv4.jpg')}}" class="img-fluid h-100" alt="img">
          <div class="bg-white experiences">
            <h1 class="display-3">{{ 20 }}</h1>
            <h6 class="fw-bold">{{__('main.Years Of Experiences')}}</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay=".6s">
        <div class="about-item overflow-hidden">
          <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">
            {{ __('main.Service') }}</h5>
          <h1 class="display-5 mb-2">{{ __('main.Deep Cleaning') }}</h1>
          <p class="fs-5" style="text-align: justify;">
            {{ __('main.In Dubai is bustling lifestyle, maintaining a clean home can be a challenge. Thats where we step in.') }}
          </p>
          <p class="fs-5" style="text-align: justify;">
            {{ __('main.Welcome to our deep cleaning services! We specialize in providing thorough and meticulous cleaning solutions that go beyond regular cleaning routines. Our deep cleaning services are designed to refresh and revitalize your space, leaving it sparkling clean and hygienic.') }}
          </p>

          <a href="http://wa.me/971555409808"
            class="btn btn-primary border-0 rounded-pill px-4 py-3 mt-5">{{__('main.Get Service')}}</a>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- About End --}}



{{-- Call To Action Start --}}
<div class="container-fluid py-5 call-to-action wow fadeInUp" data-wow-delay=".3s" style="margin: 6rem 0;" dir="ltr">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <img src="{{url('imgs/action.jpg')}}" class="img-fluid w-100 rounded-circle p-5" alt="">
      </div>
      <div class="col-lg-6 my-auto">
        <div class="text-start mt-4">
          <h1 class="pb-4 text-white">{{ __('main.Sign Up To Our Newsletter To Get The Latest Offers') }}</h1>
        </div>
        <form method="post" action="index.html">
          <div class="form-group">
            <div class="d-flex call-btn">
              <input type="search" class="form-control py-3 px-4 w-100 border-0 rounded-0 rounded-end rounded-pill"
                name="search-input" value="" placeholder="{{__('main.Enter Your Email Address')}}"
                required="Please enter a valid email" />
              <button type="email" value="Search Now!"
                class="btn btn-primary border-0 rounded-pill rounded rounded-start px-5">{{__('main.Subscribe')}}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- Call To Action End --}}


{{-- Blog Start --}}
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
      <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">
        {{ __('main.Our Services') }}</h5>
      <h1 class="display-5">{{__('main.Common Cleaning Control Services')}}</h1>
    </div>
    <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay=".5s">
      <div class="blog-item">
        <img src="{{ url('imgs/serv1-1.jpg') }}" class="img-fluid w-100 rounded-top" alt="House Care">
        <div class="rounded-bottom bg-light">
          <div class="px-4 pb-0">
            <h4>{{ __('main.House Care') }}</h4>
          </div>
          <div class="p-4 py-2 d-flex justify-content-between bg-primary rounded-bottom blog-btn">
            <a href="{{ route('houseCare') }}" class="btn btn-primary border-0">{{ __('main.See More') }}</a>
          </div>
        </div>
      </div>

      <div class="blog-item">
        <img src="{{ url('imgs/serv1-2.jpg') }}" class="img-fluid w-100 rounded-top" alt="Maid Training">
        <div class="rounded-bottom bg-light">
          <div class="px-4 pb-0">
            <h4>{{ __('main.Maid Training') }}</h4>
          </div>
          <div class="p-4 py-2 d-flex justify-content-between bg-primary rounded-bottom blog-btn">
            <a href="{{ route('maidTraning') }}" class="btn btn-primary border-0">{{ __('main.See More') }}</a>
          </div>
        </div>
      </div>

      <div class="blog-item">
        <img src="{{ url('imgs/serv1-3.jpg') }}" class="img-fluid w-100 rounded-top" alt="Maid Training">
        <div class="rounded-bottom bg-light">
          <div class="px-4 pb-0">
            <h4>{{ __('main.Event Health') }}</h4>
          </div>
          <div class="p-4 py-2 d-flex justify-content-between bg-primary rounded-bottom blog-btn">
            <a href="{{ route('eventHealth') }}" class="btn btn-primary border-0">{{ __('main.See More') }}</a>
          </div>
        </div>
      </div>

      <div class="blog-item">
        <img src="{{ url('imgs/serv1-4.jpg') }}" class="img-fluid w-100 rounded-top" alt="Maid Training">
        <div class="rounded-bottom bg-light">
          <div class="px-4 pb-0">
            <h4>{{ __('main.Deep Cleaning') }}</h4>
          </div>
          <div class="p-4 py-2 d-flex justify-content-between bg-primary rounded-bottom blog-btn">
            <a href="{{ route('deepCleaning') }}" class="btn btn-primary border-0">{{ __('main.See More') }}</a>
          </div>
        </div>
      </div>

      <div class="blog-item">
        <img src="{{ url('imgs/serv1-5.jpg') }}" class="img-fluid w-100 rounded-top" alt="Maid Training">
        <div class="rounded-bottom bg-light">
          <div class="px-4 pb-0">
            <h4>{{ __('main.Hotel Child Care') }}</h4>
          </div>
          <div class="p-4 py-2 d-flex justify-content-between bg-primary rounded-bottom blog-btn">
            <a href="{{ route('hotelchildcare') }}" class="btn btn-primary border-0">{{ __('main.See More') }}</a>
          </div>
        </div>
      </div>

      <div class="blog-item">
        <img src="{{ url('imgs/serv1-7.jpg') }}" class="img-fluid w-100 rounded-top" alt="Maid Training">
        <div class="rounded-bottom bg-light">
          <div class="px-4 pb-0">
            <h4>{{ __('main.Office Care') }}</h4>
          </div>
          <div class="p-4 py-2 d-flex justify-content-between bg-primary rounded-bottom blog-btn">
            <a href="{{ route('officecare') }}" class="btn btn-primary border-0">{{ __('main.See More') }}</a>
          </div>
        </div>
      </div>

      <div class="blog-item">
        <img src="{{ url('imgs/serv1-6.jpg') }}" class="img-fluid w-100 rounded-top" alt="Maid Training">
        <div class="rounded-bottom bg-light">
          <div class="px-4 pb-0">
            <h4>{{ __('main.Office Boy') }}</h4>
          </div>
          <div class="p-4 py-2 d-flex justify-content-between bg-primary rounded-bottom blog-btn">
            <a href="{{ route('officeboy') }}" class="btn btn-primary border-0">{{ __('main.See More') }}</a>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
{{-- Blog End --}}
@endsection
{{-- 
  ===============
  PAGE CONTENT
  ===============
  --}}