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
        <a href="user.php" class="list-group-item list-group-item-action active">Dashboard</a>
        <a href="u_transaksi.php" class="list-group-item list-group-item-action">Transaksi</a>
        <a href="r_transaksi.php" class="list-group-item list-group-item-action">Riwayat Transaksi</a>
        <a href="edit.php" class="list-group-item list-group-item-action">Edit Profil</a>
        <a href="login/logout.php" class="list-group-item list-group-item-action">Logout</a>
      </div>
      <div class="core">
        <div class="alert alert-secondary">Selamat Datang <b><?= $nama; ?></b> di Halaman Dashboard</div>
        <div class="row">
          <div class="col-md-6">
            <div class="card shadow-sm h-100 py-2">
              <div class="card-body">
                <?php
                $query = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) FROM `tb_transaksi` WHERE id_user = $id_user AND status = 1");
                $data = mysqli_fetch_row($query);
                $jml_tr = $data[0];
                ?>
                <div class="font-weight-bold text-dark text-uppercase mb-0"><?= $jml_tr; ?> Transaksi</div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card shadow-sm h-100 py-2">
              <div class="card-body">
                <?php
                $query = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) FROM `tb_transaksi` WHERE id_user = '$id_user' AND  status = 5");
                $data = mysqli_fetch_row($query);
                $jml_d = $data[0];
                ?>
                <div class="font-weight-bold text-dark text-uppercase mb-0"><?= $jml_d; ?> Riwayat Transaksi</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="card shadow-sm">
              <div class="card-body">
                Jika ada pertanyaan silakan mengubungi <a href="tel:+622150536868" target="_blank">klik disini</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section></section>
  </main><!-- End #main -->
  <?php require_once('footer.php') ?>