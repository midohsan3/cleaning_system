@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Staff Skills
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
              <h3 class="nk-block-title page-title">{{ $employee->role_name }} /
                <strong class="text-primary small">
                  {{$employee->name}}
                </strong>
              </h3>
              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Submitted At: <span
                      class="text-base">{{ date('d M, Y', strtotime($employee->created_at)) }}</span>
                  </li>
                </ul>
              </div>

            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('admin.employee.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em><span>Back</span>
              </a>

              <a href="{{ route('admin.employee.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                  class="icon ni ni-arrow-left"></em></a>
            </div>
          </div>
        </div>

        <div class="nk-block">
          <div class="card card-bordered">
            <div class="card-aside-wrap">
              <div class="card-content">
                <div class="card-inner">

                  <div class="nk-block">
                    <div class="nk-block-head">
                      <h5 class="title">Choose Staff Skills</h5>
                      <p>From Available Skills At Our Platform</p>
                    </div>
                    <form action="{{route('admin.employee.skills_update')}}" method='POST'>
                      @csrf
                      <input hidden name="user" value="{{$employee->id}}" />
                      <div class="row gy-4">
                        @foreach ($skills as $skill)
                        <div class="col-md-3 custom-control custom-checkbox mb-1">
                          @if (array_key_exists($skill->id,$employeeSkills))
                          <input type="checkbox" class="custom-control-input" id="skill{{ $skill->name_en }}"
                            name="skill[]" value="{{ $skill->id }}" checked />
                          @else
                          <input type="checkbox" class="custom-control-input" id="skill{{ $skill->name_en }}"
                            name="skill[]" value="{{ $skill->id }}" />
                          @endif

                          <label class="custom-control-label text-capitalize" for="skill{{ $skill->name_en }}">
                            {{ $skill->name_en }}
                          </label>
                        </div>
                        @endforeach
                      </div>

                      <hr class="preview-hr" />

                      <div class="form-group mt-2">
                        <div class="form-control-wrap">
                          <input type="submit" class="btn btn-primary" value="Update" />
                        </div>
                    </form>

                  </div>





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