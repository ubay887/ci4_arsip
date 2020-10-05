<?= $this->extend('layout/template_auth'); ?>
<?= $this->section('auth_content'); ?>
<div class="card">
    <div class="card-body register-card-body">
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
        $name_user =  ['name' => 'name_user', 'id' => 'name_user', 'class' => 'form-control', 'placeholder' => 'Full name'];
        $email =  ['name' => 'email', 'id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'type' => 'email'];
        $password =  ['name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password'];
        $retypePassword =  ['name' => 'retypePassword', 'id' => 'retypePassword', 'class' => 'form-control', 'placeholder' => 'Retype Password', 'type' => 'password'];
        ?>

        <?= form_open('/auth/doRegister'); ?>
        <div class="input-group mb-2">
            <?= form_input($name_user); ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-id-card"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-2">
            <?= form_input($email); ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-2">
            <?= form_input($password); ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-key"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-2">
            <?= form_input($retypePassword); ?>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-key"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </div>
        <?= form_close(); ?>

        <a href="/auth" class="text-center">Back to <b>Login</b></a>
    </div>
</div>

<?= $this->endSection(); ?>