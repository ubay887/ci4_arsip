<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($settings as $row) : ?>

                <div class="col-md-3">
                    <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>

                    <?php if (session()->get('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Profile Image -->
                    <div class="card card-dark card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid" src="/assets/img/<?= $row['image']; ?>" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center badge-dark"><?= $row['name_web']; ?></h3>
                        </div>
                    </div>

                    <!-- About Me Box -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Description</strong>
                            <p class="text-muted">
                                <?= $row['description']; ?>
                            </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Version</strong>
                            <p class="text-muted"><?= $row['version']; ?></p>
                            <hr>
                            <strong><i class="fas fa-pencil-alt mr-1"></i> Url</strong>
                            <p class="text-muted">
                                <?= $row['link_web']; ?>
                            </p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body pt-2">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <?= form_open_multipart('/admin/setting/update/' . $row['id_setting']); ?>
                                    <?= csrf_field(); ?>
                                    <input type="hidden" value="<?= $row['id_setting']; ?>">
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-6">
                                            <label for="name_web" class="col-form-label">Name Web</label>
                                            <input type="text" class="form-control" name="name_web" id="name_web" value="<?= $row['name_web']; ?>">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="image" class="col-form-label">Logo</label><br>
                                            <img src="/assets/img/<?= $row['image']; ?>" class="imageList" alt="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="image" class="col-form-label">Update</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image" id="image">
                                                    <label class="custom-file-label" for="image">Choose image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-12">
                                            <label for="description" class="col-form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description"><?= $row['description']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <div class="col-sm-6 py-0">
                                            <label for="link_web" class="col-form-label">Url</label>
                                            <input type="text" class="form-control" name="link_web" id="link_web" value="<?= $row['link_web']; ?>">
                                        </div>
                                        <div class="col-sm-6 py-0">
                                            <label for="version" class="col-form-label">Version Web</label>
                                            <input type="text" class="form-control" name="version" id="version" value="<?= $row['version']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-0">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-outline-info float-right px-5"><i class="fa fa-save"></i> Save</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>