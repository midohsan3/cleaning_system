@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Edit Transaction
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
              <h3 class="nk-block-title page-title">Edit
                <strong class="text-primary small">Transaction</strong>
              </h3>

              <div class="nk-block-des text-soft">
                <ul class="list-inline">
                  <li>Created At: <span class="text-base">{{ date('d M Y h:i A',strtotime($cash->created_at)) }}</span>
                  </li>
                </ul>
              </div>
            </div>

            <div class="nk-block-head-content">
              <a href="{{ route('admin.cash.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>Back</span>
              </a>

              <a href="{{ route('admin.cash.index') }}"
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
                <span class="preview-title-lg overline-title">Transaction Information</span>
                <form action="{{ route('admin.cash.update') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input hidden name="cash" value="{{$cash->id}}" />
                  <div class="row gy-4">
                    <div class="col-6">
                      <div class="form-group">
                        <label class="form-label" for="deposit">Deposit</label>
                        <div class="form-control-wrap">
                          <input class="form-control form-control-sm" id="deposit" name="deposit"
                            value="{{ old('amount',number_format($cash->deposit,2)) }}" placeholder="0.00" />
                          @error('deposit')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label class="form-label" for="credit">Credit</label>
                        <div class="form-control-wrap">
                          <input class="form-control form-control-sm" id="credit" name="credit"
                            value="{{ old('amount',number_format($cash->credit,2)) }}" placeholder="0.00" readonly />
                          @error('credit')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control" id="description" name="description"
                            placeholder="Description here">{{ old('description',$cash->transaction) }}</textarea>
                          @error('description')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-sm btn-primary" value="Update" />
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