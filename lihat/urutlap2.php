<?php 
$t1=$_POST['datepicker1'];
$t2=$_POST['datepicker2'];
$adm=$_GET['ad'];
$trans=$_POST['cbox2'];
header("location:../admin/operator.php?tag=lap2&opsi=lihat&td=".$t1."&ts=".$t2."&ad=".$adm."&tr=".$trans."");
?>