@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Bills
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
              <h3 class="nk-block-title page-title">Invoices</h3>
              <div class="nk-block-des text-soft">
                <p>You have total {{ $bills->count() }} invoices.</p>
              </div>
            </div>
            <div class="nk-block-head-content">
              <ul class="nk-block-tools g-3">
                <li>
                  <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em
                        class="icon ni ni-plus"></em></a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <ul class="link-list-opt no-bdr">
                        <li><a href="#"><span>Add New</span></a></li>
                        <li><a href="#"><span>Import</span></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="nk-block">
          <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
              <div class="card-inner">
                <div class="card-title-group">
                  <div class="card-title">
                    <h5 class="title">All Invoice</h5>
                  </div>
                  <div class="card-tools mr-n1">
                    <ul class="btn-toolbar">
                      <li>
                        <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em
                            class="icon ni ni-search"></em></a>
                      </li>
                    </ul>
                  </div>

                  <div class="card-search search-wrap" data-search="search">
                    <div class="search-content">
                      <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em
                          class="icon ni ni-arrow-left"></em></a>
                      <input type="text" class="form-control form-control-sm border-transparent form-focus-none"
                        placeholder="Quick search by order id">
                      <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                    </div>
                  </div>
                </div>
              </div>

              @if ($bills->count()>0)
              <div class="card-inner p-0">
                <table class="table table-orders">
                  <thead class="tb-odr-head">
                    <tr class="tb-odr-item">
                      <th class="tb-odr-info">
                        <span class="tb-odr-id">Order ID</span>
                        <span class="tb-odr-date d-none d-md-inline-block">Date</span>
                      </th>
                      <th class="tb-odr-amount">
                        <span class="tb-odr-total">Amount</span>
                        <span class="tb-odr-status d-none d-md-inline-block">Status</span>
                      </th>
                      <th class="tb-odr-action">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody class="tb-odr-body">
                    @foreach ($bills as $bill)
                    <tr class="tb-odr-item">
                      <td class="tb-odr-info">
                        <span class="tb-odr-id"><a href="html/invoice-details.html">{{ $bill->bill_no }}</a></span>
                        <span class="tb-odr-date">{{ date('d M Y, h:iA',strtotime($bill->created_at)) }}</span>
                      </td>
                      <td class="tb-odr-amount">
                        <span class="tb-odr-total">
                          <span class="amount">{{ number_format($bill->subtotal,2) }} AED</span>
                        </span>
                        <span class="tb-odr-status">
                          @if ($bill->status ==0)
                          <span class="badge badge-dot badge-danger">Pending</span>
                          @elseif($bill->status==1)
                          <span class="badge badge-dot badge-warning">Unpaid</span>
                          @elseif($bill->status==2)
                          <span class="badge badge-dot badge-success">Paid</span>
                          @endif
                        </span>
                      </td>
                      <td class="tb-odr-action">
                        <div class="tb-odr-btns d-none d-sm-inline">
                          <a href="html/invoice-print.html" target="_blank"
                            class="btn btn-icon btn-white btn-dim btn-sm btn-primary"><em
                              class="icon ni ni-printer-fill"></em></a>
                          <a href="{{ route('admin.booking.printBill',$bill->id) }}"
                            class="btn btn-dim btn-sm btn-primary">View</a>
                        </div>
                        <a href="{{ route('admin.booking.bill',$bill->booking_id) }}"
                          class="btn btn-pd-auto d-sm-none"><em class="icon ni ni-chevron-right"></em></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="card">
                <div class="card-inner">
                  <div class="nk-block-between-md g-3">
                    <div class="g">
                      {{ $bills->links('pagination::bootstrap-5') }}
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
          </div><!-- .card -->
        </div><!-- .nk-block -->
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
        <form action="{{route('admin.service.activate')}}" method="POST">
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
        <form action="{{route('admin.service.deactivate')}}" method="POST">
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
        <form action="{{route('admin.service.destroy')}}" method="POST">
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