<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/assets/img/<?= $setting['image']; ?>" alt="AdminLTE Logo" class="brand-image">
        <span class="brand-text font-weight-light"><?= $setting['name_web']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/img/users/<?= session()->get('image'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="pull-left info">
                <a href="#" class="d-block"><?= session()->get('name_user'); ?></a>
                <a href="#">
                    <span class="badge badge-light"><i class="fa fa-star text-success"></i>
                        <?php if (session()->get('level') == 1) {
                            echo "Super Admin";
                        } else if (session()->get('level') == 2) {
                            echo "Admin";
                        } elseif (session()->get('level') == 3) {
                            echo "Member";
                        } ?>
                    </span>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php if (session()->get('level') == 1) { ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Manage File
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/arsip" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Arsip File</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/departement" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Departement
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/category" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Settings</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/users" class="nav-link">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/setting" class="nav-link">
                                    <i class="fas fa-cogs nav-icon"></i>
                                    <p>Settings</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <li class="nav-item">
                    <a href="/auth/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>