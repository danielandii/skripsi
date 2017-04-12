<div align="center">
Buat Laporan Penjualan
</div>
<div>
<table width="100%" border="0" cellspacing="1">
<form id="form1" name="form1" method="post" action="mengelolaLaporan.php?tag=tambah&op=<?php echo $_SESSION['idadmin'];?>">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tanggal</td>
    <td>:</td>
    <td><label><?php $tanggal=date('d-m-Y'); echo $tanggal;?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Operator</td>
    <td>:</td>
    <td><label><?php echo $_SESSION['nama'];?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nama Barang</td>
    <td>:</td>
    <td><select name="cbox4" id="cbox4" onChange="ubahChekbox(this.value);">
      <option>pilih barang</option>
      <?php $ambil= mysql_query("select * from barang order by nm_barang",$koneksi);
	  while ($menu= mysql_fetch_array($ambil)) { ?>
      <option value="<?php echo $menu['kd_barang']?>"> <?php echo "$menu[nm_barang]</option>";} ?></option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Jumlah</td>
    <td>:</td>
    <td><input type="number" name="tbox5" id="tbox5" required="required" onkeydown="return isNumberKey(event)"/><?php 
	$stat = $_GET['st'];
	if ($stat=="f")
	echo "stok tidak mencukupi";
	?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Harga</td>
    <td>:</td>
    <td><input type="number" name="tbox6" id="tbox6" readOnly="true"/>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
    &nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="operator.php?tag=lap2&opsi=lihat&td=<?php $tanggal=date('d-m-Y'); echo $tanggal;?>&ts=<?php echo $tanggal;?>&ad=<?php echo $_SESSION['idadmin'];?>&tr=all" >Lihat Laporan</a>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">
        <input type="submit" name="simpan" id="simpan" value="Simpan" /> </td>
  </tr> </form>
</table>
</div>