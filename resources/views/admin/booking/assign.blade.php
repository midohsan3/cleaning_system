@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Assign
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
              <h3 class="nk-block-title page-title">Assign
                <strong class="text-primary small">
                  Cleaner
                </strong>
              </h3>


            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('admin.booking.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em><span>Back</span>
              </a>

              <a href="{{ route('admin.booking.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                  class="icon ni ni-arrow-left"></em></a>
            </div>
          </div>
        </div>

        <div class="nk-block">
          <div class="card card-bordered">
            <div class="card-aside-wrap">
              <div class="card-content">
                <div class="card-inner bg-light">
                  <div class="nk-block">
                    <div class="nk-block-head">
                      <h5 class="title">Select {{ $booking->cleaners_count }} Cleaner </h5>
                      <p>Booking start At {{ date('d-m-Y h:i A',strtotime($booking->start_date)) }} & Ended At
                        {{ date('d-m-Y h:i A',strtotime($booking->end_date)) }}</p>
                    </div>
                    <div class="row">
                      @foreach ($cleaners as $cleaner)
                      <div class="col-sm-6 col-lg-4 col-xxl-3 mb-3">
                        <div class="card">
                          <div class="card-inner ">
                            <div class="team">
                              <div class="team-status bg-light text-black"><em class="icon ni ni-check-thick"></em>
                              </div>
                              <div class="team-options">
                                <div class="drodown">
                                  <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                    data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="link-list-opt no-bdr">
                                      <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick View</span></a></li>
                                      <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                      <li><a href="#"><em class="icon ni ni-mail"></em><span>Send Email</span></a></li>
                                      <li class="divider"></li>
                                      <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset
                                            Pass</span></a>
                                      </li>
                                      <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a>
                                      </li>
                                      <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="user-card user-card-s2">
                                <div class="user-avatar md bg-primary">
                                  @if ($cleaner->photo !==null)
                                  <img src="{{ url('storage/app/public/imgs/users').'/'.$cleaner->photo}}"
                                    alt="$cleaner->photo" />
                                  @else
                                  <img src="{{ url('imgs/logo.jpg')}}" alt="$cleaner->photo" />
                                  @endif
                                  <div class="status dot dot-lg dot-success"></div>
                                </div>
                                <div class="user-info">
                                  <h6>{{ $cleaner->name }}</h6>
                                  <span class="sub-text">{{$cleaner->phone}}</span>
                                </div>
                              </div>
                              <div class="team-details">
                                <p></p>
                              </div>
                              <ul class="team-statistics">
                                <li><span>213</span><span>Projects</span></li>
                                <li><span>87.5%</span><span>Performed</span></li>
                                <li><span>587</span><span>Tasks</span></li>
                              </ul>
                              <div class="team-view">
                                <a href="{{route('admin.cleaner_schedule.index',$cleaner->id)}}"
                                  class="btn btn-round btn-outline-light w-150px"><span>View Schedule</span></a>
                              </div>
                            </div><!-- .team -->
                          </div><!-- .card-inner -->
                        </div><!-- .card -->
                      </div>
                      @endforeach
                    </div>

                  </div>
                  <hr class="preview-hr" />

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