<?php

include "../koneksi.php";

$id = $_GET['id'];
$tag = $_GET['tag'];

if ($tag=="adm") {
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$t5 = $_POST['tbox5'];
	$t6 = $_POST['tbox6'];
	$t7 = $_POST['tbox7'];
	$c8 = $_POST['cbox8'];
	$qry = mysql_query("update admin set nm_admin='$t2', alamat='$t3', telp='$t4', email='$t5', user_id='$t6', pass_id='$t7', level_id='$c8' where id_admin='$id'", $koneksi);
	header("location:../admin/utama.php?tag=adm&opsi=lihat&nb=ubah");
}

elseif ($tag=="brg"){
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
		
	$qry = mysql_query("update barang set menu='$r2', sub_menu='$r3', nm_barang='$t4', harga='$t7' where kd_barang='$id'", $koneksi);
	header("location:../admin/utama.php?tag=brg&opsi=lihat&nb=ubah");
}

elseif ($tag=="brt"){
	$t2 = $_POST['tbox2'];
	$tx = $_POST['text'];
	$tanggal = $_POST['datepicker1'];
	$t1 = date("Y-m-d", strtotime($tanggal));
	$qry = mysql_query("update berita set judul='$t2', isi='$tx', tgl='$t1' where id_berita='$id'", $koneksi);
	header("location:../admin/utama.php?tag=brt&opsi=lihat&nb=ubah");
}

elseif ($tag=="pro"){
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$t4 = $_POST['tbox4'];
	$t5 = $_POST['tbox5'];
	$t6 = $_POST['tbox6'];
	$qry = mysql_query("update profil set nm_profil='$t2', alamat='$t3', telp='$t4', fax='$t5', email='$t6' where id_profil='$id'", $koneksi);
	header("location:../admin/utama.php?tag=pro&opsi=lihat&nb=ubah");
}

elseif ($tag=="gbr") {
	$level = $_GET['level'];
	$file = $_FILES['file']["name"];
	if ($file!="") {
	$fl = "gambar/".$file;
	$file = stripslashes($file);
	$file = str_replace("'","",$file);
	copy($_FILES['file']['tmp_name'], "../gambar/".$file);
	$qry = mysql_query("update barang set gambar='$fl' where kd_barang='$id'", $koneksi);
		if ($level=="Admin") {
		header("location:../admin/utama.php?tag=brg&opsi=lihat&nb=gbr");
		}
		else {
		header("location:../admin/operator.php?tag=info&opsi=lihat&nb=gbr");
		}
	}
}
elseif ($tag=="ket") {
	$tx = $_POST['text'];
	$level = $_GET['level'];
	$qry = mysql_query("update barang set keterangan='$tx' where kd_barang='$id'", $koneksi);
	if ($level=="Admin") {
	header("location:../admin/utama.php?tag=brg&opsi=lihat&nb=ket");
	}
	else {
	header("location:../admin/operator.php?tag=info&opsi=lihat&nb=ket");
	}
}

elseif ($tag=="bnr") {
	$file = $_FILES['file']["name"];
	if ($file!="") {
	$fl = "gambar/".$file;
	$file = stripslashes($file);
	$file = str_replace("'","",$file);
	copy($_FILES['file']['tmp_name'], "../gambar/".$file);
	$qry = mysql_query("update banner set gambar='$fl' where id_banner=1", $koneksi);
	header("location:../admin/utama.php?tag=bnr&opsi=lihat&nb=gbr");
	}
	else
	header("location:../admin/utama.php?tag=bnr&opsi=lihat");
}

elseif ($tag=="tic") {
	$tx = $_POST['text'];
	$nm = $_POST['nama'];
	$qry = mysql_query("update banner set banner='$tx' , nama='$nm' where id_banner=1", $koneksi);
	header("location:../admin/utama.php?tag=bnr&opsi=lihat&nb=ubah");
}

elseif ($tag=="gbrbrt") {
	$file = $_FILES['file']["name"];
	if ($file!="") {
	$fl = "gambar/".$file;
	$file = stripslashes($file);
	$file = str_replace("'","",$file);
	copy($_FILES['file']['tmp_name'], "../gambar/".$file);
	$qry = mysql_query("update berita set gambar='$fl' where id_berita='$id'", $koneksi);
	header("location:../admin/utama.php?tag=brt&opsi=lihat&nb=gbr");
	}
	else
	header("location:../admin/utama.php?tag=brt&opsi=lihat");
}

elseif ($tag=="stok"){

	$level = $_GET['level'];
	$cek = mysql_query("select * from barang where kd_barang='$id' ", $koneksi);
	$cek2 = mysql_fetch_array($cek);
	$stok = $cek2['stok'];
	$tanggal = date('Y-m-d');
	$op = $_GET['op'];
	$t6 = $_POST['tbox6'];
	$t7 = $_POST['tbox7'];
	$total = $t6*$t7;
	$t10 = $t6 + $stok;
		
	$qry = mysql_query("update barang set stok='$t10' where kd_barang='$id'", $koneksi);
	
	$qry2 = mysql_query("insert into laporan (tanggal, id_admin, kd_barang, jumlah, harga, total, jenis) values ('$tanggal', '$op', '$id', '$t6', '$t7', '$total', 'Beli')", $koneksi);
	
	if ($level=="Admin") {
	header("location:../admin/utama.php?tag=brg&opsi=lihat&nb=stok");
	}
	else {
	header("location:../admin/operator.php?tag=info&opsi=lihat&nb=stok");
	}
}

elseif ($tag=="pass") {
	$id = $_GET['id'];
	$t1 = $_POST['tbox1'];
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$cek = mysql_query("select * from admin where id_admin='$id'", $koneksi);
	$hasil = mysql_fetch_array($cek);
	$pass=$hasil['pass_id'];
	if ($t1==$pass) {
		if ($t2==$t3) {
			$ubah=mysql_query("update admin set pass_id='$t2' where id_admin='$id'", $koneksi);
			header("location:../admin/operator.php?tag=pass&opsi=ubah&stat=t&nb=pass");
		}
		else{
			header("location:../admin/operator.php?tag=pass&opsi=ubah&stat=f");
		}
	}
	else {
		header("location:../admin/operator.php?tag=pass&opsi=ubah&stat=f");
	}
}

elseif ($tag=="data") {
	$id = $_GET['id'];
	$t1 = $_POST['tbox1'];
	$t2 = $_POST['tbox2'];
	$t3 = $_POST['tbox3'];
	$tambah = mysql_query("update admin set alamat='$t1', telp='$t2', email='$t3' where id_admin='$id'", $koneksi);
	header("location:../admin/operator.php?tag=data&opsi=ubah&id=$id&nb=ubah");
}

?>