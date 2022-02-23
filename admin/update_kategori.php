<?php

include '../koneksi.php';
$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];
$foto = $_FILES['foto_kategori'];

if ($foto['name'] != NULL) {
    $ekstensi_diperbolehkan = array('image/jpeg', 'image/jpg', 'image/png');
    $ekstensi = $foto['type'];
    $file_tmp = $foto['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto['name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'img/kategori/' . $nama_gambar_baru);

        $query  = mysqli_query($koneksi, "UPDATE `tb_kategori` SET `nama_kategori`='$nama_kategori',`foto_kategori`='$nama_gambar_baru' WHERE `id_kategori`='$id_kategori'");

        if (!$query) {
            header("location:kategori.php?msg=6");
        } else {

            header("location:kategori.php?msg=5");
        }
    } else {
        echo mysqli_error($koneksi);
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, png atau jpeg.');window.location='kategori.php';</script>";
    }
} else {
    $query  = mysqli_query($koneksi, "UPDATE `tb_kategori` SET `nama_kategori`='$nama_kategori' WHERE `id_kategori`='$id_kategori'");

    if (!$query) {
        header("location:kategori.php?msg=6");
    } else {

        header("location:kategori.php?msg=5");
    }
}
