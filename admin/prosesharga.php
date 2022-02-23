<?php
include('../koneksi.php');

$id_ukuran = $_POST['id_ukuran'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];


$query = mysqli_query($koneksi, "INSERT INTO  `tb_harga` VALUES (NULL,'$id_ukuran','$harga','$stok')");
if ($query) {
    header("location:ukuran.php?msg=1");
} else {
    header("location:ukuran.php?msg=2");
    echo mysqli_error($koneksi);
}
