<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent">
    <div class="container">
        <a class="navbar-brand text-white" href="/" rel="tooltip" title="" data-placement="bottom">
            <span class="ms-1 text-white fs-5"><span class="font-weight-bold text-success">MALANG</span>CAMP</span>
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
            <ul class="navbar-nav navbar-nav-hover">
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-tents opacity-9 me-2"></i>
                        Products
                        <img src="/assets/img/down-arrow-white.svg" alt="down-arrow"
                            class="arrow ms-2 d-lg-block d-none">
                        <img src="/assets/img/down-arrow-dark.svg" alt="down-arrow"
                            class="arrow ms-2 d-lg-none d-block">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-animation dropdown-menu-end dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg"
                        aria-labelledby="dropdownMenuDocs">
                        <div class="d-none d-lg-block">
                            <ul class="list-group">
                                <li class="nav-item list-group-item border-0 p-0">
                                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="/products">
                                        <h6
                                            class="h5 dropdown-header text-dark font-weight-bolder d-flex justify-content-start align-items-center p-0">
                                            <i class="fa-solid fa-tents opacity-9 mx-2"></i>
                                            All Products
                                        </h6>
                                    </a>
                                </li>
                                <li class="nav-item list-group-item border-0 p-0">
                                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="/products?category=1">
                                        <h6
                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-start align-items-center p-0">
                                            <i class="fa-solid fa-suitcase-rolling opacity-9 mx-2"></i>
                                            Backpack
                                        </h6>
                                    </a>
                                </li>
                                <li class="nav-item list-group-item border-0 p-0">
                                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="/products?category=2">
                                        <h6
                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-start align-items-center p-0">
                                            <i class="fa-solid fa-tent opacity-9 mx-2"></i>
                                            Tent
                                        </h6>
                                    </a>
                                </li>
                                <li class="nav-item list-group-item border-0 p-0">
                                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="/products?category=3">
                                        <h6
                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-start align-items-center p-0">
                                            <i class="fa-solid fa-cube opacity-9 mx-2"></i>
                                            Other Equipment
                                        </h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="row d-lg-none">
                            <div class="col-md-12 g-0">
                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="/products">
                                    <h6
                                        class="h5 dropdown-header text-dark font-weight-bolder d-flex justify-content-start align-items-center p-0">
                                        <i class="fa-solid fa-campground opacity-9 mx-2"></i>
                                        All Products
                                    </h6>
                                </a>
                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="/products?category=1">
                                    <h6
                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-start align-items-center p-0">
                                        <i class="fa-solid fa-suitcase-rolling opacity-9 mx-2"></i>
                                        Backpack
                                    </h6>
                                </a>
                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="/products?category=2">
                                    <h6
                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-start align-items-center p-0">
                                        <i class="fa-solid fa-tent opacity-9 mx-2"></i>
                                        Tent
                                    </h6>
                                </a>
                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="/products?category=3">
                                    <h6
                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-start align-items-center p-0">
                                        <i class="fa-solid fa-cube opacity-9 mx-2"></i>
                                        Other Equipment
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="/about-us">
                        <i class="fa-solid fa-circle-info opacity-9 me-2 text-md"></i>
                        About Us
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav navbar-nav-hover ms-auto me-3">
                @auth
                    @if (auth()->user()->username != 'admin')
                        <li class="nav-item">
                            <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="/user/cart">
                                <i class="fa-solid fa-shopping-cart mx-2"></i>
                                Cart
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown dropdown-hover">
                        <a class="nav-link ps-2 d-flex pt-1 cursor-pointer" id="dropdownMenuDocs" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                @if (auth()->user()->photo)
                                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User Photo"
                                        class="rounded-circle mx-2 img-fluid" style="width:30px; height:30px">
                                @else
                                    <img src="{{ asset('storage/user-photos/no-photo.png') }}" alt="User Photo"
                                        class="rounded-circle mx-2 img-fluid" style="width:30px; height:30px">
                                @endif
                                Hi, {{ auth()->user()->username }}
                                <img src="/assets/img/down-arrow-white.svg" alt="down-arrow"
                                    class="arrow ms-2 d-lg-block d-none">
                                <img src="/assets/img/down-arrow-dark.svg" alt="down-arrow"
                                    class="arrow ms-2 d-lg-none d-block">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-animation dropdown-menu-end dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg"
                            aria-labelledby="dropdownMenuDocs">
                            <div class="d-none d-lg-block">
                                <ul class="list-group">
                                    @if (auth()->user()->username != 'admin')
                                        <li class="nav-item list-group-item border-0 p-0">
                                            <a class="dropdown-item py-2 ps-3 border-radius-md d-flex align-items-center"
                                                href="/user/profile">
                                                <i class="fa-solid fa-user mx-2"></i>
                                                <h6 class="dropdown-header text-dark font-weight-bolder p-0">
                                                    Profile
                                                </h6>
                                            </a>
                                        </li>
                                        <li class="nav-item list-group-item border-0 p-0">
                                            <a class="dropdown-item py-2 ps-3 border-radius-md d-flex align-items-center"
                                                href="/user/rent/">
                                                <i class="fa-solid fa-receipt mx-2"></i>
                                                <h6 class="dropdown-header text-dark font-weight-bolder p-0">
                                                    Rents
                                                </h6>
                                            </a>
                                        </li>
                                    @else
                                        <li class="nav-item list-group-item border-0 p-0">
                                            <a class="dropdown-item py-2 ps-3 border-radius-md d-flex align-items-center"
                                                href="/dashboard">
                                                <i class="fa-solid fa-chart-line mx-2"></i>
                                                <h6 class="dropdown-header text-dark font-weight-bolder p-0">
                                                    Dashboard
                                                </h6>
                                            </a>
                                        </li>
                                    @endif
                                    <hr class="hr bg-dark fw-bold">
                                    <li class="nav-item list-group-item border-0 p-0">
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button class="dropdown-item ps-3 border-radius-md d-flex align-items-center"
                                                type="submit"
                                                onclick="if(confirm('Do you want to sign out?')){return true}else{return false}">
                                                <i class="fa-solid fa-arrow-right-from-bracket mx-2"></i>
                                                <h6 class="dropdown-header text-dark font-weight-bolder p-0">
                                                    Sign Out
                                                </h6>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="row d-lg-none">
                                <div class="col-md-12 g-0">
                                    @if (auth()->user()->username != 'admin')
                                        <a class="dropdown-item py-2 ps-3 border-radius-md d-flex align-items-center"
                                            href="/user/profile">
                                            <i class="fa-solid fa-user mx-2"></i>
                                            <h6 class="dropdown-header text-dark font-weight-bolder p-0">
                                                Profile
                                            </h6>
                                        </a>
                                        <a class="dropdown-item py-2 ps-3 border-radius-md d-flex align-items-center"
                                            href="/user/rent">
                                            <i class="fa-solid fa-receipt mx-2"></i>
                                            <h6 class="dropdown-header text-dark font-weight-bolder p-0">
                                                Rents
                                            </h6>
                                        </a>
                                    @else
                                        <a class="dropdown-item py-2 ps-3 border-radius-md d-flex align-items-center"
                                            href="/dashboard">
                                            <i class="fa-solid fa-chart-line mx-2"></i>
                                            <h6 class="dropdown-header text-dark font-weight-bolder p-0">
                                                Dashboard
                                            </h6>
                                        </a>
                                    @endif
                                    <hr class="border-0 border-none bg-dark w-50">
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="dropdown-item ps-3 border-radius-md d-flex align-items-center"
                                            type="submit"
                                            onclick="if(confirm('Do you want to sign out?')){return true}else{return false}">
                                            <i class="fa-solid fa-arrow-right-from-bracket mx-2"></i>
                                            <h6 class="dropdown-header text-dark font-weight-bolder p-0">
                                                Sign Out
                                            </h6>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </ul>
                    </li>
                @else
                    <li class="nav-item mx-2">
                        <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="/login">
                            <i class="fa-solid fa-arrow-right-to-bracket mx-2"></i>
                            Sign In
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="/register">
                            <i class="fa-solid fa-user-plus mx-2"></i>
                            Sign Up
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
