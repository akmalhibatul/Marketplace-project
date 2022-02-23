<?php
include('koneksi.php');

$id_transaksi = $_GET['id_tr'];
$status = 5;

$query = mysqli_query($koneksi, "UPDATE `tb_transaksi` SET `status`='$status' WHERE `id_transaksi`='$id_transaksi'");

if ($query) {
    header('location:u_transaksi.php');
} else {
    header('location:u_transaksi.php');
}
