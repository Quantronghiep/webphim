<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">WebPhimOnline</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (auth()->guard('admin')->check())
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->guard('admin')->user()->email }}</a>
                </div>

            </div>
            <div>
                <a href="{{ route('logout') }}" class="btn btn-block btn-danger btn-sm" style="margin-bottom:10px">Logout</a>
            </div>
        @endif

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    {{-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link {{request()->segment(2) == 'user' ? 'active' : ''}}" >
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Người dùng
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('genre.index')}}" class="nav-link {{request()->segment(2) == 'genre' ? 'active' : ''}}" >
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Thể Loại
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link {{request()->segment(2) == 'category' ? 'active' : ''}}">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                Danh mục
                            </p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{route('country.index')}}" class="nav-link {{request()->segment(2) == 'country' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Quốc Gia
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('movie.index')}}" class="nav-link {{request()->segment(2) == 'movie' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                            Phim
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.thongke')}}" class="nav-link {{request()->segment(2) == 'statistic' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Thống kê
                        </p>
                    </a>
                </li>
               

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

