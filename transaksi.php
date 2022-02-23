<?php
include('koneksi.php');

$id_user = $_POST['id_user'];
$id_kurir = $_POST['id_kurir'];
$nama_penerima = $_POST['nama_penerima'];
$telp = $_POST['telp'];
$nama_penerima2 = $_POST['nama_penerima2'];
$telp2 = $_POST['telp2'];
$total = $_POST['total'];
$status = 1;

if ($id_kurir == 2) {
    // dateng ke toko

    //buat Variable
    $invoce = 'PM' . date("Ymdhis");
    $tanggal_transaksi = date('ymd');

    //ambil ongkir
    $query = mysqli_query($koneksi, "SELECT * FROM tb_kurir WHERE id_kurir='$id_kurir'");
    $data = mysqli_fetch_row($query);
    $ongkir = $data[2];

    //insert ke table transaksi
    $sql = "INSERT INTO `tb_transaksi` VALUES (NULL,'$invoce','$tanggal_transaksi','$id_user','$nama_penerima2','$telp2','','','','','','','$total','$ongkir','$id_kurir','0','$status','')";
    // die($sql);
    mysqli_query($koneksi, $sql);

    //ambil id transaksi
    $sql = "SELECT id_transaksi FROM tb_transaksi WHERE invoice='$invoce' AND id_user = '$id_user'";
    // die($sql);
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_row($query);
    $id_transaksi = $data[0];
    // die($id_transaksi);
    //update id_bukti
    $sql = "UPDATE `tb_transaksi` SET `id_bukti`='$id_transaksi' WHERE `tanggal_transaksi`='$tanggal_transaksi' AND id_transaksi = '$id_transaksi'";
    //keranjang

    // die($sql);
    mysqli_query($koneksi, $sql);

    $sql = "UPDATE `tb_keranjang` SET `id_transaksi`='$id_transaksi' WHERE id_user = '$id_user' AND id_transaksi = 0";
    mysqli_query($koneksi, $sql);
} else {
    // kuurir toko

    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $kode_pos = $_POST['kode_pos'];
    $alamat = $_POST['alamat'];
    $total = $_POST['total'];

    //buat Variable
    $invoce = 'PM' . date("Ymdhis");
    $tanggal_transaksi = date('ymd');

    //ambil ongkir
    $query = mysqli_query($koneksi, "SELECT * FROM tb_kurir WHERE id_kurir='$id_kurir'");
    $data = mysqli_fetch_row($query);
    $ongkir = $data[2];

    //insert ke table transaksi
    $sql = "INSERT INTO `tb_transaksi` VALUES (NULL,'$invoce','$tanggal_transaksi','$id_user','$nama_penerima','$telp','$provinsi','$kota','$kecamatan','$kelurahan','$kode_pos','$alamat','$total','$ongkir','$id_kurir','0','$status','')";
    // die($sql);
    mysqli_query($koneksi, $sql);

    //ambil id transaksi
    $sql = "SELECT id_transaksi FROM tb_transaksi WHERE invoice='$invoce' AND id_user = '$id_user'";
    // die($sql);
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_row($query);
    $id_transaksi = $data[0];
    // die($id_transaksi);
    //update id_bukti
    $sql = "UPDATE `tb_transaksi` SET `id_bukti`='$id_transaksi' WHERE `tanggal_transaksi`='$tanggal_transaksi' AND id_transaksi = '$id_transaksi'";
    // die($sql);
    mysqli_query($koneksi, $sql);
    $sql = "UPDATE `tb_keranjang` SET `id_transaksi`='$id_transaksi' WHERE id_user = '$id_user' AND id_transaksi = 0";
    mysqli_query($koneksi, $sql);
}
