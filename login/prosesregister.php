<?php
include('../koneksi.php');

$nama = $_POST['nama'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$id_level = $_POST['id_level'];
$password = md5($_POST['password']);
$password_confirm = md5($_POST['password_confirm']);


if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    if ($password === $password_confirm) {

        $query = mysqli_query($koneksi, "INSERT INTO `tb_user` VALUES (NULL,'$nama','$email','$telp','$password','$id_level')");
        header("location:index.php");
    } else {
        // password confirm
        header("location:registrasi.php?msg=1");
    }
} else {
    // email
    header("location:registrasi.php?msg=2");
}
