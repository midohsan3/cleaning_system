@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Customers
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
              <h3 class="nk-block-title page-title">Customers List<span>&nbsp;</span><span class="fs-15px text-purple">
                  ({{ $list_tile }})</span>
              </h3>
              <div class="nk-block-des text-soft">
                <p>System Have {{ number_format($customersCount,0) }}
                  Customers.</p>
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
                            <li>
                              <a href="{{ route('admin.customer.index') }}"><span>All</span></a>
                            </li>
                            <li>
                              <a href="#"><span>Followup</span></a>
                            </li>
                            <li><a href="#"><span>Trashed</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <li class="nk-block-tools-opt">

                      <a href="{{ route('admin.customer.create') }}"
                        class="btn btn-sm btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em>Add
                        Customer</a>

                      <a href="{{ route('admin.customer.create') }}"
                        class="btn btn-sm btn-primary d-none d-md-inline-flex"><em
                          class="icon ni ni-plus"></em><span>Add Customer</span></a>
                    </li>

                  </ul>
                </div>

              </div>
            </div>{{-- .nk-block-head-content --}}
          </div>{{-- .nk-block-between --}}
        </div>{{-- .nk-block-head --}}

        <div class="nk-block">
          @if ($customers->count()>0)
          <table class="nk-tb-list is-separate mb-3">
            <thead>
              <tr class="nk-tb-item nk-tb-head">
                <th class="nk-tb-col nk-tb-col-check">
                </th>
                <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                <th class="nk-tb-col"><span class="sub-text">Phone</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">E-Mail</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Last Booking</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Last Follow Up</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Address</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Notes</span></th>
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
              @foreach ($customers as $customer)
              <tr class="nk-tb-item">
                <td class="nk-tb-col nk-tb-col-check">
                  <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input" id="country_id[]" name="country_id[]">
                    <label class="custom-control-label" for="country_id[]"></label>
                  </div>
                </td>

                <td class="nk-tb-col">
                  <a href="{{route('admin.customer.show',$customer->user_id)}}">
                    <div class="user-card">
                      <div class="user-avatar bg-primary ">
                        <span class="text-uppercase">{{ substr($customer->userWCustomer->name,0,2) }}</span>
                      </div>
                      <div class="user-info">
                        <span class="tb-lead">
                          <span>{{ Str::substr($customer->userWCustomer->name,0,20) }}</span>
                        </span>
                        <span>
                          @if ($customer->added_by==0)
                          Added By Registration
                          @elseif($customer->added_by==0)
                          Added By System Admin
                          @endif
                        </span>
                      </div>
                    </div>
                  </a>
                </td>

                <td class="nk-tb-col">
                  <span>{{$customer->userWCustomer->phone}} </span>
                </td>

                <td class="nk-tb-col">
                  <span>{{$customer->userWCustomer->email}} </span>
                </td>

                <td class="nk-tb-col tb-col-md">
                  <span>
                    @if (!empty($customer->last_booking))
                    {{date('d-m-Y',strtotime($customer->last_booking))}}
                    @endif
                  </span>
                </td>

                <td class="nk-tb-col tb-col-md">
                  <span>{{date('d-m-Y',strtotime($customer->updated_at))}}</span>
                </td>

                <td class="nk-tb-col tb-col-md">
                  <span class="tb-lead">Address1:<span>{{Str::limit($customer->address,100)}}</span></span>
                  <span class="tb-lead">Address2:<span>{{Str::limit($customer->address_sec,100)}}</span></span>

                </td>
                <td class="nk-tb-col tb-col-md">
                  <span>{{Str::limit($customer->notes)}}</span>
                </td>

                <td class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1">
                    <li class="nk-tb-action-hidden">
                      <a href="{{route('admin.customer.edit',$customer->id)}}" class="btn btn-trigger btn-icon"
                        data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="icon fal fa-edit text-success"></i>
                      </a>
                    </li>

                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-trigger btn-icon" data-placement="top" title="Delete"
                        data-customerid="{{ $customer->user_id }}"
                        data-customernameen="{{ $customer->userWCustomer->name }}" data-toggle="modal"
                        data-target="#deleteMdl">
                        <i class="icon fal fa-trash-alt text-danger"></i>
                      </a>
                    </li>

                    <li>
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">

                            <li><a href="{{route('admin.customer.show',$customer->user_id)}}" class="text-primary">
                                <em class="icon ni ni-eye"></em>
                                <span>View Details</span>
                              </a></li>

                            <li><a href="{{route('admin.booking.create',$customer->user_id)}}" class="text-primary">
                                <em class="icon ni ni-plus"></em>
                                <span>Make Booking</span>
                              </a></li>

                            <li class="divider"></li>

                            <li><a href="{{route('admin.customer.hiring',$customer->user_id)}}" class="text-primary">
                                <em class="icon ni ni-plus"></em>
                                <span>Make Hiring</span>
                              </a></li>

                            <li class="divider"></li>

                            <li><a href="{{route('admin.customer.edit',$customer->id)}}" class="text-success">
                                <i class="icon fal fa-edit"></i>
                                <span>Edit</span>
                              </a></li>

                            <li class="divider"></li>

                            <li><a href="#">
                                <em class="icon ni ni-activity-round"></em>
                                <span>Booking History</span>
                              </a></li>

                            <li class="divider"></li>

                            <li><a href="#" data-customerid="{{ $customer->user_id }}"
                                data-customernameen="{{ $customer->userWCustomer->name }}" class="text-danger"
                                data-toggle="modal" data-target="#deleteMdl">
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
                  {{ $customers->links('pagination::bootstrap-5') }}
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
          <input hidden id="customerId" name="customerID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Delete
              <strong>
                <span id="customerNameen"></span>
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
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('customerid');
                let nameEn = button.data('customernameen');
                console.log(nameEn);
                var modal = $(this);
                modal.find('.modal-body #customerId').val(id);
                modal.find('.modal-body #customerNameen').html(nameEn);
            });

        });
</script>
@endsection
{{-- 
    ====================
    ====================
    --}}