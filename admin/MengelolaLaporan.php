<?php
include "../koneksi.php";

class MengelolaLaporan {

function tambahLaporan() {
	include "../koneksi.php";
	$tanggal = date('Y-m-d');
	$op = $_GET['op'];
	$c4 = $_POST['cbox4'];
	$t5 = $_POST['tbox5'];
	$qr = mysql_query("select * from barang where kd_barang='$c4'", $koneksi);
	$fe = mysql_fetch_array($qr);
	$hrg = $fe['harga'];
	$total = $hrg * $t5;
	$stok = $fe['stok'];
	$sisa = $stok-$t5;
	$qry = "update barang set stok='$sisa' where kd_barang='$c4'";
	return $qry;
}

function tambahLaporan2() {
	include "../koneksi.php";
	$tanggal = date('Y-m-d');
	$op = $_GET['op'];
	$c4 = $_POST['cbox4'];
	$t5 = $_POST['tbox5'];
	$qr = mysql_query("select * from barang where kd_barang='$c4'", $koneksi);
	$fe = mysql_fetch_array($qr);
	$hrg = $fe['harga'];
	$total = $hrg * $t5;
	$stok = $fe['stok'];
	$sisa = $stok-$t5;
	$qry = "insert into laporan (tanggal, id_admin, kd_barang, jumlah, harga, total, jenis) values ('$tanggal', '$op', '$c4', '$t5', '$hrg', '$total', 'Jual')";
	return $qry;
}

function cetakLaporan() {
	$ttd = $_GET['name'];
	$tgl1 = $_GET['td'];
	$tgl2 = $_GET['ts'];
	$ad = $_GET['ad'];
	$tr = $_GET['tr'];
	$cetak = "location:../cetakLaporan.php?td=$tgl1&ts=$tgl2&ad=$ad&tr=$tr&name=$ttd";
	return $cetak;
}
	
function hapusLaporan() {
	$tabel = $_GET['tbl'];
	$id = $_GET['id'];
	$qry = "delete from $tabel where id_laporan='$id'";
	return $qry;
}

function lihatLaporan() {
	$tgl1 = $_GET['td'];
	$tgl2 = $_GET['ts'];
	$ad = $_GET['ad'];
	$tr = $_GET['tr'];
	$t1 = date("Y-m-d", strtotime($tgl1));
	$t2 = date("Y-m-d", strtotime($tgl2));
	if($ad!="all"){
		if($tr!="all") {
			$sql = "select * from laporan where jenis='$tr' and id_admin='$ad' and tanggal between '$t1' and '$t2'";
		}
		else
		$sql = "select * from laporan where id_admin='$ad' and tanggal between '$t1' and '$t2'";
	}
	else {
		if($tr!="all") {
			$sql = "select * from laporan where jenis='$tr' and tanggal between '$t1' and '$t2'";
		}
		else
		$sql = "select * from laporan where tanggal between '$t1' and '$t2'";
	}
	return $sql;
}
}

$b = new MengelolaLaporan();
$tag = $_GET['tag'];

if ($tag=="tambah"){
	$op = $_GET['op'];
	$c4 = $_POST['cbox4'];
	$t5 = $_POST['tbox5'];
	$qr = mysql_query("select * from barang where kd_barang='$c4'", $koneksi);
	$fe = mysql_fetch_array($qr);
	$hrg = $fe['harga'];
	$total = $hrg * $t5;
	$stok = $fe['stok'];
	if ($stok>=$t5) {
	$sql = $b->tambahLaporan();
	$query = mysql_query($sql, $koneksi) or die("error");
	$sql2 = $b->tambahLaporan2();
	$query2 = mysql_query($sql2, $koneksi) or die("error");	
	header("location:../admin/operator.php?tag=lapor&opsi=tambah&nb=tambah");
	}
	else
	header("location:../admin/operator.php?tag=lapor&opsi=tambah&st=f");
}

elseif ($tag=="cetak"){
$head = $b->cetakLaporan();
header($head);
}

elseif ($tag=="hapus"){
$sql = $b->hapusLaporan();
$query = mysql_query($sql, $koneksi) or die("error");	
$tanggal=date('d-m-Y');
header("location:../admin/utama.php?tag=lap&opsi=lihat&td=".$tanggal."&ts=".$tanggal."&ad=all&tr=all&nb=hapus");
}

?>