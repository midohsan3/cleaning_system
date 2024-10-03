@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Employees
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
              <h3 class="nk-block-title page-title">Staff List<span>&nbsp;</span><span class="fs-15px text-purple">
                  ({{ $list_tile }})</span>
              </h3>
              <div class="nk-block-des text-soft">
                <p>System Have {{ number_format($employeesCount,0) }}
                  Employee.</p>
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
                              <a href="{{ route('admin.employee.index') }}"><span>All</span></a>
                            </li>
                            <li>
                              <a href="{{route('admin.employee.cleaners')}}"><span>Cleaners</span></a>
                            </li>
                            <li>
                              <a href="{{route('admin.employee.staff')}}"><span>Staff</span></a>
                            </li>
                            <li><a href="{{route('admin.employee.trashed')}}"><span>Trashed</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <li class="nk-block-tools-opt">

                      <a href="{{ route('admin.employee.create') }}"
                        class="btn btn-sm btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em>Add
                        Service</a>

                      <a href="{{ route('admin.employee.create') }}"
                        class="btn btn-sm btn-primary d-none d-md-inline-flex"><em
                          class="icon ni ni-plus"></em><span>Add Employee</span></a>
                    </li>

                  </ul>
                </div>

              </div>
            </div>{{-- .nk-block-head-content --}}
          </div>{{-- .nk-block-between --}}
        </div>{{-- .nk-block-head --}}

        <div class="nk-block">
          @if ($employees->count()>0)
          <table class="nk-tb-list is-separate mb-3">
            <thead>
              <tr class="nk-tb-item nk-tb-head">
                <th class="nk-tb-col nk-tb-col-check">
                </th>
                <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                <th class="nk-tb-col"><span class="sub-text">Position</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Contacts</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Nationality</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Role</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Attaches</span></th>
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
              @foreach ($employees as $employee)
              <tr class="nk-tb-item">
                <td class="nk-tb-col nk-tb-col-check">
                  <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input" id="country_id[]" name="country_id[]">
                    <label class="custom-control-label" for="country_id[]"></label>
                  </div>
                </td>

                <td class="nk-tb-col">
                  <a href="{{route('admin.employee.show',$employee->user_id)}}">
                    <div class="user-card">
                      <div class="user-avatar bg-primary ">
                        @if ($employee->userWEmployee->photo !==null)
                        <img src="{{ url('storage/app/public/imgs/users').'/'.$employee->userWEmployee->photo}}"
                          alt="{{ $employee->userWEmployee->name }}" />
                        @else
                        <span class="text-uppercase">{{ substr($employee->userWEmployee->name,0,2) }}</span>
                        @endif
                      </div>
                      <div class="user-info">
                        <span class="tb-lead">
                          <span>{{ Str::substr($employee->userWEmployee->name,0,20) }}</span>
                          @if ($employee->status==1)
                          <span class="dot dot-success d-md-none ml-1"></span></span>
                        @else
                        <span class="dot dot-danger d-md-none ml-1"></span>
                        </span>
                        @endif
                        <span class="tb-lead">Code:<span>JM-{{ $employee->code }}</span></span>
                      </div>
                    </div>
                  </a>
                </td>

                <td class="nk-tb-col">
                  <span>{{$employee->position}} </span>
                </td>

                <td class="nk-tb-col tb-col-md">
                  <span>{{$employee->userWEmployee->phone}}</span>
                </td>

                <td class="nk-tb-col tb-col-md">
                  <span>{{$employee->nationalityWEmployee->name_en}}</span>
                </td>

                <td class="nk-tb-col tb-col-md">
                  <span>{{$employee->userWEmployee->role_name}}</span>
                </td>

                <td class="nk-tb-col tb-col-md">
                  @if (empty($employee->userWEmployee->passport_copy))
                  <i class="fal fa-times-circle text-danger"></i>
                  @else
                  <i class="far fa-check-circle text-success"></i>
                  @endif
                  <span>Passport</span>

                  @if (empty($employee->userWEmployee->em_copy))
                  <i class="fal fa-times-circle text-danger"></i>
                  @else
                  <i class="far fa-check-circle text-success"></i>
                  @endif
                  <span>ID</span>

                </td>

                <td class="nk-tb-col tb-col-md">
                  @if ($employee->position =='Cleaner')
                  @if ($employee->status==1)
                  <span class="tb-status text-success">Active</span>
                  @else
                  <span class="tb-status text-danger">Inactive</span>
                  @endif
                  @else
                  @if ($employee->userWEmployee->status==1)
                  <span class="tb-status text-success">Active</span>
                  <span class="tb-lead">System Login</span>
                  @else
                  <span class="tb-lead">System Login</span>
                  <span class="tb-status text-danger">Inactive</span>
                  @endif
                  @endif
                </td>
                <td class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1">
                    <li class="nk-tb-action-hidden">
                      <a href="{{route('admin.employee.edit',$employee->id)}}" class="btn btn-trigger btn-icon"
                        data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="icon fal fa-edit text-success"></i>
                      </a>
                    </li>

                    @if ($employee->status==1)
                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-trigger btn-icon" data-employeeid="{{ $employee->user_id }}"
                        data-employeenameen="{{ $employee->userWEmployee->name }}" data-placement="top"
                        title="Deactivate" data-toggle="modal" data-target="#deactivateMdl">
                        <i class="icon far fa-power-off text-danger"></i>
                      </a>
                    </li>
                    @else
                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-trigger btn-icon" data-employeeid="{{ $employee->user_id }}"
                        data-employeenameen="{{ $employee->userWEmployee->name }}" data-placement="top" title="Activate"
                        data-toggle="modal" data-target="#activateMdl">
                        <i class="icon far fa-power-off text-primary"></i>
                      </a>
                    </li>
                    @endif

                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-trigger btn-icon" data-placement="top" title="Delete"
                        data-employeeid="{{ $employee->user_id }}"
                        data-employeenameen="{{ $employee->userWEmployee->name }}" data-toggle="modal"
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

                            <li><a href="{{route('admin.employee.show',$employee->user_id)}}" class="text-primary">
                                <em class="icon ni ni-eye"></em>
                                <span>View Details</span>
                              </a></li>

                            <li class="divider"></li>
                            @if ($employee->position=='Cleaner')
                            <li><a href="{{route('admin.employee.skills',$employee->user_id)}}" class="text-success">
                                <em class="icon ni ni-list-check"></em>
                                <span>Skills</span>
                              </a></li>

                            <li><a href="{{route('admin.cleaner_schedule.index',$employee->user_id)}}"
                                class="text-info">
                                <em class="icon ni ni-calender-date"></em>
                                <span>Schedule</span>
                              </a></li>

                            <li class="divider"></li>
                            @endif


                            <li><a href="{{route('admin.employee.edit',$employee->id)}}" class="text-success">
                                <i class="icon fal fa-edit"></i>
                                <span>Edit</span>
                              </a></li>

                            @if ($employee->status==1)
                            <li><a href="#" class="text-danger" data-employeeid="{{ $employee->user_id }}"
                                data-employeenameen="{{ $employee->userWEmployee->name }}" data-placement="top"
                                title="Deactivate" data-toggle="modal" data-target="#deactivateMdl">
                                <i class="icon far fa-power-off"></i>
                                <span>Deactivate</span>
                              </a></li>
                            @else
                            <li><a href="#" class="text-primary" data-employeeid="{{ $employee->user_id }}"
                                data-employeenameen="{{ $employee->userWEmployee->name }}" data-placement="top"
                                title="{{ __('general.Activate') }}" data-toggle="modal" data-target="#activateMdl">
                                <i class="icon far fa-power-off"></i>
                                <span>Activate</span>
                              </a></li>
                            @endif

                            <li class="divider"></li>

                            <li><a href="{{route('admin.employee.photo',$employee->user_id)}}">
                                <i class="icon far fa-image"></i>
                                <span>Photo</span>
                              </a></li>

                            <li><a href="{{route('admin.employee.passport',$employee->user_id)}}">
                                <i class="icon far fa-file-image"></i>
                                <span>Passport Copy</span>
                              </a></li>

                            <li><a href="{{route('admin.employee.em',$employee->user_id)}}">
                                <i class="icon far fa-file-image"></i>
                                <span>ID Copy</span>
                              </a></li>

                            <li class="divider"></li>

                            <li><a href="{{route('admin.employee.history',$employee->user_id)}}">
                                <em class="icon ni ni-activity-round"></em>
                                <span>History</span>
                              </a></li>

                            @if($employee->position !=='Cleaner')
                            <li><a href="{{route('admin.employee.activity',$employee->user_id)}}">
                                <em class="icon ni ni-activity-round"></em>
                                <span>Activities</span>
                              </a></li>
                            @endif

                            <li class="divider"></li>

                            <li><a href="#" data-employeeid="{{ $employee->user_id }}"
                                data-employeenameen="{{ $employee->userWEmployee->name }}" class="text-danger"
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
                  {{ $employees->links('pagination::bootstrap-5') }}
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
        <form action="{{route('admin.employee.activate')}}" method="POST">
          @csrf
          <input hidden id="employee_id" name="employeeID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Activate
              <strong>
                <span id="employee_nameen"></span>
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
        <form action="{{route('admin.employee.deactivate')}}" method="POST">
          @csrf
          <input hidden id="employee_Id" name="employeeID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Deactivate
              <strong>
                <span id="employee_Nameen"></span>
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
        <form action="{{route('admin.employee.destroy')}}" method="POST">
          @csrf
          <input hidden id="employeeId" name="employeeID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Delete
              <strong>
                <span id="employeeNameen"></span>
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
          let id = button.data('employeeid');
          let nameEn = button.data('employeenameen');
          //console.log(id);
          var modal = $(this);
          modal.find('.modal-body #employee_id').val(id);
          modal.find('.modal-body #employee_nameen').html(nameEn);
          });
          /*
          ====================
          DEACTIVATE MODAL
          ====================
          */
          $('#deactivateMdl').on('show.bs.modal', function(e) {
          let button = $(e.relatedTarget);
          let id = button.data('employeeid');
          let nameEn = button.data('employeenameen');
          //console.log(id);
          var modal = $(this);
          modal.find('.modal-body #employee_Id').val(id);
          modal.find('.modal-body #employee_Nameen').html(nameEn);
          });
            /*
            ====================
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('employeeid');
                let nameEn = button.data('employeenameen');
                console.log(nameEn);
                var modal = $(this);
                modal.find('.modal-body #employeeId').val(id);
                modal.find('.modal-body #employeeNameen').html(nameEn);
            });

        });
</script>
@endsection
{{-- 
    ====================
    ====================
    --}}