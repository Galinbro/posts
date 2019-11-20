
<div class="wrap_header fixed-header2 trans-0-4">
    <!-- Logo -->
    <a href="#" class="logo">
        <img src="{{URL::to('/')}}/images/BBVA_RGB.png" alt="IMG-LOGO">
    </a>

    <!-- Menu -->
    <div class="wrap_menu">
        <nav class="menu">
            <ul class="main_menu">
                <li>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="#productosSection">Productos</a>
                </li>

                <li>
                    <a href="#controlSection">Control interno</a>
                </li>

                <li>
                    <a href="#directorio">Directorio</a>
                </li>

                <li>
                    <a href="#nosotros">Nosotros</a>
                </li>
                web
            </ul>
        </nav>
    </div>
</div>

<!-- Header -->
<header class="header2">
    <!-- Header desktop -->
    <div class="container-menu-header-v2 p-t-26">
        <div class="topbar2">
            <!-- Logo2 -->
            <a href="#" class="logo2">
                <img src="{{URL::to('/')}}/images/BBVA_RGB.png" alt="IMG-LOGO">
            </a>

            <div class="topbar-child2">
                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            @if (Route::has('login'))
                                @if (Auth::user()->isAdmin())
                                    @auth
                                        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard fa-fw"></i> Admin Page</a></li>
                                    @endauth
                                @endif
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-fw"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->


                </ul>
            </div>
        </div>

        <div class="wrap_header">

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="#">Home</a>
                        </li>

                        <li>
                            <a href="#productosSection">Productos</a>
                        </li>

                        <li class="sale-noti">
                            <a href="#controlSection">Control interno</a>
                        </li>

                        <li>
                            <a href="#directorio">Directorio</a>
                        </li>

                        <li>
                            <a href="#nosotros">Nosotros</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">

            </div>
        </div>
    </div>

</header>
