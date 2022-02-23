<?php
session_start();
include('koneksi.php');

// POST id_keranjang
// POST jumlah

$id_keranjang = $_POST["id_keranjang"];
$jumlah = $_POST["jumlah"];
$email = $_SESSION['email'];

// Mendapatkan id user
$query = mysqli_query($koneksi, "SELECT * FROM `tb_user` WHERE `email` = '$email'");
$data = mysqli_fetch_row($query);
$id_user = $data[0];

// Mendapatkan id ukuran
$query = mysqli_query($koneksi, "SELECT * FROM `tb_keranjang` WHERE `tb_keranjang`.`id_user` = '$id_user' AND `tb_keranjang`.`id_keranjang` = '$id_keranjang'");
$data = mysqli_fetch_row($query);
$ukuran = $data[3];

// Mendapatkan harga barang
$query = mysqli_query($koneksi, "SELECT * FROM tb_harga WHERE id_ukuran='$ukuran'");
$data = mysqli_fetch_row($query);
$harga = $data[2];

$hargaTotalBarang = $jumlah * $harga;

// Update Keranjang
$sql = "UPDATE `tb_keranjang` SET `jumlah` = '$jumlah', `total` = '$hargaTotalBarang' WHERE `tb_keranjang`.`id_user` = '$id_user' AND `tb_keranjang`.`id_keranjang` = '$id_keranjang'";
$harga = mysqli_query($koneksi, $sql);

// Mendapatkan jumlah Total Keranjang
$query = mysqli_query($koneksi, "SELECT sum(jumlah), sum(total) FROM tb_keranjang  WHERE `tb_keranjang`.`id_user` = '$id_user' AND id_transaksi = 0");
$data = mysqli_fetch_row($query);
$jumlahTotalKeranjang = (int)$data[0];
$hargaTotalKeranjang = (int)$data[1];

$data = array("hargaTotalBarang" => $hargaTotalBarang, "jumlahTotalKeranjang" => $jumlahTotalKeranjang, "hargaTotalKeranjang" => $hargaTotalKeranjang);

echo json_encode($data);
