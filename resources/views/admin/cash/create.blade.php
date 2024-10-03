@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
{{ __('general.New-Category') }}
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
              <h3 class="nk-block-title page-title">{{ __('general.Add') }}
                <strong class="text-primary small">{{ __('general.New-Category') }}</strong>
              </h3>

              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Created At: <span class="text-base">{{ date('d M Y h:i A',strtotime(now())) }}</span></li>
                </ul>
              </div>
            </div>

            <div class="nk-block-head-content">
              <a href="{{ route('admin.category.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('admin.category.index') }}"
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
                <span class="preview-title-lg overline-title">{{ __('general.Main Information') }}</span>
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="nameAr">{{ __('general.Arabic Name') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="nameAr" name="nameAr"
                            placeholder="{{ __('general.Arabic Name Here') }}" value="{{ old('nameAr') }}"
                            autocomplete="off" autofocus />
                          @error('nameAr')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="nameEn">{{ __('general.English Name') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="nameEn" name="nameEn"
                            placeholder="{{ __('general.English Name Here') }}" value="{{ old('nameEn') }}"
                            autocomplete="off" required />
                          @error('nameEn')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="customFileLabel">{{ __('general.Logo') }}</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="logo">
                            @error('logo')
                            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                            @enderror
                            <label class="custom-file-label" for="customFile">{{ __('general.Choose file') }}</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <span class="preview-title-lg overline-title">{{ __('general.Meta') }}</span>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="keyWordAr">{{ __('general.Arabic Key Words') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="keyWordAr" name="keyWordAr"
                            placeholder="{{ __('general.Arabic Key Words') }}" value="{{ old('keyWordAr') }}" />
                          @error('keyWordAr')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="keyWordEn">{{ __('general.English Key Words') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="keyWordEn" name="keyWordEn"
                            placeholder="{{ __('general.English Key Words') }}" value="{{ old('keyWordEn') }}" />
                          @error('keyWordAr')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label"
                          for="descriptionAr">{{ __('general.Arabic Meta Description') }}</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control" id="descriptionAr"
                            name="descriptionAr">{{ old('descriptionAr') }}</textarea>
                          @error('descriptionAr')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label"
                          for="descriptionEn">{{ __('general.English Meta Description') }}</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control" id="descriptionEn"
                            name="descriptionEn">{{ old('descriptionEn') }}</textarea>
                          @error('descriptionEn')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="{{ __('general.Submit') }}" />
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