<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('backend.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('backend.dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('backend.dashboard') }}">
                        <i class=" ri-home-3-line"></i> <span data-key="t-category">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('backend.category.list') }}">
                        <i class="las la-tags"></i><span data-key="t-category">Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="/location">
                        <i class="ri-map-pin-2-line"></i> <span data-key="t-location">Location</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('backend.amenity.list') }}">
                        <i class="lar la-sticky-note"></i> <span data-key="t-amenity">Amenity</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="/user">
                        <i class="ri-user-line"></i> <span data-key="t-user">User</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="/owner">
                        <i class="ri-user-2-fill"></i> <span data-key="t-owner">Owner</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
