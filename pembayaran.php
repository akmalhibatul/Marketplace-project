<?php
include('koneksi.php');
session_start();

$email = $_SESSION['email'];
$sql = "SELECT * FROM `tb_user` WHERE `email` = '$email'";
$result = $koneksi->query($sql);
while ($row = $result->fetch_assoc()) {
  $id_user = $row['id_user'];
}
?>
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
  <link rel="stylesheet" href="assets/css/cart.css">
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

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-info">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Produk</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM `tb_keranjang` INNER JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang INNER JOIN tb_ukuran ON tb_ukuran.id_ukuran = tb_keranjang.id_ukuran WHERE tb_keranjang.id_user = '$id_user' AND tb_keranjang.id_transaksi = '0'");
                  while ($barang = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <th scope="row"><?= $barang['nama_barang']; ?> - <?= $barang['ukuran']; ?></th>
                      <td><?= $barang['unit']; ?></td>
                      <td><?= $barang['jumlah']; ?></td>
                      <td>Rp. <?= number_format($barang['total']); ?></td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>

              <h3 class="mt-4">Alamat Pengiriman</h3>
              <form>
                <div class="mb-3">
                  <label class="form-label">Jasa Pengiriman</label>
                  <select class="form-select" id="id_kurir" name="id_kurir" required>
                    <option selected disabled>Pilih Jasa Pengiriman</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM `tb_kurir`");
                    while ($t = mysqli_fetch_array($tampil)) {
                      echo "<option value='$t[id_kurir]'>$t[kurir]</option>";
                    }
                    ?>
                  </select>
                </div>

                <div id="1" class="pengirim" style="display:none">
                  <div class="mb-3">
                    <label class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">No telp</label>
                    <input type="number" min="0" class="form-control" name="telp" id="telp" required>
                    <small class="text-muted">Contoh: 081234567890</small>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Provinsi</label>
                    <input type="text" class="form-control" name="provinsi" id="provinsi" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Kabupaten / Kota</label>
                    <input type="text" class="form-control" name="kota" id="kota" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Desa / Kelurahan</label>
                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Kode Pos</label>
                    <input type="number" min="0" class="form-control" name="kode_pos" id="kode_pos" required>
                    <small class="text-muted">Contoh: 15417</small>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                  </div>
                </div>

                <div id="2" class="pengirim" style="display:none">
                  <div class="mb-3">
                    <label class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control" name="nama_penerima" id="nama_penerima2" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">No telp</label>
                    <input type="number" min="0" class="form-control" name="telp" id="telp2" required>
                    <small class="text-muted">Contoh: 081234567890</small>
                  </div>
                </div>



            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <?php
              $query = mysqli_query($koneksi, "SELECT sum(jumlah), sum(total) FROM tb_keranjang  WHERE `tb_keranjang`.`id_user` = '$id_user' AND tb_keranjang.id_transaksi = '0'");
              $data = mysqli_fetch_row($query);
              $jumlahTotalKeranjang = (int)$data[0];
              $hargaTotalKeranjang = (int)$data[1];
              ?>
              <h3>Ringkasan Belanja</h3>
              <ul>
                <li><strong>Total Belanja</strong> : <div class="float-right">Rp. <?= number_format($hargaTotalKeranjang); ?></div>
                </li>
                <li><strong>Biaya Pengiriman</strong> : <div class="float-right"><span id="ongkir" class="ongkir">-</span></div>
                </li>
                <hr>
                <input type="hidden" id="detailTotalPrice2" class="detailTotalPrice2" value="">
                <li><strong>Total Tagihan</strong> : <div class="float-right"><span id="detailTotalPrice" class="detailTotalPrice">-</span></div>

                </li>
              </ul>
              <button type="button" class="btn-get-started scrollto" onclick="buy()">Lanjutkan</button>
              </form>

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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

  <Script>
    $(function() {
      $('#id_kurir').change(function() {
        $('.pengirim').hide();
        $('#' + $(this).val()).show();
      });

    });

    function buy() {

      $.ajax({
        url: "transaksi.php",
        type: "post",
        data: {
          id_user: <?= $id_user; ?>,
          id_kurir: $("#id_kurir").val(),
          nama_penerima: $("#nama_penerima").val(),
          telp: $("#telp").val(),
          nama_penerima2: $("#nama_penerima2").val(),
          telp2: $("#telp2").val(),
          provinsi: $("#provinsi").val(),
          kota: $("#kota").val(),
          kecamatan: $("#kecamatan").val(),
          kelurahan: $("#kelurahan").val(),
          kode_pos: $("#kode_pos").val(),
          alamat: $("#alamat").val(),
          total: $("#detailTotalPrice2").val(),
        },
        success: function(data) {
          location.href = "u_transaksi.php?msg=1"
          // console.log("Sukses");
        }
      })
    }

    var globalOngkir;
    $(document).ready(function() {
      $('#id_kurir').change(function() { // Jika select box id kurir dipilih
        var id_kurir = $(this).val(); // Ciptakan variabel kurir
        $.ajax({
          type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'kurir.php', // File pemroses data
          data: 'id_kurir=' + id_kurir, // Data yang akan dikirim ke file pemroses
          success: function(response) { // Jika berhasil
            var ongkir = parseInt(response);
            var total = <?= (int)$hargaTotalKeranjang ?>;
            var total2 = ongkir + total;
            const rpFormat2 = number_format(total2);
            // $('#hargaTotalKeranjang').text("Rp. " + rpFormat.split(",").join(".")); // Berikan hasilnya ke id biaya
            $("#detailTotalPrice").text("Rp. " + rpFormat2.split(",").join("."));
            $("#detailTotalPrice2").val(total2);
            const rpFormat = number_format(response);
            $("#ongkir").text("Rp. " + rpFormat.split(",").join("."));
            globalOngkir = response;
          }
        });
      });
    });



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
  </Script>

</body>

</html>