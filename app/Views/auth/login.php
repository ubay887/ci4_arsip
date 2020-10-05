<?= $this->extend('layout/template_auth'); ?>
<?= $this->section('auth_content'); ?>
<div class="card">
    <div class="card-body login-card-body">
        <p><?= session()->get('message'); ?></p>
        <p class="login-box-msg"><?php $errors = session()->getFlashdata('errors'); ?></p>
        <?php
        if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= esc($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php } ?>
        <?php
        $email = [
            'name' => 'email',
            'id' => 'email',
            'type' => 'email',
            'class' => 'form-control',
            'placeholder' => 'Email',
        ];
        $password = [
            'name' => 'password',
            'id' => 'password',
            'type' => 'password',
            'class' => 'form-control',
            'placeholder' => 'Password',
        ]
        ?>
        <?= form_open('auth/doLogin'); ?>
        <div class="input-group mb-3">
            <?= form_input($email); ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <?= form_input($password); ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in-alt"></i> Login</button>
            </div>
        </div>

        <?= form_close(); ?>

        <!-- <form action="/auth/doLogin" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </div>
        </form> -->

        <p class="mb-0">
            <a href="/auth/register" class="text-center">Register a new account</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>
<?= $this->endSection(); ?>