<h1>Giỏ phim</h1>
<table class="table" style="margin-top: 10px">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
            $total = 0  ;
        @endphp 
        @foreach($carts as $id => $cart)
            @php
                $total += $cart['price'];
            @endphp
            <tr>
                <th scope="row">{{$id}}</th>
                <td><img style="width:50px; height=50px; object-fit:contain" src="{{asset('uploads/movies/' . $cart['image'])}}" alt=""></td>
                <td>{{$cart['title']}}</td>
                <td>{{number_format($cart['price'])}} VNĐ</td>
                <td>
                    {{-- <a class="btn btn-info btn-sm px-3" href="">Cập nhật</a> --}}
                    <a class="btn btn-danger btn-sm px-3 cart_delete" data-id ="{{$id}}" href="">Xóa</a>
                </td>
            </tr>
        @endforeach
        @php
            session()->put('total',$total);
        @endphp
    </tbody>
  </table>
  <div class="col-md-12">
    <h4>Tiền phải thanh toán = {{number_format($total)}} VNĐ</h4>
    <div class="">
        <form action="{{url('/vnpay_payment')}}" method="POST">
            @csrf
            <button type="submit" name="redirect" class="btn btn-default">Thanh toán VNPay</button>
        </form>
    </div>
  </div>