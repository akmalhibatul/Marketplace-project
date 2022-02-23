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
          <li><a class="nav-link scrollto" href="index.php#portfolio">Product</a></li>
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
        <a href="u_transaksi.php" class="list-group-item list-group-item-action">Transaksi</a>
        <a href="r_transaksi.php" class="list-group-item list-group-item-action active">Riwayat Transaksi</a>
        <a href="edit.php" class="list-group-item list-group-item-action">Edit Profil</a>
        <a href="login/logout.php" class="list-group-item list-group-item-action">Logout</a>

      </div>
      <div class="core">
        <?php
        $invoice = $_GET['in'];
        $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_user = '$id_user' AND invoice = '$invoice'");
        while ($dt = mysqli_fetch_array($query)) {
        ?>
          <hr>
          <h2 class="title">Detail Pesanan</h2>
          <hr>
          <table class="table table-sm table-borderless">
            <tbody>
              <tr>
                <td>Invoice</td>
                <td><?= $dt['invoice']; ?></td>
              </tr>
              <tr>
                <td>Tanggal Pesan</td>
                <td><?= date($dt['tanggal_transaksi']); ?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td class="text-success fw-bold">Done</td>
              </tr>
              <tr>
                <td>Total Pembayaran</td>
                <th class="text-primary">Rp. <?= number_format($dt['total']); ?></th>
              </tr>
            </tbody>
          </table>
          <hr>
          <hr>
          <h2 class="title">Alamat Pengiriman</h2>
          <hr>
          <?php
          $invoice = $_GET['in'];
          $query = mysqli_query($koneksi, "SELECT * FROM `tb_transaksi`  WHERE  tb_transaksi.invoice = '$invoice'");
          $data = mysqli_fetch_row($query);
          $id_kurir = $data[14];
          ?>
          <?php if ($id_kurir == 2) { ?>

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
          <?php } else { ?>
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
          <hr>
          <hr>
          <div class="row">
            <div class="col-md-7">
              <h2 class="title">Produk Pesanan</h2>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Sub Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $id_transaksi = $dt['id_transaksi'];
                  $no = 1;
                  $query = mysqli_query($koneksi, "SELECT * FROM `tb_keranjang` INNER JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang INNER JOIN tb_ukuran ON tb_ukuran.id_ukuran = tb_keranjang.id_ukuran WHERE id_user = '$id_user' AND id_transaksi = '$id_transaksi'");
                  while ($br = mysqli_fetch_array($query)) {
                  ?>

                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><?= $br['nama_barang']; ?></td>
                      <td><?= $br['unit']; ?></td>
                      <td><?= $br['jumlah']; ?></td>
                      <td>Rp. <?= number_format($br['total']) ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="col-md-5">
              <h2 class="title">Ringkasan Pembayaran</h2>
              <table class="table table-sm table-borderless">
                <?php
                $query = mysqli_query($koneksi, "SELECT sum(jumlah), sum(total) FROM tb_keranjang WHERE `tb_keranjang`.`id_user` = '$id_user' AND tb_keranjang.id_transaksi = '$id_transaksi'");
                $data = mysqli_fetch_row($query);
                $jumlahTotalKeranjang = (int)$data[0];
                $hargaTotalKeranjang = (int)$data[1];

                $query = mysqli_query($koneksi, "SELECT * FROM `tb_transaksi` INNER JOIN tb_kurir ON tb_kurir.id_kurir = tb_transaksi.id_kurir WHERE id_user = '$id_user' AND id_transaksi = '$id_transaksi'");
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
            </div>
          </div>

          <hr>
          <a href="p_transaksi.php?in=<?= $dt['invoice']; ?>" target="_blank" class="btn btn-md btn-primary"><i class="fas fa-print"></i> Cetak bukti</a>
        <?php } ?>
        <hr>
        <h2 class="title mb-3">Status Pesanan</h2>
        <div class="row">
          <div class="col-md-3">
            <p class="text-muted mb-1">Sudah dibayar</p>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
            </div>
          </div>
          <div class="col-md-3">
            <p class="text-muted mb-1">Sedang diproses</p>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
            </div>
          </div>
          <div class="col-md-3">
            <p class="text-muted mb-1">Dalam pengiriman</p>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
            </div>
          </div>
          <div class="col-md-3">
            <p class="text-muted mb-1">Sampai Tujuan</p>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section></section>
  </main><!-- End #main -->
  <?php require_once('footer.php') ?>