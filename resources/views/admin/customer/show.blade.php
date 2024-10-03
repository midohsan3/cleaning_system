@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Customer
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
        <div class="nk-block-head nk-block-head-sm">
          <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Customer /
                <strong class="text-primary small">
                  {{$customer->name}}
                </strong>
              </h3>
              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Submitted At: <span
                      class="text-base">{{ date('d M, Y', strtotime($customer->created_at)) }}</span>
                  </li>
                </ul>
              </div>

            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('admin.customer.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em><span>Back</span>
              </a>

              <a href="{{ route('admin.customer.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                  class="icon ni ni-arrow-left"></em></a>
            </div>
          </div>
        </div>

        <div class="nk-block">
          <div class="card card-bordered">
            <div class="card-aside-wrap">
              <div class="card-content">
                <div class="card-inner">
                  <div class="nk-block">
                    <div class="nk-block-head">
                      <h5 class="title">Main Information</h5>
                      <p>Available Information in Our Platform</p>
                    </div>
                    <div class="profile-ud-list">

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Name </span>
                          <span class="profile-ud-value">
                            {{$customer->name}}
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label"> </span>
                          <span class="profile-ud-value"></span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">E-Mail</span>
                          <span class="profile-ud-value">{{$customer->email}}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Phone</span>
                          <span class="profile-ud-value">{{$customer->phone}}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Last Booking</span>
                          <span class="profile-ud-value">
                            @if (empty($customer->last_booking))
                            No Booking Yet
                            @else
                            {{ date('d M,Y', strtotime($customer->last_booking)) }}
                            @endif
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Last Contact</span>
                          <span class="profile-ud-value">
                            {{ $customer->updated_at }}
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Submitted By</span>
                          <span class="profile-ud-value">
                            @if ($customer->customerWuser->added_by==0)
                            Registration
                            @elseif($customer->customerWuser->added_by==1)
                            System Admin
                            @endif
                          </span>
                        </div>
                      </div>

                    </div>
                  </div>

                  <hr class="preview-hr" />

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">
                        Address1
                      </h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p>
                            {{$customer->address}}
                          </p>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">
                        Address 2
                      </h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p>
                            {{ $customer->address_sec }}
                          </p>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">
                        Notes
                      </h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p>
                            {{ $customer->notes }}
                          </p>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
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