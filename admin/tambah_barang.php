<?php
include('../koneksi.php');
session_start();
error_reporting();
if (!$_SESSION['email']) {
    header('Location:../login/');
    exit();
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM `tb_user` WHERE `email` = '$email'";
    $result = $koneksi->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id_user = $row['id_user'];
        $nama = $row['nama'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pipemaster - Admin</title>
    <link href="../assets/img/favicon.ico" rel="icon">
    <link href="../assets/img/favicon.ico">
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-hard-hat"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pipemaster</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pesanan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="pesanan.php">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Pesanan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="laporan.php">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Laporan Pesanan</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Barang
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="barang.php">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Barang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kategori.php">
                    <i class="fas fa-fw fa-boxes"></i>
                    <span>Kategori</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ukuran.php">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Ukuran & Stok
                    </span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="setting.php">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>User Setting
                    </span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="../login/logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $nama; ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah barang</h1>
                        <a href="barang.php" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm">Kembali</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah barang</h6>
                        </div>
                        <div class="card-body">
                            <form action="prosesbarang.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Kategori</label>
                                    <select class="form-control" name="id_kategori">
                                        <option selected disabled value="">Pilih Kategori</option>

                                        <?php
                                        include('../koneksi.php');
                                        $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                                        while ($kt = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?= $kt['id_kategori']; ?>"><?= $kt['nama_kategori']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Unit</label>
                                    <select class="form-control" name="unit">
                                        <option selected disabled value="">Pilih Unit</option>
                                        <option value="Meter">Meter</option>
                                        <option value="Inc">Inc</option>
                                        <option value="Qty">Qty</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Foto barang</label>
                                    <input type="file" class="form-control-file" name="foto_barang">
                                </div>
                                <button class="btn btn-primary" type="submit">Tambah</button>
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Pipe Master <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sudah Selesai Urusan Anda ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda Ingin Logout ?.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>