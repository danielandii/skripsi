<?php
include "../koneksi.php";

class MengelolaPegawai {

function tambahPegawai() {
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$t5 = $_POST['tbox5'];
	$t6 = $_POST['tbox6'];
	$t7 = $_POST['tbox7'];
	$c8 = $_POST['cbox8'];
	$qry = "insert into admin (nm_admin, alamat, telp, email, user_id, pass_id, level_id) values ('$t2', '$t3', '$t4', '$t5', '$t6', '$t7', '$c8')";
	return $qry;
}

function ubahPegawai() {
	$id = $_GET['id'];
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$t5 = $_POST['tbox5'];
	$t6 = $_POST['tbox6'];
	$t7 = $_POST['tbox7'];
	$c8 = $_POST['cbox8'];
	$qry = "update admin set nm_admin='$t2', alamat='$t3', telp='$t4', email='$t5', user_id='$t6', pass_id='$t7', level_id='$c8' where id_admin='$id'";
	return $qry;
}

function ubahDataPribadi() {
	$id = $_GET['id'];
	$t1 = $_POST['tbox1'];
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$qry = "update admin set alamat='$t1', telp='$t2', email='$t3' where id_admin='$id'";
	return $qry;
}

function ubahPassword() {
	$id = $_GET['id'];
	$t2 = $_POST['tbox2'];
	$qry= "update admin set pass_id='$t2' where id_admin='$id'";
	return $qry;
}

function hapusPegawai() {
	$tabel = $_GET['tbl'];
	$id = $_GET['id'];
	$qry = "delete from $tabel where id_admin='$id'";
	return $qry;
}

function lihatPegawai() {
	$qry = "select * from admin";
	return $qry;
}
}

$b = new MengelolaPegawai();
$tag = $_GET['tag'];

if ($tag=="tambah"){
$sql = $b->tambahPegawai();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=adm&opsi=lihat&nb=tambah");
}

elseif ($tag=="ubah"){
$sql = $b->ubahPegawai();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=adm&opsi=lihat&nb=ubah");
}

elseif ($tag=="data"){
$id = $_GET['id'];
$sql = $b->ubahDataPribadi();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/operator.php?tag=data&opsi=ubah&id=$id&nb=ubah");
}

elseif ($tag=="pass"){
	$id = $_GET['id'];
	$t1 = $_POST['tbox1'];
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$cek = mysql_query("select * from admin where id_admin='$id'", $koneksi);
	$hasil = mysql_fetch_array($cek);
	$pass=$hasil['pass_id'];
	if ($t1==$pass) {
		if ($t2==$t3) {
			$sql = $b->ubahPassword();
			$query = mysql_query($sql, $koneksi) or die("error");	
			header("location:../admin/operator.php?tag=pass&opsi=ubah&stat=t&nb=pass&id=$id");
		}
		else{
			header("location:../admin/operator.php?tag=pass&opsi=ubah&stat=f&id=$id");
		}
	}
	else {
		header("location:../admin/operator.php?tag=pass&opsi=ubah&stat=f&id=$id");
	}
}

elseif ($tag=="hapus"){
$sql = $b->hapusPegawai();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=adm&opsi=lihat&nb=hapus");
}

?>