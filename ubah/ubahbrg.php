<div align="center">
Ubah Data Barang
</div>
<div>
<?php 
$kode = $_GET['id'];
$tabel = mysql_query("select * from barang where kd_barang='$kode'", $koneksi);
$isi = mysql_fetch_array($tabel);
?>

<table width="100%" border="0" cellspacing="1">
<form id="form1" name="form1" method="post" action="mengelolaBarang.php?tag=ubah&id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Menu</td>
    <td>:</td>
    <td width="26%"><input type="radio" name="radio2" value="cbox" checked="checked"/>
      <select name="cbox2" id="cbox2">
        <?php $ambil= mysql_query("select * from barang group by menu",$koneksi);
	  while ($menu= mysql_fetch_array($ambil)) {
      	echo "<option "; 
		if ($menu['menu']==$isi['menu']) { 
			echo "selected"; } 
		echo ">$menu[menu]</option>"; } ?>
      </select></td>
    <td width="36%"><input type="radio" name="radio2" value="tbox"/>
      <input type="text" name="tbox2" id="tbox2" />    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>SubMenu</td>
    <td>:</td>
    <td><input type="radio" name="radio3" value="cbox" checked="checked"/>
      <select name="cbox3" id="cbox3">
        <?php $ambil2= mysql_query("select * from barang group by sub_menu",$koneksi);
	  	while ($sub_menu= mysql_fetch_array($ambil2)) { 
      	echo "<option "; 
		if ($sub_menu['sub_menu']==$isi['sub_menu']) { 
			echo "selected"; } 
		echo ">$sub_menu[sub_menu]</option>";} ?>
      </select></td>
    <td><input type="radio" name="radio3" value="tbox" />
      	<input type="text" name="tbox3" id="tbox3" />      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nama Barang</td>
    <td>:</td>
    <td colspan="2"><input type="text" name="tbox4" id="tbox4" value="<?php echo $isi['nm_barang']?>" required="required"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Stok</td>
    <td>:</td>
    <td colspan="2"><?php echo $isi['stok']?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Harga</td>
    <td>:</td>
    <td colspan="2"><input type="number" name="tbox7" id="tbox7" value="<?php echo $isi['harga']?>" required="required"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" align="center">
     
        <input type="submit" name="simpan" id="simpan" value="Simpan" />
     </td>
  </tr> </form>
</table>
</div>