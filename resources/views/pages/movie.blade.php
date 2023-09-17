@extends('layout')
@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
             <div class="col-xs-6">
                <div class="yoast_breadcrumb hidden-xs">
                  <span>
                     <span><a href="{{ route('category', $movie->category->slug) }}">{{$movie->category->title}}</a> » 
                        <span>
                           <a href="{{ route('country', $movie->country->slug) }}">{{$movie->country->title}}</a> » 
                           @foreach($movie->movie_genre as $genre)
                           <a href="{{ route('genre', $genre->slug) }}">{{$genre->title}}</a> » 
                           @endforeach
                           <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span>
                        </span>
                  </span>
                  </span>
                  </div>
             </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
       <section id="content" class="test">
          <div class="clearfix wrap-content">
            
             <div class="halim-movie-wrapper">
                <div class="title-block">
                   <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                      <div class="halim-pulse-ring"></div>
                   </div>
                   <div class="title-wrapper" style="font-weight: bold;">
                      Bookmark
                   </div>
                </div>
                <div class="movie_info col-xs-12">
                   <div class="movie-poster col-md-3">
                      <img class="movie-thumb" src="{{asset('uploads/movies/' . $movie->image)}}" alt="{{$movie->title}}">
                     @php
                        if(isset($is_payment) && $is_payment == 1){
                           $isPayment = 1;
                        }
                        else {
                           $isPayment = 0;
                        }
                        if(isset($check_register_month) && $check_register_month == 1){
                           $registedMonth = 1;
                        }
                        else {
                           $registedMonth = 0;
                        }
                     @endphp
                      @if($movie->price ==0 || $isPayment == 1 || $registedMonth == 1)
                        @if($movie->resolution != 3)
                           {{-- @if($movie->sotap == 1)
                              <div class="bwa-content">
                                 <div class="loader"></div>
                                 <a href="{{route('watch',[$movie->slug,'episode'=>1])}}" class="bwac-btn">
                                 <i class="fa fa-play"></i>
                                 </a>
                              </div>
                           @else --}}
                              <div class="bwa-content">
                                 <div class="loader"></div>
                                 <a href="{{route('watch',['slug'=>$movie->slug,'episode'=>$episode_first])}}" class="bwac-btn">
                                 <i class="fa fa-play"></i>
                                 </a>
                              </div>
                           {{-- @endif --}}
                           @if($isPayment == 1 || ($registedMonth == 1 && $movie->price !=0 ))
                              <a href="#" style="display: block ; margin : 5px 0;" 
                              class="btn btn-success"
                              >Đã trả phí ({{number_format($movie->price)}} VNĐ)</a>
                           @endif
                        @else
                           <a href="#watch_trailer" style="display: block" class="btn btn-primary watch_trailer">Trailer</a>
                        @endif
                      @else
                        <a href="#" style="display: block ; margin : 5px 0;" 
                        class="btn btn-primary add_to_cart"
                        data-url="{{route('addToCart',['id'=>$movie->id])}}">Add to cart ({{number_format($movie->price)}} VNĐ)</a>
                      @endif
                   </div>
                   <div class="film-poster col-md-9">
                      <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                      <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->name_eng}}</h2>
                      <ul class="list-info-group">
                         <li class="list-info-group-item"><span>Độ phân giải</span> : <span class="quality">@if($movie->resolution == 0)
                           HD
                          @elseif($movie->resolution == 1)
                          SD
                          @elseif($movie->resolution == 2)
                          FullHD
                          @else
                          Trailer
                          @endif</span><span class="episode">{{$movie->phude == 1 ?'Thuyết Minh' : 'Vietsub' }}</span></li>
                         <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->thoiluong}}</li>
                        @if($movie->thuocphim == 1)
                           <li class="list-info-group-item"><span>Số tập</span> : {{$count_episode}}/{{$movie->sotap}} {{$count_episode == $movie->sotap ? '(Hoàn thành)':'(Đang cập nhật)'}}
                           </li>
                        @endif
   
                        {{-- @if($movie->season !=0)
                           <li class="list-info-group-item"><span>Season</span> : {{$movie->season}}</li>
                        @endif --}}
                         <li class="list-info-group-item"><span>Thể loại</span> : 
                           @foreach($movie->movie_genre as $genre)
                              <a href="{{ route('genre', $genre->slug) }}" class="badge badge-dark" rel="category tag">{{$genre->title}}
                            @endforeach
                           </a>
                        </li>
                        @if($movie->thuocphim == 1  && ($movie->price ==0 || $isPayment == 1 || $check_register_month == 1))
                           <li class="list-info-group-item"><span>Tập phim</span> : 
                              @foreach($movie->episode as $key => $sotap)
                              <input type="hidden" value="{{$movie->slug}}" id="watched_movieslug{{$sotap->episode}}">
                              <input type="hidden" value="{{$sotap->episode}}" id="watched_movieEpisode{{$sotap->episode}}">
                              <a href="{{route('watch',[$movie->slug,'episode'=>$sotap->episode])}}">
                                 <span class="halim-btn btn-primary btn halim-btn-2 {{$key == 0 ? 'active':''}} halim-info-1-1 box-shadow" data-post-id="37976" data-server="1" data-episode="1" data-position="first" data-embed="0" data-title="Xem phim {{$movie->title}} - Tập {{$sotap->episode}} - {{$movie->name_eng}} - Vietsub + Thuyết Minh" data-h1="{{$movie->title}} - tập {{$sotap->episode}}">Tập {{$sotap->episode}}  <span id="watched{{$sotap->episode}}"></span></span>
                              </a>
                              @endforeach
                           </li>
                        @elseif($movie->thuocphim == 1  && !($movie->price ==0 || $isPayment == 1 || $check_register_month == 1))
                        <li class="list-info-group-item"><span>Tập phim</span> : 
                           @foreach($movie->episode as $key => $sotap)
                           <a href="#">
                              <span class="halim-btn btn-primary btn halim-btn-2 {{$key == 0 ? 'active':''}} halim-info-1-1 box-shadow" data-post-id="37976" data-server="1" data-episode="1" data-position="first" data-embed="0" data-title="Xem phim {{$movie->title}} - Tập {{$sotap->episode}} - {{$movie->name_eng}} - Vietsub + Thuyết Minh" data-h1="{{$movie->title}} - tập {{$sotap->episode}}">Tập {{$sotap->episode}}</span>
                           </a>
                           @endforeach
                        </li>
                        @endif
                         <li class="list-info-group-item"><span>Danh mục phim</span> : <a href="{{ route('category', $movie->category->slug) }}" rel="category tag">{{$movie->category->title}}</a></li>
                         <li class="list-info-group-item"><span>Quốc gia</span> : <a href="{{ route('country', $movie->country->slug) }}" rel="tag">{{$movie->country->title}}</a></li>
                         <li class="list-info-group-item"><span>Năm phim</span> : {{$movie->year}}</li>
                         @if($movie->thuocphim != 1)
                           <li class="list-info-group-item"> 
                              @foreach($movie->episode as $key => $sotap)
                              <input type="hidden" value="{{$movie->slug}}" id="watched_movieslug{{$sotap->episode}}">
                              <input type="hidden" value="{{$sotap->episode}}" id="watched_movieEpisode{{$sotap->episode}}">
                              <a href="{{route('watch',[$movie->slug,'episode'=>$sotap->episode])}}">
                                 <span class="halim-btn btn-primary btn halim-btn-2 {{$key == 0 ? 'active':''}} halim-info-1-1 box-shadow" data-post-id="37976" data-server="1" data-episode="1" data-position="first" data-embed="0" data-title="Xem phim {{$movie->title}} - Tập {{$sotap->episode}} - {{$movie->name_eng}} - Vietsub + Thuyết Minh" data-h1="{{$movie->title}} - tập {{$sotap->episode}}"><span id="watched{{$sotap->episode}}"></span></span>
                              </a>
                              @endforeach
                           </li>
                        @endif
                         {{-- <li class="list-info-group-item"><span>Đạo diễn</span> : <a class="director" rel="nofollow" href="https://phimhay.co/dao-dien/cate-shortland" title="Cate Shortland">Cate Shortland</a></li> --}}
                         {{-- <li class="list-info-group-item last-item" style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;"><span>Diễn viên</span> : <a href="" rel="nofollow" title="C.C. Smiff">C.C. Smiff</a>, <a href="" rel="nofollow" title="David Harbour">David Harbour</a>, <a href="" rel="nofollow" title="Erin Jameson">Erin Jameson</a>, <a href="" rel="nofollow" title="Ever Anderson">Ever Anderson</a>, <a href="" rel="nofollow" title="Florence Pugh">Florence Pugh</a>, <a href="" rel="nofollow" title="Lewis Young">Lewis Young</a>, <a href="" rel="nofollow" title="Liani Samuel">Liani Samuel</a>, <a href="" rel="nofollow" title="Michelle Lee">Michelle Lee</a>, <a href="" rel="nofollow" title="Nanna Blondell">Nanna Blondell</a>, <a href="" rel="nofollow" title="O-T Fagbenle">O-T Fagbenle</a></li> --}}
                           <ul class="list-inline rating"  title="Average Rating">

                              @for($count=1; $count<=5; $count++)
                                @php
                                  if($count<=$rating){ 
                                    $color = 'color:#ffcc00;'; //mau vang
                                  }
                                  else {
                                    $color = 'color:#ccc;'; //mau xam
                                  }
                                @endphp
                              
                                <li title="star_rating" 
   
                                id="{{$movie->id}}-{{$count}}" 
                                
                                data-index="{{$count}}"  
                                data-movie_id="{{$movie->id}}" 
   
                                data-rating="{{$rating}}" 
                                class="rating" 
                                style="cursor:pointer; {{$color}} 
                                font-size:30px;">&#9733;</li>
                              @endfor
   
                              </ul>
                              <span class="total_rating" style="line-height: 3.5 ; margin-left:50px">Đánh giá phim ({{$count_total}} lượt)</span>
                        </ul>
                      <div class="movie-trailer">
                        @php
                           $current_url = Request::url();
                        @endphp
                        <div class="fb-like" data-href="{{$current_url}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                        <div class="fb-save" data-uri="{{$current_url}}" data-size="small"></div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="clearfix"></div>
             <div id="halim_trailer"></div>
             <div class="clearfix"></div>
             {{-- Noi dung phim  --}}
             <div class="section-bar clearfix">
                <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
             </div>
             <div class="entry-content htmlwrap clearfix">
                <div class="video-item halim-entry-box">
                   <article id="post-38424" class="item-content">
                      Phim <a href="{{route('movie',$movie->slug)}}">{{$movie->title}}</a> - {{$movie->year}} - {{$movie->country->title}}:
                      <p>{{$movie->title}} &#8211; {{$movie->name_eng}}: {{ $movie->description}}</p>
                   </article>
                </div>
             </div>
              {{-- Trailer  --}}
            <div class="section-bar clearfix" id="watch_trailer">
               <h2 class="section-title"><span style="color:#ffed4d">Trailer Phim</span></h2>
            </div>
            <div class="entry-content htmlwrap clearfix">
               <div class="video-item halim-entry-box">
                  <article  class="item-content" >
                     <iframe width="100%" height="350" src="https://www.youtube.com/embed/{{$movie->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                  </article>
               </div>
            </div>
             {{-- Tags phim  --}}
            <div class="section-bar clearfix">
               <h2 class="section-title"><span style="color:#ffed4d">Từ Khoá Tìm Kiếm</span></h2>
            </div>
            <div class="entry-content htmlwrap clearfix">
               <div class="video-item halim-entry-box">
                  <article id="post-38424" class="item-content">
                     @if(!empty($movie->tags))
                     @php
                        $tags = [];
                        $tags = explode(',',$movie->tags)
                     @endphp
                     @foreach($tags as $key => $tag)
                        <a href="{{url('/tag/'.$tag)}}">{{$tag}}</a>
                     @endforeach
                     @else
                     {{$movie->title}}
                     @endif
                  </article>
               </div>
            </div>

            {{-- Comment Facebook  --}}
            <div class="section-bar clearfix">
               <h2 class="section-title"><span style="color:#ffed4d">Bình luận phim</span></h2>
            </div>
            <div class="entry-content htmlwrap clearfix" style="background: white">
               <div class="video-item halim-entry-box">
                  @php
                     $current_url = Request::url();
                  @endphp
                  <article  class="item-content" >
                     <div class="fb-comments" data-href="{{$current_url}}" data-width="100%" data-numposts="5"></div>
                  </article>
               </div>
            </div>
          </div>
       </section>
       <section class="related-movies">
          <div id="halim_related_movies-2xx" class="wrap-slider">
             <div class="section-bar clearfix">
                <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
             </div>
             <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
               @foreach($movie_related as $related)
               <article class="thumb grid-item post-38498">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('movie',$related->slug)}}" title="{{$related->title}}">
                        <figure><img class="lazy img-responsive" src="{{asset('uploads/movies/' . $related->image)}}" alt="{{$related->title}}" title="{{$related->title}}"></figure>
                        <span class="status"> @if($related->resolution == 0)
                                 HD
                                @elseif($related->resolution == 1)
                                SD
                                @elseif($related->resolution == 2)
                                FullHD
                                @else
                                Trailer
                                @endif</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                 @if($related->phude == 1)
                                 Thuyết Minh
                                 @if($related->season !=0)
                                    - Season {{$related->season}}
                                 @endif
                              @else
                                 Vietsub
                                 @if($related->season !=0)
                                 - Season {{$related->season}}
                                 @endif
                              @endif   
                              </span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">{{$related->title}}</p>
                              <p class="original_title">{{$related->name_eng}}</p>
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
               @endforeach
             </div>
             <script>
                jQuery(document).ready(function($) {				
                var owl = $('#halim_related_movies-2');
                owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-left"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
             </script>
          </div>
       </section>
    </main>
    @include('pages.include.sidebar')

 </div>
 @stop
 @section('scriptss')
     <script>
         // Lấy danh sách phim đã xem từ Local Storage
         function getWatchedMoviesFromLocalStorage() {
            const watchedMovies = localStorage.getItem('watched');
            return watchedMovies ? JSON.parse(watchedMovies) : [];
         }

         // Kiểm tra xem một phim với tên slug và số tập đã xem hay chưa
         function isMovieEpisodeWatched(slug, episode) {
            const watchedMovies = getWatchedMoviesFromLocalStorage();
            const matches = watchedMovies.filter(item => item.movieName == slug && item.episodeNumber == episode);
            return matches.length > 0;
         }

         // Kiểm tra và cập nhật trạng thái đã xem cho các tập phim
         function updateWatchedStatus() {
            const inputs = document.querySelectorAll('[id^="watched_movieEpisode"]');
            inputs.forEach((input) => {
               const episode = input.value;
               const slugInput = document.getElementById(`watched_movieslug${episode}`);
               if (slugInput) {
                  const slug = slugInput.value;
                  const spanElement = document.querySelector(`span#watched${episode}`);

               if (isMovieEpisodeWatched(slug, episode)) {
                  if (spanElement) {
                     spanElement.textContent = 'Đã xem';
                  }
                  else{
                     spanElement.textContent = 'Chưa xem';
                  }
               }
               }
            });
         }


         // Gọi hàm để kiểm tra và cập nhật trạng thái đã xem cho các tập phim khi trang được tải
         updateWatchedStatus();


     </script>
 @stop