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
$id_barang = $_GET['id_barang'];
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
  <link rel="stylesheet" href="assets/css/cart.css">
  <style>
    .portfolio-description .btn-get-started {
      font-family: "Montserrat", sans-serif;
      text-transform: uppercase;
      font-weight: 600;
      font-size: 14px;
      letter-spacing: 1px;
      display: inline-block;
      padding: 10px 28px;
      border-radius: 4px;
      transition: 0.5s;
      color: #fff;
      background: #ff6d00;
    }

    table tr td.t {
      color: #555555;
      font-family: "Nunito";
      font-size: 17px;
      width: 150px;
    }

    table tr td button {
      background-color: #eeeeee;
      border: 1px solid #ccc;
      font-family: "Nunito";
      font-weight: 600;
      height: 30px;
      outline: none;
      width: 30px;
    }

    table tr td input {
      background-color: white;
      border: none;
      border-bottom: 1px solid #ccc;
      border-top: 1px solid #ccc;
      box-sizing: border-box;
      text-align: center;
      height: 30px;
      outline: none;
      position: relative;
      top: 1px;
      width: 50px;
    }

    table tr td.price {
      color: tomato;
      font-family: "Open Sans";
      font-size: 30px;
      font-weight: 600;
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

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
          <?php
          $id_barang = $_GET['id_barang'];
          $query = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
          while ($dt = mysqli_fetch_array($query)) {
          ?>
            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper-container">
                <div class="swiper-wrapper align-items-center">
                  <img src="admin/img/barang/<?= $dt['foto_barang']; ?>" alt="<?= $dt['nama_barang']; ?>" class="img-fluid">
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3><?= $dt['nama_barang']; ?></h3>
                <ul>
                  <li><strong>Deskripsi</strong></li>
                  <table>
                    <tbody>
                      <tr>
                        <td class="t">Harga</td>
                        <td class="price" id="harga2">Rp -</td>
                        <!-- <h1 id="harga2">Rp -</h1> -->

                      </tr>
                      <tr>
                        <td class="t">Ukuran</td>
                        <td>
                          <select name="id_ukuran" id="ukuran" class="form-control">
                            <option selected disabled>- Pilih Ukuran -</option>
                            <?php
                            $id_barang = $_GET['id_barang'];
                            $unit = $dt['unit'];
                            $tampil = mysqli_query($koneksi, "SELECT * FROM `tb_ukuran` WHERE id_barang = '$id_barang' ORDER BY id_ukuran DESC");
                            while ($t = mysqli_fetch_array($tampil)) {
                              echo "<option value='$t[id_ukuran]'>$t[ukuran] - $unit</option>";
                            }
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="t">Unit</td>
                        <td><?= $dt['unit']; ?></td>
                      </tr>
                      <tr>
                        <td class="t">Stok</td>
                        <td id="stokBarang">-</td>
                      </tr>
                      <tr>
                        <td class="t">Jumlah</td>
                        <td>
                          <button onclick="minusProduct()">-</button>
                          <input disabled="" type="text" value="1" id="qtyProduct" class="valueJml" name="jumlah">
                          <button onclick="plusProduct()">+</button>
                        </td>
                      </tr>
                      <tr>
                        <td class="t">Total</td>
                        <td><span id="detailTotalPrice">Rp -</span></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="portfolio-description">
                <?php if (empty($_SESSION['email'])) { ?>
                  <p>Jika Anda Ingin Membeli barang <a href="login/">Login Disini</a></p>
                <?php } else { ?>
                  <button type="submit" class="btn-get-started scrollto" id="buttonBeli" onclick="buy()">Tambah Ke Keranjang</button>
                <?php } ?>
              </div>

            </div>

        </div>
      <?php } ?>
      </div>
    </section><!-- End Portfolio Details Section -->
  </main><!-- End #main -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row justify-content-between">

          <div class="col-lg-6 col-md-6 footer-contact">
            <a href="index.php"><img src="assets/img/t4ft.png" class="img-fluid" alt=""></a><br><br>
            <p>
              Jl. Raya Serang Km 12 Desa Sukadamai Rt 06/01 Cikupa Tangerang, Sukadamai, Cikupa, Tangerang, Banten 15710
              <strong>Phone:</strong> +62-21-50536868<br>
            </p>
          </div>

          <div class="col-lg-1 col-md-6 footer-links">

          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contact</a></li>
            </ul>

          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        Copyright &copy; <?= date('Y') ?> <strong><span>Pipe Master. All Rights Reserved</span></strong>.
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


  <script>
    var globalHarga, globalStock;
    // $(document).ready(function() {
    //   $('#ukuran').change(function() { // Jika select box id kurir dipilih
    //     // console.log("ukuraan 1");
    //     var ukuran = $(this).val(); // Ciptakan variabel kurir
    //     $.ajax({
    //       type: 'POST', // Metode pengiriman data menggunakan POST
    //       url: 'harga.php', // File pemroses data
    //       data: 'ukuran=' + ukuran, // Data yang akan dikirim ke file pemroses
    //       success: function(response) { // Jika berhasil
    //         const rpFormat = number_format(response);
    //         $('#harga2').text("Rp. " + rpFormat.split(",").join(".")); // Berikan hasilnya ke id biaya
    //         $("#detailTotalPrice").text("Rp. " + rpFormat.split(",").join("."));
    //         globalHarga = response;
    //       }
    //     });
    //   });
    // });

    $(document).ready(function() {
      $('#ukuran').change(function() { // Jika select box id kurir dipilih
        // console.log("ukuraan 2");
        var ukuran = $(this).val(); // Ciptakan variabel kurir
        $.ajax({
          type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'stok.php', // File pemroses data
          data: 'ukuran=' + ukuran, // Data yang akan dikirim ke file pemroses
          success: function(response) { // Jika berhasil
            $('#stokBarang').text(response + " barang"); // Berikan hasilnya ke id biaya
            globalStock = response;
            if (globalStock == 0) {
              $('#harga2').text("Barang Habis"); // Berikan hasilnya ke id biaya
              $("#detailTotalPrice").text("Barang Habis");
              // $("#buttonBeli").prop("disabled", true);
            } else {
              // $("#buttonBeli").removeAttr('disabled');
              cekHarga(ukuran);
            }
          }
        });
      });
    });

    function cekHarga(ukuran) {
      $.ajax({
        type: 'POST', // Metode pengiriman data menggunakan POST
        url: 'harga.php', // File pemroses data
        data: 'ukuran=' + ukuran, // Data yang akan dikirim ke file pemroses
        success: function(response) { // Jika berhasil
          const rpFormat = number_format(response);
          $('#harga2').text("Rp. " + rpFormat.split(",").join(".")); // Berikan hasilnya ke id biaya
          $("#detailTotalPrice").text("Rp. " + rpFormat.split(",").join("."));
          globalHarga = response;
        }
      });
    }

    function plusProduct() {
      let inputJml;
      inputJml = parseInt($("input.valueJml").val());
      inputJml = inputJml + 1;
      if (inputJml <= globalStock) {
        $("input.valueJml").val(inputJml);
        const newPrice = inputJml * globalHarga;
        const rpFormat = number_format(newPrice);
        $("#detailTotalPrice").text(rpFormat.split(",").join("."));
      }
    }

    function minusProduct() {
      let inputJml;
      inputJml = parseInt($("input.valueJml").val());
      inputJml = inputJml - 1;
      if (inputJml >= 1) {
        $("input.valueJml").val(inputJml);
        const newPrice = inputJml * globalHarga;
        const rpFormat = number_format(newPrice);
        $("#detailTotalPrice").text(rpFormat.split(",").join("."));
      }
    }

    <?php
    if (isset($_SESSION['email'])) {
    ?>

      function buy() {
        if (globalStock == 0) {
          alert("Barang Habis");

          return;
        }

        var ukuran = $("#ukuran").val();

        if (ukuran == null) {
          alert("Harus Pilih Ukuran");
        } else {
          $.ajax({
            url: "tambah_keranjang.php",
            type: "post",
            data: {
              id_user: <?= $id_user; ?>,
              id_barang: <?= $id_barang; ?>,
              jumlah: $("#qtyProduct").val(),
              id_ukuran: $("#ukuran").val(),
            },
            success: function(data) {
              location.href = "keranjang.php"
            }
          })
        }

      }
    <?php
    }
    ?>

    function number_format(number, decimals, decPoint, thousandsSep) {
      number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
      var n = !isFinite(+number) ? 0 : +number
      var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
      var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
      var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
      var s = ''

      var toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec)
        return '' + (Math.round(n * k) / k)
          .toFixed(prec)
      }

      // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || ''
        s[1] += new Array(prec - s[1].length + 1).join('0')
      }

      return s.join(dec)
    }
  </script>

</body>

</html>