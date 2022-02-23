<?php
include('koneksi.php');
$id_user = $_POST['id_user'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];
$id_ukuran = $_POST['id_ukuran'];
$id_transaksi = 0;

//ambil harga
$query = mysqli_query($koneksi, "SELECT * FROM `tb_harga` WHERE `id_ukuran` = '$id_ukuran'");
$data = mysqli_fetch_row($query);
$harga = $data[2];

//mencari total
$total = $harga * $jumlah;

//bila id barang sama
$query = mysqli_query($koneksi, "SELECT * FROM `tb_keranjang` WHERE id_ukuran = '$id_ukuran' AND id_user = '$id_user' AND id_transaksi = 0");
$jumlah_IdBarangSama = mysqli_num_rows($query);

if ($jumlah_IdBarangSama > 0) {
    $data = mysqli_fetch_row($query);
    $id_ukuran_keranjang = $data[3];
    $jumlah_keranjang = $data[4];
    $total_keranjang = $data[5];
    $total_ukuran = $total + $total_keranjang;

    $jumlah_ukuran = $jumlah_keranjang + $jumlah;
    $query = mysqli_query($koneksi, "UPDATE `tb_keranjang` SET `jumlah`='$jumlah_ukuran',`total`='$total_ukuran' WHERE id_ukuran = '$id_ukuran_keranjang'");
} else {
    //input ke keranjang bila beda id
    // die("INSERT INTO `tb_keranjang` VALUES (NULL,'$id_user','$id_barang','$id_ukuran','$jumlah','$total','$id_transaksi')");
    $query = mysqli_query($koneksi, "INSERT INTO `tb_keranjang` VALUES (NULL,'$id_user','$id_barang','$id_ukuran','$jumlah','$total','$id_transaksi')");
}
