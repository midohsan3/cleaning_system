@extends('layouts.admin')
{{--
====================
====================
--}}
@section('pag-title')
Dashboard
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
               <div class="nk-block-between">
                  <div class="nk-block-head-content">
                     <h3 class="nk-block-title page-title">Dashboard</h3>
                  </div><!-- .nk-block-head-content -->
                  <div class="nk-block-head-content">
                     <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger
                            toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                           <ul class="nk-block-tools g-3">
                              <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni
                                    ni-reports"></em><span>Reports</span></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="nk-block">
               <div class="row g-gs">

                  <div class="col-xxl-3 col-sm-6">
                     <div class="card">
                        <div class="nk-ecwg nk-ecwg6">
                           <div class="card-inner">
                              <div class="card-title-group">
                                 <div class="card-title">
                                    <h6 class="title">Current Month Revenue</h6>
                                 </div>
                              </div>
                              <div class="data">
                                 <div class="data-group">
                                    <div class="amount">{{ number_format($monthly_revenue,2) }} AED</div>
                                    <div class="nk-ecwg6-ck">
                                       <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas>
                                    </div>
                                 </div>
                                 <div class="info"><span class="change up
                                    text-danger">{{ $weekly_revenue,2 }} AED</span><span>
                                       This week</span></div>
                              </div>
                           </div>
                        </div>
                     </div><!-- .card -->
                  </div>

                  <div class="col-xxl-3 col-sm-6">
                     <div class="card">
                        <div class="nk-ecwg nk-ecwg6">
                           <div class="card-inner">
                              <div class="card-title-group">
                                 <div class="card-title">
                                    <h6 class="title">New Booking</h6>
                                 </div>
                              </div>
                              <div class="data">
                                 <div class="data-group">
                                    <div class="amount">{{ $new_booking }}</div>
                                    <div class="nk-ecwg6-ck">
                                       <canvas class="ecommerce-line-chart-s3" id="todayRevenue"></canvas>
                                    </div>
                                 </div>
                                 <div class="info"><span class="change down
                                    text-warning">Need To Confirm</span></span></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-xxl-3 col-sm-6">
                     <div class="card">
                        <div class="nk-ecwg nk-ecwg6">
                           <div class="card-inner">
                              <div class="card-title-group">
                                 <div class="card-title">
                                    <h6 class="title">Services</h6>
                                 </div>
                              </div>
                              <div class="data">
                                 <div class="data-group">
                                    <div class="amount">{{ $services }}</div>
                                    <div class="nk-ecwg6-ck">
                                       <canvas class="ecommerce-line-chart-s3" id="todayCustomers"></canvas>
                                    </div>
                                 </div>
                                 <div class="info"><span class="change up
                                    text-danger"></span><span>
                                       Active In System</span></div>
                              </div>
                           </div><!-- .card-inner -->
                        </div><!-- .nk-ecwg -->
                     </div><!-- .card -->
                  </div>

                  <div class="col-xxl-3 col-sm-6">
                     <div class="card">
                        <div class="nk-ecwg nk-ecwg6">
                           <div class="card-inner">
                              <div class="card-title-group">
                                 <div class="card-title">
                                    <h6 class="title">Cleaners</h6>
                                 </div>
                              </div>
                              <div class="data">
                                 <div class="data-group">
                                    <div class="amount">{{ $cleaners }}</div>
                                    <div class="nk-ecwg6-ck">
                                       <canvas class="ecommerce-line-chart-s3" id="todayVisitors"></canvas>
                                    </div>
                                 </div>
                                 <div class="info"><span class="change down
                                    text-danger"></span><span>
                                       Total in System</span></div>
                              </div>
                           </div><!-- .card-inner -->
                        </div><!-- .nk-ecwg -->
                     </div><!-- .card -->
                  </div>

                  <div class="col-xxl-6">
                     <div class="card card-full">
                        <div class="nk-ecwg nk-ecwg8 h-100">
                           <div class="card-inner">
                              <div class="card-title-group mb-3">
                                 <div class="card-title">
                                    <h6 class="title">Sales Statistics</h6>
                                 </div>
                                 <div class="card-tools">
                                    <div class="dropdown">
                                       Monthly
                                    </div>
                                 </div>
                              </div>
                              <ul class="nk-ecwg8-legends">
                                 <li>
                                    <div class="title">
                                       <span class="dot dot-lg sq" data-bg="#6576ff"></span>
                                       <span>Total Booking</span>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="title">
                                       <span class="dot dot-lg sq" data-bg="#eb6459"></span>
                                       <span>Canceled Booking</span>
                                    </div>
                                 </li>
                              </ul>
                              <div id="curve_chart" style="width: 100%;"></div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class=" col-xxl-3 col-md-6">
                     <div class="card card-full overflow-hidden">
                        <div class="nk-ecwg nk-ecwg7 h-100">
                           <div class="card-inner flex-grow-1">
                              <h4>Booking Statistics</h4>
                              <canvas id="bookingPie"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-xxl-3 col-md-6">
                     <div class="card h-100">
                        <div class="card-inner">
                           <div class="card-title-group mb-2">
                              <div class="card-title">
                                 <h6 class="title">Statistics</h6>
                              </div>
                           </div>
                           <ul class="nk-store-statistics">
                              <li class="item">
                                 <div class="info">
                                    <div class="title">Booking</div>
                                    <div class="count">{{ number_format($totalBooking,0) }}</div>
                                 </div>
                                 <em class="icon bg-primary-dim ni ni-bag"></em>
                              </li>
                              <li class="item">
                                 <div class="info">
                                    <div class="title">Booking Waiting Approve </div>
                                    <div class="count">{{ number_format($new_booking,0) }}</div>
                                 </div>
                                 <em class="icon bg-info-dim ni ni-users"></em>
                              </li>
                              <li class="item">
                                 <div class="info">
                                    <div class="title">Booking In Schedule</div>
                                    <div class="count">{{ number_format($scheduleBooking,0) }}</div>
                                 </div>
                                 <em class="icon bg-pink-dim ni ni-box"></em>
                              </li>
                              <li class="item">
                                 <div class="info">
                                    <div class="title">Total Customers</div>
                                    <div class="count">{{ $totalCustomers }}</div>
                                 </div>
                                 <em class="icon bg-purple-dim ni ni-server"></em>
                              </li>
                           </ul>
                        </div><!-- .card-inner -->
                     </div><!-- .card -->
                  </div>

                  <div class="col-xxl-8">
                     <div class="card card-full">
                        <div class="card-inner">
                           <div class="card-title-group">
                              <div class="card-title">
                                 <h6 class="title">Recent Booking</h6>
                              </div>
                           </div>
                        </div>
                        @if ($last_booking->count()>0)
                        <div class="nk-tb-list mt-n2">
                           <div class="nk-tb-item nk-tb-head">
                              <div class="nk-tb-col"><span>Order No.</span></div>
                              <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                              <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                              <div class="nk-tb-col"><span>Amount</span></div>
                              <div class="nk-tb-col"><span class="d-none
                                                             d-sm-inline">Status</span></div>
                           </div>
                           @foreach ($last_booking as $booking)
                           <div class="nk-tb-item">
                              <div class="nk-tb-col">
                                 <span class="tb-lead"><a href="#">{{ $booking->ref_no }}</a></span>
                              </div>
                              <div class="nk-tb-col tb-col-sm">
                                 <div class="user-card">
                                    <div class="user-avatar sm bg-purple-dim">
                                       <span>AB</span>
                                    </div>
                                    <div class="user-name">
                                       <span class="tb-lead">{{Str::limit ($booking->userWBooking->name,10) }}</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="nk-tb-col tb-col-md">
                                 <span class="tb-sub">
                                    {{ date('d/m/Y',strtotime($booking->created_at)) }}
                                 </span>
                              </div>
                              <div class="nk-tb-col">
                                 <span class="tb-sub tb-amount">{{ number_format($booking->total,2) }}
                                    <span>AED</span></span>
                              </div>

                              <div class="nk-tb-col">
                                 @if ($booking->status==0)
                                 <span class="badge badge-dot badge-dot-xs badge-primary">New</span>
                                 @elseif($booking->status==1)
                                 <span class="badge badge-dot badge-dot-xs badge-info">Approved</span>
                                 @elseif($booking->status==2)
                                 <span class="badge badge-dot badge-dot-xs badge-warning">In Schedule</span>
                                 @elseif($booking->status==3)
                                 <span class="badge badge-dot badge-dot-xs badge-success">Completed</span>
                                 @elseif($booking->status==4)
                                 <span class="badge badge-dot badge-dot-xs badge-danger">Canceled</span>
                                 @endif

                              </div>
                           </div>
                           @endforeach
                        </div>
                        @endif

                     </div>
                  </div>
                  <!-- .col -->
               </div><!-- .row -->
            </div><!-- .nk-block -->
         </div>
      </div>
   </div>
</div>
@endsection
{{--
====================
====================
--}}
@section('page-scripts')
{{--
<script src="{{ asset('admin/js/charts/chart-ecommerce.js?ver=2.4.0') }}"></script>
--}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
   google.charts.load('current', {
            'packages': ['corechart']
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Month', 'Completed', 'Canceled']
              , ['Jan', {{ $jan_revenue }}, {{ $jan_loss }}]
              , ['Feb', {{ $feb_revenue }}, {{ $feb_loss }}]
              , ['Mar', {{ $mar_revenue }}, {{ $mar_loss }}]
              , ['Apr', {{ $apr_revenue }}, {{ $apr_loss }}]
              , ['May', {{ $may_revenue }}, {{ $may_loss }}]
              , ['Jun', {{ $jun_revenue }}, {{ $jun_loss }}]
              , ['Jul', {{ $jul_revenue }}, {{ $jul_loss }}]
              , ['Agu', {{ $aug_revenue }}, {{ $aug_loss }}]
              , ['Sep', {{ $sep_revenue }}, {{ $sep_loss }}]
              , ['Oct', {{ $oct_revenue }}, {{ $oct_loss }}]
              , ['Nov', {{ $nov_revenue }}, {{ $nov_loss }}]
              , ['Dec', {{ $dec_revenue }}, {{ $dec_loss }}]
            ]);

            var options = {
              curveType: 'function'
              , legend: {
                position: 'bottom'
              }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
          }

</script>

<script>
   const ctx = document.getElementById('bookingPie');

          new Chart(ctx, {
            type: 'doughnut'
            , data: {
              labels: [
                'Complete'
                , 'In Schedule'
                , 'Canceled'
              ]
              , datasets: [{
                data: [
                    {{ $totalBooking }},{{ $scheduleBooking }},{{ $canceledBooking }}]
                , backgroundColor: [
                  'rgb(129, 107, 255)'
                  , 'rgb(19, 201, 242)'
                  , 'rgb(255, 99, 132)'
                ]
                , hoverOffset: 3
              }]
            },

          });

</script>


@endsection
{{--
====================
====================
--}}