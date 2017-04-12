<div align="center">
Lihat Data Transaksi
</div>
<div>
<table width="100%" border="0" cellspacing="1">
<form id="form1" name="form1" method="post" action="../lihat/urutlap.php" enctype="multipart/form-data">
  <tr>
  	<td width="9%" >Tanggal :</td>
  	<td width="8%" >Dari :</td>
    <td width="25%" ><input type="text" id="datepicker1" name="datepicker1" value="<?php echo $_GET['td'];?>" /></td>
    <td width="12%"></td>
    <td width="12%">Pegawai : </td>
    <td width="19%"><select name="cbox1" id="cbox1">
        <option value="all">-pilih operator-</option>
        <?php $ambil2= mysql_query("select * from admin group by nm_admin",$koneksi);
	  	while ($sub_menu= mysql_fetch_array($ambil2)) {
      	echo "<option ";
		if($_GET['ad']==$sub_menu['id_admin']) {
		echo "selected='selected' ";}
		$idadmin=$sub_menu['id_admin'];
		echo "value='$idadmin'";
		echo ">$sub_menu[nm_admin]</option>";} ?>
    	</select></td>
        <td width="15%"></td>
  </tr>
  <tr>
   	<td></td>
  	<td >Sampai :</td>
    <td ><input type="text" id="datepicker2" name="datepicker2" value="<?php echo $_GET['ts'];?>"/></td>
    <td></td>
    <td>Transaksi : </td>
    <td><select name="cbox2" id="cbox2">
        <option value="all">-pilih Transaksi-</option>
        <option value="Beli" <?php if($_GET['tr']=="Beli") { echo "selected='selected'";}?>>Beli</option>
        <option value="Jual" <?php if($_GET['tr']=="Jual") { echo "selected='selected'";}?>>Jual</option>
    	</select></td>
        <td><input type="submit" name="simpan" id="simpan" value="Lihat" /></td>
  </tr></form>
  <tr>
  	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><form id="form2" name="form2" method="post" action="mengelolaLaporan.php?tag=cetak&td=<?php echo "".$_GET['td']."&ts=".$_GET['ts']."&ad=".$_GET['ad']."&tr=".$_GET['tr']."&name=".$_SESSION['nama'].""; ?>" enctype="multipart/form-data">
    <input type="submit" name="simpan" id="simpan" value="Cetak Laporan" />
    </form></td>
  </tr>
   <tr>
  	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7">
    <?php 
    include "lihatlapor.php";
    ?>
    &nbsp;</td>
  </tr>
   
</table>
</div>