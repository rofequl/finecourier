<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="metismenu-icon fa fa-tachometer"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('profile')}}">
                        <i class="metismenu-icon fa fa-user"></i>
                        My Profile
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-cog"></i>
                        My Account
                    </a>
                </li>
                <li>
                    <a href="{{route('ShippingRate')}}">
                        <i class="metismenu-icon fa fa-calculator"></i>
                        Shipping rate check
                    </a>
                </li>
                <li>
                    <a href="{{route('address')}}">
                        <i class="metismenu-icon fa fa-globe" aria-hidden="true"></i>
                        Address book
                    </a>
                </li>
                <li>
                    <a href="{{route('PrepareShipment')}}">
                        <i class="metismenu-icon fa fa-location-arrow" aria-hidden="true"></i>
                        Prepare Shipment
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>