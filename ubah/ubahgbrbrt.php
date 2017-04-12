<div align="center">
Ubah Gambar Berita
</div>
<div>
<?php 
$kode = $_GET['id'];
$tabel = mysql_query("select * from berita where id_berita='$kode'", $koneksi);
$isi = mysql_fetch_array($tabel); ?>

<form name="form1" method="post" action="MengelolaBerita.php?tag=gambar&id=<?php echo $kode;?>" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="1">
  <tr>
    <td colspan="2" align="center"><?php echo $isi['judul'];?></td>
  </tr>
  <tr>
    <td width="20%" align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><?php if($isi['gambar']=="") { echo "Gambar Tidak Tersedia";} else { ?><img src="../<?php echo $isi['gambar'];?>" name="<?php echo $isi['gambar'];?>" width="100" height="100"id="
						<?php echo $isi['gambar']; ?>" /> <?php } ?></td>
  </tr>
  <tr>
    <td width="20%" align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td></td>
    <td width="80%" rowspan="2"><input name="file" type="file" required="required"></td>
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