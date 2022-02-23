<?php
include('../koneksi.php');

$id_transaksi = $_POST['id_transaksi'];
$status = 4;

$query = mysqli_query($koneksi, "UPDATE `tb_transaksi` SET `status`='$status' WHERE `id_transaksi`='$id_transaksi'");

if ($query) {
    header('location:pesanan.php');
} else {
    header('location:pesanan.php');
}
