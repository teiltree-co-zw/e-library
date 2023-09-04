<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand bg-white font-weight-bold text-success brand-logo" href="{{ route('home') }}">E-Library</a>
        <a class="navbar-brand bg-white font-weight-bold text-success brand-logo-mini" href="{{ route('home') }}"><i class="mdi mdi-book"></i></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-xl-block">
{{--            <form class="d-flex align-items-center h-100" action="#">--}}
{{--                <div class="input-group">--}}
{{--                    <div class="input-group-prepend bg-transparent">--}}
{{--                        <i class="input-group-text border-0 mdi mdi-magnify"></i>--}}
{{--                    </div>--}}
{{--                    <input type="text" class="form-control bg-transparent border-0" placeholder="Search products">--}}
{{--                </div>--}}
{{--            </form>--}}
        </div>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item  dropdown d-none d-md-block">
                <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Reports </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-file-pdf mr-2"></i>PDF </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-file-excel mr-2"></i>Excel </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-file-word mr-2"></i>doc </a>
                </div>
            </li>
            <li class="nav-item  dropdown d-none d-md-block">
                <a class="nav-link dropdown-toggle" id="projectDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Projects </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="projectDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-eye-outline mr-2"></i>View Project </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-pencil-outline mr-2"></i>Edit Project </a>
                </div>
            </li>

            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="{{ asset('assets/images/faces/face28.png') }}" alt="image">
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">Henry Klein</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                    <div class="p-2">

                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                            <span>Profile</span>
                            <span class="p-0">
                      <i class="mdi mdi-account-outline ml-1"></i>
                    </span>
                        </a>
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            <span>Settings</span>
                            <i class="mdi mdi-settings"></i>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>

                        <form action="{{ route('logout') }}" method="post"
                             >
                            @csrf
                            <button  class="dropdown-item py-1 d-flex align-items-center justify-content-between"><span>Log Out</span>
                                <i class="mdi mdi-logout ml-1"></i></button>

                        </form>
                    </div>
                </div>
            </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
