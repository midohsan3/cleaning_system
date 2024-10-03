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
                      <h4 class="nk-block-title">Security Settings</h4>
                      <div class="nk-block-des">
                        <p>These settings are helps you keep your account secure.
                        </p>
                      </div>
                    </div>
                    <div class="nk-block-head-content align-self-start d-lg-none">
                      <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em
                          class="icon ni ni-menu-alt-r"></em></a>
                    </div>
                  </div>
                </div>{{-- .nk-block-head --}}
                <div class="nk-block">
                  <div class="card">
                    <div class="card-inner-group">
                      <div class="card-inner">
                        <form action="{{ route('admin.profile.changePassword') }}" method="POST">
                          @csrf
                          <div class="row gy-4">
                            <div class="col-sm-8">
                              <div class="form-group">
                                <label class="form-label" for="oldPassword">Old Password</label>
                                <div class="form-control-wrap">
                                  <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                                    placeholder="Your Current Password" autocomplete="off" autofocus />
                                  @error('oldPassword')
                                  <span class="bg-danger text-white" role="alert">{{
                                    $message }}</span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row gy-4">
                            <div class="col-sm-8">
                              <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <div class="form-control-wrap">
                                  <input type="password" class="form-control" id="password" name="password"
                                    placeholder="New Password" autocomplete="off" />
                                  @error('password')
                                  <span class="bg-danger text-white" role="alert">{{
                                    $message }}</span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row gy-4">
                            <div class="col-sm-8">
                              <div class="form-group">
                                <label class="form-label" for="password-confirm">{{
                                  trans('users.Password Confirm')
                                  }}</label>
                                <div class="form-control-wrap">
                                  <input type="password" class="form-control" id="password-confirm"
                                    name="password_confirmation" placeholder="Confirm New Password"
                                    autocomplete="off" />
                                  @error('password')
                                  <span class="bg-danger text-white" role="alert">{{
                                    $message }}</span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row gy-4">
                            <div class="col-sm-3">
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Change</button>
                              </div>
                            </div>

                          </div>

                        </form>

                      </div>{{-- .card-inner --}}
                    </div>{{-- .card-inner-group --}}
                  </div>{{-- .card --}}
                </div>{{-- .nk-block --}}
              </div>{{-- .card-inner --}}

              <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="card-inner-group" data-simplebar>
                  <div class="card-inner">
                    <div class="user-card">
                      @if(isset(Auth::user()->photo))
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
                            class="icon ni ni-user-fill-c"></em><span>Personal
                            Information</span></a>
                      </li>

                      <li><a href="{{ route('admin.profile.change_password') }}"><em
                            class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a>
                      </li>
                    </ul>
                  </div>{{-- .card-inner --}}
                </div>{{-- .card-inner-group --}}
              </div>{{-- .card-aside-wrap --}}
            </div>{{-- .card --}}
          </div>{{-- .nk-block --}}
        </div>
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
        <h5 class="title">{{ trans('users.Update Profile') }}</h5>
        <ul class="nk-nav nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#personal">{{ trans('users.Personal')
              }}</a>
          </li>

        </ul><!-- .nav-tabs -->
        <div class="tab-content">
          <div class="tab-pane active" id="personal">
            <form>
              <div class="row gy-4">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="full-name">{{ trans('users.Full Name')
                      }}</label>
                    <input type="text" class="form-control form-control-lg" id="full-name"
                      value="{{ Auth::user()->name }}" placeholder="{{ trans('users.Enter Full Name') }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="phone-no">{{ trans('users.Phone Number')
                      }}</label>
                    <input type="text" class="form-control form-control-lg" id="phone-no"
                      value="{{ Auth::user()->phone }}" placeholder="{{ trans('users.Phone Number') }}">
                  </div>
                </div>

                <div class="col-12">
                  <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                    <li>
                      <a href="#" class="btn btn-lg btn-primary">{{ trans('users.Update
                        Profile') }}</a>
                    </li>
                    <li>
                      <a href="#" data-dismiss="modal" class="link link-light">{{
                        trans('users.Cancel') }}</a>
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