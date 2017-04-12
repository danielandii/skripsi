<div align="center">
Ubah Password
</div>
<div>
<table width="100%" border="0" cellspacing="1">
<form id="form1" name="form1" method="post" action="MengelolaPegawai.php?tag=pass&id=<?php echo $_GET['id'];?>">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Password lama</td>
    <td>:</td>
    <td><input type="password" name="tbox1" id="tbox1" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Password baru</td>
    <td>:</td>
    <td><input type="password" name="tbox2" id="tbox2" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Ulang password</td>
    <td>:</td>
    <td><input type="password" name="tbox3" id="tbox3" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php 
	if ($_GET['stat']=="t")
		echo "password berhasil diubah";
	elseif ($_GET['stat']=="f")
		echo "password gagal diubah, cek kembali penulisan password";
	?>&nbsp;</td>
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