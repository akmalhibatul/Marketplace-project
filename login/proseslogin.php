<?php
session_start();
include '../koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from tb_user where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['id_level'] == "1") {

        // buat session login dan username
        $_SESSION['email'] = $email;
        $_SESSION['id_level'] = "1";
        // alihkan ke halaman dashboard admin
        header("location:../admin/");
        // echo "admin";

        // cek jika user login sebagai pegawai
    } else if ($data['id_level'] == "2") {
        // buat session login dan username
        $_SESSION['email'] = $email;
        $_SESSION['id_level'] = "2";
        // alihkan ke halaman dashboard pegawai
        header("location:../user.php");

        // cek jika user login sebagai pengurus
    } else {
        // alihkan ke halaman login kembali
        header("location:index.php?msg=1");
    }
} else {
    header("location:index.php?msg=2");
}
