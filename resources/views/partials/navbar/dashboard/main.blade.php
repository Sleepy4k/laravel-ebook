<div class="header-top">
    <div class="container">
        <div class="logo">
            <a href="{{ route('dashboard.index') }}">
                <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo">
            </a>
        </div>
        <div class="header-top-right">
            <div class="avatar avatar-md2">
                <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar">
            </div>
            <div class="text">
                <h6 class="user-dropdown-name">{{ request()->user()->nama }}</h6>
                <p class="user-dropdown-status text-sm text-muted">@ {{ request()->user()->username }}</p>
            </div>
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </div>
    </div>
</div>