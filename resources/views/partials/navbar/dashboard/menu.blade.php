<nav class="main-navbar">
    <div class="container">
        <ul>
            <li class="menu-item">
                <a href="{{ route('dashboard.index') }}" class='menu-link'>
                    <span>
                        <i class="bi bi-grid-fill"></i>
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('book.index') }}" class='menu-link'>
                    <span>
                        <i class="bi bi-grid-fill"></i>
                        Buku
                    </span>
                </a>
            </li>
            <li class="menu-item has-sub">
                <a href="#" class='menu-link'>
                    <span>
                        <i class="bi bi-stack"></i>
                        Table
                    </span>
                </a>
                <div class="submenu">
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Penulis</a>
                            </li>
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Penerbit</a>
                            </li>
                        </ul>
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Siswa</a>
                            </li>
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Kategori Buku</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="menu-item has-sub">
                <a href="#" class='menu-link'>
                    <span>
                        <i class="bi bi-stack"></i>
                        Admin
                    </span>
                </a>
                <div class="submenu">
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Akun</a>
                            </li>
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Role</a>
                            </li>
                        </ul>
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Bahasa</a>
                            </li>
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Aplikasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="menu-item has-sub">
                <a href="#" class='menu-link'>
                    <span>
                        <i class="bi bi-stack"></i>
                        Audit
                    </span>
                </a>
                <div class="submenu">
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Auth</a>
                            </li>
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>System</a>
                            </li>
                        </ul>
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Model</a>
                            </li>
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Query</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="menu-item has-sub">
                <a href="#" class='menu-link'>
                    <span>
                        <i class="bi bi-stack"></i>
                        Profile
                    </span>
                </a>
                <div class="submenu">
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Akun Saya</a>
                            </li>
                            <li class="submenu-item">
                                <a class="submenu-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Keluar
                                </a>
                                <form class='d-none' id="logout-form" action="{{ route('profile.logout.store') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>