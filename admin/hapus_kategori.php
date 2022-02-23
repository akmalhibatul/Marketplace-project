<?php
include('../koneksi.php');

$id_kategori = $_GET['id_kategori'];

$query = mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori'");

if ($query) {
    header("location:kategori.php?msg=3");
} else {
    header("location:kategori.php?msg=4");
}
