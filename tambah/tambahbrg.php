<div align="center">
Tambah Barang
</div>
<div>
<table width="100%" border="0" cellspacing="1">
<form id="form1" name="form1" method="post" action="mengelolaBarang.php?tag=tambah&op=<?php echo $_SESSION['idadmin'];?>&level=<?php echo $_SESSION['level'];?>" enctype="multipart/form-data">
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
    <td width="26%"><input id="radio21" name="radio2" type="radio" value="cbox" checked="checked"/>
      <select name="cbox2" id="cbox2" onChange="ubah21(this.value);return false;">
        <?php $ambil= mysql_query("select * from barang group by menu",$koneksi);
	  while ($menu= mysql_fetch_array($ambil)) {
      echo "<option>$menu[menu]</option>";} ?>
      </select></td>
    <td width="36%"><input id="radio22" type="radio" name="radio2" value="tbox" />
      <input type="text" name="tbox2" id="tbox2" onChange="ubah22(this.value);return false;"/>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>SubMenu</td>
    <td>:</td>
    <td><input type="radio" id="radio31" name="radio3" value="cbox" checked="checked"/>
      <select name="cbox3" id="cbox3" onChange="ubah31(this.value);return false;">
        <?php $ambil2= mysql_query("select * from barang group by sub_menu",$koneksi);
	  	while ($sub_menu= mysql_fetch_array($ambil2)) {
      	echo "<option>$sub_menu[sub_menu]</option>";} ?>
      </select></td>
    <td><input type="radio" id="radio32" name="radio3" value="tbox" />
      	<input type="text" name="tbox3" id="tbox3" onChange="ubah32(this.value);return false;"/>      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nama Barang</td>
    <td>:</td>
    <td colspan="2"><input type="text" name="tbox4" id="tbox4" required="required"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Gambar</td>
    <td>:</td>
    <td colspan="2"><input name="file" type="file" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Stok</td>
    <td>:</td>
    <td colspan="2"><input type="number" name="tbox6" id="tbox6" required="required" onkeydown="return isNumberKey(event)"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Harga jual</td>
    <td>:</td>
    <td colspan="2"><input type="number" name="tbox7" id="tbox7" required="required" onkeydown="return isNumberKey(event)"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Harga beli</td>
    <td>:</td>
    <td colspan="2"><input type="number" name="tbox8" id="tbox8" required="required" onkeydown="return isNumberKey(event)"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center">
      <label>
        <input type="submit" name="simpan" id="simpan" value="Simpan" />
      </label>    </td>
  </tr> </form>
</table>
</div>