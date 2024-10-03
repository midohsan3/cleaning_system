@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
{{ $bill->bill_no }}
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
              <h3 class="nk-block-title page-title">Invoice <strong
                  class="text-primary small">{{ $bill->bill_no }}</strong>
              </h3>
              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Created At: <span class="text-base">{{ date('d M, Y h:i A',strtotime($bill->created_at)) }}</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('admin.booking.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                  class="icon ni ni-arrow-left"></em><span>Back</span></a>
              <a href="{{ route('admin.booking.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                  class="icon ni ni-arrow-left"></em></a>
            </div>
          </div>
        </div>

        <div class="nk-block">
          <div class="invoice">
            <div class="invoice-action">
              <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary"
                href="{{ route('admin.booking.printBill',$bill->id) }}" target="_blank"><em
                  class="icon ni ni-printer-fill"></em></a>
            </div><!-- .invoice-actions -->
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
                      <li><em class="icon ni ni-map-pin-fill"></em><span>{{$bill->bookingWBill->address}}</span>
                      </li>
                      <li><em class="icon ni ni-call-fill"></em><span>{{ $bill->userWBill->phone }}</span></li>
                    </ul>
                  </div>
                </div>

                <div class="invoice-desc">
                  <h3 class="title">Invoice</h3>
                  <ul class="list-plain">
                    <li class="invoice-id"><span>Invoice ID</span>:<span>{{ $bill->bill_no }}</span></li>
                    <li class="invoice-date">
                      <span>Date</span>:<span>{{ date('d M, Y',strtotime($bill->created_at))}}</span>
                    </li>
                  </ul>
                </div>

              </div>

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
                  <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid
                    without the signature and seal. </div>
                </div>
              </div><!-- .invoice-bills -->
            </div><!-- .invoice-wrap -->
          </div><!-- .invoice -->
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