<div align="center">
Lihat Data Pegawai</div>
<div>
<table width="100%">
<tr>
    <td width="89%" align="right">Tambah Data :</td>
    <td width="1%"></td>
    <td width="10%" align="left"><a href="../admin/utama.php?tag=adm&opsi=tambah"><img src="../lihat/tambah.jpg" width="30" height="30" title="Tambah data admin"/></a></td>
  </tr>
  <tr>
  <td colspan="3">&nbsp;
  
  </td>
  </tr>
</table>
<table width="100%" border="3" cellspacing="1" align="center"> 
	
<tr bgcolor="#CCCCCC" align="center">
        <td width="16%">Nama</td>
      <td width="28%">Alamat</td>
      <td width="12%">Telepon</td>
      <td width="20%">Email</td>
      <td width="13%">Username</td>
      <td width="11%">Aksi</td>
    </tr>
    <?php include "../admin/MengelolaPegawai.php";
		$sql = $b->lihatPegawai();
		$tabel = mysql_query($sql, $koneksi) or die("error");
	    while ($isi=mysql_fetch_array($tabel)) {  
	?>
    <tr align="center">
        <td><?php echo $isi['nm_admin'];?></td>
        <td><?php echo $isi['alamat'];?></td>
        <td><?php echo $isi['telp'];?></td>
        <td><?php echo $isi['email'];?></td>
        <td><?php echo $isi['user_id'];?></td>
    	<td><a href="../admin/utama.php?tag=adm&opsi=ubah&id=<?php echo $isi['id_admin'];?>" >
        <img src="../lihat/edit.png" width="30" height="30" title="Ubah data admin"/></a>
        <a href="../admin/MengelolaPegawai.php?tag=hapus&id=<?php echo $isi['id_admin'];?>&tbl=admin" onclick="return confirm('Yakin akan dihapus?');">
        <img src="../lihat/delete.png" width="30" height="30" title="Hapus data admin"/></a></td>
    </tr> 
	<?php } ?>
    <tr><td colspan="9"></td></tr>
  
</table>
</div>