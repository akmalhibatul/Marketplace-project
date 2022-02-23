<?php
include('../koneksi.php');
$id_harga = $_POST['id_harga'];
$id_ukuran = $_POST['id_ukuran'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$query = mysqli_query($koneksi, "UPDATE `tb_harga` SET `id_ukuran`='$id_ukuran',`harga`='$harga',`stok`='$stok' WHERE `id_harga`='$id_harga'");

if (!$query) {
    header("location:ukuran.php?msg=6");
} else {

    header("location:ukuran.php?msg=5");
}
