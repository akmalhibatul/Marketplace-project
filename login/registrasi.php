<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pipe master</title>

  <!-- Favicons -->
  <link href="../assets/img/favicon.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="../assets/vendor/fontawesome-free/css/all.min.css">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-xl-6 col-lg-6 col-md-6">


            <div class="card o-hidden border-0 shadow-lg my-5">

              <div class="card-body p-0">

                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12">

                    <div class="p-3">
                      <?php
                      if (@($_GET['msg'] == 1)) {
                      ?>
                        <div class="alert alert-danger" role="alert">
                          Password Tidak Sama !
                        </div>
                      <?php
                      } elseif (@($_GET['msg'] == 2)) {
                      ?>
                        <div class="alert alert-danger" role="alert">
                          Email Tidak Valid !
                        </div>
                      <?php
                      }
                      ?>

                      <div class="text-center mb-4">
                        <img src="../assets/img/unnamed (1).png" class="img-fluid" width="60%" alt="">
                      </div>
                      <form method="post" action="prosesregister.php">
                        <input type="text" name="id_level" value="2" hidden>
                        <div class="mb-3">
                          <labe class="form-label" style="font-weight: bold;">Name</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                          <labe class="form-label" style="font-weight: bold;">Telp</label>
                            <input type="number" min="0" class="form-control" name="telp">
                        </div>
                        <div class="mb-3">
                          <labe class="form-label" style="font-weight: bold;">Email address</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="row mb-3">
                          <div class="col">
                            <labe class="form-label" style="font-weight: bold;">Password</label>
                              <input type="password" class="form-control" name="password">
                          </div>
                          <div class="col">
                            <labe class="form-label" style="font-weight: bold;">Confirm Password</label>
                              <input type="password" class="form-control" name="password_confirm">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Registrasi</button>
                      </form>
                      <hr>
                      <div class="text-center">
                        <a class="small" href="index.php">Already Have Account ? Login now !</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

    </section><!-- End Portfolio Details Section -->
  </main><!-- End #main -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>