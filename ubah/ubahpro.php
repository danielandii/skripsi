<div align="center">
Ubah Data Toko Cabang
</div>
<div>
<?php 
$kode = $_GET['id'];
$tabel = mysql_query("select * from profil where id_profil='$kode'", $koneksi);
$isi = mysql_fetch_array($tabel);
?>

<table width="100%" border="0" cellspacing="1">
<form id="form1" name="form1" method="post" action="MengelolaToko.php?tag=ubah&id=<?php echo $_GET['id'];?>">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nama Toko</td>
    <td>:</td>
    <td><input type="text" name="tbox2" id="tbox2" value="<?php echo $isi['nm_profil']?>" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>:</td>
    <td><input type="text" name="tbox3" id="tbox3" value="<?php echo $isi['alamat']?>" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Telepon</td>
    <td>:</td>
    <td><input type="text" name="tbox4" id="tbox4" value="<?php echo $isi['telp']?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Fax</td>
    <td>:</td>
    <td><input type="text" name="tbox5" id="tbox5" value="<?php echo $isi['fax']?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Email</td>
    <td>:</td>
    <td><input type="text" name="tbox6" id="tbox6" value="<?php echo $isi['email']?>" /></td>
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
      <label></label>
      <input type="submit" name="simpan" id="simpan" value="Simpan" /></td>
  </tr> </form>
</table>
</div>