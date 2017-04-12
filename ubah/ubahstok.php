<div align="center">
Tambah Stok Barang
</div>
<div>
<?php 
$kode = $_GET['id'];
$tabel = mysql_query("select * from barang where kd_barang='$kode'", $koneksi);
$isi = mysql_fetch_array($tabel);
?>

<table width="100%" border="0" cellspacing="1">
<form id="form1" name="form1" method="post" action="mengelolaBarang.php?tag=stok&id=<?php echo $_GET['id'];?>&op=<?php echo $_SESSION['idadmin'];?>&level=<?php echo $_SESSION['level'];?>" enctype="multipart/form-data">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="62%">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>Nama Barang</td>
    <td>:</td>
    <td><input type="number" name="tbox4" id="tbox4" value="<?php echo $isi['nm_barang']?>" readonly="readonly"/></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>Stok</td>
    <td>:</td>
    <td><input type="number" name="tbox6" id="tbox6" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Harga beli</td>
    <td>:</td>
    <td><input type="text" name="tbox7" id="tbox7" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">
      <label>
        <input type="submit" name="simpan" id="simpan" value="Simpan" />
        </label>    </td>
  </tr> </form>
</table>
</div>