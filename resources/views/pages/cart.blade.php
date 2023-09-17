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
<div class="row container cart_wrapper" id="wrapper">
   @include('pages.include.cart-component')
</div>
@endsection