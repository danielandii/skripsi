<div align="center">
Lihat Data Barang
</div>
<div>
<table width="100%" >
<tr>
<td width="36%"><form id="form1" name="form1" method="post" action="cari.php">
<input type="text" name="kata" id="kata" required="required"/>
<input type="submit" name="button" id="button" value="Cari" title="Mulai pencarian"/>
</form>
</td>
<td width="53%" align="right" valign="middle">Tambah Data :</td>
<td width="5%" align="right" valign="middle"><a href="../admin/utama.php?tag=brg&opsi=tambah"><img src="../lihat/tambah.jpg" width="30" height="30" title="Tambah data barang"/></a></a></td>
<td width="6%"></td>
</tr>
<tr>&nbsp;</tr>
</table>

<table id="pagination" width="100%" align="center"><tr><td>Halaman :
<?php
$cari = $_GET['cari'];
$sort = $_GET['sort'];
include "../admin/MengelolaBarang.php";
$sql = $b->lihatBarang(); 
$query_count=mysql_query($sql);
 
$per_page =30;//define how many games for a page
$count = mysql_num_rows($query_count);
$pages = ceil($count/$per_page);
 
if($_GET['page']==""){
$page="1";
}else{
$page=$_GET['page'];
}
$start = ($page - 1) * $per_page;
$sql = $sql." LIMIT $start,$per_page";
$query2=mysql_query($sql);
//Show page links
for ($i = 1; $i <= $pages; $i++)
{?>
<a href="utama.php?tag=brg&opsi=lihat&cari=<?php echo $cari.'&sort='.$sort.'&page='.$i;?>"><?php echo $i;?></a>
<?php
}
?>
</td></tr></table>
<table width="100%" border="3" cellspacing="0" align="center">
<tr bgcolor="#CCCCCC">
<td width="11%" align="center"><a href="utama.php?tag=brg&opsi=lihat&sort=menu&cari=<?php echo $cari; ?>">Menu</a></td>
<td width="13%" align="center"><a href="utama.php?tag=brg&opsi=lihat&sort=sub_menu&cari=<?php echo $cari; ?>">SubMenu</a></td>
<td width="26%" align="center"><a href="utama.php?tag=brg&opsi=lihat&sort=nm_barang&cari=<?php echo $cari; ?>">Nama Barang</a></td>
<td width="9%" align="center"><a href="utama.php?tag=brg&opsi=lihat&sort=stok&cari=<?php echo $cari; ?>">stok</a></td>
<td width="11%" align="center">Harga</td>
<td width="10%" align="center">Keterangan</td>
<td width="10%" align="center">Gambar</td>
<td width="10%" align="center">Aksi</td>
</tr>
 
<?php
while ($isi=mysql_fetch_array($query2)) { ?>
<tr>
<td align="center"><?php echo $isi['menu'];?></td>
<td align="center"><?php echo $isi['sub_menu'];?></td>
<td> <?php echo $isi['nm_barang'];?></td>
<td align="center"><a href="utama.php?tag=stok&opsi=ubah&id=<?php echo $isi['kd_barang'];?>"><?php echo $isi['stok'];?></td>
<td align="center"><?php $hrg = number_format($isi['harga'], 0, ',', '.');echo $hrg;?></td>
<td align="center"><a href="../admin/utama.php?tag=ket&opsi=ubah&id=<?php echo $isi['kd_barang'];?>">
<img src="../lihat/ket.png" width="30" height="30" title="Lihat keterangan barang"/></a></td>
<td align="center"><a href="../admin/utama.php?tag=gbr&opsi=ubah&id=<?php echo $isi['kd_barang'];?>">
<img src="../lihat/gambar.png" width="30" height="30" title="Lihat gambar barang"/></a></td>
<td align="center"><a href="../admin/utama.php?tag=brg&opsi=ubah&id=<?php echo $isi['kd_barang'];?>">
<img src="../lihat/edit.png" width="30" height="30" title="Ubah data barang"/></a> 
<a href="../admin/mengelolaBarang.php?tag=hapus&id=<?php echo $isi['kd_barang'];?>&tbl=barang" onclick="return confirm('Yakin akan dihapus?');">
<img src="../lihat/delete.png" width="30" height="30" title="Hapus data barang"/></a></td>
</tr>
<?php } ?>
</table>

<table id="pagination" width="100%" align="center"><tr><td>Halaman :
<?php
//Show page links
for ($i = 1; $i <= $pages; $i++)
{?>
<a href="utama.php?tag=brg&opsi=lihat&cari=<?php echo $cari.'&sort='.$sort.'&page='.$i;?>"><?php echo $i;?></a>
<?php
}
?>
</td></tr></table>
</div>