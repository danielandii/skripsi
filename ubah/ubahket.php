<div align="center">
Ubah Keretangan Barang
</div>
<div>
<?php 
$kode = $_GET['id'];
$tabel = mysql_query("select * from barang where kd_barang='$kode'", $koneksi);
$isi = mysql_fetch_array($tabel); ?>
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
<form name="form1" method="post" action="mengelolaBarang.php?tag=ket&id=<?php echo $_GET['id'];?>&level=<?php echo $_SESSION['level'];?>">
<table width="100%" border="0" cellspacing="1">
  <tr>
    <td colspan="2" align="center"><?php echo $isi['nm_barang'];?></td>
  </tr>
  <tr>
    <td width="1%" align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td></td>
    <td width="99%" rowspan="2">Keterangan : </td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><textarea name="text" cols="45" rows="10" id="text"><?php echo $isi['keterangan'];?></textarea></td>
  </tr>
  <tr>
    <td width="1%" align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">
        <input type="submit" name="button" id="button" value="Simpan">    </td>
  </tr>
  
</table>
</form>
</div>