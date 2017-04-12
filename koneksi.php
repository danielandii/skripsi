<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tugasakhir";

$koneksi = mysql_connect($host, $user, $pass);
$basisdata = mysql_select_db($db, $koneksi);

?>