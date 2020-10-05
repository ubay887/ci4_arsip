<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title . ' | ' . $setting['name_web']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/img/<?= $setting['image']; ?>">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/dist/css/adminlte.css">
    <link rel="stylesheet" href="/assets/dist/css/mystyle.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?= $this->include('layout/navbar'); ?>

        <!-- Main Sidebar Container -->
        <?= $this->include('layout/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $title; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <?= $this->renderSection('content'); ?>

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y'); ?> <a href="<?= $setting['link_web']; ?>"><?= $setting['name_web']; ?></a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert-success").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 1500);
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert-danger").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 1500);
    </script>

    <!-- DataTables -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $("#table1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "paging": true,
            });
        });
    </script>
    <script>
        $(document).on('click', '#btn-edit', function() {
            $('.modal-body #id').val($(this).data('id'));
            $('.modal-body #name').val($(this).data('name'));
            $('.modal-body #slug').val($(this).data('slug'));
            $('.modal-body #email').val($(this).data('email'));
            $('.modal-body #image').val($(this).data('image'));
            $('.modal-body #username').val($(this).data('username'));
            $('.modal-body #password').val($(this).data('password'));
            $('.modal-body #level').val($(this).data('level'));
            $('.modal-body #is_active').val($(this).data('is_active'));
            $('.modal-body #created_at').val($(this).data('created_at'));
        })
    </script>
    <!-- SweetAlert2 -->
    <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="/assets/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript">
        const swal = $('.swal').data('swal');
        if (swal) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });
            Toast.fire({
                title: swal,
                icon: 'success',
            })
        }
    </script>

    <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            $('.textarea').summernote()
        })
    </script>
    <!-- CKEditor -->
    <!-- <script src="/assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script>
        CKEDITOR.replace('content');
    </script> -->
</body>

</html>