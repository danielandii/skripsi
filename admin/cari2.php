<?php 
$kata = $_POST['kata'];
header("location:operator.php?tag=info&opsi=lihat&cari=$kata");
?>