<?php
include('../koneksi.php');
include('indo_format.php');
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

    <title>Pipemaster - admin</title>
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
            <li class="nav-item active">
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
            <li class="nav-item">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
                        <h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Pesanan</h6>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Menunggu Konfirmasi</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Perlu Dikirim</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Dikirim</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-selesai-tab" data-toggle="pill" href="#pills-selesai" role="tab" aria-controls="pills-selesai" aria-selected="false">Selesai</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-batal-tab" data-toggle="pill" href="#pills-batal" role="tab" aria-controls="pills-batal" aria-selected="false">Dibatalkan</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="table-responsive-lg">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Tanggal Pesan</th>
                                                <th>Invoice</th>
                                                <th>Nama Pembeli</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi  WHERE  status = 1 OR status = 2 ORDER BY id_transaksi DESC");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= format_hari_tanggal($data['tanggal_transaksi']); ?></td>
                                                    <td><?= $data['invoice']; ?></td>
                                                    <td><?= $data['nama_penerima']; ?></td>
                                                    <td>Rp. <?= number_format($data['total']) ?></td>
                                                    <td class="text-<?php if ($data['status'] == 1) {
                                                                        echo "danger";
                                                                    } elseif ($data['status'] == 2) {
                                                                        echo "warning";
                                                                    } ?>"><?php if ($data['status'] == 1) {
                                                                                echo "Belum Bayar";
                                                                            } elseif ($data['status'] == 2) {
                                                                                echo "Menunggu konfirmasi";
                                                                            } ?></td>
                                                    <td>
                                                        <a href="detail_transaksi.php?id_transaksi=<?= $data['id_transaksi']; ?>" class="btn btn-primary">Detail</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="table-responsive-lg">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Tanggal Pesan</th>
                                                <th>Total Pembayaran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE  status = 3 ORDER BY id_transaksi DESC");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data['invoice']; ?></td>
                                                    <td><?= format_hari_tanggal($data['tanggal_transaksi']); ?></td>
                                                    <td>Rp. <?= number_format($data['total']); ?></td>
                                                    <td class="text-warning font-weight-bold">Dikemas</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="detail_transaksi.php?id_transaksi=<?= $data['id_transaksi']; ?>" class="btn btn-primary">Detail</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="table-responsive-lg">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Tanggal Pesan</th>
                                                <th>Total Pembayaran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status = 4 ORDER BY id_transaksi DESC");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data['invoice']; ?></td>
                                                    <td><?= format_hari_tanggal($data['tanggal_transaksi']); ?></td>
                                                    <td>Rp. <?= number_format($data['total']); ?></td>
                                                    <td class="text-info">Dalam pengiriman</td>
                                                    <td><small><a href="detail_transaksi.php?id_transaksi=<?= $data['id_transaksi']; ?>" class="btn btn-primary">Detail</a></small></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="pills-selesai">
                                    <div class="table-responsive-lg">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Tanggal Pesan</th>
                                                <th>Total Pembayaran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status = 5 ORDER BY id_transaksi DESC");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data['invoice']; ?></td>
                                                    <td><?= format_hari_tanggal($data['tanggal_transaksi']); ?></td>
                                                    <td>Rp. <?= number_format($data['total']); ?></td>
                                                    <td class="text-success text-weight-bold">Selesai</td>
                                                    <td><small><a href="detail_transaksi.php?id_transaksi=<?= $data['id_transaksi']; ?>" class="btn btn-primary">Detail</a></small></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-batal" role="tabpanel" aria-labelledby="pills-batal">
                                    <div class="table-responsive-lg">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Tanggal Pesan</th>
                                                <th>Total Pembayaran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status = 6 ORDER BY id_transaksi DESC");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data['invoice']; ?></td>
                                                    <td><?= format_hari_tanggal($data['tanggal_transaksi']); ?></td>
                                                    <td>Rp. <?= number_format($data['total']); ?></td>
                                                    <td class="text-danger">Dibatalakan</td>
                                                    <td><small><a href="detail_transaksi.php?id_transaksi=<?= $data['id_transaksi']; ?>" class="btn btn-danger">Detail</a></small></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
                        <span>Copyright &copy; Your Website 2020</span>
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