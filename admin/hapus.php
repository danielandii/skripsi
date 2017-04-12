<?php 

include "../koneksi.php";

$tabel = $_GET['tbl'];
$id = $_GET['id'];

if ($tabel=="admin") {
$qry = mysql_query("delete from $tabel where id_admin='$id'", $koneksi);
header("location:../admin/utama.php?tag=adm&opsi=lihat&nb=hapus");
}

elseif ($tabel=="barang") {
$qry = mysql_query("delete from $tabel where kd_barang='$id'", $koneksi);
header("location:../admin/utama.php?tag=brg&opsi=lihat&nb=hapus");
}

elseif ($tabel=="berita") {
$qry = mysql_query("delete from $tabel where id_berita='$id'", $koneksi);
header("location:../admin/utama.php?tag=brt&opsi=lihat&nb=hapus");
}

elseif ($tabel=="laporan") {
$qry = mysql_query("delete from $tabel where id_laporan='$id'", $koneksi);
$tanggal=date('d-m-Y');
header("location:../admin/utama.php?tag=lap&opsi=lihat&td=".$tanggal."&ts=".$tanggal."&ad=all&tr=all&nb=hapus");
}

elseif ($tabel=="profil") {
$qry = mysql_query("delete from $tabel where id_profil='$id'", $koneksi);
header("location:../admin/utama.php?tag=pro&opsi=lihat&nb=hapus");
}

?>