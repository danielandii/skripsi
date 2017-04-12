<?php
if (isset($_SESSION['username'])) {
	$id=$_SESSION['idadmin'];
	if ($_SESSION['level']=="Admin") {	
		header("location:utama.php?tag=adm&opsi=lihat");
	}
	else {
		header("location:operator.php?tag=data&opsi=ubah&id=$id");
	}
}
?>