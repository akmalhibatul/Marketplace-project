<?php
include('../koneksi.php');

$id_ukuran = $_GET['id_ukuran'];

$query = mysqli_query($koneksi, "DELETE FROM tb_ukuran WHERE id_ukuran = '$id_ukuran'");

if ($query) {
    header("location:ukuran.php?msg=3");
} else {
    header("location:ukuran.php?msg=4");
}
