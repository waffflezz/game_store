<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Logo -->
        <a href="{{ route('admin.main.index') }}" class="brand-link">
            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.game.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-gamepad"></i>
                        <p>
                            Игры
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.platform.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Платформы
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.genre.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Жанры
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
