<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>

                <?php if (session()->get('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table from <?= $title; ?></h3>

                        <div class="card-tools">
                            <button class="btn btn-outline-info btn-sm mb-2 px-3 shadow" title="Add Data" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-user-plus"></i></button>
                            <a href="/admin/users/excel" class="btn btn-outline-success btn-sm mb-2 px-3 shadow" title="Export Excel"><i class="fa fa-file-excel"></i></a>
                            <button class="btn btn-outline-secondary btn-sm mb-2 px-3 shadow" title="Print" onclick="window.print()"><i class="fa fa-print"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1px">No</th>
                                    <th width="10px">Image</th>
                                    <th width="auto">Name</th>
                                    <th width="auto">Email</th>
                                    <th width="10px">Level</th>
                                    <th width="5px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($users as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><img src="/assets/img/users/<?= $row['image']; ?>" class="imageList"></td>
                                        <td><?= $row['name_user']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td>
                                            <?php if ($row['level'] == 1) {
                                                echo "<span class='badge badge-primary'>Super Admin</span>";
                                            } else if ($row['level'] == 2) {
                                                echo "<span class='badge badge-info'>Admin</span>";
                                            } elseif ($row['level'] == 3) {
                                                echo "<span class='badge badge-success'>Member</span>";
                                            } ?>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info btn-xs" title="Edit Data" data-toggle="modal" data-target="#modalEdit<?= $row['id_user']; ?>"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger btn-xs" title="Delete Data" data-toggle="modal" data-target="#modalDelete<?= $row['id_user']; ?>"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Modal -->
<?php
$image = ['name' => 'image', 'id' => 'image', 'type' => 'file', 'class' => 'custom-file-input'];
$name_user = ['name' => 'name_user', 'id' => 'name_user', 'class' => 'form-control', 'required' => ''];
$email = ['name' => 'email', 'id' => 'email', 'type' => 'email', 'class' => 'form-control', 'required' => ''];
$emailView = ['name' => 'email', 'id' => 'email', 'type' => 'email', 'class' => 'form-control', 'readonly' => ''];
$password = ['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'required' => ''];
$level = ['name' => 'level', 'id' => 'level', 'class' => 'form-control'];
$op_level = ['3' => 'Member', '2' => 'Admin', '1' => 'Super Admin'];
$is_active = ['name' => 'is_active', 'id' => 'is_active', 'class' => 'form-control'];
$op_active = ['1' => 'Active', '0' => 'In Active'];
?>

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light p-2">
                <h5 class="modal-title">Add <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body card-info card-outline">
                <?= form_open_multipart('/admin/users/create'); ?>
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <?= form_label('Image', 'image', ['for' => 'image', 'class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-2">
                        <img src="/assets/img/users/cengproject.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <?php $js = 'onchange="previewImg()"'; ?>
                            <?= form_upload($image, '', $js); ?>
                            <?= form_label('Pilih Gambar', 'image', ['for' => 'image', 'class' => 'custom-file-label']); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <?= form_label('Fullname', 'name_user', ['for' => 'name_user', 'class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= form_input($name_user); ?>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <?= form_label('Email', 'email', ['for' => 'email', 'class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= form_input($email); ?>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <?= form_label('Password', 'password', ['for' => 'password', 'class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= form_input($password); ?>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <?= form_label('Level', 'level', ['for' => 'level', 'class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= form_dropdown($level, $op_level); ?>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <?= form_label('Status', 'is_active', ['for' => 'is_active', 'class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= form_dropdown($is_active, $op_active, '1'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light py-0">
                <button type="submit" class="btn btn-outline-info" name="save"><i class="fa fa-save mr-2"></i>Save</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php foreach ($users as $row) : ?>
    <div class="modal fade" id="modalEdit<?= $row['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light p-2">
                    <h5 class="modal-title">Edit <?= $title; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body card-info card-outline">
                    <?= form_open_multipart('/admin/users/update/' . $row['id_user']); ?>
                    <?= csrf_field(); ?>
                    <?= form_hidden('id_user', ''); ?>
                    <div class="form-group row">
                        <?= form_label('Image', 'image', ['for' => 'image', 'class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-2">
                            <img src="/assets/img/users/<?= $row['image']; ?>" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <?php $js = 'onchange="previewImg()"'; ?>
                                <?= form_upload($image, '', $js); ?>
                                <?= form_label('Select image', 'image', ['for' => 'image', 'class' => 'custom-file-label']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <?= form_label('Fullname', 'name_user', ['for' => 'name_user', 'class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-10">
                            <?php $value = $row['name_user']; ?>
                            <?= form_input($name_user, $value); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <?= form_label('Email', 'email', ['for' => 'email', 'class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-10">
                            <?php $value = $row['email']; ?>
                            <?= form_input($emailView, $value); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <?= form_label('Password', 'password', ['for' => 'password', 'class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-10">
                            <?php $value = $row['password']; ?>
                            <?= form_input($password, $value); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <?= form_label('Level', 'level', ['for' => 'level', 'class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-10">
                            <?php $selectedLevel = $row['level']; ?>
                            <?= form_dropdown($level, $op_level, $selectedLevel); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <?= form_label('Status', 'is_active', ['for' => 'is_active', 'class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-10">
                            <?php $selectedIsActive = $row['is_active']; ?>
                            <?= form_dropdown($is_active, $op_active, $selectedIsActive); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light py-0">
                    <button type="submit" class="btn btn-outline-info" name="update"><i class="fa fa-save mr-2"></i>Update</button>
                </div>
                <?= form_close(); ?>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($users as $row) : ?>
    <div class="modal fade" id="modalDelete<?= $row['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light p-2">
                    <h5 class="modal-title">Delete <?= $title; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body card-info card-outline">
                    Are you sure to delete <?= $row['name_user']; ?> ?
                </div>
                <div class="modal-footer bg-light py-0">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times mr-2"></i>Cancel</button>
                    <a href="/admin/users/delete/<?= $row['id_user']; ?>" class="btn btn-outline-info"><i class="fa fa-trash mr-2"></i>Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>