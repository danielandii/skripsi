<?php
session_start();
include "../koneksi.php";

$username = $_POST['userid'];
$password = $_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$login = mysql_query("select * from admin where user_id='$username' and pass_id='$password'", $koneksi) or die ("error");
$data = mysql_num_rows($login);
$hasil = mysql_fetch_array($login);

if($data == 0){
header("location:index.php?no=1");
}

else {
$_SESSION['idadmin']=$hasil['id_admin'];
$_SESSION['username']=$username;
$_SESSION['level']=$hasil['level_id'];
$_SESSION['nama']=$hasil['nm_admin'];
$id=$_SESSION['idadmin'];
	if ($hasil['level_id']=="Admin") {	
		header("location:utama.php?tag=adm&opsi=lihat");
	}
	else {
		header("location:operator.php?tag=data&opsi=ubah&id=$id");
	}
}


?>