@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> All Vouchers</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">

              
              <tr>
                <th>
                 Payee Name
                </th>
                <th>
                  Station
                </th>
                <th>
                  Amount
                </th>
                <th class="text-center">
                  Date
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($vouchers as $voucher)
              <tr>
                <td>
                  {{ $voucher->payee }}
                </td>
                <td>
                  {{ $voucher->station }}
                </td>
                <td>
                  {{ $voucher->payment_amount }}
                </td>
                <td class="text-center">
                  {{ $voucher->payment_date }}
                </td>
                {{-- <td><a href="{{ route('pages.voucher.print_voucher') }}">View</a></td> --}}
                <td><a href="{{ route('pages.voucher.print_voucher', ['id' => $voucher->id]) }}">View</a></td>
                
              </tr>
            
              @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
 </div>
@endsection
