use id;
@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Staff Information
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
                    <div class="card-inner d-flex justify-content-end">
                      <div class="col-md-4 ">
                        @if (empty($employee->photo))
                        <img src="{{ url('imgs/logo.JPG')}}" class="img-thumbnail" alt="user" />
                        @else
                        <img src="{{ url('storage/app/public/imgs/users').'/'.$employee->photo}}" class="img-thumbnail"
                          alt="{{$employee->name}}" />
                        @endif

                      </div>
                    </div>
                  </div>
                  <div class="nk-block">
                    <div class="nk-block-head">
                      <h5 class="title">Main Information</h5>
                      <p>Available Information in Our Platform</p>
                    </div>
                    <div class="profile-ud-list">

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Name </span>
                          <span class="profile-ud-value">
                            {{$employee->name}}
                          </span>
                        </div>
                      </div>

                      <div class=" profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Nationality </span>
                          <span
                            class="profile-ud-value">{{ $employee->employeeWUser->nationalityWEmployee->name_en }}</span>
                        </div>
                      </div>

                      <div class=" profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Gender </span>
                          <span class="profile-ud-value">
                            @if ($employee->employeeWUser->gender==0)
                            Female
                            @elseif($employee->employeeWUser->gender==1)
                            Male
                            @endif
                          </span>
                        </div>
                      </div>

                      <div class=" profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Age </span>
                          <span
                            class="profile-ud-value">{{ Carbon\Carbon::now()->diffInYears(date('d-m-Y',strtotime($employee->employeeWUser->birth_date))) }}
                          </span>
                        </div>
                      </div>

                      <div class=" profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Phone </span>
                          <span class="profile-ud-value">
                            {{$employee->phone}}
                          </span>
                        </div>
                      </div>

                      <div class=" profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">E-mail </span>
                          <span class="profile-ud-value">
                            {{$employee->email}}
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Status</span>
                          <span class="profile-ud-value">
                            @if ($employee->status==1)
                            Active
                            @else
                            Inactive
                            @endif
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Submitted At</span>
                          <span
                            class="profile-ud-value">{{ date('M-d-Y  h:m:a',strtotime($employee->created_at)) }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Salary Account</span>
                          <span class="profile-ud-value">{{ $employee->employeeWUser->salary_bank_account }}</span>
                        </div>
                      </div>

                    </div>
                  </div>

                  <hr class="preview-hr" />

                  @if ($employee->role_name =='Cleaner')
                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">
                        Skills
                      </h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="profile-ud-list">
                      @foreach ($skills as $skill)
                      @if (array_key_exists($skill->id,$employeeSkills))
                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ $skill->name_en }} </span>
                          <span class="profile-ud-value">
                          </span>
                        </div>
                      </div>
                      @endif
                      @endforeach


                    </div>
                  </div>

                  <hr class="preview-hr" />
                  @endif


                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">
                        Passport Information
                      </h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="card-inner d-flex justify-content-end">
                      <div class="col-md-3 ">
                        @if (empty($employee->passport_copy))
                        <img src="{{ url('imgs/logo.JPG')}}" class="img-thumbnail" alt="user" />
                        @else
                        <img src="{{ url('storage/app/public/imgs/users').'/'.$employee->passport_copy}}"
                          class="img-thumbnail" alt="{{$employee->passport_copy}}" />
                        @endif
                      </div>
                    </div>
                    <div class="profile-ud-list">

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Passport No. </span>
                          <span class="profile-ud-value">
                            {{$employee->employeeWUser->passport_no}}
                          </span>
                        </div>
                      </div>

                      <div class=" profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Expired Date </span>
                          <span class="profile-ud-value">
                            @if (empty($employee->employeeWUser->passport_expired_date))
                            Not Set Yet
                            @else
                            {{date('d-m-Y',strtotime($employee->employeeWUser->passport_expired_date))}}
                            @endif
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr" />

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">
                        Emirates ID Information
                      </h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="card-inner d-flex justify-content-end">
                      <div class="col-md-3">
                        @if (empty($employee->em_copy))
                        <img src="{{ url('imgs/logo.JPG')}}" class="img-thumbnail" alt="user" />
                        @else
                        <img src="{{ url('storage/app/public/imgs/users').'/'.$employee->em_copy}}"
                          class="img-thumbnail" alt="{{$employee->em_copy}}" />
                        @endif
                      </div>
                    </div>
                    <div class="profile-ud-list">

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">ID No. </span>
                          <span class="profile-ud-value">
                            {{$employee->employeeWUser->em_id}}
                          </span>
                        </div>
                      </div>

                      <div class=" profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Expired Date </span>
                          <span class="profile-ud-value">
                            @if (empty($employee->employeeWUser->em_id_expired_date))
                            Not Set Yet
                            @else
                            {{date('d-m-Y',strtotime($employee->employeeWUser->passport_expired_date))}}
                            @endif
                          </span>
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
    </div>
  </div>
</div>
@endsection
{{-- 
    ====================
    ====================
    --}}