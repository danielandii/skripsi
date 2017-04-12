<?php
include "../koneksi.php";

class MengelolaBarang {

function tambahBarang() {
	$tanggal = date('Y-m-d');
	$op = $_GET['op'];
	$level = $_GET['level'];
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$c2 = $_POST['cbox2'];
	$c3 = $_POST['cbox3'];
	$t6 = $_POST['tbox6'];
	$t7 = $_POST['tbox7'];
	$t8 = $_POST['tbox8'];
	$total = $t6*$t8;
	$radio2 = $_POST['radio2'];
	$radio3 = $_POST['radio3'];
	if ($radio2=="cbox") 
		$r2=$c2; 
	else
		$r2=$t2;
	if ($radio3=="cbox")
		$r3=$c3;
	else
		$r3=$t3;
	$file = $_FILES['file']["name"];
	if ($file!="") {
	$fl = "gambar/".$file;
	$file = stripslashes($file);
	$file = str_replace("'","",$file);
	copy($_FILES['file']['tmp_name'], "../gambar/".$file);
	}
	else { $fl = "gambar/na.jpg"; }
	$qry = "insert into barang (menu, sub_menu, nm_barang, gambar, stok, harga) values ('$r2', '$r3', '$t4', '$fl', '$t6', '$t7')";
	return $qry;
}

function tambahBarang2() {
	include "../koneksi.php";
	$tanggal = date('Y-m-d');
	$op = $_GET['op'];
	$level = $_GET['level'];
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$c2 = $_POST['cbox2'];
	$c3 = $_POST['cbox3'];
	$t6 = $_POST['tbox6'];
	$t7 = $_POST['tbox7'];
	$t8 = $_POST['tbox8'];
	$total = $t6*$t8;
	$radio2 = $_POST['radio2'];
	$radio3 = $_POST['radio3'];
	if ($radio2=="cbox") 
		$r2=$c2; 
	else
		$r2=$t2;
	if ($radio3=="cbox")
		$r3=$c3;
	else
		$r3=$t3;
	$file = $_FILES['file']["name"];
	if ($file!="") {
	$fl = "gambar/".$file;
	$file = stripslashes($file);
	$file = str_replace("'","",$file);
	copy($_FILES['file']['tmp_name'], "../gambar/".$file);
	}
	else { $fl = "gambar/na.jpg"; }
	$cari = mysql_query("select * from barang where nm_barang='$t4' and harga='$t7'", $koneksi);
	$brg = mysql_fetch_array($cari);
	$t1 = $brg['kd_barang'];
	$qry = "insert into laporan (tanggal, id_admin, kd_barang, jumlah, harga, total, jenis) values ('$tanggal', '$op', '$t1', '$t6', '$t8', '$total', 'Beli')";
	return $qry;
}

function ubahBarang() {
	$id = $_GET['id'];
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$c2 = $_POST['cbox2'];
	$c3 = $_POST['cbox3'];
	$t6 = $_POST['tbox6'];
	$t7 = $_POST['tbox7'];
	$radio2 = $_POST['radio2'];
	$radio3 = $_POST['radio3'];
	if ($radio2=="cbox") 
		$r2=$c2; 
	else
		$r2=$t2;
	if ($radio3=="cbox")
		$r3=$c3;
	else
		$r3=$t3;
		
	$qry = "update barang set menu='$r2', sub_menu='$r3', nm_barang='$t4', harga='$t7' where kd_barang='$id'";
	return $qry;
}

function ubahGambar() {
	$id = $_GET['id'];
	$level = $_GET['level'];
	$file = $_FILES['file']["name"];
	if ($file!="")
	$fl = "gambar/".$file;
	$file = stripslashes($file);
	$file = str_replace("'","",$file);
	copy($_FILES['file']['tmp_name'], "../gambar/".$file);
	$qry = "update barang set gambar='$fl' where kd_barang='$id'";
	return $qry;
}

function ubahKeterangan() {
	$id = $_GET['id'];
	$tx = $_POST['text'];
	$qry = "update barang set keterangan='$tx' where kd_barang='$id'";
	return $qry;
}

function tambahStok() {
	include "../koneksi.php";
	$id = $_GET['id'];
	$cek = mysql_query("select * from barang where kd_barang='$id' ", $koneksi);
	$cek2 = mysql_fetch_array($cek);
	$stok = $cek2['stok'];
	$tanggal = date('Y-m-d');
	$op = $_GET['op'];
	$t6 = $_POST['tbox6'];
	$t7 = $_POST['tbox7'];
	$total = $t6*$t7;
	$t10 = $t6 + $stok;
	$qry = "update barang set stok='$t10' where kd_barang='$id'";
	return $qry;
}

function tambahStok2() {
	include "../koneksi.php";
	$id = $_GET['id'];
	$cek = mysql_query("select * from barang where kd_barang='$id' ", $koneksi);
	$cek2 = mysql_fetch_array($cek);
	$stok = $cek2['stok'];
	$tanggal = date('Y-m-d');
	$op = $_GET['op'];
	$t6 = $_POST['tbox6'];
	$t7 = $_POST['tbox7'];
	$total = $t6*$t7;
	$t10 = $t6 + $stok;
	$qry = "insert into laporan (tanggal, id_admin, kd_barang, jumlah, harga, total, jenis) values ('$tanggal', '$op', '$id', '$t6', '$t7', '$total', 'Beli')";
	return $qry;
}

function hapusBarang() {
	$tabel = $_GET['tbl'];
	$id = $_GET['id'];
	$qry = "delete from $tabel where kd_barang='$id'";
	return $qry;
}

function lihatBarang() {
	$cari = $_GET['cari'];
	$sort = $_GET['sort'];
	if ($cari=="") {
		if($sort=="") {
			$sql="SELECT * FROM barang order by nm_barang"; }
		else {
			$sql="SELECT * FROM barang order by ".$sort; }
	}
	else {
		if($sort=="") {
			$sql="SELECT * FROM barang where menu like '%$cari%' || sub_menu like '%$cari%' || nm_barang like '%$cari%' order by nm_barang"; }
		else {
			$sql="SELECT * FROM barang where menu like '%$cari%' || sub_menu like '%$cari%' || nm_barang like '%$cari%' order by ".$sort; }
	}
	return $sql;
}
}

$b = new MengelolaBarang();
$tag = $_GET['tag'];

if ($tag=="tambah"){
$level = $_GET['level'];
$sql = $b->tambahBarang();
$query = mysql_query($sql, $koneksi) or die("error");
$sql2 = $b->tambahBarang2();
$query2 = mysql_query($sql2, $koneksi) or die("error");
if ($level=="Admin") {
	header("location:../admin/utama.php?tag=brg&opsi=lihat");
}
else {
	header("location:../admin/operator.php?tag=info&opsi=lihat&nb=tambah");
}
}

elseif ($tag=="ubah"){
$sql = $b->ubahBarang();
$query = mysql_query($sql, $koneksi) or die("error");
header("location:../admin/utama.php?tag=brg&opsi=lihat&nb=ubah");
}

elseif ($tag=="gambar"){
$level = $_GET['level'];
$sql = $b->ubahGambar();
$query = mysql_query($sql, $koneksi) or die("error");	
if ($level=="Admin") {
	header("location:../admin/utama.php?tag=brg&opsi=lihat&nb=gbr");
}
else {
	header("location:../admin/operator.php?tag=info&opsi=lihat&nb=gbr");
}
}

elseif ($tag=="ket"){
$level = $_GET['level'];
$sql = $b->ubahKeterangan();
$query = mysql_query($sql, $koneksi) or die("error");	
if ($level=="Admin") {
header("location:../admin/utama.php?tag=brg&opsi=lihat&nb=ket");
}
else {
header("location:../admin/operator.php?tag=info&opsi=lihat&nb=ket");
}
}

elseif ($tag=="stok"){
$level = $_GET['level'];
$sql = $b->tambahStok();
$query = mysql_query($sql, $koneksi) or die("error");
$sql2 = $b->tambahStok2();
$query2 = mysql_query($sql2, $koneksi) or die("error");
if ($level=="Admin") {
	header("location:../admin/utama.php?tag=brg&opsi=lihat&nb=stok");
}
else {
	header("location:../admin/operator.php?tag=info&opsi=lihat&nb=stok");
}
}

elseif ($tag=="hapus"){
$sql = $b->hapusBarang();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=brg&opsi=lihat&nb=hapus");
}

?>