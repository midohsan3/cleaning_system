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
        <form action="{{route('front.booking.get_service')}}" method="POST">
          @csrf
          <div class="form-group">
            <select id="service" name="service" class="form-control" autofocus>
              <option disabled selected>Choose Service...</option>
              @foreach ($services as $service)
              <option value="{{$service->id}}">
                @if (App::getLocale()=='ar')
                {{ $service->name_ar }}
                @else
                {{ $service->name_en }}
                @endif
              </option>
              @endforeach
            </select>
            @error('service')
            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <h4>Chose The Method</h4>
          <div class="form-check ">
            <input class="form-check-input" type="radio" name="period" id="hour" value="h" />
            <label class="form-check-label" for="hour">Per Hour</label>
          </div>
          <div class="form-check ">
            <input class="form-check-input" type="radio" name="period" id="day" value="d" />
            <label class="form-check-label" for="day">Per Day</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="period" id="month" value="m" />
            <label class="form-check-label" for="month">Per Month</label>
          </div>
          <div>
            @error('period')
            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
            @enderror
          </div>

          <div>
            <button class="btn btn-primary border-0 py-3 px-4 rounded-pill" type="submit">Continue</button>
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