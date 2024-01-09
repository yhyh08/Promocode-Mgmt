<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-2 pt-2 text-white min-vh-100">
        <a href="#" class="mb-3">
            <img src="{{ asset('img/logo.png') }}" class="img-fluid sidebar-logo" alt="">
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link align-middle nav-name {{ request()->is('home') ? 'active' : '' }}">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle nav-name">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline nav-name">Promocode</span> </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="{{ route('home') }}" class="nav-link align-middle nav-name {{ request()->is('home') ? 'active' : '' }}">
                    <i class="fs-4 bi-archive"></i> <span class="ms-1 d-none d-sm-inline">Item</span>
                </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link nav-drop"> <span class="d-none d-sm-inline nav-drop">Item</span> 2 </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link align-middle nav-name {{ request()->is('home') ? 'active' : '' }}">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Order</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('redeem') }}" class="nav-link align-middle nav-name {{ request()->is('redeem') ? 'active' : '' }}">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Redeem</span>
                </a>
            </li>
            {{-- <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link align-middle nav-name">
                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline nav-name">Products</span> </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="#" class="nav-link nav-drop"> <span class="d-none d-sm-inline nav-drop">Product</span> 1</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link nav-drop"> <span class="d-none d-sm-inline nav-drop">Product</span> 2</a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>

