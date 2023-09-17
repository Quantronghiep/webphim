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
@if(!empty($orders))
<div class="row container cart_wrapper" id="wrapper">
    <h1 >Lịch sử giao dịch</h1>
    <table class="table" style="margin-top: 10px">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
        <tbody>
            @php
                $total = 0  ;
            @endphp 
            @foreach($orders as $id => $order)
                @php
                    $total += $order->movie_price;
                @endphp
                <tr>
                    <td><img style="width:50px; height=50px; object-fit:contain" src="{{asset('uploads/movies/' . $order->movie_image)}}" alt=""></td>
                    <td>
                        <a href="{{route('movie',$order->movie_slug)}}" title="{{$order->movie_title}}">{{$order->movie_title}}</a>
                    </td>
                    <td>{{number_format($order->movie_price)}} VNĐ</td>
                    <td>{{ date('d-m-Y H:i:s', strtotime($order->created_at))}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class="col-md-12">
            <h4>Tổng tiền đã thanh toán = {{number_format($total)}} VNĐ</h4>
        </div>
</div>
@else
    <h1>Không có lịch sử giao dịch</h1>
@endif
@endsection