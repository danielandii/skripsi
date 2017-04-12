<table width="100%" border="3" cellspacing="1" align="center"> 
  <tr><td colspan="8"></td></tr>
    <tr bgcolor="#CCCCCC" align="center">
    	<td width="10%">Transaksi</td>
      	<td width="13%">Tanggal</td>
		<td width="15%">Pegawai</td>
      	<td width="20%">Barang</td>
      	<td width="8%">Jumlah</td>
      	<td width="14%">Harga</td>
      	<td width="14%">Total</td>
  </tr>
    <?php
	include "../admin/MengelolaLaporan.php";
	$sql = $b->lihatLaporan();

$query_count=mysql_query($sql);

$per_page = 30;//define how many games for a page
$count = mysql_num_rows($query_count);
$pages = ceil($count/$per_page);

if($_GET['page']==""){
$page="1";
}else{
$page=$_GET['page'];
}
$start    = ($page - 1) * $per_page;
$sql     = $sql." LIMIT $start,$per_page";
$query2=mysql_query($sql);

if($count==0) {
	echo "<tr align='center'><td colspan='8'> Data Pencarian tidak ditemukan</td></tr>"; }
else {
while ($isi=mysql_fetch_array($query2)) { ?>
  <tr align="center">
    	<td><?php echo $isi['jenis'];?></td>
        <td><?php echo date('d-m-Y', strtotime($isi['tanggal']));?></td>
        <?php $idadmin=$isi['id_admin'];
		$qambil=mysql_query("select * from admin where id_admin='$idadmin'");
        $nama=mysql_fetch_array($qambil);?>
        <td><?php echo $nama['nm_admin'];?></td>
        <?php $kdbrg=$isi['kd_barang'];
		$qambil2=mysql_query("select * from barang where kd_barang='$kdbrg'");
        $nama2=mysql_fetch_array($qambil2);?>
        <td><?php echo $nama2['nm_barang'];?></td>
        <td><?php echo $isi['jumlah'];?></td>
        <td><?php $hrg = number_format($isi['harga'], 0, ',', '.');echo $hrg;?></td>
        <td><?php $tot = number_format($isi['total'], 0, ',', '.');echo $tot;?></td>
    </tr> 
	<?php } }?>
<tr> <td colspan="9"><table id="pagination" width="100%" height="100%" align="center"><tr><td>Halaman :
        <?php
        //Show page links
        for ($i = 1; $i <= $pages; $i++)
          {?>
          <a href="operator.php?tag=lap2&opsi=lihat&<?php echo "td=$t1&ts=$t2&ad=$ad&tr=$tr"; ?>&page=<?php echo $i;?>"><?php echo $i;?></a>
          <?php           
          }
        ?>
      </td></tr></table></td></tr>
</table>
