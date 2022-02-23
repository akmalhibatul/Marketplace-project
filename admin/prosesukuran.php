<?php
include('../koneksi.php');

$id_barang = $_POST['id_barang'];
$ukuran = $_POST['ukuran'];

$query = mysqli_query($koneksi, "INSERT INTO `tb_ukuran`VALUES (NULL,'$id_barang','$ukuran')");
if ($query) {
    header("location:ukuran.php?msg=1");
} else {
    header("location:ukuran.php?msg=2");
    echo mysqli_error($koneksi);
}
