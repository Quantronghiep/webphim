@extends('layout')
@section('content')
<style>
    h1{
        margin-left: 20px;
    }
		
    table , th, td {
            padding: 5px 30px;      
            border: 1px solid black;
            border-collapse: collapse;
            }
        th {
            text-align: center;
            }
</style>
@if(!empty($registerMonth))
<div class="row container cart_wrapper" id="wrapper">
    <h1 >Lịch sử đăng kí tháng</h1>
    <table class="table" style="margin-top: 10px">
        <thead>
          <tr>
            <th scope="col">Tháng</th>
            <th scope="col">Price</th>
            <th scope="col">Ngày đăng kí</th>
            <th scope="col">Ngày hết hạn</th>
          </tr>
        </thead>
        <tbody>
            @foreach($registerMonth as $id => $order)
                <tr>
                    <td>{{date('m', strtotime($order->registration_date))}} - {{date('m', strtotime($order->expiration_date))}}</td>
                    <td>{{number_format($order->price)}} VNĐ</td>
                    <td>{{date('d-m-Y', strtotime($order->registration_date))}}
                    </td>
                    <td>{{date('d-m-Y', strtotime($order->expiration_date))}}
                        @if(date('Y-m-d', strtotime($order->expiration_date)) == $now) 
                        <a> <form action="{{route('vnpayPaymentMonth')}}" method="POST">
                            @csrf
                            <button type="submit"class="btn btn-danger btn-sm px-3" name="redirect">Gia hạn</button>
                        </form></a>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{-- <div class="col-md-12">
            <h4>Tổng tiền đã thanh toán = {{number_format($total)}} VNĐ</h4>
        </div> --}}
</div>
@else
    <h1>Không có lịch sử giao dịch</h1>
@endif
@endsection