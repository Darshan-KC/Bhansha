<!-- Navbar Starts -->
<div class="main-navbar shadow-sm sticky-top z-index">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <h5 class="brand-name">{{ config('app.name') }}</h5>
                </div>

                @if (request()->routeIs('about*'))
                    <!-- If the current route matches the pattern "about*" -->
                @else
                    <!-- If the current route does not match the pattern "about*" -->
                    <div class="col-md-5 my-auto">
                        <form action="{{ route('product.search') }}" id="searchform" method="POST" role="search">
                            <div class="input-group">
                                <input type="search" name="search" id="search" data-toggle="dropdown"
                                    placeholder="Search your product" class="form-control">
                                <button class="btn bg-white" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                <div id="searchResults" class="dropdown-menu"
                                    style="width: 100%; margin-top:35px;  border-top-left-radius: 0;
                                border-top-right-radius: 0;
                                border-bottom-left-radius: 10px;
                                border-bottom-right-radius: 10px;">
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                @if (request()->routeIs('about*'))
                    <div class="col-md-10 my-auto">
                        <ul class="nav justify-content-end">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart.index') }}">
                                    <i class="fa fa-shopping-cart"></i> Cart (0)

                                </a>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        Login
                                    </a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="div"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user"></i>{{ auth()->user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('profile') }}"><i
                                                    class="fa fa-user"></i> Profile</a></li>

                                        <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My
                                                Cart</a>
                                        </li>

                                        <li class="nav-item ">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                                <p>
                                                    <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                                                    logout
                                                </p>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                @else
                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart.index') }}">
                                    <i class="fa fa-shopping-cart"></i> Cart

                                </a>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        Login
                                    </a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="div"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user"></i>{{ auth()->user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('profile') }}"><i
                                                    class="fa fa-user"></i> Profile</a></li>

                                 <li><a class="dropdown-item" href="{{ route('myorder') }}"><i class="fa fa-list"></i> My Orders</a></li>
                                 <li><a class="dropdown-item" href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> My Cart</a>
                                 </li>

                                        <li class="nav-item ">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                                <p>
                                                    <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                                                    logout
                                                </p>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none mx-2" href="#">
            {{config('app.name')}}
            </a>
            <div class="navbar-toggler" type="div" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>










