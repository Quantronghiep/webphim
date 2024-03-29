<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="theme-color" content="#234556">
    <meta http-equiv="Content-Language" content="vi" />
    <meta content="VN" name="geo.region" />
    <meta name="DC.language" scheme="utf-8" content="vi" />
    <meta name="language" content="Việt Nam">
    <meta name="csrf-token" content="{{csrf_token()}}">



    <link rel="shortcut icon"
        href="https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png"
        type="image/x-icon" />
    <meta name="revisit-after" content="1 days" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Phim hay - Xem phim hay nhất</title>
    <meta name="description"
        content="Phim hay - Xem phim hay nhất, xem phim online miễn phí, phim hot , phim nhanh" />
    <link rel="canonical" href="">
    <link rel="next" href="" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="Phim hay 2020 - Xem phim hay nhất" />
    <meta property="og:description"
        content="Phim hay 2020 - Xem phim hay nhất, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="Phim hay- Xem phim hay nhất" />
    <meta property="og:image" content="" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="55" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel='dns-prefetch' href='//s.w.org' />

    <link rel='stylesheet' id='bootstrap-css' href='{{ asset('css/bootstrap.min.css?ver=5.7.2') }}' media='all' />

    <link rel='stylesheet' id='style-css' href='{{ asset('css/style.css?ver=5.7.2') }}' media='all' />
    <link rel='stylesheet' id='wp-block-library-css' href='{{ asset('css/style.min.css?ver=5.7.2') }}' media='all' />
    <script type='text/javascript' src='{{ asset('js/jquery.min.js?ver=5.7.2') }}' id='halim-jquery-js'></script>
    <style type="text/css" id="wp-custom-css">
        .textwidget p a img {
            width: 100%;
        }
    </style>
    <style>
        #header .site-title {
            background: url(https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png) no-repeat top left;
            background-size: contain;
            text-indent: -9999px;
        }
    </style>
    
    <style>
        /* yeu thich  */
      .button_wishlist {
         border: none;
         position: absolute;
         top : 50%;
         left: 44%;
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
        .header__cart-notice {
            position: absolute;
            padding: 1px 4px;
            background-color: white;
            color: #ee4d2d;
            font-size: 1.2rem;
            line-height: 1.4rem;
            border-radius: 10px;
            border: 1px solid #ee4d2d;
            top: -3px;
            right: -10px;
            user-select: none;
            -webkit-user-select: none;
        }

        .cart {
            display: flex;
            cursor: pointer;
            align-items: center;
            margin: 0px 20px 0px -15px;
        }
        .count_bookmark {
            margin-left: 4px;
            padding: 3px 6px;
            background: red;
            border-radius: 50%;
        }
        .book-mark {
            background: #224361;
            display: inline-block;
            line-height: 20px;
            padding: 6px 15px;
            border-radius: 20px;
            color: #fff;
            cursor: pointer;
            transition: .4s all;
            margin-top: 1px;
            margin-right: 15px;
            position: relative;
        }
        .list-bookmark{
            list-style: none;
            position: absolute;
            padding-left: 0;
            right: -30px;
            top: calc(100% + 6px );
            background-color: #1b2d3c;
            border-radius: 2px;
            width: 200px;
            z-index: 100;
            box-shadow: 0 1px 2px #e0e0e0;
            display: none;
        }
        .book-mark:hover {
            background: rgb(98, 87, 87);
        }
        .book-mark:hover .list-bookmark {
           display: block;
        }
        .list-bookmark::before {
            content: "";
            border: solid;
            border-width: 20px 26px;
            border-color: transparent transparent #1b2d3c transparent;
            position: absolute;
            right: 16px;
            top: -30px;
            z-index: -1;
        }
        /* Cầu nối  */
        .list-bookmark::after {
            content: "";
            display: block;
            position: absolute;
            top: -10px;
            right: 0;
            height: 20px;
            width: 84%;
        }
        .info {
            /* display: flex; */
            justify-items: center; 
            position: relative;
            margin-right: 40px;
            line-height: 34px;
        }
        .info:hover .header__navbar-user-menu {
            display: block;
        }
        .header__navbar-user-menu {
            list-style: none;
            position: absolute;
            padding-left: 0;
            right: -30px;
            top: calc(100% + 6px );
            background-color: #1b2d3c;
            border-radius: 2px;
            width: 120px;
            z-index: 1;
            box-shadow: 0 1px 2px #e0e0e0;
            display: none;

        }
        .header__navbar-user-menu::before {
            content: "";
            border: solid;
            border-width: 20px 26px;
            border-color: transparent transparent #1b2d3c transparent;
            position: absolute;
            right: 16px;
            top: -30px;
            z-index: -1;
        }
        /* Cầu nối  */
        .header__navbar-user-menu::after {
            content: "";
            display: block;
            position: absolute;
            top: -10px;
            right: 0;
            height: 20px;
            width: 84%;
        }
        .header_navbar-user-item a {
            display: block;
            text-align: center;
        }
        .header_navbar-user-item a:hover {
            background-color: #f8f5f5;
        }

        .item-link img {
            width: 50px;
            margin: 5px 6px;
        }

        #overlay_mb {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            cursor: pointer
        }

        #overlay_mb .overlay_mb_content {
            position: relative;
            height: 100%
        }

        .overlay_mb_block {
            display: inline-block;
            position: relative
        }

        #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
            width: 600px;
            height: auto;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center
        }

        #overlay_mb .overlay_mb_content .cls_ov {
            color: #fff;
            text-align: center;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 999999;
            font-size: 14px;
            padding: 4px 10px;
            border: 1px solid #aeaeae;
            background-color: rgba(0, 0, 0, 0.7)
        }

        #overlay_mb img {
            position: relative;
            z-index: 999
        }

        @media only screen and (max-width: 768px) {
            #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
                width: 400px;
                top: 3%;
                transform: translate(-50%, 3%)
            }
        }

        @media only screen and (max-width: 400px) {
            #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
                width: 310px;
                top: 3%;
                transform: translate(-50%, 3%)
            }
        }
    </style>

    <style>
        #overlay_pc {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            cursor: pointer;
        }

        #overlay_pc .overlay_pc_content {
            position: relative;
            height: 100%;
        }

        .overlay_pc_block {
            display: inline-block;
            position: relative;
        }

        #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
            width: 600px;
            height: auto;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        #overlay_pc .overlay_pc_content .cls_ov {
            color: #fff;
            text-align: center;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 999999;
            font-size: 14px;
            padding: 4px 10px;
            border: 1px solid #aeaeae;
            background-color: rgba(0, 0, 0, 0.7);
        }

        #overlay_pc img {
            position: relative;
            z-index: 999;
        }

        @media only screen and (max-width: 768px) {
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
                width: 400px;
                top: 3%;
                transform: translate(-50%, 3%);
            }
        }

        @media only screen and (max-width: 400px) {
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
                width: 310px;
                top: 3%;
                transform: translate(-50%, 3%);
            }
        }
    </style>

    <style>
        .float-ck {
            position: fixed;
            bottom: 0px;
            z-index: 9
        }

        * html .float-ck

        /* IE6 position fixed Bottom */
            {
            position: absolute;
            bottom: auto;
            top: expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop, 10)||0)-(parseInt(this.currentStyle.marginBottom, 10)||0)));
        }

        #hide_float_left a {
            background: #0098D2;
            padding: 5px 15px 5px 15px;
            color: #FFF;
            font-weight: 700;
            float: left;
        }

        #hide_float_left_m a {
            background: #0098D2;
            padding: 5px 15px 5px 15px;
            color: #FFF;
            font-weight: 700;
        }

        span.bannermobi2 img {
            height: 70px;
            width: 300px;
        }

        #hide_float_right a {
            background: #01AEF0;
            padding: 5px 5px 1px 5px;
            color: #FFF;
            float: left;
        }
    </style>
</head>

<body class="home blog halimthemes halimmovies" data-masonry="">
    <header id="header">
        <div class="container">
            <div class="row" id="headwrap">
                <div class="col-md-3 col-sm-6 slogan">
                    <p class="site-title"><a class="logo" href="" title="phim hay ">Phim Hay</p>
                    </a>
                </div>
                <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                    <div class="header-nav">
                        <div class="col-xs-12">
                            <style type="text/css">
                                ul#result{
                                    position: absolute;
                                    z-index: 9999;
                                    background: #1b2d3c;
                                    width: 94%;
                                    padding: 10px;
                                    margin: 1px;
                                }
                            </style>
                            {{-- <form id="search-form-pc" name="halimForm" role="search" action="" method="GET">
                                <div class="form-group">
                                    <div class="input-group col-xs-12">
                                        
                                        <i class="animate-spin hl-spin4 hidden"></i>
                                    </div>
                                </div>
                            </form> --}}
                            {{-- <ul class="ui-autocomplete ajax-results hidden" id="result"></ul> --}}
                            <div class="form-group">
                                <div class="input-group col-xs-12">
                                    <form action="{{route('timKiemPhim')}}" method="GET">
                                        <div>
                                            <input id="timkiem" type="text" name="search" class="form-control"
                                            placeholder="Tìm kiếm..." autocomplete="off" required>
                                            <button class="btn btn-primary">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <ul class="list-group" style="display: none" id="result">
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-xs flex flex-end" style="display: flex; justify-content: flex-end">
                    <div class="info">
                        <i class="fa fa-user"></i>
                        @if (auth()->guard('web')->check())
                        <span>{{ auth()->guard('web')->user()->name }}</span>
                        <ul class="header__navbar-user-menu">
                            <li class="header_navbar-user-item">
                                <a href=""> <form action="{{route('vnpayPaymentMonth')}}" method="POST">
                                    @csrf
                                    <button type="submit" style="background: transparent;margin:0px;padding:0px;border:0px" name="redirect">Đăng kí gói tháng</button>
                                </form></a>
                               
                            </li>
                            <li class="header_navbar-user-item">
                                <a href="{{route('historyRegisterMovieMonth')}}">Lịch sử gói tháng </a>
                            </li>
                            <li class="header_navbar-user-item">
                                <a href="{{route('historyBuyMovie')}}">Lịch sử giao dịch </a>
                            </li>
                            <li class="header_navbar-user-item">
                                <a href="{{ route('logout') }}">Đăng xuất</a>
                            </li>
                        </ul>
                        @else
                        <ul class="header__navbar-user-menu">
                            <li class="header_navbar-user-item">
                                <a href=""> <form action="{{route('vnpayPaymentMonth')}}" method="POST">
                                    @csrf
                                    <button type="submit" style="background: transparent;margin:0px;padding:0px;border:0px" name="redirect">Đăng kí gói tháng</button>
                                </form></a>
                            </li>
                            <li class="header_navbar-user-item">
                                <a href="{{ route('login') }}">Đăng nhập</a>
                            </li>
                            <li class="header_navbar-user-item">
                                <a href="{{ route('register') }}">Đăng kí tài khoản</a>
                            </li>
                        </ul>
                        @endif
                    </div>
                    {{-- @if (auth()->check()) --}}
                    <a class="cart" href="{{route('showCart')}}" style="position: relative;">
                        <i class="fa fa-cart-shopping"></i>
                        @php
                            if((session()->has('cart'))){
                                $count_cart = count(session()->get('cart'));
                            }
                            else {
                                $count_cart = 0;
                            }
                        @endphp
                        <span class="header__cart-notice">{{$count_cart}}</span>
                    </a>
                    {{-- @endif --}}
                    <div id="" class="box-shadow book-mark"><i class="fa fa-bookmark"></i><span> Bookmarks</span><span
                            class="count_bookmark" data-value=""></span>
                            <div class="list-bookmark" id="row_wishlist">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="navbar-container">
        <div class="container">
            <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse"
                        data-target="#halim" aria-expanded="false">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <button type="button" class="navbar-toggle collapsed pull-right expand-search-form"
                        data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                        <span class="hl-search" aria-hidden="true"></span>
                    </button>
                    {{-- <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
                        Bookmarks<i class="hl-bookmark" aria-hidden="true"></i>
                        <span class="count">0</span>
                    </button> --}}
                    <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                        <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i
                                class="fas fa-filter"></i></a>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="halim">
                    <div class="menu-menu_1-container">
                        <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                            <li class="current-menu-item active"><a title="Trang Chủ"
                                    href="{{ route('homepage') }}">Trang Chủ</a></li>
                            <li class="mega dropdown">
                                <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    @foreach ($genres as $genre)
                                        <li><a title="{{ $genre->title }}"
                                                href="{{ route('genre', $genre->slug) }}">{{ $genre->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="mega dropdown">
                                <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    @foreach ($countries as $country)
                                        <li><a title="{{ $country->title }}"
                                                href="{{ route('country', $country->slug) }}">{{ $country->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="mega dropdown">
                                <a title="Năm Phim" href="#" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true">Năm Phim <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    @for($year=2000;$year<2024;$year++)
                                        <li><a title="{{ $year }}"
                                                href="{{ url('nam/'.$year) }}">{{ $year }}</a>
                                        </li>
                                    @endfor
                                </ul>
                            </li>
                            @foreach ($categories as $category)
                                <li class="mega"><a title="{{ $category->title }}"
                                        href="{{ route('category', $category->slug) }}">{{ $category->title }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    {{-- <ul class="nav navbar-nav navbar-left" style="background:#000;">
                        <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                    </ul> --}}
                </div>
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
                <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
                <div id="mobile-user-login"></div>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="row fullwith-slider"></div>
    </div>
    <div class="container">
        @yield('content')
        @include('pages.include.banner')
    </div>
    <div class="clearfix"></div>
    <footer id="footer" class="clearfix">
        <div class="container footer-columns">
            <div class="row container">
                <div class="widget about col-xs-12 col-sm-4 col-md-4">
                    <div class="footer-logo">
                        <img class="img-responsive"
                            src="https://img.favpng.com/9/23/19/movie-logo-png-favpng-nRr1DmYq3SNYSLN8571CHQTEG.jpg"
                            alt="Phim hay- Xem phim hay nhất" />
                    </div>
                    Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                        data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">[quantronghiep2001@gmail.com]</a>
                </div>
            </div>
        </div>
    </footer>
    <div id='easy-top'></div>

    <script type='text/javascript' src='{{ asset('js/bootstrap.min.js?ver=5.7.2') }}' id='bootstrap-js'></script>
    <script type='text/javascript' src='{{ asset('js/owl.carousel.min.js?ver=5.7.2') }}' id='carousel-js'></script>

    <script type='text/javascript' src='{{ asset('js/halimtheme-core.min.js?ver=1626273138') }}' id='halim-init-js'>
    </script>
    <script>
        $(window).on("load",function(){
            // $('#banner').modal("show");
            if(localStorage.getItem('data') == null){
                $('.count_bookmark').text(0);
            }
            else {
                var old_data = JSON.parse(localStorage.getItem('data'));
                $('.count_bookmark').text(old_data.length);
            }
        });
    </script>
    {{-- delete cart  --}}
    <script>
         $(document).on('click','.cart_delete', function(event){
            event.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url:"{{route('deleteCart')}}",
                method:"GET",
                data:{
                    id:id,
                },
                success:function(data){
                    if(data.code === 200){
                        $('.cart_wrapper').html(data.cart_component);
                        alert('Cap nhat thanh cong');
                        $('.header__cart-notice').html(data.count_cart)
                    }
                    else{
                        window.location.href = '/';
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
         });
    </script>
    {{-- add cart  --}}
    <script>
        $(document).on('click','.add_to_cart', function(event){
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                url: urlCart,
                type: "GET",
                dataType: "JSON",
                success:function(data){
                    if(data.code === 200){
                        alert('Them phim thanh cong');
                        $('.header__cart-notice').html(data.count_cart)
                    }
                    else{
                        alert("Phim đã có trong giỏ");
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        })
    </script>
    {{-- Wish List--}}
    <script type="text/javascript">
        function view(){
            if(localStorage.getItem('data') != null){
                var data = JSON.parse(localStorage.getItem('data'));
                data.reverse();
                // document.getElementById('row_wishlist').style.overflow = 'scroll';
                // document.getElementById('row_wishlist').style.height = '600px';
                for(var i=0 ; i < data.length; i++){
                    var title = data[i].title;
                    var slug = data[i].slug;
                    var urlImage = data[i].urlImage;
                    var id = data[i].id;
                    var slugUrl = "{{route('movie', ':slug')}}";
                    slugUrl = slugUrl.replace(':slug', slug);

                    $('#row_wishlist').append(` <li>
                                    <div class="item post-37176">
                                        <a href="${slugUrl}" style="display: flex; align-items: center" title="${title}">
                                           <div class="item-link">
                                              <img src="{{asset('uploads/movies/${urlImage}')}}" class="lazy post-thumb" alt="${title}" title="${title}" />
                                           </div>
                                           <p class="title" style="text-align: center">${title}</p>
                                           {{-- <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div> --}}
                                           <p><a class="btn btn-danger btn-xs delete_wishlist" data-id="${id}" style="margin-top:0">Xóa</a></p>

                                        </a>
                                     </div>
                                <hr style="margin: 5px 0px">
                                </li>`);

                }
            }
        }
        view();
    </script>
    <script type="text/javascript">
        function add_wishlist(clicked_id){
            var id = clicked_id;
            var title = $('#wishlist_movietitle'+id).val();
            var slug = $('#wishlist_movieslug'+id).val();
            var urlImage = $('#wishlist_movieurlImage'+id).val();

            var newItem = {
                'id' : id,
                'title' : title,
                'slug' : slug,
                'urlImage' : urlImage,
            }
            if(localStorage.getItem('data') == null){
                localStorage.setItem('data','[]');
            }
            var old_data = JSON.parse(localStorage.getItem('data'));
            var matches = $.grep(old_data, function(obj){
                return obj.id == id;
            })
            if(matches.length){
                alert('Phim đã yêu thích rồi!');
            }
            else{
                alert('Thêm vào list phim yêu thích thành công');
                old_data.push(newItem);
                $('.count_bookmark').text(old_data.length);
                var slugUrl = "{{route('movie', ':slug')}}";
                slugUrl = slugUrl.replace(':slug', newItem.slug);
                $('#row_wishlist').append(` <li>
                                    <div class="item post-37176">
                                        <a href="${slugUrl}" style="display: flex; align-items: center" title="${newItem.title}">
                                           <div class="item-link">
                                              <img src="{{asset('uploads/movies/${newItem.urlImage}')}}" class="lazy post-thumb" alt="${newItem.title}" title="${newItem.title}" />
                                           </div>
                                           <p class="title" style="text-align: center">${newItem.title}</p>
                                           {{-- <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div> --}}
                                           <p><a class="btn btn-danger btn-xs delete_wishlist" data-id="${newItem.id}" style="margin-top:0">Xóa</a></p>
                                        </a>
                                     </div>
                                <hr style="margin: 5px 0px">
                                </li>`);
            }
            localStorage.setItem('data',JSON.stringify(old_data));
        }
    </script>
    {{-- xoa wishlist  --}}
    <script>
        $(document).on('click','.delete_wishlist',function(event){
                event.preventDefault(); // những hành động mặc định của sự kiện sẽ k xảy ra
                var id = $(this).data('id');
                if (localStorage.getItem('data') != null) {
                    var data = JSON.parse(localStorage.getItem('data'));
                    if (data.length) {
                            for (i = 0; i < data.length; i++) {
                                if (data[i].id == id) {
                                data.splice(i,1); //xóa phần tử khỏi mảng, tham số thứ 2 là 1 phần tử
                                break;
                            }
                        }
                    }
                    localStorage.setItem('data',JSON.stringify(data));  //chuyển obj->string
                    alert('Xóa thành công');
                    window.location.reload();
                }
            });
    </script>
    {{-- Comment fb  --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0" nonce="4EVy4vTG"></script>
    {{--Rating--}}
    <script type="text/javascript">
        
        function remove_background(movie_id)
         {
          for(var count = 1; count <= 5; count++)
          {
           $('#'+movie_id+'-'+count).css('color', '#ccc');
          }
        }

        //hover chuột đánh giá sao
       $(document).on('mouseenter', '.rating', function(){
          var index = $(this).data("index");
          var movie_id = $(this).data('movie_id');
        // alert(index);
        // alert(movie_id);
          remove_background(movie_id);
          for(var count = 1; count<=index; count++)
          {
           $('#'+movie_id+'-'+count).css('color', '#ffcc00');
          }
        });
       //nhả chuột ko đánh giá
       $(document).on('mouseleave', '.rating', function(){
          var index = $(this).data("index");
          var movie_id = $(this).data('movie_id');
          var rating = $(this).data("rating");
          remove_background(movie_id);
          //alert(rating);
          for(var count = 1; count<=rating; count++)
          {
           $('#'+movie_id+'-'+count).css('color', '#ffcc00');
          }
         });

        //click đánh giá sao
        $(document).on('click', '.rating', function(){
           
              var index = $(this).data("index");
              var movie_id = $(this).data('movie_id');
          
              $.ajax({
               url:"{{route('addRating')}}",
               method:"POST",
               data:{index:index, movie_id:movie_id},
                 headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               success:function(data)
               {
                if(data == 0)
                {
                 
                 alert("Bạn đã đánh giá "+index +" trên 5");
                 location.reload();
                 
                }else if(data == 1){
                  alert("Bạn đã đánh giá phim này rồi,cảm ơn bạn nhé");
                }
                else
                {
                 alert("Lỗi đánh giá");
                }
               }
              });
            
            
              
        });

   
    </script>
    {{-- Tìm kiếm  --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $("#timkiem").keyup(function(){
                $("#result").html('');
                var search = $("#timkiem").val();
                if(search != ''){
                    $('#result').css('display','inherit');
                    // var expression = new RegExp(search,"i");
                    $.getJSON('/json_file/movies.json',function(data){
                        $.each(data,function(key,value){
                            if(value.title.search(search) != -1){
                                $("#result").append('<a href="/phim/'+value.slug+'" style="color: #ccc"><li style="cursor:pointer; display: flex; max-height: 200px;" class="list-group-item link-class"><img src="/uploads/movies/'+value.image+'" width="80" class="" /><div style="flex-direction: column; margin-left: 2px;"><h5 width="100%">'+value.title+'</h5><span style="display: -webkit-box; font-size:12px; max-height: 8.2rem; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; white-space: normal; -webkit-line-clamp: 5; line-height: 1.6rem;" >| '+value.description+'</span></div></li></a><hr style="margin-bottom: 2px;">');
                            }
                        })
                    })
                }
                else{
                    $('#result').css('display','none');
                }
            });
            $("#result").on('click','li',function(){
                var click_text = $(this).text().split('|');
                $('#timkiem').val($.trim(click_text[0]));
                $('#result').html('');
                $('#result').css('display','none');
            });
        });
    </script>
    {{-- Xem trailer  --}}
    <script type="text/javascript">
        $(".watch_trailer").click(function(e){
            e.preventDefault();
            var aid = $(this).attr("href");
            $('html,body').animate({scrollTop: $(aid).offset().top,'slow'});
        });
    </script>
    {{-- Phim hot tuần,tháng  --}}
    <script type="text/javascript">
    $(document).ready(function(){
        //top view ngay`
        $.ajax({
        url : "{{route('admin.filterTopViewPhimDefault')}}",
        type: "GET",

        success:function(data){
          $('#show_data_default').html(data);
        }
      });
    })
    $('.filter-sidebar').click(function(){
      var href = $(this).attr('href');
      if(href == '#ngay'){
        var value = 0 ;
      } else if (href == '#tuan'){
        var value = 1;
      }else{
        var value = 2;
      }
  
      $.ajax({
        headers:{
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
          },
        url : "{{route('admin.filterTopViewPhim')}}",
        type: "POST",
        data: {
          value: value,
        },
        success:function(data){
            $('#halim-ajax-popular-post-default').css("display","none");
            $('#show'+ value).html(data);
        }
      });
    });
  </script>

  @yield('scriptss')

</body>

</html>
