@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
New Staff
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
                <strong class="text-primary small">New Staff</strong>
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
                <span class="preview-title-lg overline-title">Main Information</span>
                <form action="{{route('admin.employee.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row gy-4">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label" for="nameEn">Full Name</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="nameEn" name="nameEn"
                            placeholder="Full Name Here" value="{{ old('nameEn') }}" required autofocus />
                          @error('nameEn')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="gender">Gender</label>
                        <div class="form-control-wrap">
                          <select class="form-select form-control form-control-sm" id="gender" name="gender">
                            <option selected disabled>Choose...</option>
                            <option value="0">Female</option>
                            <option value="1">Male</option>
                          </select>
                          @error('gender')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="nationality">Nationality</label>
                        <div class="form-control-wrap">
                          <select class="form-select form-control form-control-sm" id="nationality" name="nationality">
                            <option selected disabled>Choose...</option>
                            @foreach ($nationalities as $nationality)
                            <option value="{{$nationality->id}}">{{$nationality->name_en}}</option>
                            @endforeach
                          </select>
                          @error('nationality')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="birthDate">Birth Date</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm date-picker"
                            data-date-format="dd/mm/yyyy" id="birthDate" name="birthDate" placeholder="dd/mm/yyyy"
                            value="{{ old('birthDate') }}" required autocomplete="off" />
                          @error('birthDate')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="passport">Passport No.</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="passport" name="passport"
                            placeholder="Passport No. Here" value="{{ old('passport') }}" autocomplete="off" />
                          @error('passport')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="passportExpired">Expired Date</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm date-picker"
                            data-date-format="dd/mm/yyyy" id="passportExpired" name="passportExpired"
                            placeholder="dd/mm/yyyy" value="{{ old('passportExpired') }}" autocomplete="off"/>
                          @error('passportExpired')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <span class="preview-title-lg overline-title">Contact Information</span>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="mail">E-mail</label>
                        <div class="form-control-wrap">
                          <input type="mail" class="form-control form-control-sm" id="mail" name="mail"
                            placeholder="E-Mail Here" value="{{ old('mail') }}" autocomplete="off" />
                          @error('mail')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="phone">Phone</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="phone" name="phone"
                            placeholder="Phone Number Here" value="{{ old('phone') }}" autocomplete="off" />
                          @error('phone')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <span class="preview-title-lg overline-title">Contract Information</span>

                  <div class="row gy-4">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="position">Position</label>
                        <div class="form-control-wrap">
                          <select class="form-select form-control form-control-sm" id="position" name="position">
                            <option selected disabled>Choose...</option>
                            <option value="Admin">Staff</option>
                            <option value="Cleaner">Cleaner</option>
                          </select>
                          @error('position')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="jonDate">Joining Date</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm date-picker"
                            data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" id="jonDate" name="jonDate"
                            value="{{ old('jonDate') }}" autocomplete="off"/>
                          @error('jonDate')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="salary">Basic Salary</label>
                        <div class="form-control-wrap">
                          <div class="form-text-hint">
                            <span class="overline-title">AED</span>
                          </div>
                          <input type="text" class="form-control form-control-sm" id="salary" name="salary"
                            placeholder="0.00" value="{{ old('salary',0.00) }}" />
                          @error('salary')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="overtime">Overtime (P-Hour)</label>
                        <div class="form-control-wrap">
                          <div class="form-text-hint">
                            <span class="overline-title">AED</span>
                          </div>
                          <input type="text" class="form-control form-control-sm" id="overtime" name="overtime"
                            placeholder="0.00" value="{{ old('overtime',0.00) }}" />
                          @error('overtime')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="allowance">Allowance</label>
                        <div class="form-control-wrap">
                          <div class="form-text-hint">
                            <span class="overline-title">AED</span>
                          </div>
                          <input type="text" class="form-control form-control-sm" id="allowance" name="allowance"
                            placeholder="0.00" value="{{ old('allowance',0.00) }}" />
                          @error('allowance')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                  </div>

                  <hr class="preview-hr">

                  <span class="preview-title-lg overline-title">Emirate ID Information</span>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="emNo">ID No.</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="emNo" name="emNo"
                            placeholder="ID Number Here" value="{{ old('emNo') }}" autocomplete="off" />
                          @error('emNo')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="emExpired">Expired Date</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm date-picker"
                            data-date-format="dd/mm/yyyy" id="emExpired" name="emExpired" placeholder="dd/mm/yyyy"
                            value="{{ old('emExpired') }}" autocomplete="off" />
                          @error('emExpired')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">
                  <span class="preview-title-lg overline-title">Other Information</span>
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="salaryAccount">Salary Bank Account.</label>
                        <div class="form-control-wrap">
                          <input type="mail" class="form-control form-control-sm" id="salaryAccount"
                            name="salaryAccount" placeholder="Bank Account Here" value="{{ old('salaryAccount') }}"
                            autocomplete="off" />
                          @error('salaryAccount')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
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