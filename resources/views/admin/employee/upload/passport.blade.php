@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Employee Passport Copy Photo
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
              <h3 class="nk-block-title page-title">
                <span>Passport Copy</span>
                <strong class="text-primary small">
                  {{$user->name}}
                </strong>
              </h3>

              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Created At: <span class="text-base">{{ date('d M Y h:i A',strtotime(now())) }}</span></li>
                </ul>
              </div>
            </div>

            <div class="nk-block-head-content">
              <a href="{{ route('admin.employee.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>Back</span>
              </a>

              <a href="{{ route('admin.employee.index') }}"
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
                <span class="preview-title-lg overline-title">Upload Photo Then Press Submit</span>
                <form action="{{ route('admin.employee.passport.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input hidden name="user" value="{{ $user->id }}" />

                  <div class="row gy-4">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="photo">
                            @error('photo')
                            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                            @enderror
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="Submit" />
                    </div>
                  </div>

                </form>
                <hr class="preview-hr">

                <span class="preview-title-lg overline-title">Photos</span>

                <div class="row gy-4">
                  @if (!empty($user->passport_copy))
                  <div class="col col-md-4">
                    <div class="card">
                      <img src="{{ url('storage/app/public/imgs/users').'/'.$user->passport_copy }}"
                        class="card-img-top" alt="{{ $user->passport_copy }}" />
                    </div>
                  </div>
                  @else
                  <div class="col-12 card bg-danger">
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