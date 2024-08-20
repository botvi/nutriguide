<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('env') }}/nutriguide.png" width="30px" srcset="">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">SISFO NUTRIGUIDE</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Data Master</span></li>
        <li class="menu-item {{ Request::is('data-petugas') ? 'active' : '' }}">
            <a href="/data-petugas" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Analytics">Data Petugas</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('data-ibu') ? 'active' : '' }}">
            <a href="/data-ibu" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Analytics">Data Ibu Balita</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('anak') ? 'active' : '' }}">
            <a href="/anak" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Analytics">Data Balita</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU MAKANAN BALITA</span></li>
        
        <li class="menu-item {{ Request::is('mealplans') ? 'active' : '' }}">
            <a href="/mealplans" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-cookie"></i>
                <div data-i18n="Analytics">Menu Makanan</div>
            </a>
        </li>
        
        
    </ul>
</aside>
