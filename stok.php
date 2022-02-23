<?php
include('koneksi.php');

$ukuran = $_POST["ukuran"];

$harga = mysqli_query($koneksi, "SELECT * FROM tb_harga WHERE id_ukuran='$ukuran'");

while ($data = mysqli_fetch_array($harga)) {
    echo "$data[stok]";
}
