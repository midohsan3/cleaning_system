@extends('layouts.front')

{{-- 
  ===============
  PAGE CONTENT
  ===============
  --}}
@section('content')
{{-- Carousel Start --}}
<div class="container-fluid carousel px-0 mb-5 pb-5">
  <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide">
      </li>
      <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img src="{{ url('imgs/carousel-2.jpg') }}" class="img-fluid w-100" alt="First slide">
        <div class="carousel-caption">
          <div class="container carousel-content">
            <h4 class="text-white mb-4 animated slideInDown">{{__('main.Trusted, Well Experience, Professional')}}</h4>
            <h1 class="text-white display-1 mb-4 animated slideInDown">{{ __('main.We Love The Job you Hate') }}</h1>
            <a href="{{ route('front.booking.index') }}" class="me-2"><button type="button"
                class="px-5 py-3 btn btn-primary border-2 rounded-pill animated slideInDown">{{__('main.Book Now')}}</button></a>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <img src="{{ url('imgs/carousel-1.jpg') }}" class="img-fluid w-100" alt="Second slide">
        <div class="carousel-caption">
          <div class="container carousel-content">
            <h4 class="text-white mb-4 animated slideInDown">{{ __('main.No 1 Pest Services') }}</h4>
            <h1 class="text-white display-1 mb-4 animated slideInDown">
              {{ __('main.Enjoy Your Home Totally Pest Free') }}</h1>
            <a href="{{ route('front.booking.index') }}" class="me-2"><button type="button"
                class="px-5 py-3 btn btn-primary border-2 rounded-pill animated slideInDown">{{ __('main.Book Now') }}</button></a>
          </div>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev btn btn-primary border border-2 border-start-0 border-primary" type="button"
      data-bs-target="#carouselId" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">{{__('main.Previous')}}</span>
    </button>

    <button class="carousel-control-next btn btn-primary border border-2 border-end-0 border-primary" type="button"
      data-bs-target="#carouselId" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">{{__('main.Next')}}</span>
    </button>
  </div>
</div>
{{-- End Carousel Start --}}


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
          <a href="{{route('front.booking.index')}}"
            class="btn btn-primary border-0 rounded-pill px-4 py-3 mt-5">{{__('main.Get Service')}}</a>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- About End --}}


{{-- Services Start --}}
<div class="container-fluid services py-5">
  <div class="container text-center py-5">
    <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
      <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">
        {{ __('main.Our Services') }}
      </h5>
      <h1 class="display-5">{{ __('main.Common Cleaning Control Services') }}</h1>
    </div>
    <div class="row g-5">
      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
        <div class="bg-light rounded p-5 services-item">
          <div class="d-flex" style="align-items: center; justify-content: center;">
            <div class="mb-4 rounded-circle services-inner-icon">
              <i class="fas fa-warehouse fa-3x text-primary"></i>
            </div>
          </div>
          <h4>{{ __('main.House Care') }}</h4>
          <a href="{{route('houseCare')}}"
            class="btn btn-primary border-0 rounded-pill px-4 py-3">{{ __('main.See More') }}</a>
        </div>
      </div>

      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".5s">
        <div class="bg-light rounded p-5 services-item">
          <div class="d-flex" style="align-items: center; justify-content: center;">
            <div class="mb-4 rounded-circle services-inner-icon">
              <i class="fas fa-people-carry fa-3x text-primary"></i>
            </div>
          </div>
          <h4>{{ __('main.Maid Training') }}</h4>
          <a href="{{route('maidTraning')}}"
            class="btn btn-primary border-0 rounded-pill px-4 py-3">{{ __('main.See More') }}</a>
        </div>
      </div>

      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".7s">
        <div class="bg-light rounded p-5 services-item">
          <div class="d-flex" style="align-items: center; justify-content: center;">
            <div class="mb-4 rounded-circle services-inner-icon">
              <i class="fas fa-wine-glass fa-3x text-primary"></i>
            </div>
          </div>
          <h4>{{ __('main.Event Health') }}</h4>
          <a href="{{route('eventHealth')}}"
            class="btn btn-primary border-0 rounded-pill px-4 py-3">{{ __('main.See More') }}</a>
        </div>
      </div>

      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".9s">
        <div class="bg-light rounded p-5 services-item">
          <div class="d-flex" style="align-items: center; justify-content: center;">
            <div class="mb-4 rounded-circle services-inner-icon">
              <i class="fas fa-broom fa-3x text-primary"></i>
            </div>
          </div>
          <h4>{{ __('main.Deep Cleaning') }}</h4>
          <a href="{{ route('deepCleaning') }}"
            class="btn btn-primary border-0 rounded-pill px-4 py-3">{{ __('main.See More') }}</a>
        </div>
      </div>

      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".11s">
        <div class="bg-light rounded p-5 services-item">
          <div class="d-flex" style="align-items: center; justify-content: center;">
            <div class="mb-4 rounded-circle services-inner-icon">
              <i class="fas fa-dog fa-3x text-primary"></i>
            </div>
          </div>
          <h4>{{ __('main.Dog Servant') }}</h4>
          <a href="{{ route('dogservant') }}"
            class="btn btn-primary border-0 rounded-pill px-4 py-3">{{ __('main.See More') }}</a>
        </div>
      </div>

      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".13s">
        <div class="bg-light rounded p-5 services-item">
          <div class="d-flex" style="align-items: center; justify-content: center;">
            <div class="mb-4 rounded-circle services-inner-icon">
              <i class="fas fa-baby fa-3x text-primary"></i>
            </div>
          </div>
          <h4>{{ __('main.Hotel Child Care') }}</h4>
          <a href="{{ route('hotelchildcare') }}"
            class="btn btn-primary border-0 rounded-pill px-4 py-3">{{ __('main.See More') }}</a>
        </div>
      </div>

      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".15s">
        <div class="bg-light rounded p-5 services-item">
          <div class="d-flex" style="align-items: center; justify-content: center;">
            <div class="mb-4 rounded-circle services-inner-icon">
              <i class="fas fa-coffee fa-3x text-primary"></i>
            </div>
          </div>
          <h4>{{ __('main.Office Boy') }}</h4>
          <a href="{{ route('officeboy') }}"
            class="btn btn-primary border-0 rounded-pill px-4 py-3">{{ __('main.See More') }}</a>
        </div>
      </div>

      <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".17s">
        <div class="bg-light rounded p-5 services-item">
          <div class="d-flex" style="align-items: center; justify-content: center;">
            <div class="mb-4 rounded-circle services-inner-icon">
              <i class="fas fa-male fa-3x text-primary"></i>
            </div>
          </div>
          <h4>{{ __('main.Office Care') }}</h4>
          <a href="{{ route('officecare') }}"
            class="btn btn-primary border-0 rounded-pill px-4 py-3">{{ __('main.See More') }}</a>
        </div>
      </div>

    </div>

  </div>
</div>
{{-- Services End --}}

{{-- Project Start --}}
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
      <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">
        {{ __('main.Our Glary') }}</h5>
      <h1 class="display-5">{{__('main.Our recently completed projects')}}</h1>
    </div>
    <div class="row g-5">
      <div class="col-xxl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
        <div class="project-item">
          <div class="project-left bg-dark"></div>
          <div class="project-right bg-dark"></div>
          <img src="{{url('imgs/project-1.jpg')}}" class="img-fluid h-100" alt="img">
          <a href="{{route('front.booking.index')}}" class="fs-4 fw-bold text-center">{{__('main.Whole Home Cleaning')}}</a>
        </div>

      </div>
      <div class="col-xxl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".5s">
        <div class="project-item">
          <div class="project-left bg-dark"></div>
          <div class="project-right bg-dark"></div>
          <img src="{{url('imgs/project-2.jpg')}}" class="img-fluid h-100" alt="img">
          <a href="{{route('front.booking.index')}}" class="fs-4 fw-bold text-center">{{ __('main.Hotel Cleaning') }}</a>
        </div>
      </div>

      <div class="col-xxl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".7s">
        <div class="project-item">
          <div class="project-left bg-dark"></div>
          <div class="project-right bg-dark"></div>
          <img src="{{url('imgs/project-3.jpg')}}" class="img-fluid h-100" alt="img">
          <a href="{{route('front.booking.index')}}" class="fs-4 fw-bold text-center">{{ __('main.Warehouse Cleaning') }}</a>
        </div>
      </div>

      <div class="col-xxl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
        <div class="project-item">
          <div class="project-left bg-dark"></div>
          <div class="project-right bg-dark"></div>
          <img src="{{url('imgs/project-4.jpg')}}" class="img-fluid h-100" alt="img">
          <a href="{{route('front.booking.index')}}" class="fs-4 fw-bold text-center">{{__('main.Hotel Cleaning')}}</a>
        </div>
      </div>

      <div class="col-xxl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".5s">
        <div class="project-item">
          <div class="project-left bg-dark"></div>
          <div class="project-right bg-dark"></div>
          <img src="{{url('imgs/project-5.jpg')}}" class="img-fluid h-100" alt="img">
          <a href="{{route('front.booking.index')}}" class="fs-4 fw-bold text-center">{{ __('main.House Cleaning') }}</a>
        </div>
      </div>

      <div class="col-xxl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".7s">
        <div class="project-item">
          <div class="project-left bg-dark"></div>
          <div class="project-right bg-dark"></div>
          <img src="{{url('imgs/project-6.jpg')}}" class="img-fluid h-100" alt="img">
          <a href="{{route('front.booking.index')}}" class="fs-4 fw-bold text-center">{{ __('main.Furniture Cleaning') }}</a>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Project End --}}


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
<div class="container-fluid testimonial py-5" dir="ltr">
  <div class="container py-5">
    <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
      <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">
        {{ __('main.Testimonial') }}</h5>
      <h1 class="display-5 w-50 mx-auto">{{__('main.What Clients Say About Our Services')}}</h1>
    </div>
    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay=".5s">
      <div class="testimonial-item">
        <div class="testimonial-content rounded mb-4 p-4">
          <p class="fs-5 m-0">
            Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.
            Ut enim ad minim veniam quis tempor.
          </p>

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