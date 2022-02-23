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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/cart.css">
  <style>
    .tambah button {
      background-color: #eeeeee;
      border: 1px solid #ccc;
      font-family: "Nunito";
      font-weight: 600;
      height: 30px;
      outline: none;
      width: 30px;
    }

    .tambah input {
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
          <div class="col-lg-8">
            <div class="portfolio-info">
              <div class="wrapper">
                <div class="core mt-4">
                  <div class="product">

                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM `tb_keranjang` INNER JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang INNER JOIN tb_ukuran ON tb_ukuran.id_ukuran = tb_keranjang.id_ukuran WHERE tb_keranjang.id_user = '$id_user' AND tb_keranjang.id_transaksi = '0'");
                    $keranjang = mysqli_num_rows($query);

                    while ($kj = mysqli_fetch_array($query)) {
                    ?>
                      <div class="item" id="item-<?= $kj['id_keranjang']; ?>">
                        <div class="item-main">
                          <img src="admin/img/barang/<?= $kj['foto_barang']; ?>" alt="">
                          <a href="detail_produk.php?id_barang=<?= $kj['id_barang']; ?>">
                            <h2 class="title mb-0"><?= $kj['nama_barang']; ?>- <?= $kj['ukuran']; ?></h2>
                          </a>
                          <small class="text-muted">Unit: <?= $kj['unit']; ?></small><br>
                          <small class="text-muted" id="jumlah<?= $kj['id_keranjang']; ?>">Jumlah: <?= $kj['jumlah']; ?></small>
                          <h4 class="price mt-0 mb-0" id="harga<?= $kj['id_keranjang']; ?>">Rp. <?= number_format($kj['total'], 0, ".", "."); ?></h4>
                          <div class="tambah">
                            <button class="num-product-down" data-barid="<?= $kj['id_barang']; ?>" data-proid="<?= $kj['id_keranjang']; ?>">-</button>
                            <input disabled="" type="text" value="<?= $kj['jumlah']; ?>" id="qtyProduct" class="valueJml qtyProduct" data-barid="<?= $kj['id_barang']; ?>" data-proid="<?= $kj['id_keranjang']; ?>">
                            <button class="num-product-up" data-barid="<?= $kj['id_barang']; ?>" data-proid="<?= $kj['id_keranjang']; ?>">+</button>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                        <a href="hapus_keranjang.php?id_keranjang=<?= $kj['id_keranjang']; ?>" onclick="return confirm('Yakin ingin menghapus produk ini dari troli?')"><i class="fa fa-trash"></i></a>
                      </div>
                      <hr>
                    <?php } ?>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <?php
            $query = mysqli_query($koneksi, "SELECT sum(jumlah), sum(total) FROM tb_keranjang WHERE `tb_keranjang`.`id_user` = '$id_user' AND tb_keranjang.id_transaksi = 0");
            $data = mysqli_fetch_row($query);
            $jumlahTotalKeranjang = (int)$data[0];
            $hargaTotalKeranjang = (int)$data[1];
            ?>
            <div class="portfolio-info">
              <h3>Ringkasan Belanja</h3>
              <ul>
                <li><strong>Total Jumlah Barang</strong> : <div class="float-right"><span id="jumlahTotalKeranjang"><?= $jumlahTotalKeranjang; ?></span></div>
                </li>
                <li><strong>Total Harga Barang</strong> : <div class="float-right"><span id="hargaTotalKeranjang">Rp. <?= number_format($hargaTotalKeranjang); ?></span></div>
                </li>
              </ul>
              <?php if ($jumlahTotalKeranjang == 0) { ?>

              <?php } else { ?>

                <?php if (empty($_SESSION['email'])) { ?>

                <?php } else { ?>

                  <a href="pembayaran.php" class="btn-get-started scrollto">Lanjut Ke Pembayaran</a>

                <?php } ?>

              <?php } ?>
            </div>
          </div>

        </div>

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
    // var globalHarga, globalStock;
    // $(document).ready(function() {
    //   $('#ukuran').change(function() { // Jika select box id kurir dipilih
    //     var ukuran = $(this).val(); // Ciptakan variabel kurir
    //     $.ajax({
    //       type: 'POST', // Metode pengiriman data menggunakan POST
    //       url: 'harga.php', // File pemroses data
    //       data: 'ukuran=' + ukuran, // Data yang akan dikirim ke file pemroses
    //       success: function(response) { // Jika berhasil
    //         const rpFormat = number_format(response);
    //         $('#jumlah2').text(rpFormat.split(",").join(".")); // Berikan hasilnya ke id biaya
    //         $("#detailTotalPrice").text(rpFormat.split(",").join("."));
    //         globalHarga = response;
    //       }
    //     });
    //   });
    // });

    // $(document).ready(function() {
    //   $('#ukuran').change(function() { // Jika select box id kurir dipilih
    //     var ukuran = $(this).val(); // Ciptakan variabel kurir
    //     $.ajax({
    //       type: 'POST', // Metode pengiriman data menggunakan POST
    //       url: 'stok.php', // File pemroses data
    //       data: 'ukuran=' + ukuran, // Data yang akan dikirim ke file pemroses
    //       success: function(response) { // Jika berhasil
    //         $('#stokBarang').text(response + " barang"); // Berikan hasilnya ke id biaya
    //         globalStock = response;
    //       }
    //     });
    //   });
    // });

    $(".qtyProduct").on('change', function() {
      var jumlah = $(this).val();
      var barid = $(this).attr("data-barid");
      var prodid = $(this).attr("data-proid");
      $.ajax({
        type: 'POST', // Metode pengiriman data menggunakan POST
        url: 'update_keranjang.php', // File pemroses data
        data: 'id_keranjang=' + prodid + '&' + 'jumlah=' + jumlah, // Data yang akan dikirim ke file pemroses
        dataType: 'json',
        success: function(response) { // Jika berhasil
          // $("#harga2").val(response);
          const rpFormat = number_format(response.hargaTotalBarang);
          $('#harga' + prodid).text("Rp. " + rpFormat.split(",").join("."));
          const rpFormat2 = number_format(response.hargaTotalKeranjang);
          $('#hargaTotalKeranjang').text("Rp. " + rpFormat2.split(",").join("."));
          $('#jumlahTotalKeranjang').text(response.jumlahTotalKeranjang);
        }
      });
    });

    // function updateKeranjang(idBarang, jumlah) {
    //   $.ajax({
    //     type: 'POST', // Metode pengiriman data menggunakan POST
    //     url: 'update_keranjang.php', // File pemroses data
    //     data: 'id_barang=' + idBarang + '&' + 'jumlah=' + jumlah, // Data yang akan dikirim ke file pemroses
    //     success: function(response) { // Jika berhasil
    //       $("input.valueJml").val(jumlah);
    //     }
    //   });
    // }

    $('.num-product-down').on('click', function(e) {
      e.stopPropagation();
      e.preventDefault();
      var numProduct = Number($(this).next().val());
      var prodid = $(this).attr("data-proid");
      if (numProduct > 1) {
        $(this).next().val(numProduct - 1).trigger("change");
        $('#jumlah' + prodid).text("Jumlah: " + (numProduct - 1));
      }
    });

    $('.num-product-up').on('click', function(e) {
      e.stopPropagation();
      e.preventDefault();
      var numProduct = Number($(this).prev().val());
      var prodid = $(this).attr("data-proid");
      $(this).prev().val(numProduct + 1).trigger("change");
      $('#jumlah' + prodid).text("Jumlah: " + (numProduct + 1));
    });

    // function plusProduct() {
    //   let inputJml;
    //   inputJml = parseInt($("input.valueJml").val());
    //   inputJml = inputJml + 1;

    //   var idBarang = $(this).attr("data-proid");
    //   console.log(idBarang);
    //   updateKeranjang(idBarang, inputJml);
    // }

    // function minusProduct() {
    //   let inputJml;
    //   inputJml = parseInt($("input.valueJml").val());
    //   inputJml = inputJml - 1;

    //   var idBarang = $(this).attr("data-proid");
    //   console.log(idBarang);
    //   updateKeranjang(idBarang, inputJml);
    // }
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