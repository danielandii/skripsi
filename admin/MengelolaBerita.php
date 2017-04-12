<?php
include "../koneksi.php";

class MengelolaBerita {

function tambahBerita() {
	$t2 = $_POST['tbox2'];
	$tx = $_POST['text'];
	$tanggal = date('Y-m-d');
	$file = $_FILES['file']["name"];
	if ($file!="") {
	$fl = "gambar/".$file;
	$file = stripslashes($file);
	$file = str_replace("'","",$file);
	copy($_FILES['file']['tmp_name'], "../gambar/".$file);}
	else {
	$fl = "";}
	$qry = "insert into berita (judul, isi, tgl, gambar) values ('$t2', '$tx', '$tanggal', '$fl')";
	return $qry;
}

function ubahBerita() {
	$id = $_GET['id'];
	$t2 = $_POST['tbox2'];
	$tx = $_POST['text'];
	$tanggal = $_POST['datepicker1'];
	$t1 = date("Y-m-d", strtotime($tanggal));
	$qry = "update berita set judul='$t2', isi='$tx', tgl='$t1' where id_berita='$id'";
	return $qry;
}

function ubahGambarBerita() {
	$id = $_GET['id'];
	$file = $_FILES['file']["name"];
	if ($file!="")
	$fl = "gambar/".$file;
	$file = stripslashes($file);
	$file = str_replace("'","",$file);
	copy($_FILES['file']['tmp_name'], "../gambar/".$file);
	$qry = "update berita set gambar='$fl' where id_berita='$id'";
	return $qry;
}

function hapusBerita() {
	$tabel = $_GET['tbl'];
	$id = $_GET['id'];
	$qry = "delete from $tabel where id_berita='$id'";
	return $qry;
}

function lihatBerita() {
	$qry = "select * from berita";
	return $qry;
}
}

$b = new MengelolaBerita();
$tag = $_GET['tag'];

if ($tag=="tambah"){
$sql = $b->tambahBerita();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=brt&opsi=lihat&nb=tambah");
}

elseif ($tag=="ubah"){
$sql = $b->ubahBerita();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=brt&opsi=lihat&nb=ubah");
}

elseif ($tag=="gambar"){
$sql = $b->ubahGambarBerita();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=brt&opsi=lihat&nb=gbr");
}

elseif ($tag=="hapus"){
$sql = $b->hapusBerita();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=brt&opsi=lihat&nb=hapus");
}

?>