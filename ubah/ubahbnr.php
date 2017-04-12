<div align="center">Ubah Gambar Utama</div>
<div>
<?php 
$tabel = mysql_query("select * from banner where id_banner=1", $koneksi);
$isi = mysql_fetch_array($tabel); ?>

<form name="form1" method="post" action="MengelolaPengaturan.php?tag=gambar&id=1" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="1">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><img src="../<?php echo $isi['gambar'];?>" name="<?php echo $isi['gambar'];?>" width="320" height="240"id="
						<?php echo $isi['gambar']; ?>" /></td>
  </tr>
  <tr>
    <td width="20%" align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td></td>
    <td width="80%" rowspan="2"><input name="file" type="file" required="required" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle">Pilih Gambar : </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">
        <input type="submit" name="button" id="button" value="Simpan">    </td>
  </tr>
</table>
</form>
</div>