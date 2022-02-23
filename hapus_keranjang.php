<?php
include('koneksi.php');
$id_keranjang = $_GET['id_keranjang'];

$query = mysqli_query($koneksi, "DELETE FROM `tb_keranjang` WHERE id_keranjang = '$id_keranjang'");
if ($query) {
    header("location:keranjang.php");
} else {
    header("location:keranjang.php");
}
