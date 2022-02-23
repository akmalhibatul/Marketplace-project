<?php
include('koneksi.php');
session_start();
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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .container-fluid {
      max-width: 1200px
    }

    .card {
      background: #fff;
      box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
      transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
      border: 0;
      border-radius: 1rem
    }

    .card-img,
    .card-img-top {
      border-top-left-radius: calc(1rem - 1px);
      border-top-right-radius: calc(1rem - 1px)
    }

    .card h5 {
      overflow: hidden;
      height: 30px;
      font-weight: 900;
      font-size: 15px;
      padding: 10px;
    }

    .card .harga h5 {
      color: #ff6d00;
    }

    .card-img-top {
      width: 100%;
      max-height: 180px;
      object-fit: contain;
      padding: 10px
    }

    .card h2 {
      font-size: 1rem
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06)
    }

    .label-top {
      position: absolute;
      background-color: #8bc34a;
      color: #fff;
      top: 8px;
      right: 8px;
      padding: 5px 10px 5px 10px;
      font-size: .7rem;
      font-weight: 600;
      border-radius: 3px;
      text-transform: uppercase
    }


    @media (max-width: 768px) {
      .card-img-top {
        max-height: 250px
      }
    }


    .produk .btn {
      font-size: 1rem;
      font-weight: 500;
      text-transform: uppercase;
      padding: 5px 50px 5px 50px
    }


    @media (max-width: 1025px) {
      .produk .btn {
        padding: 5px 40px 5px 40px
      }
    }

    @media (max-width: 250px) {
      .produk .btn {
        padding: 5px 30px 5px 30px
      }
    }

    .btn-outline-warning {
      background: #ff6d00;
      color: #fff;
    }

    .btn-outline-warning:hover {
      background: #ff6d00;
      color: #fff;
    }



    .produk .btn-warning {
      background: none #ff6d00;
      color: #ffffff;
      fill: #ffffff;
      border: none;
      text-decoration: none;
      outline: 0;
      box-shadow: -1px 6px 19px rgba(247, 129, 10, 0.25);
      border-radius: 100px
    }

    .produk .btn-warning:hover {
      background: none #ff6d00;
      color: #ffffff;
      box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35)
    }

    .bg-success {
      font-size: 1rem;
      background-color: #ff6d00 !important
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
          <li><a class="nav-link scrollto active" href="index.php#portfolio">Product</a></li>
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

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <?php
          $id_kategori = $_GET['id_kategori'];
          $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori = '$id_kategori'");
          while ($kt = mysqli_fetch_array($query)) {
          ?>
            <h3>Category - Product <span><?= $kt['nama_kategori']; ?></span></h3>
          <?php } ?>

        </div>
        <div class="produk">
          <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3 justify-content-center">

              <?php
              $id_kategori = $_GET['id_kategori'];
              $query = mysqli_query($koneksi, "SELECT * FROM tb_barang JOIN tb_kategori ON tb_kategori.id_kategori = tb_barang.id_kategori WHERE tb_barang.id_kategori = '$id_kategori' ORDER BY tb_barang.id_barang DESC");
              while ($data = mysqli_fetch_array($query)) {
              ?>
                <div class="col">
                  <div class="card h-100 shadow-sm"> <img src="admin/img/barang/<?= $data['foto_barang']; ?>" class="card-img-top" alt="<?= $data['nama_barang']; ?>">
                    <div class="label-top shadow-sm"><?= $data['nama_kategori']; ?></div>
                    <div class="card-body">
                      <h5 class="card-title"><?= $data['nama_barang']; ?></h5>
                      <div class="harga">
                        <?php
                        //harga terendah barang
                        $id_barang = $data['id_barang'];
                        $harga_terendah = mysqli_query($koneksi, "SELECT * FROM tb_harga INNER JOIN tb_ukuran ON tb_ukuran.id_ukuran = tb_harga.id_ukuran INNER JOIN tb_barang ON tb_barang.id_barang = tb_ukuran.id_barang WHERE tb_ukuran.id_barang = '$id_barang' ORDER BY tb_harga.harga ASC LIMIT 1;");
                        while ($row = $harga_terendah->fetch_assoc()) {
                          $harga_min = $row['harga'];
                        }

                        //harga tertinggi
                        $harga_terendah = mysqli_query($koneksi, "SELECT * FROM tb_harga INNER JOIN tb_ukuran ON tb_ukuran.id_ukuran = tb_harga.id_ukuran INNER JOIN tb_barang ON tb_barang.id_barang = tb_ukuran.id_barang WHERE tb_ukuran.id_barang = '$id_barang' ORDER BY tb_harga.harga DESC LIMIT 1;");
                        while ($row = $harga_terendah->fetch_assoc()) {
                          $harga_max = $row['harga'];
                        }
                        ?>
                        <h5 class="card-title">Rp. <?= number_format($harga_min); ?> - Rp. <?= number_format($harga_max); ?>0/pcs</h5>
                      </div>
                      <div class="text-center my-3"> <a href="detail_produk.php?id_barang=<?= $data['id_barang']; ?>" class="btn btn-warning">Detail Product</a> </div>
                    </div>
                  </div>
                </div>
              <?php } ?>



            </div>

          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->
  </main><!-- End #main -->
  <?php require_once('footer.php') ?>