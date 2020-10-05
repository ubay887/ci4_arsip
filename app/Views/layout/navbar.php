<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user-circle"></i>
                <?= session()->get('name_user'); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="/assets/img/users/<?= session()->get('image'); ?>" alt="Image <?= session()->get('name_user'); ?>" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <?= session()->get('name_user'); ?>
                                <span class="float-right text-sm text-success"><i class="fas fa-star"></i></span>
                            </h3>
                            <hr>
                            <p class="text-sm"><?= session()->get('email'); ?></p>
                            <?php if (session()->get('level') == 1) {
                                echo "<span class='badge badge-primary'>Super Admin</span>";
                            } else if (session()->get('level') == 2) {
                                echo "<span class='badge badge-info'>Admin</span>";
                            } elseif (session()->get('level') == 3) {
                                echo "<span class='badge badge-success'>Member</span>";
                            } ?>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="btn btn-info btn-sm float-left m-2"><i class="fa fa-user"></i> Profile</a>
                <a href="/auth/logout" class="btn btn-danger btn-sm float-right m-2"><i class="fa fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>
</nav>