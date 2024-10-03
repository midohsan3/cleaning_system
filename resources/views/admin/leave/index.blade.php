@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Leave & Permissions
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
              <h3 class="nk-block-title page-title">Leave List<span>&nbsp;</span><span class="fs-15px text-purple">
                  ({{ $list_tile }})</span>
              </h3>
              <div class="nk-block-des text-soft">
                <p>System Have {{ number_format($leavesCount,0) }}
                  Leave.</p>
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
                            <li><a href="{{ route('admin.leave.index') }}"><span>All</span></a>
                            </li>
                            <li><a href="#"><span>This Week</span></a>
                            </li>
                            <li><a href="#"><span>This Month</span></a>
                            </li>
                            <li><a href="#"><span>Trashed</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <li class="nk-block-tools-opt">

                      <a href="{{ route('admin.leave.create') }}" class="btn btn-sm btn-icon btn-primary d-md-none"><em
                          class="icon ni ni-plus"></em>Add
                        Leave</a>

                      <a href="{{ route('admin.leave.create') }}"
                        class="btn btn-sm btn-primary d-none d-md-inline-flex"><em
                          class="icon ni ni-plus"></em><span>Add Leave</span></a>
                    </li>

                  </ul>
                </div>

              </div>
            </div>{{-- .nk-block-head-content --}}
          </div>{{-- .nk-block-between --}}
        </div>{{-- .nk-block-head --}}

        <div class="nk-block">
          @if ($leaves->count()>0)
          <table class="nk-tb-list is-separate mb-3">
            <thead>
              <tr class="nk-tb-item nk-tb-head">
                <th class="nk-tb-col nk-tb-col-check">
                </th>
                <th class="nk-tb-col"><span class="sub-text">Employee Name</span></th>
                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Type</span></th>
                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Position</span></th>
                <th class="nk-tb-col tb-col-md"><span class="sub-text">Details</span></th>
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
              @foreach ($leaves as $leave)
              <tr class="nk-tb-item">
                <td class="nk-tb-col nk-tb-col-check">
                </td>

                <td class="nk-tb-col">
                  <a href="#">
                    <div class="user-card">
                      <div class="user-info">
                        <span class="tb-lead">
                          <span>{{ substr($leave->userWLeave->name,0,20) }}</span>
                        </span>
                        <span><strong>Code:</strong><span>{{$leave->userWleave->employeeWuser->code}}</span></span>
                      </div>
                    </div>
                  </a>
                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-amount">
                    @if ($leave->type==1)
                    <span class="badge badge-primary">Annual Leave</span>
                    @elseif($leave->type==2)
                    <span class="badge badge-warning">Sick Leave</span>
                    @elseif($leave->type==3)
                    <span class="badge badge-info">Permission</span>
                    @elseif($leave->type==4)
                    <span class="badge badge-Secondary">OFF</span>
                    @endif
                  </span>
                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-amount">
                    {{ $leave->userWleave->employeeWuser->position}}
                  </span>
                </td>

                <td class="nk-tb-col tb-col-mb">
                  <span class="tb-amount">
                    From <span>{{date('d-M-Y' ,strtotime($leave->start_at))}}</span>
                    @if (date('h:i A',strtotime($leave->start_at)) !==date('h:i A',strtotime($leave->start_at)))
                    <span>{{ date('h:i A',strtotime('00:00:00')) }}</span>
                    @endif
                  </span>
                  <span class="tb-amount">
                    To <span>{{date('d-M-Y' ,strtotime($leave->end_at))}}</span>
                    @if (date('h:i A',strtotime($leave->end_at))!==date('h:i A',strtotime('23:59:59')))
                    <span>{{ date('h:i A',strtotime($leave->end_at) )}}</span>
                    @endif
                    <span>|{{ Str::limit($leave->details,50) }}</span>
                  </span>
                </td>

                <td class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1">
                    <li class="nk-tb-action-hidden">
                      <a href="{{route('admin.leave.edit',$leave->id)}}" class="btn btn-trigger btn-icon"
                        data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="icon fal fa-edit text-success"></i>
                      </a>
                    </li>

                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-trigger btn-icon" data-placement="top" title="Delete"
                        data-leaveid="{{ $leave->id }}" data-toggle="modal" data-target="#deleteMdl">
                        <i class="icon fal fa-trash-alt text-danger"></i>
                      </a>
                    </li>

                    <li>
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">

                            <li><a href="{{route('admin.leave.edit',$leave->id)}}" class="text-success">
                                <i class="icon fal fa-edit"></i>
                                <span>Edit</span>
                              </a></li>

                            <li class="divider"></li>

                            <li><a href="#" data-leaveid="{{ $leave->id }}" class="text-danger" data-toggle="modal"
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
                  {{ $leaves->links('pagination::bootstrap-5') }}
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
        <form action="{{route('admin.leave.destroy')}}" method="POST">
          @csrf
          <input hidden id="leaveId" name="leaveID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Delete
              <strong>Leave / Permission
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
                let id = button.data('leaveid');
                var modal = $(this);
                modal.find('.modal-body #leaveId').val(id);
            });

        });
</script>
@endsection
{{-- 
    ====================
    ====================
    --}}