<div align="center">
Data Pribadi
</div>
<div>
<?php 
$kode = $_GET['id'];
$tabel = mysql_query("select * from admin where id_admin='$kode'", $koneksi);
$isi = mysql_fetch_array($tabel);
?>
<table width="100%" border="0" cellspacing="1">
<form id="form1" name="form1" method="post" action="MengelolaPegawai.php?tag=data&id=<?php echo $_SESSION['idadmin'];?>">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nama</td>
    <td>:</td>
    <td><label><?php echo $_SESSION['nama'];?></label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alamat</td>
    <td>:</td>
    <td><input type="text" name="tbox1" id="tbox1" value="<?php echo $isi['alamat'];?>" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Telp</td>
    <td>:</td>
    <td><input type="text" name="tbox2" id="tbox2" value="<?php echo $isi['telp'];?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Email</td>
    <td>:</td>
    <td><input type="text" name="tbox3" id="tbox3" value="<?php echo $isi['email'];?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="../admin/operator.php?tag=pass&opsi=ubah&id=<?php echo $_SESSION['idadmin'];?>">ubah password</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" colspan="4">
        <input type="submit" name="simpan" id="simpan" value="Ubah" /> </td>
  </tr> </form>
</table>
</div>