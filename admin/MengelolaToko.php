<?php
include "../koneksi.php";

class MengelolaToko {

function tambahToko() {
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$t5 = $_POST['tbox5'];
	$t6 = $_POST['tbox6'];
	$qry = "insert into profil (nm_profil, alamat, telp, fax, email) values ('$t2', '$t3', '$t4', '$t5', '$t6')";
	return $qry;
}

function ubahToko() {
	$id = $_GET['id'];
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$t5 = $_POST['tbox5'];
	$t6 = $_POST['tbox6'];
	$qry = "update profil set nm_profil='$t2', alamat='$t3', telp='$t4', fax='$t5', email='$t6' where id_profil='$id'";
	return $qry;
}

function hapusToko() {
	$tabel = $_GET['tbl'];
	$id = $_GET['id'];
	$qry = "delete from $tabel where id_profil='$id'";
	return $qry;
}

function lihatToko() {
	$qry = "select * from profil";
	return $qry;
}
}

$b = new MengelolaToko();
$tag = $_GET['tag'];

if ($tag=="tambah"){
$sql = $b->tambahToko();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=pro&opsi=lihat&nb=tambah");	
}

elseif ($tag=="ubah"){
$sql = $b->ubahToko();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=pro&opsi=lihat&nb=ubah");
}

elseif ($tag=="hapus"){
$sql = $b->hapusToko();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=pro&opsi=lihat&nb=hapus");
}

?>