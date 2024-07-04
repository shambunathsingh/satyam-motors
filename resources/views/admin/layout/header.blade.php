<section class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="navbrand">
                    <div class="logo">
                        <a href="#" class="nav-brand">
                            <img src="/images/carzex-logo-png.png" alt="">
                        </a>
                        <div class="toggle-bar">
                            <a href="#" class="toggle"><i class="fa-solid fa-bars"></i></a>
                        </div>
                    </div>
                    <div class="top-manu">
                        <ul class="manu-item">
                            <li><a href="#"><i class="fa-solid fa-bell"><span></span></i></a>
                            </li>
                            <li><a href="#"><i class="fa-regular fa-envelope-open"></i></a>
                            </li>
                            <li><a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                            </li>
                            <li>
                                <a href="#"><img src="/images/download.png" alt="" class="adminpic">
                                    <span>
                                        {{ Auth::user()->name }}
                                    </span>
                                    <i class="fa-solid fa-angle-down"></i>
                                </a>
                                <ul class="submenu">
                                    <li><a href="#"><i class="fa-regular fa-user"></i>Profile</a>
                                    </li>
                                    <li><a href="{{ route('logout') }}"><i class="fa-solid fa-key"></i>Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
