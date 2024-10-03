@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Services
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
              <h3 class="nk-block-title page-title">Services List<span>&nbsp;</span><span class="fs-15px text-purple">
                  ({{ $list_tile }})</span>
              </h3>
              <div class="nk-block-des text-soft">
                <p>System Have {{ number_format($servicesCount,0) }}
                  Service.</p>
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
                            <li><a href="{{ route('admin.service.index') }}"><span>All</span></a>
                            </li>
                            <li><a href="{{route('admin.service.active')}}"><span>Active</span></a>
                            </li>
                            <li><a href="{{route('admin.service.inactive')}}"><span>Inactive</span></a>
                            </li>
                            <li><a href="{{route('admin.service.trashed')}}"><span>Trashed</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <li class="nk-block-tools-opt">

                      <a href="{{ route('admin.service.create') }}"
                        class="btn btn-sm btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em>Add
                        Service</a>

                      <a href="{{ route('admin.service.create') }}"
                        class="btn btn-sm btn-primary d-none d-md-inline-flex"><em
                          class="icon ni ni-plus"></em><span>Add Service</span></a>
                    </li>

                  </ul>
                </div>

              </div>
            </div>{{-- .nk-block-head-content --}}
          </div>{{-- .nk-block-between --}}
        </div>{{-- .nk-block-head --}}

        <div class="nk-block">
          @if ($services->count()>0)
          <table class="nk-tb-list is-separate mb-3">
            <thead>
              <tr class="nk-tb-item nk-tb-head">
                <th class="nk-tb-col nk-tb-col-check">
                </th>
                <th class="nk-tb-col"><span class="sub-text">Service Name</span></th>
                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Hour</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Day</span></th>
                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Month</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
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
              @foreach ($services as $service)
              <tr class="nk-tb-item">
                <td class="nk-tb-col nk-tb-col-check">
                  <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input" id="country_id[]" name="country_id[]">
                    <label class="custom-control-label" for="country_id[]"></label>
                  </div>
                </td>

                <td class="nk-tb-col">
                  <a href="{{route('admin.service.show',$service->id)}}">
                    <div class="user-card">
                      <div class="user-avatar bg-primary ">
                        <span class="text-uppercase">{{ substr($service->name_en,0,2) }}</span>
                      </div>
                      <div class="user-info">
                        <span class="tb-lead">
                          <span>{{ $service->name_en }}</span>

                          @if ($service->status==1)
                          <span class="dot dot-success d-md-none ml-1"></span></span>
                        @else
                        <span class="dot dot-danger d-md-none ml-1"></span>
                        </span>
                        @endif
                      </div>
                    </div>
                  </a>
                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-amount">
                    {{ number_format($service->h_price,2) }} <span>AED</span>
                  </span>
                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-amount">
                    {{ number_format($service->d_price,2) }} <span>AED</span>
                  </span>
                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-amount">
                    {{ number_format($service->m_price,2) }} <span>AED</span>
                  </span>
                </td>

                <td class="nk-tb-col tb-col-md">
                  @if ($service->status==1)
                  <span class="tb-status text-success">Active</span>
                  @else
                  <span class="tb-status text-danger">Inactive</span>
                  @endif

                </td>
                <td class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1">
                    <li class="nk-tb-action-hidden">
                      <a href="{{route('admin.service.edit',$service->id)}}" class="btn btn-trigger btn-icon"
                        data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="icon fal fa-edit text-success"></i>
                      </a>
                    </li>

                    @if ($service->status==1)
                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-trigger btn-icon" data-serviceid="{{ $service->id }}"
                        data-servicenameen="{{ $service->name_en }}" data-servicenamear="{{ $service->name_ar }}"
                        data-placement="top" title="Deactivate" data-toggle="modal" data-target="#deactivateMdl">
                        <i class="icon far fa-power-off text-danger"></i>
                      </a>
                    </li>
                    @else
                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-trigger btn-icon" data-serviceid="{{ $service->id }}"
                        data-servicenameen="{{ $service->name_en }}" data-servicenamear="{{ $service->name_ar }}"
                        data-placement="top" title="Activate" data-toggle="modal" data-target="#activateMdl">
                        <i class="icon far fa-power-off text-primary"></i>
                      </a>
                    </li>
                    @endif

                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-trigger btn-icon" data-placement="top" title="Delete"
                        data-serviceid="{{ $service->id }}" data-servicenameen="{{ $service->name_en }}"
                        data-servicenamear="{{ $service->name_ar }}" data-toggle="modal" data-target="#deleteMdl">
                        <i class="icon fal fa-trash-alt text-danger"></i>
                      </a>
                    </li>

                    <li>
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">

                            <li><a href="{{route('admin.service.show',$service->id)}}" class="text-primary">
                                <em class="icon ni ni-eye"></em>
                                <span>View Details</span>
                              </a></li>

                            <li><a href="{{route('admin.service.edit',$service->id)}}" class="text-success">
                                <i class="icon fal fa-edit"></i>
                                <span>Edit</span>
                              </a></li>

                            @if ($service->status==1)
                            <li><a href="#" class="text-danger" data-serviceid="{{ $service->id }}"
                                data-servicenameen="{{ $service->name_en }}"
                                data-servicenamear="{{ $service->name_ar }}" data-placement="top" title="Deactivate"
                                data-toggle="modal" data-target="#deactivateMdl">
                                <i class="icon far fa-power-off"></i>
                                <span>Deactivate</span>
                              </a></li>
                            @else
                            <li><a href="#" class="text-primary" data-serviceid="{{ $service->id }}"
                                data-servicenameen="{{ $service->name_en }}"
                                data-servicenamear="{{ $service->name_ar }}" data-placement="top"
                                title="{{ __('general.Activate') }}" data-toggle="modal" data-target="#activateMdl">
                                <i class="icon far fa-power-off"></i>
                                <span>Activate</span>
                              </a></li>
                            @endif

                            <li><a href="{{route('admin.service.activity',$service->id)}}">
                                <em class="icon ni ni-activity-round"></em>
                                <span>History</span>
                              </a></li>

                            <li class="divider"></li>

                            <li><a href="#" data-serviceid="{{ $service->id }}"
                                data-servicenameen="{{ $service->name_en }}"
                                data-servicenamear="{{ $service->name_ar }}" class="text-danger" data-toggle="modal"
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
                  {{ $services->links('pagination::bootstrap-5') }}
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