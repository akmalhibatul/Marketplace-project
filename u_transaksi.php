<?php
include('koneksi.php');
session_start();
if (!$_SESSION['email']) {
    header('Location:login/');
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
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pipe master</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        div.wrapper {
            display: flex;
            flex-direction: row;
            height: auto;
            justify-content: space-between;
            margin: 50px auto;
            width: 1100px;
        }

        div.wrapper div.list-group {
            width: 250px;
        }

        div.wrapper div.core {
            height: auto;
            width: 800px;
        }

        div.wrapper div.core h2.title {
            color: #222222;
            font-size: 20px;
        }

        div.wrapper div.core div.item-product {
            height: auto;
            margin-bottom: 20px;
            position: relative;
            width: 100%;
        }

        div.wrapper div.core div.item-product img {
            float: left;
            height: 150px;
            margin-right: 20px;
            object-fit: cover;
            position: relative;
            width: 150px;
        }

        div.wrapper div.core div.item-product h3.product_name {
            color: #333333;
            font-family: "Nunito";
            font-size: 16px;
        }

        div.wrapper div.core div.item-product p {
            color: #555;
            font-size: 14px;
        }

        div.wrapper div.core div.item-product p.price {
            color: tomato;
            font-size: 18px;
        }

        div.wrapper div.core div.form-group img.photo-profile {
            height: 100px;
            object-fit: cover;
            width: 100px;
        }

        @media screen and (max-width: 1150px) {
            div.wrapper {
                width: 900px;
            }

            div.wrapper div.list-group {
                width: 200px;
            }

            div.wrapper div.core {
                width: 670px;
            }
        }

        @media screen and (max-width: 950px) {
            div.wrapper {
                display: block;
                margin-top: 30px;
                width: 90%;
            }

            div.wrapper div.list-group {
                display: 100%;
                margin-bottom: 20px;
                width: 100%;
            }

            div.wrapper div.core {
                margin-top: 20px;
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <!-- <h1 class="logo me-auto"><a href="index.php">Presento<span>.</span></a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.php" class="logo me-auto"><img src="assets/img/unnamed (1).png" width="75%" alt=""></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="index.php#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="produk.php">Product</a></li>
                    <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
                    <?php
                    if (isset($_SESSION['id_level']) == '2') {
                    ?>

                        <li><a class="nav-link scrollto" href="keranjang.php">Keranjang</a></li>

                    <?php } ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <?php if (isset($_SESSION['id_level']) == '2') { ?>

                <a href="user.php" class="get-started-btn scrollto">Dashboard</a>

            <?php } else { ?>

                <a href="login/" class="get-started-btn scrollto">Login / Register</a>

            <?php } ?>
        </div>
    </header><!-- End Header -->
    <main id="main">
        <section></section>
        <div class="wrapper">
            <div class="list-group">
                <a href="user.php" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="u_transaksi.php" class="list-group-item list-group-item-action active">Transaksi</a>
                <a href="r_transaksi.php" class="list-group-item list-group-item-action">Riwayat Transaksi</a>
                <a href="edit.php" class="list-group-item list-group-item-action">Edit Profil</a>
                <a href="login/logout.php" class="list-group-item list-group-item-action">Logout</a>

            </div>
            <div class="core">
                <h2 class="title">Pesanan Anda</h2>
                <hr>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Belum Bayar</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">DiProses</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Dikirim</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-batal-tab" data-bs-toggle="pill" data-bs-target="#pills-batal" type="button" role="tab" aria-controls="pills-batal" aria-selected="false">Dibatalkan</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Invoice</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_user = '$id_user' AND status = 1 OR status = 2 ORDER BY id_transaksi DESC");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $data['invoice']; ?></td>
                                        <td><?= date($data['tanggal_transaksi']); ?></td>
                                        <td>Rp. <?= number_format($data['total']); ?></td>
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
                                            <?php if ($data['status'] == 1) { ?>
                                                <small><a href="d_transaksi.php?in=<?= $data['invoice']; ?>" class="text-danger fw-bold">Bayar</a></small>
                                            <?php } elseif ($data['status'] == 2) { ?>
                                                <small><a href="d_transaksi.php?in=<?= $data['invoice']; ?>" class="text-warning fw-bold">Lihat</a></small>
                                            <?php } ?>
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
                                    <th>#</th>
                                </tr>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_user = '$id_user' AND status = 3 ORDER BY id_transaksi DESC");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $data['invoice']; ?></td>
                                        <td><?= date($data['tanggal_transaksi']); ?></td>
                                        <td>Rp. <?= number_format($data['total']); ?></td>
                                        <td class="text-warning fw-bold">Dikemas</td>
                                        <td><small><a href="d_transaksi.php?in=<?= $data['invoice']; ?>" class="text-warning fw-bold">Detail</a></small></td>
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
                                    <th>#</th>
                                </tr>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_user = '$id_user' AND status = 4 ORDER BY id_transaksi DESC");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $data['invoice']; ?></td>
                                        <td><?= date($data['tanggal_transaksi']); ?></td>
                                        <td>Rp. <?= number_format($data['total']); ?></td>
                                        <td class="text-info">Dalam pengiriman</td>
                                        <td><small><a href="d_transaksi.php?in=<?= $data['invoice']; ?>" class="text-info">Detail</a></small></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-batal" role="tabpanel" aria-labelledby="pills-batal-tab">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Invoice</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_user = '$id_user' AND status = 6 ORDER BY id_transaksi DESC");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $data['invoice']; ?></td>
                                        <td><?= date($data['tanggal_transaksi']); ?></td>
                                        <td>Rp. <?= number_format($data['total']); ?></td>
                                        <td class="text-danger">Dibatalkan</td>
                                        <td><small><a href="d_transaksi.php?in=<?= $data['invoice']; ?>" class="text-danger">Detail</a></small></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <section></section>
    </main><!-- End #main -->
    <?php require_once('footer.php') ?>