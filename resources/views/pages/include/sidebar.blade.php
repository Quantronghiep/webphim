<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
       <div class="section-bar clearfix">
          <div class="section-title">
             <span>Top Views</span>
             
          </div>
       </div>
       <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item active">
          <a class="nav-link filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#ngay" role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
        </li>
        <li class="nav-item">
          <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#tuan" role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
        </li>
        <li class="nav-item">
          <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#thang" role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
        </li>
      </ul>
       <div class="tab-content" id="pills-tabContent">
        <div id="halim-ajax-popular-post-default" class="popular-post">
            <span id="show_data_default"></span>

         </div>
         <div class="tab-pane fade" id="ngay" role="tabpanel" aria-labelledby="pills-home-tab">
            <div id="halim-ajax-popular-post" class="popular-post">
                <span id="show0"></span>

             </div>
        </div>
        <div class="tab-pane fade" id="tuan" role="tabpanel" aria-labelledby="pills-home-tab">
            <div id="halim-ajax-popular-post" class="popular-post">
                <span id="show1"></span>

             </div>
        </div>
        <div class="tab-pane fade" id="thang" role="tabpanel" aria-labelledby="pills-home-tab">
            <div id="halim-ajax-popular-post" class="popular-post">
                <span id="show2"></span>

             </div>
        </div>
        
      </div>

       <div class="clearfix"></div>
    </div>
 </aside>

 <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
   <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
      <div class="section-bar clearfix">
         <div class="section-title">
            <span>Phim sắp chiếu</span>
            
         </div>
      </div>
      <section class="tab-content">
         <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
            <div class="halim-ajax-popular-post-loading hidden"></div>
            <div id="halim-ajax-popular-post" class="popular-post">
               @foreach($phim_trailer as $mov_trailer)
               <div class="item post-37176">
                  <a href="{{route('movie',$mov_trailer->slug)}}" title="{{$mov_trailer->title}}">
                     <div class="item-link">
                         <img src="{{asset('uploads/movies/' . $mov_trailer->image)}}" class="lazy post-thumb" alt="{{$mov_trailer->title}}" />
                         <span class="is_trailer">
                           @if($mov_trailer->resolution == 0)
                              HD
                           @elseif($mov_trailer->resolution == 1)
                              SD
                           @elseif($mov_trailer->resolution == 2)
                              FullHD
                           @else
                              Trailer
                           @endif
                         </span>
                     </div>
                     <p class="title">{{$mov_trailer->title}}</p>
                     
                     </a>
                     <div class="viewsCount" style="color: #9d9d9d;">{{$mov_trailer->count_views}} lượt quan tâm</div>
                     {{-- <ul class="list-inline rating" style="margin-left:0px;"  title="Average Rating">

                        @for($count=1; $count<=$mov_trailer->count_views; $count++)
                         
                          <li title="star_rating" 
                          style="cursor:pointer; color:#ffcc00;padding:0;
                          font-size:16px;">&#9733;</li>
                        @endfor

                     </ul> --}}
                     <div style="float: left;">
                     <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                     <span style="width: 0%"></span>
                     </span>
                     </div>
               </div>
               @endforeach
              
              
            </div>
         </div>
      </section>
      <div class="clearfix"></div>
   </div>
</aside>