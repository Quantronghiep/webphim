@extends('layout')
@section('title', 'Trang chủ')
@section('content')

<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>

    <div id="halim_related_movies-2xx" class="wrap-slider">
      <div class="section-bar clearfix">
         <h3 class="section-title"><span>PHIM HOT</span></h3>
      </div>
      <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
         @foreach($phimhot as $hot )
         <article class="thumb grid-item post-38498">
            <div class="halim-item">
               <input type="hidden" value="{{$hot->title}}" id="wishlist_movietitle{{$hot->id}}">
               <input type="hidden" value="{{$hot->slug}}" id="wishlist_movieslug{{$hot->id}}">
               <input type="hidden" value="{{$hot->image}}" id="wishlist_movieurlImage{{$hot->id}}">
                  <button class="button_wishlist" id="{{$hot->id}}" onclick="add_wishlist(this.id);"><i class="fa fa-heart"></i></button>
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
         owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="fa fa-left"><</i>', '<i class="fa fa-right">></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 5}}})});
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