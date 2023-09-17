 <!-- Info boxes -->
 <div class="container-fluid">
    <div class="row">
      
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Danh mục</span>
              <span class="info-box-number">
                {{$category_total}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-image"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Thể loại</span>
              <span class="info-box-number">{{$genre_total}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
    
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
    
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-globe"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Quốc gia</span>
              <span class="info-box-number">{{$country_total}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-film"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Phim</span>
              <span class="info-box-number">{{$movie_total}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
 </div>
 