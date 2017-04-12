<?php
include "../koneksi.php";

class MengelolaPengaturan {


function ubahPengaturan() {
	$id = $_GET['id'];
	$tx = $_POST['text'];
	$nm = $_POST['nama'];
	$qry = "update banner set banner='$tx' , nama='$nm' where id_banner=1";
	return $qry;
}

function ubahGambarWeb() {
	$id = $_GET['id'];
	$file = $_FILES['file']["name"];
	if ($file!="") 
	$fl = "gambar/".$file;
	$file = stripslashes($file);
	$file = str_replace("'","",$file);
	copy($_FILES['file']['tmp_name'], "../gambar/".$file);
	$qry = "update banner set gambar='$fl' where id_banner=1";
	return $qry;
}
}

$b = new MengelolaPengaturan();
$tag = $_GET['tag'];

if ($tag=="ubah"){
$sql = $b->ubahPengaturan();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=bnr&opsi=lihat&nb=ubah");
}

elseif ($tag=="gambar"){
$sql = $b->ubahGambarWeb();
$query = mysql_query($sql, $koneksi) or die("error");	
header("location:../admin/utama.php?tag=bnr&opsi=lihat&nb=gbr");
}

?>