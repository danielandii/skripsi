<?php

include "../koneksi.php";

$tag = $_GET['tag'];

if ($tag=="adm") {
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$t5 = $_POST['tbox5'];
	$t6 = $_POST['tbox6'];
	$t7 = $_POST['tbox7'];
	$c8 = $_POST['cbox8'];
	$qry = mysql_query("insert into admin (nm_admin, alamat, telp, email, user_id, pass_id, level_id) values ('$t2', '$t3', '$t4', '$t5', '$t6', '$t7', '$c8')", $koneksi);
	header("location:../admin/utama.php?tag=adm&opsi=lihat&nb=tambah");
}

elseif ($tag=="brg"){
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
	
	$qry = mysql_query("insert into barang (menu, sub_menu, nm_barang, gambar, stok, harga) values ('$r2', '$r3', '$t4', '$fl', '$t6', '$t7')", $koneksi);
	
	$cari = mysql_query("select * from barang where nm_barang='$t4' and harga='$t7'", $koneksi);
	$brg = mysql_fetch_array($cari);
	$t1 = $brg['kd_barang'];
	$qry2 = mysql_query("insert into laporan (tanggal, id_admin, kd_barang, jumlah, harga, total, jenis) values ('$tanggal', '$op', '$t1', '$t6', '$t8', '$total', 'Beli')", $koneksi);
	if ($level=="Admin") {
	header("location:../admin/utama.php?tag=brg&opsi=lihat");
	}
	else {
	header("location:../admin/operator.php?tag=info&opsi=lihat&nb=tambah");
	}
}

elseif ($tag=="brt"){
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
	$qry = mysql_query("insert into berita (judul, isi, tgl, gambar) values ('$t2', '$tx', '$tanggal', '$fl')", $koneksi);
	header("location:../admin/utama.php?tag=brt&opsi=lihat&nb=tambah");
}

elseif ($tag=="lap"){
	$tanggal = date('Y-m-d');
	$op = $_GET['op'];
	$c4 = $_POST['cbox4'];
	$t5 = $_POST['tbox5'];
	$qr = mysql_query("select * from barang where kd_barang='$c4'", $koneksi);
	$fe = mysql_fetch_array($qr);
	$hrg = $fe['harga'];
	$total = $hrg * $t5;
	$stok = $fe['stok'];
	if ($stok>=$t5) {
	$sisa = $stok-$t5;
	$qry2 = mysql_query("update barang set stok='$sisa' where kd_barang='$c4'", $koneksi);
	$qry = mysql_query("insert into laporan (tanggal, id_admin, kd_barang, jumlah, harga, total, jenis) values ('$tanggal', '$op', '$c4', '$t5', '$hrg', '$total', 'Jual')", $koneksi);
	header("location:../admin/operator.php?tag=lapor&opsi=tambah&nb=tambah");
	}
	else
	header("location:../admin/operator.php?tag=lapor&opsi=tambah&st=f");
}

elseif ($tag=="pro"){
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$t5 = $_POST['tbox5'];
	$t6 = $_POST['tbox6'];
	$qry = mysql_query("insert into profil (nm_profil, alamat, telp, fax, email) values ('$t2', '$t3', '$t4', '$t5', '$t6')", $koneksi);
	header("location:../admin/utama.php?tag=pro&opsi=lihat&nb=tambah");
}

?>