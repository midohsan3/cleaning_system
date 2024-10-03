@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Skills
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
              <h3 class="nk-block-title page-title">Skill /
                <strong class="text-primary small">
                  {{$skill->name_en}}
                </strong>
              </h3>
              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>{{ __('general.Submitted At') }}: <span
                      class="text-base">{{ date('d M, Y', strtotime($skill->created_at)) }}</span></li>
                </ul>
              </div>
            </div>

            <div class="nk-block-head-content">
              <a href="{{ route('admin.skill.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em><span>Back</span>
              </a>

              <a href="{{ route('admin.skill.index') }}"
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

                    @if ($actions->count()>0)
                    <div class="nk-block card card-bordered">
                      <table class="table table-ulogs">
                        <thead class="thead-light">
                          <tr>
                            <th class="tb-col-os"><span class="overline-title">Action<span class="d-sm-none">/
                                  IP</span></span></th>
                            <th class="tb-col-ip"><span class="overline-title">User</span></th>
                            <th class="tb-col-time"><span class="overline-title">Date</span></th>
                            <th class="tb-col-time"><span class="overline-title">Time</span></th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach ($actions as $action)
                          <tr>
                            <td class="tb-col-os">
                              {{ $action->action }}
                            </td>
                            <td class="tb-col-ip"><span class="sub-text">
                                {{ $action->userWSkillHistory->name }}
                              </span></td>
                            <td class="tb-col-time"><span
                                class="sub-text">{{ date('d M Y',strtotime($action->created_at)) }}</span></td>
                            <td class="tb-col-time"><span
                                class="sub-text">{{ date('h:i A',strtotime($action->created_at)) }}</span></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      <div class="card">
                        <div class="card-inner">
                          <div class="nk-block-between-md g-3">
                            <div class="g">
                              {{ $actions->links('pagination::bootstrap-5') }}
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    @else
                    <div class="card">
                      <div class="card-inner">
                        <div class="nk-block d-flex justify-content-center g-3">
                          <div class="g">
                            <span class="text-danger">No Data Available To Show</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
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