<?php
include('../koneksi.php');
$id_ukuran = $_POST['id_ukuran'];
$ukuran = $_POST['ukuran'];

$query = mysqli_query($koneksi, "UPDATE `tb_ukuran` SET `ukuran`='$ukuran' WHERE id_ukuran = '$id_ukuran'");

if (!$query) {
    header("location:ukuran.php?msg=6");
} else {

    header("location:ukuran.php?msg=5");
}
