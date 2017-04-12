<div align="center">
Lihat Data Berita
</div>
<div>
<table width="100%">
<tr>
    <td width="89%" align="right">Tambah Data :</td>
    <td width="1%"></td>
    <td width="10%" align="left"><a href="../admin/utama.php?tag=brt&opsi=tambah"><img src="../lihat/tambah.jpg" width="30" height="30" title="Tambah data berita"/></a></td>
  </tr>
  <tr>
  <td colspan="3">&nbsp;
  
  </td>
  </tr>
</table>
  <table width="100%" border="3" cellspacing="1" align="center">
    <tr bgcolor="#CCCCCC" align="center">
      <td width="40%">Judul Berita</td>
      <td width="30%">Tanggal Terbit</td>
      <td width="13%">Gambar</td>
      <td width="17%">Aksi</td>
    </tr>
    <?php include "../admin/MengelolaBerita.php";
		$sql = $b->lihatBerita();
		$tabel = mysql_query($sql, $koneksi) or die("error");
	    while ($isi=mysql_fetch_array($tabel)) { 
	?>
    <tr align="center">
      <td><?php echo $isi['judul'];?></td>
      <td><?php echo date('d-m-Y', strtotime($isi['tgl']));?></td>
      <td><a href="../admin/utama.php?menu=1&tag=gbrbrt&opsi=ubah&id=<?php echo $isi['id_berita'];?>"> 
      <img src="../lihat/gambar.png" width="30" height="30" title="Lihat gambar berita"/></a></td>
      <td><a href="../admin/utama.php?tag=brt&amp;opsi=ubah&amp;id=<?php echo $isi['id_berita'];?>"> 
      <img src="../lihat/edit.png" width="30" height="30" title="Ubah data berita"/></a> 
      <a href="../admin/MengelolaBerita.php?tag=hapus&id=<?php echo $isi['id_berita'];?>&tbl=berita" onclick="return confirm('Yakin akan dihapus?');"> 
      <img src="../lihat/delete.png" width="30" height="30" title="Hapus data berita"/></a></td>
    </tr>
    <?php } ?>
  </table>
</div>
