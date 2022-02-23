<?php
include('../koneksi.php');
include('indo_format.php');
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
$invoice = $_GET['in'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran - <?= $invoice; ?></title>
    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/favicon.ico">

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
</head>

<body>
    <img src="../assets/img/t4ft.png" class="img-fluid" width="30%" cla alt="">
    <hr>
    <div class="row">
        <?php
        $invoice = $_GET['in'];
        $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE invoice = '$invoice'");
        while ($dt = mysqli_fetch_array($query)) {
        ?>
            <div class="col">
                <table class="table table-sm table-borderless">
                    <tr>
                        <td class="fw-bold">Invoice :</td>
                        <td><?= $dt['invoice']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pesan :</td>
                        <td><?= format_hari_tanggal($dt['tanggal_transaksi']); ?></td>
                    </tr>
                    <tr>
                        <td>Status : </td>
                        <td class="text-success fw-bold">Done</td>
                    </tr>
                </table>
            </div>
            <div class="col">
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
            </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-7">
            <h3 class="title mb-3">Produk Pesanan</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
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
                    $query = mysqli_query($koneksi, "SELECT * FROM `tb_keranjang` INNER JOIN tb_barang ON tb_barang.id_barang = tb_keranjang.id_barang INNER JOIN tb_ukuran ON tb_ukuran.id_ukuran = tb_keranjang.id_ukuran WHERE  id_transaksi = '$id_transaksi'");
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
            <h3 class="title">Ringkasan Pembayaran</h3>
            <table class="table table-sm table-borderless">
                <?php
                $query = mysqli_query($koneksi, "SELECT sum(jumlah), sum(total) FROM tb_keranjang WHERE  tb_keranjang.id_transaksi = '$id_transaksi'");
                $data = mysqli_fetch_row($query);
                $jumlahTotalKeranjang = (int)$data[0];
                $hargaTotalKeranjang = (int)$data[1];

                $query = mysqli_query($koneksi, "SELECT * FROM `tb_transaksi` INNER JOIN tb_kurir ON tb_kurir.id_kurir = tb_transaksi.id_kurir WHERE  id_transaksi = '$id_transaksi'");
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
        <?php } ?>
</body>
<script>
    window.print()
</script>

</html>