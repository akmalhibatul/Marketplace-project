<?php
include("koneksi.php");
$target_dir = "admin/img/bukti/";
$target_file = $target_dir . basename($_FILES["foto_bukti"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $id_transaksi = $_POST['id_transaksi'];
    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    $rekenning = $_POST['rekenning'];
    $foto_bukti = $_FILES['foto_bukti'];


    $check = getimagesize($_FILES["foto_bukti"]["tmp_name"]);
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

if ($_FILES["foto"]["size"] > 200000) {
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
    if (move_uploaded_file($_FILES["foto_bukti"]["tmp_name"], $target_file)) {

        $namafile = basename($_FILES["foto_bukti"]["name"]);
        echo "The file " . $namafile . " has been uploaded.";

        $id_transaksi = $_POST['id_transaksi'];
        $foto = $_FILES['foto_bukti'];
        $tanggal_bukti = date('ymd');
        $status = 2;

        $query = "INSERT INTO `tb_bukti` VALUES ('$id_transaksi','$tanggal_bukti','$id_transaksi','$namafile')";
        mysqli_query($koneksi, "UPDATE `tb_transaksi` SET `status`='$status' WHERE `id_transaksi`='$id_transaksi'");


        $query = mysqli_query($koneksi, $query);

        if ($query) {
            header("location:u_transaksi.php?msg=1");
        } else {
            header("location:u_transaksi.php?msg=2");
            echo mysqli_error($koneksi);
        }
    } else {
        header("location:u_transaksi.php?msg=1");
    }
}
