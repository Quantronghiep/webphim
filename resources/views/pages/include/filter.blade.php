<div class="section-bar clearfix">
    <div class="row">
       <form action="{{route('locphim')}}" method="GET">
          <style>
             .style-filter{
                border: 0;
                background: #12171b;
                color: #fff;
             }
          </style>
          <div class="col-md-3">
             <div class="form-group">
                <select class="form-control style-filter" name="order" id="exampleFormControlSelect1">
                   <option value="">Sắp xếp</option>
                   <option {{isset($_GET['order']) && $_GET['order'] == "date" ? 'selected' : ''}}  value="date">Ngày đăng</option>
                   <option {{isset($_GET['order']) && $_GET['order'] == "year_release" ? 'selected' : ''}} value="year_release">Năm sản xuất</option>
                   <option {{isset($_GET['order']) && $_GET['order'] == "name_a_z" ? 'selected' : ''}} value="name_a_z">Tên phim</option>
                   <option {{isset($_GET['order']) && $_GET['order'] == "watch_view" ? 'selected' : ''}} value="watch_view">Lượt xem</option>
                </select>
             </div>
           </div>
           <div class="col-md-3">
             <div class="form-group">
                <select class="form-control style-filter" name="genre" id="exampleFormControlSelect1">
                <option value="">Thể loại</option>
                @foreach ($genres as $genre_filter)
                   <option {{isset($_GET['genre']) && $_GET['genre'] == $genre_filter->id ? 'selected' : ''}} value="{{$genre_filter->id}}">{{$genre_filter->title}}</option>
                @endforeach
                </select>
             </div>
           </div>
           <div class="col-md-2">
             <div class="form-group">
                <select class="form-control style-filter" name="country" id="exampleFormControlSelect1">
                   <option value="">Quốc gia</option>
                   @foreach ($countries as $country_filter)
                      <option {{isset($_GET['country']) && $_GET['country'] == $country_filter->id ? 'selected' : ''}} value="{{$country_filter->id}}">{{$country_filter->title}}</option>
                   @endforeach
                   </select>
                </select>
             </div>
           </div>
           <div class="col-md-2">
             <div class="form-group">
                @php
                    $year = isset($_GET['year']) ? $_GET['year'] : null
                @endphp
                {!! Form::selectYear('year',2010,2023,$year,['class'=>'form-control style-filter','placeholder' => 'Năm phim']) !!} 
             </div>
           </div>
           <div class="col-md-2">
              <input type="submit" class="btn btn-default style-filter" value="Lọc phim">
           </div>
       </form>
    </div>
 </div>