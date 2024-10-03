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
    <h1 class="display-2 text-white mb-4 animated slideInDown">{{ __('main.About Us') }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
        <li class="breadcrumb-item"><a href="{{route('front')}}">{{ __('main.Home') }}</a></li>
        <li class="breadcrumb-item text-white" aria-current="page">{{ __('main.About Us') }}</li>
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
          <img src="{{url('imgs/about-img.jpg')}}" class="img-fluid h-100" alt="img">
          <div class="bg-white experiences">
            <h1 class="display-3">20</h1>
            <h6 class="fw-bold">{{__('main.Years Of Experiences')}}</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay=".6s">
        <div class="about-item overflow-hidden">
          <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">
            {{ __('main.About Us') }}</h5>
          <h1 class="display-5 mb-2">{{ __('main.Long Experience') }}</h1>
          <p class="fs-5" style="text-align: justify;">
            {{ __('main.Surely you are looking for a cleaning company that provides you with a professional service in cleaning your home and restoring the luster of your furnishings, thus providing a clean and refreshing interior atmosphere.') }}
          </p>
          <p class="fs-5" style="text-align: justify;">
            {{ __('main.We at JM-Cleaning Services know that it is not easy for many people to obtain a service that fully meets their expectations. This is what made us more aware of our customers’ expectations, and thus we provided services with the highest degree of professionalism and efficiency in house cleaning at the hands of professional teams and technicians with many years of experience in cleaning homes. Cleaning and providing care services for homes, villas and palaces.') }}
          </p>
          <p class="fs-5" style="text-align: justify;">
            {{ __('main.Contact us now to obtain a professional cleaning service from specialists with the highest degree of efficiency and mastery.') }}
          </p>
          <div class="row">
            <div class="col-3">
              <div class="text-center">
                <div class="p-4 bg-dark rounded d-flex" style="align-items: center; justify-content: center;">
                  <i class="fas fa-city fa-4x text-primary"></i>
                </div>
                <div class="my-2">
                  <h5>{{ __('main.Building') }}</h5>
                  <h5>{{__('main.Cleaning')}}</h5>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="text-center">
                <div class="p-4 bg-dark rounded d-flex" style="align-items: center; justify-content: center;">
                  <i class="fas fa-school fa-4x text-primary"></i>
                </div>
                <div class="my-2">
                  <h5>{{__('main.Education')}}</h5>
                  <h5>{{__('main.center')}}</h5>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="text-center">
                <div class="p-4 bg-dark rounded d-flex" style="align-items: center; justify-content: center;">
                  <i class="fas fa-warehouse fa-4x text-primary"></i>
                </div>
                <div class="my-2">
                  <h5>{{__('main.Warehouse')}}</h5>
                  <h5>{{__('main.Cleaning')}}</h5>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="text-center">
                <div class="p-4 bg-dark rounded d-flex" style="align-items: center; justify-content: center;">
                  <i class="fas fa-hospital fa-4x text-primary"></i>
                </div>
                <div class="my-2">
                  <h5>{{__('main.Hospital')}}</h5>
                  <h5>{{__('main.Cleaning')}}</h5>
                </div>
              </div>
            </div>
          </div>
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


{{-- Testiminial Start --}}
<div class="container-fluid testimonial py-5">
  <div class="container py-5">
    <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
      <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">
        {{ __('main.Testimonial') }}</h5>
      <h1 class="display-5 w-50 mx-auto">{{__('main.What Clients Say About Our Services')}}</h1>
    </div>
    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay=".5s">
      <div class="testimonial-item">
        <div class="testimonial-content rounded mb-4 p-4">
          <p class="fs-5 m-0">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.
            Ut enim ad minim veniam quis tempor.</p>
        </div>
        <div class="d-flex align-items-center  mb-4" style="padding: 0 0 0 25px;">
          <div class="position-relative">
            <img src="{{url('imgs/femal.jpg')}}" class="img-fluid rounded-circle py-2" alt="">
            <div class="position-absolute" style="top: 33px; left: -25px;">
              <i class="fa fa-quote-left rounded-pill bg-primary text-dark p-3"></i>
            </div>
          </div>
          <div class="ms-3">
            <h4 class="mb-0">{{ __('main.Client') }}</h4>
            <div class="d-flex">
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
            </div>
          </div>
        </div>
      </div>

      <div class="testimonial-item">
        <div class="testimonial-content rounded mb-4 p-4">
          <p class="fs-5 m-0">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.
            Ut enim ad minim veniam quis tempor.</p>
        </div>
        <div class="d-flex align-items-center  mb-4" style="padding: 0 0 0 25px;">
          <div class="position-relative">
            <img src="{{url('imgs/male.jpg')}}" class="img-fluid rounded-circle py-2" alt="">
            <div class="position-absolute" style="top: 33px; left: -25px;">
              <i class="fa fa-quote-left rounded-pill bg-primary text-dark p-3"></i>
            </div>
          </div>
          <div class="ms-3">
            <h4 class="mb-0">{{ __('main.Client') }}</h4>
            <div class="d-flex">
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
            </div>
          </div>
        </div>
      </div>

      <div class="testimonial-item">
        <div class="testimonial-content rounded mb-4 p-4">
          <p class="fs-5 m-0">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.
            Ut enim ad minim veniam quis tempor.</p>
        </div>
        <div class="d-flex align-items-center  mb-4" style="padding: 0 0 0 25px;">
          <div class="position-relative">
            <img src="{{ url('imgs/femal.jpg') }}" class="img-fluid rounded-circle py-2" alt="">
            <div class="position-absolute" style="top: 33px; left: -25px;">
              <i class="fa fa-quote-left rounded-pill bg-primary text-dark p-3"></i>
            </div>
          </div>
          <div class="ms-3">
            <h4 class="mb-0">{{ __('main.Client') }} </h4>
            <div class="d-flex">
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
            </div>
          </div>
        </div>
      </div>

      <div class="testimonial-item">
        <div class="testimonial-content rounded mb-4 p-4">
          <p class="fs-5 m-0">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.
            Ut enim ad minim veniam quis tempor.</p>
        </div>
        <div class="d-flex align-items-center  mb-4" style="padding: 0 0 0 25px;">
          <div class="position-relative">
            <img src="{{ url('imgs/male.jpg') }}" class="img-fluid rounded-circle py-2" alt="">
            <div class="position-absolute" style="top: 33px; left: -25px;">
              <i class="fa fa-quote-left rounded-pill bg-primary text-dark p-3"></i>
            </div>
          </div>
          <div class="ms-3">
            <h4 class="mb-0">{{__('main.Client')}}</h4>
            <div class="d-flex">
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
              <small class="fas fa-star text-primary me-1"></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Testiminial End --}}
@endsection
{{-- 
  ===============
  PAGE CONTENT
  ===============
  --}}