<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">RMS</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('order.index') ? 'active' : '' }}">
            <a href="{{ route('order.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Orders</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('file*') ? 'active' : '' }}">
            <a href="{{ route('file.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Without menu">File Management</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('product*') ? 'active' : '' }}">
            <a href="{{ route('product.index') }}" class="menu-link">
                <i class=" menu-icon fa fa-product-hunt" aria-hidden="true"></i>
                <div data-i18n="Without menu">Product</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('caurosel*') ? 'active' : '' }}">
            <a href="{{ route('caurosel.index') }}" class="menu-link">
                <i class=" menu-icon fa-solid fa-sliders" aria-hidden="true"></i>
                <div data-i18n="Without menu">Caurosel</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('cart*') ? 'active' : '' }}">
            <a href="{{ route('cart.index') }}" class="menu-link">
                <i class=" menu-icon fa-solid fa-cart-shopping" aria-hidden="true"></i>
                <div data-i18n="Without menu">Cart</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('contact*') ? 'active' : '' }}">
            <a href="{{ route('contact.index') }}" class="menu-link">
                <i class=" menu-icon fa fa-phone" aria-hidden="true"></i>
                <div data-i18n="Without menu">Contact</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('about*') ? 'active' : '' }} ">
            <a href="{{ route('aboutUs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Without menu">About</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('role*') ? 'active' : '' }} ">
            <a href="#" class="menu-link">
                <i class="menu-icon fa-brands fa-critical-role"></i>
                <div data-i18n="Without menu">Role</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('site*') ? 'active' : '' }} ">
            <a href="{{ route('site.index') }}" class="menu-link">
                <i class="menu-icon fa fa-cog"></i>
                <div data-i18n="Without menu">Site Management</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('sociallink*') ? 'active' : '' }} ">
            <a href="{{ route('sociallink.index') }}" class="menu-link">
                <i class="menu-icon fa fa-cog"></i>
                <div data-i18n="Without menu">Social Site Configuration</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('profile*') ? 'active' : '' }} ">
            <a href="{{ route('profile') }}" class="menu-link">
                <i class="menu-icon fa fa-user" aria-hidden="true"></i>
                <div data-i18n="Without menu">Profile</div>
            </a>
        </li>
        <li class="menu-item">
            <a class="dropdown-item menu-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
 document.getElementById('logout-form').submit();">
                <i class=" menu-icon fa fa-sign-out" aria-hidden="true"></i>
                <div data-i18n="Without menu">Log Out</div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

        {{-- <li class="menu-item {{ request()->routeIs('book-table*') ? 'active' : '' }}">
            <a href="{{ route('book-table.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Without menu">Book Table</div>
            </a>
        </li> --}}
    </ul>
</aside>
