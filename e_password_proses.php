<?php
include('koneksi.php');

$id_user = $_POST['id_user'];
$oldpassword = md5($_POST['oldpassword']);
$newpassword = md5($_POST['newpassword']);
$confirmpassword = md5($_POST['confirmpassword']);

if ($oldpassword != $newpassword) {

    if ($newpassword === $confirmpassword) {
        $query = mysqli_query($koneksi, "UPDATE `tb_user` SET `password`='$newpassword' WHERE `id_user`='$id_user'");
        header("location:edit.php?msg=1");
    } else {
        // harus sama
        header("location:edit.php?msg=2");
    }
} else {
    // old Password gaboleh sama
    header("location:edit.php?msg=2");
}
