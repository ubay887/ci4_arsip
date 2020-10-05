<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>

            <div class="col-sm-12">
                <div class="card ">
                    <?php if (session()->get('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>


                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>

                        <div class="card-tools">
                            <button class="btn btn-outline-info btn-sm px-3 shadow" title="Add Data" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-user-plus"></i></button>
                            </button>
                        </div>
                    </div>
                    <div class="card-body card-outline card-secondary">
                        <table id="table1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1px">No</th>
                                    <th width="auto">Departement</th>
                                    <th width="5px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($departement as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['name_dept']; ?></td>
                                        <td>
                                            <a href="" class="btn btn-info btn-xs" title="Edit Data" data-toggle="modal" data-target="#modalEdit<?= $row['id_dept']; ?>"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger btn-xs" title="Delete Data" data-toggle="modal" data-target="#modalDelete<?= $row['id_dept']; ?>"><i class="fa fa-trash"></i></a>
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
        </div>
    </div>
</section>

<!-- Modal -->
<?php
$name_dept = ['name' => 'name_dept', 'id' => 'name_dept', 'class' => 'form-control', 'required' => ''];
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
                <?= form_open_multipart('/admin/departement/create'); ?>
                <?= csrf_field(); ?>
                <div class="form-group row mb-1">
                    <?= form_label('Departement', 'name_dept', ['for' => 'name_dept', 'class' => 'col-sm-3 col-form-label']); ?>
                    <div class="col-sm-9">
                        <?= form_input($name_dept); ?>
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

<?php foreach ($departement as $row) : ?>
    <div class="modal fade" id="modalEdit<?= $row['id_dept']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light p-2">
                    <h5 class="modal-title">Update <?= $title; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body card-info card-outline">
                    <?= form_open_multipart('/admin/departement/update/' . $row['id_dept']); ?>
                    <?= csrf_field(); ?>
                    <div class="form-group row mb-1">
                        <?= form_label('Departement', 'name_dept', ['for' => 'name_dept', 'class' => 'col-sm-3 col-form-label']); ?>
                        <div class="col-sm-9">
                            <?php $value = $row['name_dept']; ?>
                            <?= form_input($name_dept, $value); ?>
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

<?php foreach ($departement as $row) : ?>
    <div class="modal fade" id="modalDelete<?= $row['id_dept']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light p-2">
                    <h5 class="modal-title">Delete <?= $title; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body card-info card-outline">
                    Are you sure to delete <b><?= $row['name_dept']; ?></b> ?
                </div>
                <div class="modal-footer bg-light py-0">
                    <a href="/admin/departement/delete/<?= $row['id_dept']; ?>" type="submit" class="btn btn-outline-danger" name="delete"><i class="fa fa-trash mr-2"></i>Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>