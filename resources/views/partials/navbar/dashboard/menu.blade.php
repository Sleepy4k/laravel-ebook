<nav class="main-navbar">
    <div class="container">
        <ul>
            <li class="menu-item">
                <a href="{{ route('dashboard.main') }}" class='menu-link'>
                    <span>
                        <i class="bi bi-grid-fill"></i>
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('dashboard.buku') }}" class='menu-link'>
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
                        </ul>
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="#" class='submenu-link'>Keluar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>