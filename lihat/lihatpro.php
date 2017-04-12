<div align="center">
Lihat Data Toko Cabang
</div>
<div>
<table width="100%">
<tr>
    <td width="89%" align="right">Tambah Data :</td>
    <td width="1%"></td>
    <td width="10%" align="left"><a href="../admin/utama.php?tag=pro&opsi=tambah"><img src="../lihat/tambah.jpg" width="30" height="30" title="Tambah data toko cabang"/></a></td>
  </tr>
  <tr>
  <td colspan="3">&nbsp;
  </td>
  </tr>
</table>
<table width="100%" border="3" cellspacing="1" align="center"> 
	<tr bgcolor="#CCCCCC" align="center">
        <td width="15%">Nama Toko</td>
      <td width="34%">Alamat</td>
      <td width="13%">Telepon</td>
      <td width="12%">Fax</td>
      <td width="15%">Email</td>
      <td width="11%">Aksi</td>
    </tr>
    <?php 
		include "../admin/MengelolaToko.php";
		$sql = $b->lihatToko();
		$tabel = mysql_query($sql, $koneksi) or die("error");
	    while ($isi=mysql_fetch_array($tabel)) { 
	?>	
    <tr align="center">
        <td><?php echo $isi['nm_profil'];?></td>
        <td><?php echo $isi['alamat'];?></td>
        <td><?php echo $isi['telp'];?></td>
        <td><?php echo $isi['fax'];?></td>
        <td><?php echo $isi['email'];?></td>
    	<td><a href="../admin/utama.php?tag=pro&opsi=ubah&id=<?php echo $isi['id_profil'];?>">
        <img src="../lihat/edit.png" width="30" height="30" title="Ubah data toko"/></a>
        <a href="../admin/MengelolaToko.php?tag=hapus&id=<?php echo $isi['id_profil'];?>&tbl=profil" onclick="return confirm('Yakin akan dihapus?');">
        <img src="../lihat/delete.png" width="30" height="30" title="Hapus data toko"/></a></td>
    </tr> 
	<?php } ?>
    <tr><td colspan="8"></td></tr>
</table>
</div>