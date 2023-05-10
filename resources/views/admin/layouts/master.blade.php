<!DOCTYPE html>
<html lang="en">
<head>
  <base href="{{asset('/')}}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>@yield('title')</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- Toastr -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="  //cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    {{-- <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div> --}}
@include('admin.layouts.header')

  <!-- Main Sidebar Container -->
@include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
{{-- @include('admin.layouts.content_header') --}}
@include('admin.layouts.thongke')

    @yield('content')
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('admin/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>
<script type="text/javascript">

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
</script>

// show phim theo tap 
<script>
  $('.show_video').click(function(){
    var movie_id = $(this).data('movie_video_id');
    var episode = $(this).data('video_episode');
    $.ajax({
      url: '{{route('admin.watch-video')}}',
      type: "POST",
      dataType: "JSON",
      headers:{
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
          },
      data:{
        movie_id : movie_id,
        episode : episode
      },
      success:function(data){
        $('#video_title').html(data.video_title);
        $('#video_desc').html(data.video_desc);
        $('#video_link').html(`<iframe width="100%" height="500" src="${data.video_link}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`);
        $('#videoModal').modal('show');
      },
      error: function(error) {
        console.log(error);
      }
    });
  })
</script>


<!--select phim đổ ra tập trong create episode -->
<script type="text/javascript">
    $('.select-movie').change(function(){
        var id = $(this).find(':selected').val(); // id phim
        $.ajax({
          url: "{{route('admin.getEpisodeByMovie')}}",
          type: "GET",
          data: {
            id:id,
          },
          success:function(data){
            let output = '';
            output += ` <option value="">---Chọn tập phim---</option>`;
            for(var i = 1 ; i<= data ; i++){
              output += `<option value="${i}">${i}</option>`;
            }
            $('#episode').html(output);
          }
        })
    })
</script>

<!-- select season -->
<script type="text/javascript">
  $('.select-season').change(function(){
    var season = $(this).find(':selected').val();
    var id_phim = $(this).attr('id'); 
    
    $.ajax({
          headers:{
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{route('admin.updateSeasonPhim')}}",
          type: "POST",
          data: {
            season: season,
            id_phim: id_phim,
            // _token: _token,
          },
          success:function(data){
            alert('Thay đổi phim theo season ' + season + ' thành công');
          }
        })
  })
</script>

<!--select year -->
<script type="text/javascript">
  $('.select-year').change(function(){
    var year = $(this).find(':selected').val();
    var id_phim = $(this).attr('id'); 
    
    $.ajax({
          headers:{
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{route('admin.updateYearPhim')}}",
          type: "POST",
          data: {
            year: year,
            id_phim: id_phim,
            // _token: _token,
          },
          success:function(data){
            alert('Thay đổi phim theo năm ' + year + ' thành công');
          }
        })
  })
</script>

<!-- select top view -->
<script type="text/javascript">
  $('.select-topview').change(function(){
    var topview = $(this).find(':selected').val();
    var id_phim = $(this).attr('id'); 
    if(topview == 0){
      var text = 'Ngày';
    } else if (topview == 1){
      var text = 'Tuần';
    } else {
      var text = 'Tháng';
    }
    $.ajax({
          headers:{
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{route('admin.updateTopView')}}",
          type: "POST",
          data: {
            topview: topview,
            id_phim: id_phim,
            // _token: _token,
          },
          success:function(data){
            alert('Thay đổi phim theo topview ' + text + ' thành công');
          }
        })
  })
</script>
<script>
  $(document).ready(function(){
    $('#tablephim').DataTable({
      order: [[0, 'desc']]
    });
  });
  </script>
 
<!-- go title tu dong doi thanh slug -->
 <script>
  function ChangeToSlug()
      {

          var slug;
       
          //Lấy text từ thẻ input title 
          slug = document.getElementById("slug").value;
          slug = slug.toLowerCase();
          //Đổi ký tự có dấu thành không dấu
              slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
              slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
              slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
              slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
              slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
              slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
              slug = slug.replace(/đ/gi, 'd');
              //Xóa các ký tự đặt biệt
              slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
              //Đổi khoảng trắng thành ký tự gạch ngang
              slug = slug.replace(/ /gi, "-");
              //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
              //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
              slug = slug.replace(/\-\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-/gi, '-');
              slug = slug.replace(/\-\-/gi, '-');
              //Xóa các ký tự gạch ngang ở đầu và cuối
              slug = '@' + slug + '@';
              slug = slug.replace(/\@\-|\-\@|\@/gi, '');
              //In slug ra textbox có id “slug”
          document.getElementById('convert_slug').value = slug;
      }

  </script>

<!-- keo update position : jquery UI -->

  <script type="text/javascript">
    $('.order_position').sortable({
      placeholder: "ui-state-highlight",
      update: function(event,ui){
        var array_id = [];
        $('.order_position tr').each(function(){
          array_id.push($(this).attr('id'));
        })
        // alert(array_id);
        $.ajax({
          headers:{
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{route('admin.resorting')}}",
          type: "POST",
          data: {
            array_id: array_id,
          },
          success:function(data){
            alert("Sắp xếp thứ tự thành công");
          }
        })
      }
    });
  </script>
</body>
</html>
