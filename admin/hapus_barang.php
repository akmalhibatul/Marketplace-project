<?php
include('../koneksi.php');

$id_barang = $_GET['id_barang'];

$query = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang = '$id_barang'");
mysqli_query($koneksi, "DELETE FROM tb_ukuran WHERE id_barang = '$id_barang'");


if ($query) {
    header("location:barang.php?msg=3");
} else {
    header("location:barang.php?msg=4");
}
