<?php 
$t1=$_POST['datepicker1'];
$t2=$_POST['datepicker2'];
$adm=$_POST['cbox1'];
$trans=$_POST['cbox2'];
header("location:../admin/utama.php?tag=lap&opsi=lihat&td=".$t1."&ts=".$t2."&ad=".$adm."&tr=".$trans."");
?>