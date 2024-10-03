@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Service
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
              <h3 class="nk-block-title page-title">Service /
                <strong class="text-primary small">
                  {{$service->name_en}}
                </strong>
              </h3>
              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Submitted At: <span class="text-base">{{ date('d M, Y', strtotime($service->created_at)) }}</span>
                  </li>
                </ul>
              </div>

            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('admin.service.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em><span>Back</span>
              </a>

              <a href="{{ route('admin.service.index') }}"
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
                      <h5 class="title">Main Information</h5>
                      <p>Available Information in Our Platform</p>
                    </div>
                    <div class="profile-ud-list">

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">English Name </span>
                          <span class="profile-ud-value">
                            {{$service->name_en}}
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Arabic Name </span>
                          <span class="profile-ud-value">{{ $service->name_ar }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">Status</span>
                          <span class="profile-ud-value">
                            @if ($service->status==1)
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
                            class="profile-ud-value">{{ date('M-d-Y  h:m:a',strtotime($service->created_at)) }}</span>
                        </div>
                      </div>

                    </div>
                  </div>

                  <hr class="preview-hr" />

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">
                        Meta
                      </h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p>
                            =========
                          </p>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">
                        Key Words
                      </h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p>
                            =========
                          </p>
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