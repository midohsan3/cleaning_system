@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Edit Customer
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
              <h3 class="nk-block-title page-title">Edit /
                <strong class="text-primary small">{{Str::substr($customer->userWCustomer->name,0,20)}}</strong>
              </h3>

              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Created At: <span class="text-base">{{ date('d M Y h:i A',strtotime(now())) }}</span></li>
                </ul>
              </div>
            </div>

            <div class="nk-block-head-content">
              <a href="{{ route('admin.customer.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>Back</span>
              </a>

              <a href="{{ route('admin.customer.index') }}"
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
                <form action="{{route('admin.customer.update')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input hidden name="customer" value="{{$customer->id}}" />
                  <input hidden name="user" value="{{$customer->user_id}}" />
                  <div class="row gy-4">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label" for="nameEn">Full Name</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="nameEn" name="nameEn"
                            placeholder="Full Name Here" value="{{ old('nameEn',$customer->userWCustomer->name) }}"
                            required autofocus />
                          @error('nameEn')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <span class="preview-title-lg overline-title">Contact Information</span>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="mail">E-mail</label>
                        <div class="form-control-wrap">
                          <input type="mail" class="form-control form-control-sm" id="mail" name="mail"
                            placeholder="E-Mail Here" value="{{ old('mail',$customer->userWCustomer->email) }}"
                            autocomplete="off" />
                          @error('mail')
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
                            placeholder="Phone Number Here" value="{{ old('phone',$customer->userWCustomer->phone) }}"
                            autocomplete="off" />
                          @error('phone')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">
                  <span class="preview-title-lg overline-title">Address</span>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="address">Address 1:</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control form-control-sm" placeholder="Customer Address Here"
                            id="address" name="address">{{ old('address',$customer->address) }}</textarea>
                          @error('address')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="address_sec">Address 2:</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control form-control-sm" placeholder="Customer Address Here"
                            id="address_sec"
                            name="address_sec">{{ old('address_sec',$customer->address_sec) }}</textarea>
                          @error('address_sec')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">
                  <span class="preview-title-lg overline-title">Notes</span>

                  <div class="row gy-4">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label" for="notes">Notes:</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control form-control-sm" placeholder="Any Notes Here" id="notes"
                            name="notes">{{ old('notes',$customer->notes) }}</textarea>
                          @error('notes')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="Update" />
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