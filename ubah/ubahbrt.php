<script type="text/javascript">
// O2k7 skin
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "text",
		theme : "advanced",
		skin : "o2k7",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",
		
	});
</script>
<div align="center">
Ubah Data Berita
</div>
<div>
<?php 
$kode = $_GET['id'];
$tabel = mysql_query("select * from berita where id_berita='$kode'", $koneksi);
$isi = mysql_fetch_array($tabel);
?>

<table width="100%" border="0" cellspacing="1">
<form id="form1" name="form1" method="post" action="MengelolaBerita.php?tag=ubah&id=<?php echo $_GET['id'];?>">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="62%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Judul</td>
    <td>:</td>
    <td><input type="text" name="tbox2" id="tbox2" value="<?php echo $isi['judul']?>" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Isi</td>
    <td>:</td>
    <td><textarea name="text" cols="45" rows="10" id="text"><?php echo $isi['isi'];?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tanggal</td>
    <td>:</td>
    <td><input type="text" name="datepicker1" id="datepicker1" value="<?php $tanggal=date('d-m-Y'); echo $tanggal;?>" /></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" name="simpan" id="simpan" value="Simpan" /></td>
  </tr> </form>
</table>
</div>