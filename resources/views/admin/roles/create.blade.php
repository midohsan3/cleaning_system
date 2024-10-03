@extends('layouts.admin')
@section('title')
{{ __('role.New Role') }}
@endsection
{{-- ========================
PAGE HEADER
======================== --}}
@section('returnButton')
<div class="nk-block-head-sub">
  <a class="back-to" href="{{ route('role.index') }}">
    <em class="icon ni ni-arrow-left"></em><span>{{ __('role.All Roles') }}</span>
  </a>
</div>
@endsection
@section('pgHeader')
{{ __('role.Add New Role') }}
@endsection

{{-- ====================
  PAGE BODY
  ==================== --}}
@section('pgBody')
<div class="card card-preview">
  <div class="card-inner">
    <div class="preview-block">
      <span class="preview-title-lg overline-title">{{ __('general.Main Information') }}</span>
      <form action="{{ route('role.store') }}" method="POST">
        @csrf
        <div class="col-sm-6">
          <div class="form-group">
            <label class="form-label" for="name">{{ __('role.Role Name') }}</label>
            <div class="form-control-wrap">
              <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('role.Role Name') }}"
                value="{{ old('name') }}" autocomplete autofocus>
              @error('name')
              <span class="bg-danger text-white" role="alert">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <hr class="preview-hr">
        <h6><strong>{{ trans('roles.Permissions') }}:</strong></h6>
        @foreach ($permissions as $permission)
        <div class="col-md-3 custom-control custom-checkbox mb-1">
          <input type="checkbox" class="custom-control-input" id="perm{{ $permission->id }}" name="permission[]"
            value="{{ $permission->id }}">
          <label class="custom-control-label text-capitalize"
            for="perm{{ $permission->id }}">{{ $permission->name }}</label>
        </div>
        @endforeach

        <div class="form-group mt-2">
          <div class="form-control-wrap">
            <input type="submit" class="btn bg-pink text-white" value="{{ __('general.Submit') }}" />
          </div>
        </div>
      </form>
      <hr class="preview-hr">

    </div>
  </div>
</div>

@endsection

{{-- ====================
  PAGE SCRIPTS
  ==================== --}}
@section('pgScripts')



@endsection