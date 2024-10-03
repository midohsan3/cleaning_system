@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Edit Leave - Permission
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
              <h3 class="nk-block-title page-title">Add
                <strong class="text-primary small">New Leave</strong>
              </h3>

              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Created At: <span class="text-base">{{ date('d M Y h:i A',strtotime(now())) }}</span></li>
                </ul>
              </div>
            </div>

            <div class="nk-block-head-content">
              <a href="{{ route('admin.leave.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>Back</span>
              </a>

              <a href="{{ route('admin.leave.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                <em class="icon ni ni-arrow-left"></em>
              </a>
            </div>
          </div>
        </div>


        <div class="nk-block">
          <div class="card card-preview">
            <div class="card-inner">
              <div class="preview-block">
                <span class="preview-title-lg overline-title">Main Information</span>
                <form action="{{ route('admin.leave.update') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input hidden name="leave" value="{{$leave->id}}" />
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="nameEn">Employee Name</label>
                        <div class="form-control-wrap">
                          <input class="form-control form-control-sm" id="nameEn" name="nameEn"
                            value="JM-{{ $leave->userWLeave->employeeWUser->code }} {{ $leave->userWLeave->name }}"
                            readonly />
                          @error('nameEn')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="type">Type</label>
                        <div class="form-control-wrap">
                          <select class="form-select form-control form-control-sm" id="type" name="type" autofocus>
                            <option disabled>Choose Leave Type.....
                            </option>
                            @if ($leave->type==1)
                            <option value="1" selected>Annual Leave</option>
                            @else
                            <option value="1">Annual Leave</option>
                            @endif
                            @if ($leave->type==2)
                            <option value="2" selected>Sick Leave</option>
                            @else
                            <option value="2">Sick Leave</option>
                            @endif
                            @if ($leave->type==3)
                            <option value="3" selected>Permission</option>
                            @else
                            <option value="3">Permission</option>
                            @endif
                            @if ($leave->type==4)
                            <option value="4" selected>Day Off</option>
                            @else
                            <option value="4">Day Off</option>
                            @endif
                          </select>
                          @error('type')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="startDate">Start At</label>
                        <div class="form-control-wrap">
                          <div class="input-daterange  input-group">
                            <input type="text" class="form-control form-control-sm date-picker" id="startDate"
                              name="startDate" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy"
                              value="{{ old('startDate',date('d/m/Y',strtotime($leave->start_at))) }}"
                              autocomplete="off" />
                            <input type="text" class="form-control form-control-sm time-picker" id="startTime"
                              name="startTime" data-date-format="h:i A" placeholder="--:-- --"
                              value="{{ old('startTime',date('h:i A',strtotime($leave->start_at))) }}"
                              autocomplete="off" />
                          </div>
                          @error('startDate')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                          @error('startTime')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="endDate">End At</label>
                        <div class="form-control-wrap">
                          <div class="input-daterange  input-group">
                            <input type="text" class="form-control form-control-sm date-picker" id="endDate"
                              name="endDate" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy"
                              value="{{ old('endDate',date('d/m/Y',strtotime($leave->end_at))) }}" autocomplete="off" />
                            <input type="text" class="form-control form-control-sm time-picker" id="endTime"
                              name="endTime" data-date-format="h:i A" placeholder="--:-- --"
                              value="{{ old('endTime',date('h:i A',strtotime($leave->end_at))) }}" autocomplete="off" />
                          </div>
                          @error('endDate')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                          @error('endTime')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control form-control-sm" placeholder="IF Have Any Description"
                            id="description" name="description">{{ old('description',$leave->details) }}</textarea>
                          @error('description')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="Update" />
                    </div>
                  </div>

                </form>
                <hr class="preview-hr">

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