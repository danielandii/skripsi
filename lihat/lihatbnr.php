<div align="center">
Kelola Tampilan Web
</div>
<div>
<?php 
$tabel = mysql_query("select * from banner where id_banner=1", $koneksi);
$isi = mysql_fetch_array($tabel); ?>

<form name="form1" method="post" action="MengelolaPengaturan.php?tag=ubah&id=1">
<table width="100%" border="0" cellspacing="1">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" align="center">Gambar utama</td>
    <td><a href="../admin/utama.php?tag=bnr&opsi=ubah&id=1"><img src="../lihat/gambar.png" width="30" height="30" title="Lihat gambar utama"/></a></td>
  </tr>
  <tr>
  	<td align="center" valign="middle">ticker : </td>
    <td width="80%">
    <textarea name="text" cols="45" rows="5" id="text"><?php echo $isi['banner'];?></textarea></td>
  </tr>
  <tr>
    <td align="center" valign="middle">Nama Web :</td>
    <td ><input type="text" id="nama" name="nama" required="required" value="<?php echo $isi['nama'];?>" width="100%"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">
        <input type="submit" name="button" id="button" value="Simpan">    </td>
  </tr>
</table>
</form>
</div>