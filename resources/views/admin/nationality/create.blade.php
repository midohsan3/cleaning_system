@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
New Nationality
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
                <strong class="text-primary small">New Nationality</strong>
              </h3>

              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Created At: <span class="text-base">{{ date('d M Y h:i A',strtotime(now())) }}</span></li>
                </ul>
              </div>
            </div>

            <div class="nk-block-head-content">
              <a href="{{ route('admin.nationality.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>Back</span>
              </a>

              <a href="{{ route('admin.nationality.index') }}"
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
                <form action="{{route('admin.nationality.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="nameEn">English Name</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="nameEn" name="nameEn"
                            placeholder="English Name Here" value="{{ old('nameEn') }}" autocomplete="off" required
                            autofocus />
                          @error('nameEn')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="nameAr">Arabic Name</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="nameAr" name="nameAr"
                            placeholder="Arabic Name Here" value="{{ old('nameAr') }}" autocomplete="off" />
                          @error('nameAr')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="Submit" />
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