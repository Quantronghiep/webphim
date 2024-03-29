@extends('layout')

@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
               <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{$country_slug->title}}</a> » <span class="breadcrumb_last" aria-current="page">2023</span></span></span></div>
            </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
       <section>
          <div class="section-bar clearfix">
             <h1 class="section-title"><span>{{$country_slug->title}}</span></h1>
          </div>
          @include('pages.include.filter')
          
          <div class="halim_box">
            @foreach($movie as $mov)

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
          <div class="clearfix"></div>
          <div class="text-center">
            {{-- <ul class='page-numbers'>
               <li><span aria-current="page" class="page-numbers current">1</span></li>
               <li><a class="page-numbers" href="">2</a></li>
               <li><a class="page-numbers" href="">3</a></li>
               <li><span class="page-numbers dots">&hellip;</span></li>
               <li><a class="page-numbers" href="">55</a></li>
               <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-left"></i></a></li>
            </ul> --}}
            {!! $movie->links("pagination::bootstrap-4") !!}
         </div>
       </section>
    </main>
    @include('pages.include.sidebar')
    
 </div>
@endsection