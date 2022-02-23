<?php

include '../koneksi.php';
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$id_kategori = $_POST['id_kategori'];
$unit = $_POST['unit'];
$foto = $_FILES['foto_barang'];

if ($foto['name'] != NULL) {
    $ekstensi_diperbolehkan = array('image/jpeg', 'image/jpg', 'image/png');
    $ekstensi = $foto['type'];
    $file_tmp = $foto['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto['name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'img/barang/' . $nama_gambar_baru);

        $query  = mysqli_query($koneksi, "UPDATE `tb_barang` SET `nama_barang`='$nama_barang',`id_kategori`='$id_kategori',`unit`='$unit',`foto_barang`='$nama_gambar_baru' WHERE `id_barang`='$id_barang'");

        if (!$query) {
            header("location:barang.php?msg=6");
        } else {

            header("location:barang.php?msg=5");
        }
    } else {
        echo mysqli_error($koneksi);
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, png atau jpeg.');window.location='data_karyawan.php';</script>";
    }
} else {
    $query  = mysqli_query($koneksi, "UPDATE `tb_barang` SET `nama_barang`='$nama_barang',`id_kategori`='$id_kategori',`unit`='$unit' WHERE `id_barang`='$id_barang'");

    if (!$query) {
        header("location:barang.php?msg=6");
    } else {

        header("location:barang.php?msg=5");
    }
}
