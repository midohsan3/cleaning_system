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
          <img src="./images/logo-dark.png" srcset="{{ url('imgs/logo.JPG') }} 2x" alt="">
        </div>
        <div class="invoice-head">
          <div class="invoice-contact">
            <span class="overline-title">Invoice To</span>
            <div class="invoice-contact-info">
              <h4 class="title">Gregory Anderson</h4>
              <ul class="list-plain">
                <li><em class="icon ni ni-map-pin-fill
                                            fs-18px"></em><span>House #65, 4328
                    Marion Street<br>Newbury, VT 05051</span></li>
                <li><em class="icon ni ni-call-fill
                                            fs-14px"></em><span>+012 8764 556</span></li>
              </ul>
            </div>
          </div>
          <div class="invoice-desc">
            <h3 class="title">Invoice</h3>
            <ul class="list-plain">
              <li class="invoice-id"><span>Invoice ID</span>:<span>66K5W3</span></li>
              <li class="invoice-date"><span>Date</span>:<span>26
                  Jan, 2020</span></li>
            </ul>
          </div>
        </div><!-- .invoice-head -->
        <div class="invoice-bills">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="w-150px">Item ID</th>
                  <th class="w-60">Description</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>24108054</td>
                  <td>Dashlite - Conceptual App Dashboard
                    - Regular License</td>
                  <td>$40.00</td>
                  <td>5</td>
                  <td>$200.00</td>
                </tr>
                <tr>
                  <td>24108054</td>
                  <td>6 months premium support</td>
                  <td>$25.00</td>
                  <td>1</td>
                  <td>$25.00</td>
                </tr>
                <tr>
                  <td>23604094</td>
                  <td>Invest Management Dashboard -
                    Regular License</td>
                  <td>$131.25</td>
                  <td>1</td>
                  <td>$131.25</td>
                </tr>
                <tr>
                  <td>23604094</td>
                  <td>6 months premium support</td>
                  <td>$78.75</td>
                  <td>1</td>
                  <td>$78.75</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">Subtotal</td>
                  <td>$435.00</td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">Processing fee</td>
                  <td>$10.00</td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">TAX</td>
                  <td>$43.50</td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">Grand Total</td>
                  <td>$478.50</td>
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