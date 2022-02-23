<?php
include('../koneksi.php');

$id_harga = $_GET['id_harga'];

$query = mysqli_query($koneksi, "DELETE FROM tb_harga WHERE id_harga = '$id_harga'");

if ($query) {
    header("location:ukuran.php?msg=3");
} else {
    header("location:ukuran.php?msg=4");
}
