@extends('layouts.admin')
{{-- 
  ====================
  ====================
  --}}
@section('pag-title')
Cash
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
              <h3 class="nk-block-title page-title">Cash <span>&nbsp;</span>
                @if ($total>0)
                <span class="fs-15px text-success">
                  Available Balance To Use &nbsp;<span>{{ number_format($total,2) }}</span><span>AED</span>
                  @else
                  <span class="fs-15px text-danger">
                    No Enough Balance Over Balance Is &nbsp; {{ number_format($total,2) }}<span>AED</span>
                    @endif
                  </span>
              </h3>
              <div class="nk-block-des text-soft">
                <p></p>
              </div>
            </div>

            <div class="nk-block-head-content">

              <div class="toggle-wrap nk-block-tools-toggle">

                <a href="#" class="btn btn-sm btn-trigger toggle-expand mr-n1" data-target="more-options">
                  <em class="icon ni ni-more-v"></em><span>Deposit</span>
                </a>

                <div class="toggle-expand-content" data-content="more-options">
                  <ul class="nk-block-tools g-3">
                    <li class="nk-block-tools-opt">
                      <a href="#" data-toggle="modal" data-target="#depositMdl"
                        class="btn btn-icon btn-success  d-md-none"><em class="icon ni ni-plus"></em></a>

                      <a href="#" data-toggle="modal" data-target="#depositMdl"
                        class="btn btn-sm btn-success d-none d-md-inline-flex"><em
                          class="icon ni ni-plus"></em><span>Deposit</span></a>
                    </li>

                    <li class="nk-block-tools-opt">
                      <a href="====" class="btn btn-icon btn-danger d-md-none"><em class="icon ni ni-plus"></em></a>

                      <a href="===" class="btn btn-sm btn-danger d-none d-md-inline-flex"><em
                          class="icon ni ni-plus"></em><span>Expenses</span></a>
                    </li>

                  </ul>
                </div>

              </div>
            </div>{{-- .nk-block-head-content --}}
          </div>{{-- .nk-block-between --}}
        </div>{{-- .nk-block-head --}}

        <div class="nk-block">
          @if ($cash->count()>0)
          <table class="nk-tb-list is-separate mb-3">
            <thead>
              <tr class="nk-tb-item nk-tb-head">
                <th class="nk-tb-col "><span class="sub-text">Date</span></th>
                <th class="nk-tb-col"><span class="sub-text">Transaction</span></th>
                <th class="nk-tb-col "><span class="sub-text">Deposit</span></th>
                <th class="nk-tb-col"><span class="sub-text">Credit</span></th>

                <th class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1 my-n1">
                    <li>
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">
                            <li><a href="#">
                                <em class="icon ni ni-trash"></em><span>Delete</span>
                              </a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cash as $transaction)
              <tr class="nk-tb-item h-max-50">
                <td class="nk-tb-col">
                  <span>{{date('d M Y',strtotime($transaction->created_at))  }}</span>
                </td>

                <td class="nk-tb-col">
                  <div class="title">
                    {{ $transaction->transaction }}
                  </div>
                </td>

                <td class="nk-tb-col">
                  <span class="tb-amount">
                    {{number_format ($transaction->deposit,2) }}
                  </span>
                </td>

                <td class="nk-tb-col">
                  <span class="tb-amount">
                    {{number_format ($transaction->credit,2) }}
                  </span>
                </td>

                <td class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1">
                    <li class="nk-tb-action-hidden">
                      <a href="{{route('admin.cash.edit',$transaction->id)}}" class="btn btn-trigger btn-icon"
                        data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="icon fal fa-edit text-success"></i>
                      </a>
                    </li>

                    @if ($transaction->deposit>0)
                    <li class="nk-tb-action-hidden">
                      <a href="#" class="btn btn-trigger btn-icon" data-placement="top" title="Delete"
                        data-transactionid="{{ $transaction->id }}" data-toggle="modal" data-target="#deleteMdl">
                        <i class="icon fal fa-trash-alt text-danger"></i>
                      </a>
                    </li>
                    @endif


                    <li>
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">

                            <li><a href="#" class="text-primary">
                                <em class="icon ni ni-eye"></em>
                                <span>View Details</span>
                              </a></li>

                            <li><a href="{{route('admin.cash.edit',$transaction->id)}}" class="text-success">
                                <i class="icon fal fa-edit"></i>
                                <span>Edit</span>
                              </a></li>

                            <li class="divider"></li>

                            @if ($transaction->deposit>0)
                            <li><a href="#" data-transactionid="{{ $transaction->id }}" class="text-danger"
                                data-toggle="modal" data-target="#deleteMdl">
                                <i class="icon fal fa-trash-alt"></i>
                                <span>Delete</span>
                              </a></li>
                            @endif


                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>

          <div class="card">
            <div class="card-inner">
              <div class="nk-block-between-md g-3">
                <div class="g">
                  {{ $cash->links('pagination::bootstrap-5') }}
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="card bg-danger">
            <div class="card-inner">
              <div class="nk-block d-flex justify-content-center g-3">
                <div class="g">
                  <span class="text-white">No Data Available To Show</span>
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

{{-- ==========================
        ===== MODALS
        ========================== --}}
{{-- ==========================
                =====DEPOSIT MODAL
                ========================== --}}

<div class="modal fade zoon" tabindex="-1" id="depositMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="Close">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Deposit</h5>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.cash.deposit')}}" method="POST">
          @csrf
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <label class="form-label" for="amount">Amount</label>
                <div class="form-control-wrap">
                  <input class="form-control" id="amount" name="amount" value="{{ old('amount') }}"
                    placeholder="0.00" />
                  @error('amount')
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
                    placeholder="Description here">{{ old('description') }}</textarea>
                  @error('description')
                  <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-primary sm">
        <span class="sub-text"></span>
      </div>
    </div>
  </div>
</div>


{{-- ==========================
                =====DELETE MODAL
                ========================== --}}

<div class="modal fade zoon" tabindex="-1" id="deleteMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="Close">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Delete</h5>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.cash.destroy')}}" method="POST">
          @csrf
          <input hidden id="transactionId" name="transactionID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              Are You Sure You Want Delete
              <strong>
                <span >Transaction?</span>
              </strong>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>

                  <button type="submit" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-primary sm">
        <span class="sub-text"></span>
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
<script>
  'use strict';
        $(function() {      

          
            /*
            ====================
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('transactionid');
                //console.log(nameEn);
                var modal = $(this);
                modal.find('.modal-body #transactionId').val(id);
            });

        });
</script>
@endsection
{{-- 
    ====================
    ====================
    --}}