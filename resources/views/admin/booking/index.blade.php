@extends('layouts.admin')
{{--
====================
====================
--}}
@section('pag-title')
Booking Managment
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
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Booking List<span>&nbsp;</span><span class="fs-15px text-purple">
                  ({{ $list_tile }})</span>
              </h3>
              <div class="nk-block-des text-soft">
                <p>System Have {{ number_format($bookingsCount,0) }} Booking.</p>
              </div>
            </div>

            <div class="nk-block-head-content">

              <div class="toggle-wrap nk-block-tools-toggle">

                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options">
                  <em class="icon ni ni-more-v"></em>
                </a>

                <div class="toggle-expand-content" data-content="more-options">
                  <ul class="nk-block-tools g-3">
                    <li>
                      <div class="form-control-wrap">
                        <div class="form-icon form-icon-right">
                          <em class="icon ni ni-search"></em>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="default-04"
                          placeholder="Search by name">
                      </div>
                    </li>

                    <li>
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white"
                          data-toggle="dropdown">{{$list_tile}}</a>

                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">
                            <li><a href="{{ route('admin.booking.index') }}"><span>All</span></a>
                            </li>
                            <li><a href="#"><span>New</span></a>
                            </li>
                            <li><a href="#"><span>In Schedule</span></a>
                            </li>
                            <li><a href="#"><span>Completd</span></a>
                            </li>
                            <li><a href="#"><span>Canceled</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                  </ul>
                </div>

              </div>
            </div>{{-- .nk-block-head-content --}}
          </div>{{-- .nk-block-between --}}
        </div>{{-- .nk-block-head --}}

        <div class="nk-block">
          @if ($bookings->count()>0)
          <table class="nk-tb-list is-separate mb-3">
            <thead>
              <tr class="nk-tb-item nk-tb-head">
                <th class="nk-tb-col nk-tb-col-check">
                </th>
                <th class="nk-tb-col"><span class="sub-text">Customer</span></th>
                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Service</span></th>
                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Assign</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Duration</span></th>
                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Starting At</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Total</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Payment</span></th>
                <th class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1 my-n1">
                    <li>
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">
                            <li><a href="#">
                                <em class="icon ni ni-trash"></em><span>Delete</span>
                              </a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bookings as $booking)
              <tr class="nk-tb-item">
                <td class="nk-tb-col nk-tb-col-check">
                  <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input" id="country_id[]" name="country_id[]">
                    <label class="custom-control-label" for="country_id[]"></label>
                  </div>
                </td>

                <td class="nk-tb-col">
                  <a href="{{route('admin.booking.edit',$booking->id)}}">
                    <div class="user-card">
                      <div class="user-info">
                        <span class="tb-lead">
                          <span>{{substr( $booking->userWBooking->name,0,20) }}</span>
                          <span class="tb-lead">Reff No.<span>{{ $booking->ref_no
                              }}</span></span>
                      </div>
                    </div>
                  </a>
                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-amount">
                    {{ $booking->serviceWBooking->name_en }}
                  </span>
                  {{ $booking->cleaners_count }}<span> Cleaner</span>
                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-lead">
                    @if ($booking->cleaners_assign==0 && $booking->status==0)
                    <a href="{{route('admin.booking.edit',$booking->id)}}" class="badge badge-danger">Click To
                      Confirm &
                      Assign</a>
                    @elseif($booking->cleaners_assign==0 )
                    <a href="{{route('admin.booking.assign',$booking->id)}}" class="badge badge-danger">Click
                      To Assign Or
                      Check Schedule</a>
                    @elseif($booking->cleaners_assign>0 && $booking->cleaners_assign<$booking->
                      cleaners_count)
                      <span class="badge badge-warning">
                        Assign {{$booking->cleaners_assign}} From {{ $booking->cleaners_count
                        }}</span>
                      @elseif($booking->cleaners_assign==$booking->cleaners_count)
                      <a href="{{ route('admin.booking.show',$booking->id) }}" class="badge badge-success">Assign
                        Completed</a>
                      @endif
                  </span>
                  @foreach ($cleaners as $cleaner)
                  @if (array_Key_Exists($booking->id,$bookingCleaners))
                  @if ($cleaner->user_id ==$bookingCleaners[$booking->id] )
                  <strong>Cleaner:</strong><span>JM-{{ $cleaner->code }},</span>
                  @endif
                  @endif
                  @endforeach


                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-amount">
                    @if ($booking->hours>0)
                    {{$booking->hours}}<span>Hours</span>
                    @elseif($booking->days>0)
                    {{$booking->days}}<span>Day</span>
                    @elseif($booking->months>0)
                    {{$booking->months}}<span>Month</span>
                    @endif
                  </span>
                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-amount">
                    Date:{{date('d M Y',strtotime($booking->start_date))}}
                  </span>
                  Time: {{ date('h:i A', strtotime($booking->start_date)) }}
                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-amount">
                    {{ number_format($booking->total,2) }} <span>AED</span>
                  </span>
                </td>

                <td class="nk-tb-col tb-col-md">
                  @if ($booking->status==0)
                  <span class="tb-status text-warning">New</span>
                  @elseif($booking->status==1)
                  <span class="tb-status text-info">Confirmed</span>
                  @elseif($booking->status==2)
                  <span class="tb-status text-primary">Schedule</span>
                  @elseif($booking->status==3)
                  <span class="tb-status text-success">Completed</span>
                  @elseif($booking->status==4)
                  <span class="tb-status text-danger">Canceled</span>
                  @endif
                </td>

                <td class="nk-tb-col tb-col-md">
                  @if ($booking->payment==0)
                  <span class="tb-status text-primary">Cash</span>
                  @elseif($booking->payment==1)
                  <span class="tb-status text-info">Card</span>
                  @endif
                </td>

                <td class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1">

                    @php
                    $stat=[1,2,3];
                    @endphp

                    @if (in_array($booking->status,$stat))
                    <li class="nk-tb-action-hidden">
                      <a href="{{ route('admin.booking.bill',$booking->id) }}" class="btn btn-trigger btn-icon"
                        data-toggle="tooltip" data-placement="top" title="Invoice">
                        <em class="icon ni ni-file text-info"></em>
                      </a>
                    </li>
                    @endif

                    <li class="nk-tb-action-hidden">
                      <a href="{{route('admin.booking.edit',$booking->id)}}" class="btn btn-trigger btn-icon"
                        data-toggle="tooltip" data-placement="top" title="Edit&confirm">
                        <i class="icon fal fa-edit text-success"></i>
                      </a>
                    </li>

                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-trigger btn-icon" data-placement="top" title="Delete"
                        data-serviceid="{{ $booking->id }}" data-servicenameen="{{ $booking->name_en }}"
                        data-servicenamear="{{ $booking->name_ar }}" data-toggle="modal" data-target="#deleteMdl">
                        <i class="icon fal fa-trash-alt text-danger"></i>
                      </a>
                    </li>

                    <li>
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">

                            <li><a href="{{route('admin.booking.assign',$booking->id)}}" class="text-primary">
                                <em class="icon ni ni-plus"></em>
                                <span>Assign</span>
                              </a></li>

                            @if ($booking->status !==0)
                            <li><a href="{{route('admin.booking.show',$booking->id)}}" class="text-primary">
                                <em class="icon ni ni-eye"></em>
                                <span>View In The Schedule</span>
                              </a></li>
                            @endif

                            <li><a href="{{route('admin.booking.edit',$booking->id)}}" class="text-success">
                                <i class="icon fal fa-edit"></i>
                                <span>Edit&Confirm</span>
                              </a></li>

                            <li class="divider"></li>

                            <li><a href="#" data-serviceid="{{ $booking->id }}"
                                data-servicenameen="{{ $booking->name_en }}"
                                data-servicenamear="{{ $booking->name_ar }}" class="text-danger" data-toggle="modal"
                                data-target="#deleteMdl">
                                <i class="icon fal fa-trash-alt"></i>
                                <span>Delete</span>
                              </a></li>

                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>

          <div class="card">
            <div class="card-inner">
              <div class="nk-block-between-md g-3">
                <div class="g">
                  {{ $bookings->links('pagination::bootstrap-5') }}
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="card bg-danger">
            <div class="card-inner">
              <div class="nk-block d-flex justify-content-center g-3">
                <div class="g">
                  <span class="text-white">No Data Available To Show</span>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

{{-- ==========================
===== MODALS
========================== --}}
{{-- ==========================
=====ACTIVATE MODAL
========================== --}}

<div class="modal fade zoon" tabindex="-1" id="activateMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="Close">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Activate</h5>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
          @csrf
          <input hidden id="service_id" name="serviceID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Activate
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="service_namear"></span>
                @else
                <span id="service_nameen"></span>
                @endif
                <span>?</span>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                  <button type="submit" class="btn btn-success">Activate</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-primary sm">
        <span class="sub-text"></span>
      </div>
    </div>
  </div>
</div>
{{-- ==========================
=====DEACTIVATE MODAL
========================== --}}

<div class="modal fade zoon" tabindex="-1" id="deactivateMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="Close">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Deactivate</h5>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
          @csrf
          <input hidden id="service_Id" name="serviceID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Deactivate
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="service_Namear"></span>
                @else
                <span id="service_Nameen"></span>
                @endif
                <span>?</span>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                  <button type="submit" class="btn btn-danger">Deactivate</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-primary sm">
        <span class="sub-text"></span>
      </div>
    </div>
  </div>
</div>
{{-- ==========================
=====DELETE MODAL
========================== --}}

<div class="modal fade zoon" tabindex="-1" id="deleteMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="Close">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Delete</h5>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
          @csrf
          <input hidden id="serviceId" name="serviceID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Delete
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="serviceNamear"></span>
                @else
                <span id="serviceNameen"></span>
                @endif

                <span>?</span>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                  <button type="submit" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-primary sm">
        <span class="sub-text"></span>
      </div>
    </div>
  </div>
</div>
@endsection
{{--
====================
====================
--}}
@section('page-scripts')
<script>
  'use strict';
        $(function() {

          /*
          ====================
          ACTIVATE MODAL
          ====================
          */
          $('#activateMdl').on('show.bs.modal', function(e) {
          let button = $(e.relatedTarget);
          let id = button.data('serviceid');
          let nameEn = button.data('servicenameen');
          let nameAr = button.data('servicenamear');
          //console.log(id);
          var modal = $(this);
          modal.find('.modal-body #service_id').val(id);
          modal.find('.modal-body #service_nameen').html(nameEn);
          modal.find('.modal-body #service_namear').html(nameAr);
          });
          /*
          ====================
          DEACTIVATE MODAL
          ====================
          */
          $('#deactivateMdl').on('show.bs.modal', function(e) {
          let button = $(e.relatedTarget);
          let id = button.data('serviceid');
          let nameEn = button.data('servicenameen');
          let nameAr = button.data('servicenamear');
          //console.log(id);
          var modal = $(this);
          modal.find('.modal-body #service_Id').val(id);
          modal.find('.modal-body #service_Nameen').html(nameEn);
          modal.find('.modal-body #service_Namear').html(nameAr);
          });
            /*
            ====================
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('serviceid');
                let nameAr = button.data('servicenamear');
                let nameEn = button.data('servicenameen');
                console.log(nameEn);
                var modal = $(this);
                modal.find('.modal-body #serviceId').val(id);
                modal.find('.modal-body #serviceNamear').html(nameAr);
                modal.find('.modal-body #serviceNameen').html(nameEn);
            });

        });
</script>
@endsection
{{--
====================
====================
--}}