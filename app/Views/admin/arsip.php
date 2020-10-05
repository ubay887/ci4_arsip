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
                            <!-- <a href="/admin/arsip/excel" class="btn btn-outline-success btn-sm mb-2 px-3 shadow" title="Export Excel"><i class="fa fa-file-excel"></i></a> -->
                            <button class="btn btn-outline-secondary btn-sm mb-2 px-3 shadow" title="Print" onclick="window.print()"><i class="fa fa-print"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1px">No</th>
                                    <th width="50px">File</th>
                                    <th width="130px">No Arsip</th>
                                    <th width="auto">Name</th>
                                    <th width="auto">Description</th>
                                    <th width="100px">Departement</th>
                                    <th width="100px">Category</th>
                                    <th width="100px">User</th>
                                    <th width="5px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($arsip as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="text-center"><a href="/assets/file/arsip/<?= $row['file']; ?>" title="File" target="_blank"><i class="fa fa-file-pdf fa-2x"></i></a></td>
                                        <td><?= $row['no_arsip']; ?></td>
                                        <td><?= $row['name_file']; ?></td>
                                        <td><?= $row['description']; ?></td>
                                        <td><?= $row['name_dept']; ?></td>
                                        <td><?= $row['name_category']; ?></td>
                                        <td><?= $row['name_user']; ?></td>
                                        <td>
                                            <a href="" class="btn btn-info btn-xs" title="Edit Data" data-toggle="modal" data-target="#modalEdit<?= $row['id_arsip']; ?>"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger btn-xs" title="Delete Data" data-toggle="modal" data-target="#modalDelete<?= $row['id_arsip']; ?>"><i class="fa fa-trash"></i></a>
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
$file = ['name' => 'file', 'id' => 'file', 'type' => 'file', 'class' => 'custom-file-input'];
$id_category = ['name' => 'id_category', 'id' => 'id_category', 'class' => 'form-control'];
$no_arsip = ['name' => 'no_arsip', 'id' => 'no_arsip', 'class' => 'form-control', 'readonly' => ''];
$name_file = ['name' => 'name_file', 'id' => 'name_file', 'class' => 'form-control', 'required' => ''];
$description = ['name' => 'description', 'id' => 'description', 'type' => 'textarea', 'class' => 'form-control', 'rows' => '3', 'required' => ''];
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
                <?= form_open_multipart('/admin/arsip/create'); ?>
                <?= csrf_field(); ?>
                <?php $count = $count_arsip + 1;
                $no_arsip = $count . '/' . $setting['name_web'] . '/' . date('m') . '/' . date('Y');
                ?>
                <input type="hidden" name="id_dept" id="id_dept" value="<?= session()->get('id_dept'); ?>">
                <div class="form-group row mb-1">
                    <label for="no_arsip" class="col-sm-2 col-form-label">Nomor</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_arsip" class="form-control" value="<?= $no_arsip; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <?= form_label('File', 'file', ['class' => 'col-sm-2 col-form-label', 'for' => 'file']); ?>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <?= form_upload($file); ?>
                            <?= form_label('Pilih File', 'file', ['class' => 'custom-file-label', 'for' => 'file']); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <?= form_label('Name', 'name_file', ['for' => 'name_file', 'class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= form_input($name_file); ?>
                    </div>
                </div>

                <div class="form-group row mb-1">
                    <?= form_label('Category', 'id_category', ['for' => 'id_category', 'class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?php foreach ($category as $row) : ?>
                            <?php $optionsCate = array_combine(
                                array_column($category, 'id_category'),
                                array_column($category, 'name_category')
                            ); ?>
                        <?php endforeach; ?>
                        <?= form_dropdown($id_category, $optionsCate); ?>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <?= form_label('Desc', 'description', ['for' => 'description', 'class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= form_textarea($description); ?>
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

<?php foreach ($arsip as $row) : ?>
    <div class="modal fade" id="modalEdit<?= $row['id_arsip']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light p-2">
                    <h5 class="modal-title">Edit <?= $title; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body card-info card-outline">
                    <?= form_open_multipart('/admin/arsip/update/' . $row['id_arsip']); ?>
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_arsip" value="<?= $row['id_arsip']; ?>">
                    <input type="hidden" name="oldFile" value="<?= $row['file']; ?>">
                    <input type="hidden" name="id_dept" value="<?= session()->get('id_dept'); ?>">
                    <div class="form-group row mb-1">
                        <label for="no_arsip" class="col-sm-2 col-form-label">Nomor</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_arsip" class="form-control" value="<?= $row['no_arsip']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <?= form_label('File', 'file', ['class' => 'col-sm-2 col-form-label', 'for' => 'file']); ?>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <?= form_upload($file); ?>
                                <?= form_label($row['file'], 'file', ['class' => 'custom-file-label', 'for' => 'file']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <?= form_label('Name', 'name_file', ['for' => 'name_file', 'class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-10">
                            <?php $value = $row['name_file']; ?>
                            <?= form_input($name_file, $value); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <?= form_label('Category', 'id_category', ['for' => 'id_category', 'class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-10">
                            <?= form_dropdown($id_category, $optionsCate, '1'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <?= form_label('Desc', 'description', ['for' => 'description', 'class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-10">
                            <?php $value = $row['description']; ?>
                            <?= form_textarea($description, $value); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light py-0">
                    <button type="submit" class="btn btn-outline-info" name="update"><i class="fa fa-save mr-2"></i>Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($arsip as $row) : ?>
    <div class="modal fade" id="modalDelete<?= $row['id_arsip']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light p-2">
                    <h5 class="modal-title">Delete <?= $title; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body card-info card-outline">
                    Are you sure to delete <b><?= $row['name_file']; ?></b> ?
                </div>
                <div class="modal-footer bg-light py-0">
                    <a href="/admin/arsip/delete/<?= $row['id_arsip']; ?>" type="submit" class="btn btn-outline-danger" name="delete"><i class="fa fa-trash mr-2"></i>Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>