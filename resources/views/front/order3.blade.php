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
        @if (App::getLocale()=='ar')
        استكمل الحجز
        @else
        Complete your Booking
        @endif
      </h5>
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
        <form action="{{route('front.booking.step_three_store')}}" method="POST">
          @csrf

          <div class="form-group">
            <h5>
              @if (App::getLocale()=='ar')
              هل تريد إضافة مواد التنظيف؟
              @else
              Do You Need Cleaning Materials?
              @endif
            </h5>
            <div class="form-check ">
              <input class="form-check-input" type="radio" name="material" id="yes" value="1" checked />
              <label class="form-check-label" for="yes">
                @if (App::getLocale()=='ar')
                نعم أريد إضافة مواد التنظيف
                @else
                Yes I need Service With Cleaning Materials
                @endif
              </label>
            </div>
            <div class="form-check ">
              <input class="form-check-input" type="radio" name="material" id="no" value="0" />
              <label class="form-check-label" for="no">
                @if (App::getLocale()=='ar')
                لا انا لدي مواد التنظيف
                @else
                No I Have Cleaning Materials
                @endif
              </label>
            </div>
            @error('cleaners')
            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <h5>
              @if (App::getLocale()=='ar')
              أي تاريخ تريد خدمتك؟
              @else
              Which Date You Need Our Service?
              @endif
            </h5>
            <input type="date" class="form-control" name="statDate" data-date-format="dd/mm/yyyy" id="statDate"
              value="{{ old('statDate') }}" />
            @error('statDate')
            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <h5>
              @if (App::getLocale()=='ar')
              إذا كنت ترغب في تحديد توقيت محدد
              @else
              If You Prefer Special Time?
              @endif
            </h5>
            <input type="time" class="form-control" name="statTime" id="statTime" value="{{ old('statTime') }}" />
            @error('statTime')
            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <div class="mt-2">
            <button class="btn btn-primary border-0 py-3 px-4 rounded-pill" type="submit">
              @if (App::getLocale()=='ar')
              استكمال
              @else
              Continue
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