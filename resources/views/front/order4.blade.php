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
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
      <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">
        {{__('main.Drop Your Booking')}}</h5>
      <h1 class="display-5 w-50 mx-auto"></h1>
    </div>
    <div class="row g-5 mb-5 d-flex justify-content-center">

      <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
        <h4>
          @if (App::getLocale()=='ar')
          إجمالي القيمة
          @else
          Total Cost:
          @endif
          <span>
            @if (session()->has('cart'))
            {{number_format(session()->get('cart')->totalCPrices,2) }}
            @endif
          </span>
          <span>AED</span>
        </h4>
        <form action="{{route('front.booking.step_four_store')}}" method="POST">
          @csrf

          <div class="form-group">
            <h5>
              @if (App::getLocale()=='ar')
              اسمك هنا (حقل اجباري)
              @else
              Your Name:(required)
              @endif
            </h5>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autofocus />
            @error('name')
            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group my-3">
            <h5>
              @if (App::getLocale()=='ar')
              رقم الهاتف (اجباري)
              @else
              Your Phone:(required)
              @endif
            </h5>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" />
            @error('phone')
            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <h5>
              @if (App::getLocale()=='ar')
              بريدك الإلكتروني(اختياري)
              @else
              Your E-mail:(optionaly)
              @endif
            </h5>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" />
            @error('email')
            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <h5>
              @if (App::getLocale()=='ar')
              عنوانك هنا (اجباري)
              @else
              Your Address:(required)
              @endif
            </h5>
            <textarea class="form-control" name="address" id="address">{{old('address')}}</textarea>
            @error('address')
            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <div class="mt-2">
            <button class="btn btn-primary border-0 py-3 px-4 rounded-pill" type="submit">
              @if (App::getLocale()=='ar')
              انهاء
              @else
              Finish
              @endif
            </button>
          </div>

        </form>
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