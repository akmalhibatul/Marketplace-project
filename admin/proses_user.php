<?php
include('../koneksi.php');

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$email = $_POST['email'];

$query = mysqli_query($koneksi, "UPDATE `tb_user` SET `nama`='$nama',`email`='$email',`telp`='$telp' WHERE `id_user`='$id_user'");

if ($query) {
    header('location:setting.php?msg=1');
} else {
    header('location:setting.php?msg=2');
}
