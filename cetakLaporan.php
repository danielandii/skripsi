<?php
require('inc/fpdf.php');
include "koneksi.php";
	$ttd = $_GET['name'];
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

$qry=mysql_query($sql);

if ($tr=="all")
	$trans="Jual - Beli";
else
	$trans=$tr;

if ($ad=="all") {
	$pgw="Semua"; }
else {
	$idadmin2=$ad;
	$qambil3=mysql_query("select * from admin where id_admin='$idadmin2'");
	$nama3=mysql_fetch_array($qambil3);
	$pgw=$nama3['nm_admin'];
}
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

$pdf->Cell(30,6,'Laporan tanggal : ');
$pdf->Cell(30,6,$tgl1,0,0,'C');
if ($tgl1!=$tgl2){
	$pdf->Cell(15,6,' sampai ');
	$pdf->Cell(30,6,$tgl2,0,0,'C');
}
$pdf->ln(8);
$pdf->Cell(30,6,'Jenis transaksi : ');
$pdf->Cell(20,6,$trans);
$pdf->Cell(75);
$pdf->Cell(18,6,'Pegawai : ');
$pdf->Cell(20,6,$pgw);
$pdf->ln(13);

$w = array(19, 22, 25, 60, 15, 24, 24);
$header = array('Transaksi', 'Tanggal', 'Pegawai', 'Barang', 'Jumlah', 'Harga', 'Total');
 	$pdf->SetFillColor(192);
    for($i=0;$i<7;$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$pdf->ln();
	while($data=mysql_fetch_array($qry))
    {
      	$pdf->SetFont('Arial','',9);
		$pdf->Cell($w[0],6,$data['jenis'],1,0,'C');
        $pdf->Cell($w[1],6,$data['tanggal'],1,0,'C');
		$idadmin=$data['id_admin'];
		$qambil=mysql_query("select * from admin where id_admin='$idadmin'");
        $nama=mysql_fetch_array($qambil);
        $pdf->Cell($w[2],6,$nama['nm_admin'],1,0,'C');
		$kdbrg=$data['kd_barang'];
		$qambil2=mysql_query("select * from barang where kd_barang='$kdbrg'");
        $nama2=mysql_fetch_array($qambil2);
        $pdf->Cell($w[3],6,$nama2['nm_barang'],1,0,'C');
		$pdf->Cell($w[4],6,$data['jumlah'],1,0,'C');
		$hrg = number_format($data['harga'], 0, ',', '.');
        $pdf->Cell($w[5],6,$hrg,1,0,'C');
		$tot = number_format($data['total'], 0, ',', '.');
        $pdf->Cell($w[6],6,$tot,1,0,'C');
		$pdf->ln();
    }
	
$pdf->SetFont('Arial','B',10);
if ($tr=="all") {
	$sql1= $sql." and jenis='Beli'";
	$sql2= $sql." and jenis='Jual'";
	
	$pdf->ln(13);
	$pdf->Cell(30,6,'Total Pembelian : ');
	$totalbeli=0;
	$qry1=mysql_query($sql1);
	while ($loop1=mysql_fetch_array($qry1)) {
		$beli=$loop1['total'];
		$totalbeli=$totalbeli+$beli;
	}
	$totbeli = number_format($totalbeli, 2, ',', '.');
	$pdf->Cell(20,6,'Rp. '.$totbeli);
	$pdf->ln(7);
	$pdf->Cell(30,6,'Total Penjualan  : ');
	$totaljual=0;
	$qry2=mysql_query($sql2);
	while ($loop2=mysql_fetch_array($qry2)) {
		$jual=$loop2['total'];
		$totaljual=$totaljual+$jual;
	}
	$totjual = number_format($totaljual, 2, ',', '.');
	$pdf->Cell(20,6,'Rp. '.$totjual);
	$pdf->ln(10);
}

elseif ($tr=="Beli") {
	$pdf->ln(13);
	$pdf->Cell(30,6,'Total Pembelian : ');
	$totalbeli=0;
	$qry1=mysql_query($sql);
	while ($loop1=mysql_fetch_array($qry1)) {
		$beli=$loop1['total'];
		$totalbeli=$totalbeli+$beli;
	}
	$totbeli = number_format($totalbeli, 2, ',', '.');
	$pdf->Cell(20,6,'Rp. '.$totbeli);
	$pdf->ln(10);
}

elseif ($tr=="Jual") {
	$pdf->ln(13);
	$pdf->Cell(30,6,'Total Penjualan  : ');
	$totaljual=0;
	$qry2=mysql_query($sql);
	while ($loop2=mysql_fetch_array($qry2)) {
		$jual=$loop2['total'];
		$totaljual=$totaljual+$jual;
	}
	$totjual = number_format($totaljual, 2, ',', '.');
	$pdf->Cell(20,6,'Rp. '.$totjual);
	$pdf->ln(10);
}

$tanggal = date('d-m-Y');
$pdf->Cell(130);
$pdf->Cell(30,6,'Tanggal, '.$tanggal,0,0,'C');
$pdf->ln(20);
$pdf->Cell(130);
$pdf->Cell(30,6,$ttd,0,0,'C');

$pdf->Output('laporan'.$tgl1.'_'.$tgl2, 'I');

?>