@extends('layout')
@section('title', 'Trang chủ')
@section('content')

<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <style>
      .button_wishlist {
         border: none;
         position: absolute;
         top : 50%;
         left: 50%;
         background: white;
         color: #6e6d7a;
         padding: 8px;
         border-radius: 10px;
         z-index: 1000000;
         font-size: 16px;
         display: none;
      }
      .button_wishlist:hover{
         background: #ccc;
      }
      .halim-item:hover{
         .button_wishlist{
            display: block;
         }
      }
    </style>
    {{-- <div class="col-xs-12 carausel-sliderWidget">
       <section id="halim-advanced-widget-4">
          <div class="section-heading">
             <a href="danhmuc.php" title="Phim Chiếu Rạp">
             <span class="h-text">Phim Chiếu Rạp</span>
             </a>
             <ul class="heading-nav pull-right hidden-xs">
                <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
             </ul>
          </div>
          <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
             <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                <div class="halim-item">
                   <a class="halim-thumb" href="" title="GÓA PHỤ ĐEN">
                      <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                      <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                         <div class="halim-post-title ">
                            <p class="entry-title">GÓA PHỤ ĐEN</p>
                            <p class="original_title">Black Widow</p>
                         </div>
                      </div>
                   </a>
                </div>
             </article>
            
          </div>
       </section>
       <div class="clearfix"></div>
    </div> --}}
    <div id="halim_related_movies-2xx" class="wrap-slider">
      <div class="section-bar clearfix">
         <h3 class="section-title"><span>PHIM HOT</span></h3>
      </div>
      <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
         @foreach($phimhot as $hot )
         <article class="thumb grid-item post-38498">
            <div class="halim-item">
               <p class="button_wishlist"><i class="fa fa-heart"></i></p>
               <a class="halim-thumb" href="{{route('movie',$hot->slug)}}" title="{{$hot->title}}">
                  <figure><img class="lazy img-responsive" src="{{asset('uploads/movies/' . $hot->image)}}" alt="{{$hot->title}}" title="{{$hot->title}}"></figure>
                  <span class="status"> @if($hot->resolution == 0)
                     HD
                    @elseif($hot->resolution == 1)
                    SD
                    @elseif($hot->resolution == 2)
                                FullHD
                                @else
                                Trailer
                    @endif</span>
                    <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                     @if($hot->phude == 1)
                        Thuyết Minh
                        {{-- @if($hot->season !=0)
                           - Season . {{$hot->season}}
                        @endif --}}
                     @else
                        Vietsub
                        {{-- @if($hot->season !=0)
                        - Season {{$hot->season}}
                        @endif --}}
                     @endif
                     {{-- {{$hot->phude == 1 ?'Thuyết Minh' : 'Vietsub' }} --}}
                  </span> 
                  
                  <div class="icon_overlay"></div>
                  <div class="halim-post-title-box">
                     <div class="halim-post-title ">
                        <p class="entry-title">{{$hot->title}}</p>
                        <p class="original_title">{{$hot->name_eng}}</p>
                     </div>
                  </div>
               </a>
            </div>
         </article>
        @endforeach
      </div>
      <script>
         $(document).ready(function($) {				
         var owl = $('#halim_related_movies-2');
         owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 5}}})});
      </script>
   </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
      @foreach($category_home as $cate_home)
       <section id="halim-advanced-widget-2">
          <div class="section-heading">
             <span class="h-text">{{$cate_home->title}}</span>
            <style>
               a.xemthem{
                  position: absolute;
                  right: 0;
                  line-height: 34px;
                  text-transform: uppercase;
                  font-size: 12px;
                  margin-right: 21px; 
               }
            </style>
             <a href="{{route('category', $cate_home->slug)}}" class="xemthem" title="{{$cate_home->title}}">
               {{-- <span class="h-text">Xem thêm</span> --}}
               Xem thêm >
               </a>
          </div>
          <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            @foreach($cate_home->movie->take(8) as $mov)

             <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                <div class="halim-item">
               <input type="hidden" value="{{$mov->title}}" id="wishlist_movietitle{{$mov->id}}">
               <input type="hidden" value="{{$mov->slug}}" id="wishlist_movieslug{{$mov->id}}">
               <input type="hidden" value="{{$mov->image}}" id="wishlist_movieurlImage{{$mov->id}}">
                  <button class="button_wishlist" id="{{$mov->id}}" onclick="add_wishlist(this.id);"><i class="fa fa-heart"></i></button>
                   <a class="halim-thumb" href="{{route('movie',$mov->slug)}}">
                      <figure><img class="lazy img-responsive" src="{{asset('uploads/movies/' . $mov->image)}}" alt="{{$mov->title}}" title="{{$mov->title}}"></figure>
                      <span class="status">@if($mov->resolution == 0)
                        HD
                       @elseif($mov->resolution == 1)
                       SD
                       @elseif($mov->resolution == 2)
                                FullHD
                                @else
                                Trailer
                       @endif</span>
                      <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                        @if($mov->thuocphim==1)
                           <span>{{$mov->episode_count}}/{{$mov->sotap}}</span>
                        @endif
                        @if($mov->phude == 1)
                        Thuyết Minh
                        {{-- @if($mov->season !=0)
                           - Season . {{$mov->season}}
                        @endif --}}
                     @else
                        Vietsub
                        {{-- @if($mov->season !=0)
                        - Season {{$mov->season}}
                        @endif --}}
                     @endif
                     </span> 
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                         <div class="halim-post-title ">
                            <p class="entry-title">{{$mov->title}}</p>
                            <p class="original_title">{{$mov->name_eng}}</p>
                         </div>
                      </div>
                   </a>
                </div>
             </article>
             @endforeach
          </div>
       </section>
       <div class="clearfix"></div>
       @endforeach
    </main>
     {{-- Sidebar  --}}
     @include('pages.include.sidebar')
 </div>

@endsection