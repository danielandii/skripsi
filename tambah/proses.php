<?php
include "../koneksi.php";

$pilihan = $_GET['kode'];
$qry = mysql_query("SELECT * FROM barang WHERE kd_barang='$pilihan'", $koneksi);
$hrg = mysql_fetch_array($qry);

$harga=number_format($hrg['harga'], 0, ',', '.');
echo "$harga";
?>