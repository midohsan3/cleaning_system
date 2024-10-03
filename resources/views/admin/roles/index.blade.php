@extends('layouts.admin')
@section('title')
{{ __('role.Roles-Management') }}
@endsection
{{-- ========================
PAGE HEADER
======================== --}}
@section('pgHeader')
{{ __('role.Roles-Management') }}
@endsection

@section('pgDiscription')
{{ __('role.You have total') }} <strong>{{ $rolesCount }}</strong> {{ __('role.Role') }}.
@endsection

@section('rightSide')
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
          <input type="text" class="form-control" id="default-04" placeholder="{{ __('general.Search by name') }}">
        </div>
      </li>

      <li class="nk-block-tools-opt">
        <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
        <a href="{{ route('admin.role.create') }}" class="btn bg-pink text-white d-none d-md-inline-flex"><em
            class="icon ni ni-plus"></em><span>{{ __('general.Add New') }}</span></a>
      </li>
    </ul>
  </div>
</div>
@endsection

{{-- ====================
  PAGE BODY
  ==================== --}}
@section('pgBody')
@if ($rolesCount > 0)
<table class="nk-tb-list is-separate mb-3">
  <thead>
    <tr class="nk-tb-item nk-tb-head">
      <th class="nk-tb-col"><span class="sub-text">{{ __('general.Name') }}</span></th>
      <th class="nk-tb-col nk-tb-col-tools">

      </th>

    </tr>
  </thead>
  <tbody>
    @foreach ($roles as $role)
    <tr class="nk-tb-item">
      <td class="nk-tb-col">
        <a href="{{ route('admin.role.edit', $role->id) }}">
          <div class="user-card">
            <div class="user-info">
              <span class="tb-lead">{{ $role->name }}<span class="dot dot-success d-md-none ml-1"></span></span>
            </div>
          </div>
        </a>
      </td>

      <td class="nk-tb-col nk-tb-col-tools">
        <ul class="nk-tb-actions gx-1">
          <li class="nk-tb-action-hidden">
            <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip"
              data-placement="top" title="{{ __('general.Edit') }}">
              <em class="icon ni ni-edit-fill text-warning"></em>
            </a>
          </li>
          <li class="nk-tb-action-hidden">
            <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top"
              title="{{ __('general.Delete') }}">
              <em class="icon ni ni-trash-fill text-danger"></em>
            </a>
          </li>
          <li>
            <div class="drodown">
              <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown">
                <em class="icon ni ni-more-h"></em>
              </a>

              <div class="dropdown-menu dropdown-menu-right">
                <ul class="link-list-opt no-bdr">
                  <li>
                    <a href="{{ route('admin.role.edit', $role->id) }}" class="text-indigo">
                      <em class="icon ni ni-eye"></em>
                      <span>{{ __('general.Edit') }}</span></a>
                  </li>

                  <li class="divider"></li>

                  <li>
                    <a href="#" class="text-danger" data-roleid="{{ $role->id }}" data-rolename="{{ $role->name }}"
                      data-toggle="modal" data-target="#deleteMdl">
                      <em class="icon ni ni-na"></em>
                      <span>{{ __('general.Delete') }}</span>
                    </a>
                  </li>
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
        {{ $roles->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
</div>
@else
<div class="card">
  <div class="card-inner">
    <div class="nk-block-between-md g-3 m-auto p-auto text-center">
      <div class="g">
        <strong>{{ trans('roles.No Roles available to show') }}.</strong>
      </div>
    </div>
  </div>
</div>
@endif

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
        <form action="{{ route('admin.role.delete') }}" method="POST">
          @csrf
          <input hidden id="role_id" name="roleID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ trans('roles.Are You Sure You Want Delete Role') }}
              <strong>
                <span id="role_name"></span>
              </strong> {{ trans('roles.?') }}
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('roles.Close') }}</button>

                  <button type="submit" class="btn btn-danger">{{ trans('roles.Delete') }}</button>
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

{{-- ====================
  PAGE SCRIPTS
  ==================== --}}
@section('pgScripts')

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
                let id = button.data('roleid');
                let nameEn = button.data('rolename');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #role_id').val(id);
                modal.find('.modal-body #role_name').html(nameEn);
            });
        });
</script>


@endsection