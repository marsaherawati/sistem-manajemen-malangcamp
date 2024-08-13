<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-4 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/" data-bs-toggle="tooltip" data-bs-title="Homepage"
            data-bs-placement="right">
            <span class="ms-1 text-white fs-5"><span class="font-weight-bold text-success">MALANG</span>CAMP</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2" />
    <div class="collapse navbar-collapse w-auto h-50" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('dashboard') ? 'active bg-gradient-success' : '' }}"
                    href="/dashboard">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <div class="h-100">
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                        Main Pages
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/members*') ? 'active bg-gradient-success' : '' }} text-white"
                        href="/dashboard/members">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">people</i>
                        </div>
                        <span class="nav-link-text ms-1">Members</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/products*') ? 'active bg-gradient-success' : '' }} text-white"
                        href="/dashboard/products">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">inventory_2</i>
                        </div>
                        <span class="nav-link-text ms-1">Products</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/billings*') ? 'active bg-gradient-success' : '' }} text-white"
                        href="/dashboard/billings">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">payments</i>
                        </div>
                        <span class="nav-link-text ms-1">Billings</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/transactions*') ? 'active bg-gradient-success' : '' }} text-white"
                        href="/dashboard/transactions">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Transactions</span>
                    </a>
                </li>
            </div>
        </ul>
    </div>
</aside>
