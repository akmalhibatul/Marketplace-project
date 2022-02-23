<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pipe master</title>
  
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

    .btn-warning {
      background: none #ff6d00;
      color: #ffffff;
      fill: #ffffff;
      border: none;
      text-decoration: none;
      outline: 0;
      box-shadow: -1px 6px 19px rgba(247, 129, 10, 0.25);
    }

    .btn-warning:hover {
      background: none #ff6d00;
      color: #ffffff;
      box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35)
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo me-auto"><img src="assets/img/unnamed (1).png" width="75%" alt=""></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Product</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
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
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>Pipe Master</span></h1>
      <h2>PIPE MASTER. We willing to solve all the piping system problems for you.</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Product</h2>
          <h3>Category <span>Product</span></h3>
        </div>

        <div class="row">
          <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
            <div class="row  justify-content-center row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
              <?php
              include('koneksi.php');
              $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
              while ($data = mysqli_fetch_array($query)) {
              ?>
                <div class="col">
                  <a href="produk-categori.php?id_kategori=<?= $data['id_kategori']; ?>">
                    <div class="card h-100 shadow-sm"> <img src="admin/img/kategori/<?= $data['foto_kategori']; ?>" class="card-img-top" alt="<?= $data['nama_kategori']; ?>">
                      <div class="card-body">
                        <h5 class="card-title"><?= $data['nama_kategori']; ?></h5>
                      </div>
                    </div>
                  </a>
                </div>
              <?php } ?>

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <section id="portfolio" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Product</h2>
          <h3>New <span>Product</span></h3>
        </div>

        <div class="row">
          <div class="produk">
            <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
              <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3 justify-content-center">

                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM tb_barang JOIN tb_kategori ON tb_kategori.id_kategori = tb_barang.id_kategori ORDER BY tb_barang.id_barang DESC LIMIT 8");
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
          <center>
            <a href="produk.php" class="btn btn-warning mt-2">Lihat Produk Lainnya</a>
          </center>
        </div>

      </div>
    </section><!-- End Portfolio Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Contact Us</span></h3>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Jl. Raya Serang Km 12 Desa Sukadamai Rt 06/01 Cikupa Tangerang, Sukadamai, Cikupa, Tangerang, Banten 15710</p>
            </div>
          </div>



          <div class="col-lg-6 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Phone</h3>
              <p>+62-21-50536868</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d833.8115288688709!2d106.54531557578828!3d-6.224328010796529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fe07cdb1d8ad%3A0xddfb812a0997dedc!2sJl.%20Raya%20Serang%20Km.12%2C%20Kec.%20Cikupa%2C%20Tangerang%2C%20Banten%2015710!5e0!3m2!1sen!2sid!4v1635513752810!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php require_once('footer.php') ?>