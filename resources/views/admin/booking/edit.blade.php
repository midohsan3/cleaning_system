@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Edit & Confirm Booking
@endsection
{{-- 
  ====================
  ====================
  --}}
@section('page-content')
<div class="nk-content ">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head">
          <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Edit & Confirm
                <strong class="text-primary small">{{$booking->ref_no}}</strong><br />
                <strong class="text-primary small">Total:{{number_format($booking->total)}}<span> AED<span></strong>
              </h3>

              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Assign To {{ $booking->cleaners_assign }}/{{ $booking->cleaners_count }} Cleaners.</li>
                </ul>
              </div>
            </div>

            <div class="nk-block-head-content">
              <a href="{{ route('admin.booking.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>Back</span>
              </a>

              <a href="{{ route('admin.booking.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                <em class="icon ni ni-arrow-left"></em>
              </a>
            </div>
          </div>
        </div>


        <div class="nk-block">
          <div class="card card-preview">
            <div class="card-inner">
              <div class="preview-block">
                <span class="preview-title-lg overline-title">Main Information</span>
                <form action="{{route('admin.booking.update')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input hidden id="booking" name="booking" value="{{$booking->id}}" />
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="customer">Customer</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="customer" name="customer"
                            value="{{ $booking->userWBooking->name }}" readonly />
                          @error('customer')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="phone">Phone</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="phone" name="phone"
                            value="{{ $booking->userWBooking->phone }}" readonly />
                          @error('phone')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="customer">Address</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="customer" name="customer"
                            value="{{ $booking->userWBooking->customerWUser->address }}" readonly />
                          @error('customer')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">
                  
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="service">Service</label>
                        <div class="form-control-wrap">
                          <select class="form-select form-control form-control-sm" data-search="on" id="service"
                            name="service" autofocus>
                            <option disabled>Choose Service...
                            </option>
                            @foreach($services as $service)
                            @if ($service->id ==$booking->serice_id)
                            <option value="{{$service->id}}" selected>{{ $service->name_en }}</option>
                            @else
                            <option value="{{$service->id}}">{{ $service->name_en }}</option>
                            @endif

                            @endforeach
                          </select>
                          @error('service')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="cleanersCount">How Many Cleaner</label>
                        <div class="form-control-wrap">
                          <input type="number" class="form-control form-control-sm" mini="1" id="cleanersCount"
                            name="cleanersCount" value="{{ old('cleanersCount',$booking->cleaners_count) }}"
                            autocomplete="off" />
                          @error('cleanersCount')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <span class="preview-title-lg overline-title">Duration:</span>

                  <div class="row gy-4">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="hours">Hour</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="hours" name="hours"
                            value="{{ old('hours',$booking->hours) }}" />
                          @error('hours')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="days">Days</label>
                        <div class="form-control-wrap">
                          <input type="number" class="form-control form-control-sm" id="days" name="days"
                            placeholder="0.00" value="{{ old('days',$booking->days) }}" />
                          @error('days')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="months">Months</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="months" name="months"
                            placeholder="0.00" value="{{ old('months',$booking->months) }}" />
                          @error('months')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="startDate">Start At</label>
                        <div class="form-control-wrap">
                          <div class="input-daterange  input-group">
                            <input type="text" class="form-control form-control-sm date-picker" id="startDate"
                              name="startDate" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy"
                              value="{{ old('startDate',date('d/m/Y',strtotime($booking->start_date))) }}"
                              autocomplete="off" />
                            <input type="text" class="form-control form-control-sm time-picker" id="startTime"
                              name="startTime" data-date-format="h:i A" placeholder="--:-- --"
                              value="{{ old('startTime',date('h:i A',strtotime($booking->start_date))) }}"
                              autocomplete="off" />
                          </div>
                          @error('startDate')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                          @error('startTime')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="materials">With Materials</label>
                        <div class="form-control-wrap">
                          <div class="custom-control custom-radio">
                            @if ($booking->material_cost>0)
                            <input type="radio" id="customRadio1" name="materials" class="custom-control-input"
                              value="1" checked>
                            @else
                            <input type="radio" id="customRadio1" name="materials" class="custom-control-input"
                              value="1">
                            @endif
                            <label class="custom-control-label" for="customRadio1">Yes</label>
                          </div>
                          <div class="custom-control  custom-radio">
                            @if ($booking->material_cost==0)
                            <input type="radio" id="customRadio2" name="materials" class="custom-control-input"
                              value="0" checked>
                            @else
                            <input type="radio" id="customRadio2" name="materials" class="custom-control-input"
                              value="0">
                            @endif

                            <label class="custom-control-label" for="customRadio2">No</label>
                          </div>
                          @error('materials')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="Update" />
                      <a href="{{route('admin.booking.assign',$booking->id)}}" class="btn btn-primary"
                        value="Submit" />Assign</a>
                    </div>
                  </div>

                </form>
                <hr class="preview-hr">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
{{-- 
    ====================
    ====================
    --}}