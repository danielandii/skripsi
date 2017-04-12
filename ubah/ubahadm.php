<div align="center">
Ubah Data Admin
</div>
<div>
<?php 
$kode = $_GET['id'];
$tabel = mysql_query("select * from admin where id_admin='$kode'", $koneksi);
$isi = mysql_fetch_array($tabel); 
?>

<table width="100%" border="0" cellspacing="1">
<form id="form1" name="form1" method="post" action="MengelolaPegawai.php?tag=ubah&id=<?php echo $_GET['id'];?>">
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
    <td><input name="tbox2" type="text" id="tbox2" value="<?php echo $isi['nm_admin']?>" required="required"/></td>
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
    <td><input type="text" name="tbox4" id="tbox4" value="<?php echo $isi['telp']?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Email</td>
    <td>:</td>
    <td><input type="text" name="tbox5" id="tbox5" value="<?php echo $isi['email']?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Username</td>
    <td>:</td>
    <td><input type="text" name="tbox6" id="tbox6" value="<?php echo $isi['user_id']?>" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Password</td>
    <td>:</td>
    <td><input type="password" name="tbox7" id="tbox7" value="<?php echo $isi['pass_id']?>" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Level Id</td>
    <td>:</td>
    <td>
        <select name="cbox8" id="cbox8">
		<option <?php if ($isi['level_id']=="Operator") { echo "selected"; }?> >Pegawai</option>
        <option <?php if ($isi['level_id']=="Admin") { echo "selected"; }?> >Admin</option>
        </select> </td>
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