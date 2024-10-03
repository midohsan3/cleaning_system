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
        <h1 class="display-2 text-white mb-4 animated slideInDown">
            @if (App::getLocale()=='ar')
            استكمل الحجز
            @else
            Complete your Booking
            @endif
        </h1>
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
                        @if ($book_method=='h')
                        {{number_format($service->h_price)}}
                        @elseif($book_method=='d')
                        {{number_format($service->d_price)}}
                        @elseif($book_method=='m')
                        {{number_format($service->m_price)}}
                        @endif
                    </span>
                    <sapn>AED</span>
                </h4>
                <form action="{{route('front.booking.step_tow_store')}}" method="POST">
                    @csrf
                    <input hidden name="service" name="service" id="service" value="{{ $service->id }}" />
                    <div class="form-group">
                        <h5>
                            @if (App::getLocale()=='ar')
                            كم عدد العاملات التي تحتاجها؟
                            @else
                            How Many Cleaners You Need?
                            @endif
                        </h5>
                        <input type="number" class="form-control" name="cleaners" id="cleaners"
                            value={{old('cleaners',1)}} min="1" />
                        @error('cleaners')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        @if ($book_method=='h')
                        <h5>
                            @if (App::getLocale()=='ar')
                            كم عدد الساعات؟
                            @else
                            How Many Hours?
                            @endif
                        </h5>
                        <input type="number" class="form-control" name="hour" id="hour" value={{old('hour',1)}}
                            min="2" />
                        <input hidden class="form-control" name="day" id="day" value="0" />
                        <input hidden class="form-control" name="month" id="month" value="0" />
                        @error('hour')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                        @elseif($book_method=='d')
                        <h5>
                            @if (App::getLocale()=='ar')
                            كم عدد الأيام؟
                            @else
                            How Many Days?
                            @endif
                        </h5>
                        <input type="number" class="form-control" name="day" id="day" value={{old('day',1)}} min="1" />
                        <input hidden class="form-control" name="hour" id="hour" value="0" />
                        <input hidden class="form-control" name="month" id="month" value="0" />
                        @error('day')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                        @elseif($book_method=='m')
                        <h5>
                            @if (App::getLocale()=='ar')
                            كم شهر؟
                            @else
                            How Many Months?
                            @endif
                        </h5>
                        <input type="number" class="form-control" name="month" id="month" value={{old('month',1)}}
                            min="1" />
                        <input hidden class="form-control" name="hour" id="hour" value="0" />
                        <input hidden class="form-control" name="day" id="day" value="0" />
                        @error('month')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                        @endif
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-primary border-0 py-3 px-4 rounded-pill" type="submit">
                            @if (App::getLocale()=='ar')
                            متابعة
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