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
$id_transaksi = $_GET['id_transaksi'];

$query = mysqli_query($koneksi, "SELECT * FROM `tb_transaksi`  WHERE  tb_transaksi.id_transaksi = '$id_transaksi'");
$data = mysqli_fetch_row($query);
$invoice = $data[1];
$status = $data[16];
$keterangan = $data[17];
$totalsemua = $data[12];
$ongkir = $data[13];

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
                <a class="nav-link" href="index.html">
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
                        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi - <?= $invoice; ?></h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Pesanan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <h4 class="py-3">Status : <?php if ($status == 1) { ?>
                                            <span class="text-danger">Belum Dibayar</span>
                                        <?php } elseif ($status == 2) { ?>
                                            <span class="text-warning">Menunggu Konfirmasi</span>
                                        <?php } elseif ($status == 3) { ?>
                                            <span class="text-info">DiProses</span>
                                        <?php } elseif ($status == 4) { ?>
                                            <span class="text-info">Dikirim</span>
                                        <?php } elseif ($status == 5) { ?>
                                            <span class="text-success">Selesai</span>
                                        <?php } else { ?>
                                            <span class="text-danger">Dibatalkan</span>
                                        <?php } ?>
                                    </h4>
                                    <?php if ($status == 6) { ?>
                                        <h4 class="py-3">Keterangan : <span class="text-danger"><?= $keterangan; ?></span></h4>
                                    <?php } ?>

                                    <h5 class="font-weight-bold">Pesanan</h5>

                                    <?php
                                    $id_transaksi = $_GET['id_transaksi'];

                                    $query = mysqli_query($koneksi, "SELECT * FROM `tb_transaksi`  WHERE  tb_transaksi.id_transaksi = '$id_transaksi'");
                                    $data = mysqli_fetch_row($query);
                                    $id_kurir = $data[14];
                                    ?>
                                    <?php if ($id_kurir == 2) { ?>
                                        <?php
                                        $id_transaksi = $_GET['id_transaksi'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'");
                                        while ($dt = mysqli_fetch_array($query)) {
                                        ?>
                                            <table class="table table-sm table-borderless">
                                                <tr>
                                                    <td>Nama Pembeli</td>
                                                    <td>: <b><?= $dt['nama_penerima']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Telepon</td>
                                                    <td>: <?= $dt['telp']; ?></td>
                                                </tr>
                                            </table>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php
                                        $id_transaksi = $_GET['id_transaksi'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_transaksi = '$id_transaksi'");
                                        while ($dt = mysqli_fetch_array($query)) {
                                        ?>
                                            <table class="table table-sm table-borderless">
                                                <tr>
                                                    <td class="fw-bold">Alamat Tujuan :</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Penerima</td>
                                                    <td><b><?= $dt['nama_penerima']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td><?= $dt['alamat']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $dt['kelurahan']; ?> - <?= $dt['kecamatan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $dt['kota']; ?> - <?= $dt['provinsi']; ?> - <?= $dt['kode_pos']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Telepon</td>
                                                    <td><?= $dt['telp']; ?></td>
                                                </tr>
                                            </table>
                                        <?php } ?>
                                    <?php } ?>


                                    <h5 class="font-weight-bold">Pesanan</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Unit</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $id_transaksi = $_GET['id_transaksi'];
                                        $no = 1;
                                        $query = "SELECT * FROM `tb_transaksi` INNER JOIN tb_keranjang ON tb_keranjang.id_transaksi = tb_transaksi.id_transaksi INNER JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang INNER JOIN tb_ukuran ON tb_ukuran.id_ukuran = tb_keranjang.id_ukuran WHERE tb_transaksi.id_transaksi = '$id_transaksi'";
                                        $result = mysqli_query($koneksi, $query);
                                        while ($p = mysqli_fetch_array($result)) {
                                        ?>

                                            <tbody>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $p['nama_barang']; ?></td>
                                                    <td><?= $p['unit']; ?></td>
                                                    <td><?= $p['jumlah']; ?></td>
                                                </tr>
                                            </tbody>
                                        <?php } ?>

                                    </table>
                                    <h5 class="font-weight-bold mt-4">Transaksi</h5>
                                    <table class="table table-sm table-borderless">
                                        <table class="table table-sm table-borderless">
                                            <?php
                                            $id_transaksi = $_GET['id_transaksi'];

                                            $query = mysqli_query($koneksi, "SELECT sum(jumlah), sum(total) FROM tb_keranjang WHERE  tb_keranjang.id_transaksi = '$id_transaksi'");
                                            $data = mysqli_fetch_row($query);
                                            $jumlahTotalKeranjang = (int)$data[0];
                                            $hargaTotalKeranjang = (int)$data[1];

                                            $query = mysqli_query($koneksi, "SELECT * FROM `tb_transaksi` INNER JOIN tb_kurir ON tb_kurir.id_kurir = tb_transaksi.id_kurir WHERE  tb_transaksi.id_transaksi = '$id_transaksi'");
                                            $data = mysqli_fetch_row($query);
                                            $totalsemua = $data[12];
                                            $ongkir = $data[13];
                                            $id_kurir = $data[14];

                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_kurir WHERE id_kurir = $id_kurir");
                                            $data = mysqli_fetch_row($query);
                                            $kurir = $data[1];
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td>Jumlah Produk</td>
                                                    <td>: <?= $jumlahTotalKeranjang; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Harga Produk</td>
                                                    <td>: Rp. <?= number_format($hargaTotalKeranjang); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kurir</td>
                                                    <td>: <?= $kurir; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ongkis Kirim</td>
                                                    <td>: Rp. <?= number_format($ongkir); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total Belanja</td>
                                                    <td>: Rp. <?= number_format($totalsemua); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </table>
                                    <?php
                                    $id_transaksi = $_GET['id_transaksi'];

                                    $query = mysqli_query($koneksi, "SELECT status FROM tb_transaksi WHERE  tb_transaksi.id_transaksi = '$id_transaksi'");
                                    $data = mysqli_fetch_row($query);
                                    $p = $data[0];
                                    ?>
                                    <?php if ($p == 1) { ?>
                                        <form action="konfirmasi.php" method="POST">
                                            <input type="text" name="id_transaksi" value="<?= $id_transaksi; ?>" hidden>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                Batalkan
                                            </button>
                                            <a href="pesanan.php" class="btn btn-warning">Kembali</a>

                                        </form>
                                    <?php } elseif ($p == 2) { ?>
                                        <form action="konfirmasi.php" method="POST">
                                            <input type="text" name="id_transaksi" value="<?= $id_transaksi; ?>" hidden>
                                            <input type="text" name="id_kurir" value="<?= $id_kurir; ?>" hidden>
                                            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin konfirmasi Pesanan?')">Konfirmasi</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                Batalkan
                                            </button>
                                            <a href="pesanan.php" class="btn btn-warning">Kembali</a>

                                        </form>
                                    <?php } elseif ($p == 3) { ?>
                                        <form action="kirim.php" method="POST">
                                            <input type="text" name="id_transaksi" value="<?= $id_transaksi; ?>" hidden>
                                            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin Barang Sudah Siap ?')">Kirim</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                Batalkan
                                            </button> <a href="pesanan.php" class="btn btn-warning">Kembali</a>

                                        </form>
                                    <?php } elseif ($p == 4) { ?>
                                        <a href="pesanan.php" class="btn btn-warning">Kembali</a>

                                    <?php } elseif ($p == 5) { ?>
                                        <a href="pesanan.php" class="btn btn-warning">Kembali</a>

                                    <?php } else { ?>
                                        <a href="pesanan.php" class="btn btn-warning">Kembali</a>

                                    <?php } ?>


                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Bukti</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php
                                    $id_transaksi = $_GET['id_transaksi'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi INNER JOIN tb_bukti ON tb_bukti.id_bukti = tb_transaksi.id_bukti WHERE tb_transaksi.id_transaksi = '$id_transaksi'");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <img src="img/bukti/<?= $data['foto_bukti']; ?>" class="img-fluid">
                                    <?php } ?>
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
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Batalkan Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="batalkan.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="id_transaksi" value="<?= $id_transaksi; ?>" hidden>
                            <label>Keterangan :</label>
                            <input type="text" class="form-control" name="keterangan" required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
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



</body>

</html>