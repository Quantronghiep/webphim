@extends('admin.layouts.master')
@section('title', 'Thống kê')
@section('content') 

<style type="text/css">
  p.title_thongke{
    text-align: center;
    font-size: 20px;
    font-weight: bold;
  }
</style>

  <!-- Main content -->
    <div class="container-fluid ">
      <!-- Small boxes (Stat box) -->
      <div class="row justify-content-center ">
        <p class="title_thongke ">Thống kê doanh thu</p>

        <div class="col-md-12">
          <form action="" autocomplete="off">
          <div class="row">
              @csrf 
              <div class="col-md-2">
                <p>Từ ngày <input type="text" id="datepicker" class="form-control"></p>
                <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
              </div>
              <div class="col-md-2">
                <p>Đến ngày <input type="text" id="datepicker2" class="form-control"></p>
              </div>
              <div class="col-md-2">
                <p>Lọc theo:
                  <select class="dashboard-filter form-control" name="" id="">
                    <option value="">--Chọn--</option>
                    <option value="7ngay">7 ngày qua</option>
                    <option value="thangtruoc">Tháng trước</option>
                    <option value="thangnay">Tháng này</option>
                    <option value="365ngayqua">365 ngày qua</option>
                  </select>
                </p>
              </div>
          </div>
            </form>
        </div>
        <div class="col-md-12">
            <div id="myfirstchart" style="height:250px;"></div>
        </div>
      </div>
    </div>
    
@endsection