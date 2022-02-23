<?php
include('koneksi.php');

$id_kurir = $_POST["id_kurir"];

$harga = mysqli_query($koneksi, "SELECT * FROM tb_kurir WHERE id_kurir='$id_kurir'");

while ($data = mysqli_fetch_array($harga)) {
    echo "$data[ongkir]";
}
