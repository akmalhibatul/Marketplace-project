<?php
include("../koneksi.php");
$target_dir = "img/kategori/";
$target_file = $target_dir . basename($_FILES["foto_kategori"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $nama_kategori = $_POST['nama_kategori'];
    $foto_kategori = $_FILES['foto_kategori'];


    $check = getimagesize($_FILES["foto_kategori"]["tmp_name"]);
    if ($check !== false) {
        echo "File gambar - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Maaf file sudah ada.";
    $uploadOk = 0;
}

if ($_FILES["foto"]["size"] > 2000000) {
    echo "Maaf ukuran file terlalu besar.";
    $uploadOk = 0;
}

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Maaf, Format foto hanya JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Gagal Upload Foto.";
} else {
    if (move_uploaded_file($_FILES["foto_kategori"]["tmp_name"], $target_file)) {

        $namafile = basename($_FILES["foto_kategori"]["name"]);

        echo "The file " . $namafile . " has been uploaded.";

        $nama_kategori = $_POST['nama_kategori'];
        $query = "INSERT INTO `tb_kategori`(`id_kategori`, `nama_kategori`, `foto_kategori`) VALUES (NULL,'$nama_kategori','$namafile')";

        $query = mysqli_query($koneksi, $query);

        if ($query) {
            header("location:kategori.php?msg=1");
        } else {
            header("location:kategori.php?msg=2");
            echo mysqli_error($koneksi);
        }
    } else {
        header("location:kategori.php?msg=1");
    }
}
