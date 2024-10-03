<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js" @if (App::getLocale()=='ar' ) dir="rtl" @else
  dir="ltr" @endif>

<head>
  <meta charset="utf-8">
  <meta name="author" content="Smart-Solutions">
  <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
  <meta name="description" content="Online Shopping">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Fav Icon  -->
  <link rel="shortcut icon" href="{{ url('imgs/logo.png') }}">
  <!-- Page Title  -->
  <title> @yield('pag-title','Smart-Solutions Cleaning') </title>
  <!-- StyleSheets  -->

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  @if(app()->getLocale()=='ar')
  <link rel="stylesheet" href="{{ asset('admin/css/dashlite.rtl.css?ver=2.4.0') }}">
  @else
  <link rel="stylesheet" href="{{ asset('admin/css/dashlite.css?ver=2.4.0') }}">
  @endif

  <link id="skin-default" rel="stylesheet" href="{{ asset('admin/css/theme.css?ver=2.4.0') }}">

  <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


  @yield('page-styles')
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

</head>

<body class="bg-white" onload="printPromot()">
  <div class="nk-block">
    <div class="invoice invoice-print">
      <div class="invoice-wrap">
        <div class="invoice-brand text-center">
          <img src="{{ url('imgs/logo.JPG') }}" srcset="{{ url('imgs/logo.JPG') }} 2x" alt="">
        </div>
        <div class="invoice-head">
          <div class="invoice-contact">
            <span class="overline-title">Invoice To</span>
            <div class="invoice-contact-info">
              <h4 class="title">{{ $bill->userWBill->name }}</h4>
              <ul class="list-plain">
                <li><em class="icon ni ni-map-pin-fill fs-16px"></em>
                  <span>{{$bill->bookingWBill->address}}</span>
                </li>
                <li><em class="icon ni ni-call-fill fs-14px"></em><span>{{ $bill->userWBill->phone }}</span></li>
              </ul>
            </div>
          </div>
          <div class="invoice-desc">
            <h3 class="title">Invoice</h3>
            <ul class="list-plain">
              <li class="invoice-id"><span>Invoice ID</span>:<span>{{ $bill->bill_no }}</span></li>
              <li class="invoice-date"><span>Date</span>:<span>{{ date('d M, Y',strtotime($bill->created_at))}}</span>
              </li>
            </ul>
          </div>
        </div><!-- .invoice-head -->
        <div class="invoice-bills">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th class="w-60">Description</th>
                  <th>Price</th>
                  <th>Duration</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td>{{ $bill->bookingWBill->serviceWBooking->name_en }}</td>

                  @if ($bill->bookingWBill->hours>0)
                  <td>{{ number_format(($bill->bookingWBill->serviceWBooking->h_price),2) }} AED</td>
                  <td>{{ $bill->bookingWBill->hours }} Hours</td>
                  @elseif($bill->bookingWBill->days>0)
                  <td>{{ number_format(($bill->bookingWBill->serviceWBooking->d_price),2) }} AED</td>
                  <td>{{ $bill->bookingWBill->days }} Days</td>
                  @elseif($bill->bookingWBill->months>0)
                  <td>{{ number_format(($bill->bookingWBill->serviceWBooking->m_price),2) }} AED</td>
                  <td>{{ $bill->bookingWBill->months }} Months</td>
                  @endif
                  <td>{{ $bill->bookingWBill->total }} AED</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">Total</td>
                  <td>{{ number_format($bill->total,2) }} AED</td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">Discount</td>
                  <td>{{ number_format($bill->discount,2) }}</td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">TAX</td>
                  <td>0.00 AED</td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">Grand Total</td>
                  <td>{{ number_format($bill->discount,2) }} AED</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div><!-- .invoice-bills -->
      </div><!-- .invoice-wrap -->
    </div><!-- .invoice -->
  </div><!-- .nk-block -->
  <script>
    function printPromot() {
            window.print();
        }
  </script>
</body>

</html>