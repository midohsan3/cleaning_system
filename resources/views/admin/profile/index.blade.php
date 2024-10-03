@extends('layouts.admin')
{{--
====================
====================
--}}
@section('pag-title')
Profile
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
        <div class="nk-block">
          <div class="card">
            <div class="card-aside-wrap">
              <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h4 class="nk-block-title">Personal Information</h4>
                      <div class="nk-block-des">
                        <p>Basic info, like your name and phone,that you use on our Platform. </p>
                      </div>
                    </div>
                    <div class="nk-block-head-content align-self-start d-lg-none">
                      <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"> <em
                          class="icon ni ni-menu-alt-r"></em></a>
                    </div>
                  </div>
                </div>
                <div class="nk-block">
                  <div class="nk-data data-list">
                    <div class="data-head">
                      <h6 class="overline-title">Basics</h6>
                    </div>
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                      <div class="data-col">
                        <span class="data-label">Full Name</span>
                        <span class="data-value">{{ Auth::user()->name }}</span>
                      </div>
                      <div class="data-col data-col-end"><span class="data-more"><em
                            class="icon ni ni-forward-ios"></em></span></div>
                    </div>{{-- data-item --}}

                    <div class="data-item">
                      <div class="data-col">
                        <span class="data-label">E-mail</span>
                        <span class="data-value">{{ Auth::user()->email }}</span>
                      </div>
                      <div class="data-col data-col-end"><span class="data-more disable">
                          <em class="icon ni ni-lock-alt"></em>
                        </span>
                      </div>
                    </div>{{-- data-item --}}
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                      <div class="data-col">
                        <span class="data-label">Phone Number</span>
                        <span class="data-value text-soft">
                          @if (isset(Auth::user()->phone))
                          {{ Auth::user()->phone }}
                          @else
                          Not add yet
                          @endif
                        </span>
                      </div>
                      <div class="data-col data-col-end"><span class="data-more"><em
                            class="icon ni ni-forward-ios"></em></span></div>
                    </div>{{-- data-item --}}

                  </div>{{-- data-list --}}
                </div>{{-- .nk-block --}}
              </div>

              <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="card-inner-group" data-simplebar>
                  <div class="card-inner">
                    <div class="user-card">
                      @if (isset(Auth::user()->photo))
                      <div class="user-avatar">
                        <img src="{{ url('storage/app/public/imgs/users') . '/' . Auth::user()->photo }}"
                          alt="{{ Auth::user()->photo }}" />
                      </div>
                      @else
                      <div class="user-avatar bg-primary">
                        <span class="text-uppercase">{{ substr(Auth::user()->name, 0, 2) }}</span>
                      </div>
                      @endif

                      <div class="user-info">
                        <span class="lead-text">{{ Auth::user()->name }}</span>
                        <span class="sub-text">{{ Auth::user()->email }}</span>
                      </div>
                    </div>{{-- .user-card --}}
                  </div>{{-- .card-inner --}}

                  <div class="card-inner p-0">
                    <ul class="link-list-menu">
                      <li><a class="active" href="{{ route('admin.profile.index') }}"><em
                            class="icon ni ni-user-fill-c"></em><span> Personal Information</span></a>
                      </li>

                      <li><a href="{{ route('admin.profile.change_password') }}"><em
                            class="icon ni ni-lock-alt-fill"></em><span>Security
                            Settings</span></a>
                      </li>
                    </ul>
                  </div>{{-- .card-inner --}}
                </div>{{-- .card-inner-group --}}
              </div>{{-- card-aside --}}
            </div>{{-- .card-aside-wrap --}}
          </div>{{-- .card --}}
        </div>{{-- .nk-block --}}
      </div>
    </div>
  </div>
</div>

{{-- ==========================
===== MODALS
========================== --}}

<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
      <div class="modal-body modal-body-lg">
        <h5 class="title">Update Profile</h5>
        <ul class="nk-nav nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
          </li>

        </ul>{{-- .nav-tabs --}}
        <div class="tab-content">
          <div class="tab-pane active" id="personal">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row gy-4">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="full-name">Full Name</label>
                    <input type="text" class="form-control form-control-lg" id="full-name" name="name"
                      value="{{ Auth::user()->name }}" placeholder="Enter Full Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="phone-no">Phone Number</label>
                    <input type="text" class="form-control form-control-lg" id="phone-no" name="phone"
                      value="{{ Auth::user()->phone }}" placeholder="Phone Number">
                  </div>
                </div>

                <div class="col-md-6">
                  <input hidden name="oldProfile" value="{{ Auth::user()->profile_pic }}" />
                  <div class="form-group">
                    <label class="form-label" for="customFileLabel">Photo</label>
                    <div class="form-control-wrap">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="profilePic">
                        @error('profilePic')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                        <label class="custom-file-label" for="customFile">Choose
                          file</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                    <li>
                      <button type="submit" class="btn btn-lg btn-primary"> Update </button>
                    </li>
                    <li>
                      <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                    </li>
                  </ul>
                </div>
              </div>
            </form>
          </div>{{-- .tab-pane --}}

        </div>{{-- .tab-content --}}
      </div>{{-- .modal-body --}}
    </div>{{-- .modal-content --}}
  </div>{{-- .modal-dialog --}}
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
          ACTIVATE MODAL
          ====================
          */
          $('#activateMdl').on('show.bs.modal', function(e) {
          let button = $(e.relatedTarget);
          let id = button.data('employeeid');
          let nameEn = button.data('employeenameen');
          //console.log(id);
          var modal = $(this);
          modal.find('.modal-body #employee_id').val(id);
          modal.find('.modal-body #employee_nameen').html(nameEn);
          });
          /*
          ====================
          DEACTIVATE MODAL
          ====================
          */
          $('#deactivateMdl').on('show.bs.modal', function(e) {
          let button = $(e.relatedTarget);
          let id = button.data('employeeid');
          let nameEn = button.data('employeenameen');
          //console.log(id);
          var modal = $(this);
          modal.find('.modal-body #employee_Id').val(id);
          modal.find('.modal-body #employee_Nameen').html(nameEn);
          });
            /*
            ====================
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('employeeid');
                let nameEn = button.data('employeenameen');
                console.log(nameEn);
                var modal = $(this);
                modal.find('.modal-body #employeeId').val(id);
                modal.find('.modal-body #employeeNameen').html(nameEn);
            });

        });
</script>
@endsection
{{--
====================
====================
--}}