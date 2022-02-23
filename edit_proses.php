<?php
include('koneksi.php');

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];

$query = mysqli_query($koneksi, "UPDATE `tb_user` SET `nama`='$nama', `telp`='$telp' WHERE `id_user`='$id_user'");

if ($query) {
    header('location:edit.php');
} else {
    header('location:edit.php');
}
