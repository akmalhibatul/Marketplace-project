<?php
include('../koneksi.php');

$id_transaksi = $_POST['id_transaksi'];
$id_kurir = $_POST['id_kurir'];

if ($id_kurir == 2) {
    $status = 5;
    $query = mysqli_query($koneksi, "UPDATE `tb_transaksi` SET `status`='$status' WHERE `id_transaksi`='$id_transaksi'");
    if ($query) {
        $sql9 = "SELECT * FROM `tb_keranjang` WHERE `id_transaksi` = $id_transaksi";
        $eks = mysqli_query($koneksi, $sql9);
        while ($data = mysqli_fetch_assoc($eks)) {
            $jumlah = $data['jumlah'];
            // $id_barang = $data['id_barang'];
            $id_ukuran = $data['id_ukuran'];
            $sql8 = "UPDATE `tb_harga` SET `stok` = stok-$jumlah WHERE `tb_harga`.`id_ukuran` = $id_ukuran";
            // die($sql8);
            // echo "$sql<br>";
            $p = mysqli_query($koneksi, $sql8);
        }
        // die("1");
        header('location:pesanan.php');
    } else {
        // die("2");
        header('location:pesanan.php');
    }
} else {
    $status = 3;
    $query = mysqli_query($koneksi, "UPDATE `tb_transaksi` SET `status`='$status' WHERE `id_transaksi`='$id_transaksi'");
    if ($query) {
        $sql9 = "SELECT * FROM `tb_keranjang` WHERE `id_transaksi` = $id_transaksi";
        $eks = mysqli_query($koneksi, $sql9);
        while ($data = mysqli_fetch_assoc($eks)) {
            $jumlah = $data['jumlah'];
            // $id_barang = $data['id_barang'];
            $id_ukuran = $data['id_ukuran'];
            $sql8 = "UPDATE `tb_harga` SET `stok` = stok-$jumlah WHERE `tb_harga`.`id_ukuran` = $id_ukuran";
            // die($sql8);
            // echo "$sql<br>";
            $p = mysqli_query($koneksi, $sql8);
        }
        // die("1");
        header('location:pesanan.php');
    } else {
        // die("2");
        header('location:pesanan.php');
    }
}
