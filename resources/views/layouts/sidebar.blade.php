<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-2 pt-2 text-white min-vh-100">
        <a href="#" class="mb-3">
            <img src="{{ asset('img/logo.png') }}" class="img-fluid sidebar-logo" alt="">
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link align-middle nav-name {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('promocode.index') }}" class="nav-link align-middle nav-name {{ request()->is('promocode') ? 'active' : '' }}"> 
                    <i class="fs-4 bi-shop"></i> <span class="ms-1 d-none d-sm-inline">Promocode</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('codeDetail.index') }}" class="nav-link align-middle nav-name {{ request()->is('code_detail') ? 'active' : '' }}"> 
                    <i class="fs-4 bi-gift"></i> <span class="ms-1 d-none d-sm-inline">Code Detail</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('discountType.index') }}" class="nav-link align-middle nav-name {{ request()->is('discount_type') ? 'active' : '' }}"> 
                    <i class="fs-4 bi-wallet2"></i> <span class="ms-1 d-none d-sm-inline">Discount Type</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('termCondition.index') }}" class="nav-link align-middle nav-name {{ request()->is('term_condition') ? 'active' : '' }}"> 
                    <i class="fs-4 bi-card-checklist"></i> <span class="ms-1 d-none d-sm-inline">T & C</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('promocode.redeemed') }}" class="nav-link align-middle nav-name {{ request()->is('promocode/redeemed') ? 'active' : '' }}">
                    <i class="fs-4 bi-ticket-perforated"></i> <span class="ms-1 d-none d-sm-inline">Redeem</span>
                </a>
            </li>
        </ul>
    </div>
</div>

