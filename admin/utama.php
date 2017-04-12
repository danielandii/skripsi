<?php 	session_start();
		include "../koneksi.php";
	  	include "../session.php"; 
		$gambar= mysql_query("select * from banner", $koneksi);
		$logo=mysql_fetch_array($gambar); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $logo['nama'];?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<script type="text/javascript" src="../jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../jquery/jquery.dropotron-1.0.js"></script>
<script type="text/javascript" src="../jquery/jquery.slidertron-1.1.js"></script>
<script type="text/javascript">
	$(function() {
		$('#menu > ul').dropotron({
			mode: 'fade',
			globalOffsetY: 11,
			offsetY: -15
		});
	});
</script>
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/tiny_mce.js"></script>
<script type="text/javascript">
function ubahChekbox(nilai){		
		$.ajax({
			url:'../insert/proses.php',
			data:'kode='+nilai,
			cache:false,
			success:function(msg){
				$('#tbox6').val(msg);
			}
		});
	}
function ubah21(nilai){
	if (nilai!=""){
			$('#radio21').prop('checked','checked');
			$('#radio22').prop('checked',false);
	}	
}
function ubah22(nilai){
	if (nilai!=""){
			$('#radio22').prop('checked','checked');
			$('#radio21').prop('checked',false);
	}	
}
function ubah31(nilai){
	if (nilai!=""){
			$('#radio31').prop('checked','checked');
			$('#radio32').prop('checked',false);
	}	
}
function ubah32(nilai){
	if (nilai!=""){
			$('#radio32').prop('checked','checked');
			$('#radio31').prop('checked',false);
	}	
}
function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			alert('Masukkan angka saja');
			return false;
		}

         return true;
      } 
</script>
<link href="../css/jquery-ui-1.10.3.custom.css" type="text/css" rel="stylesheet" media="screen" />
<script src="../jquery/jquery-1.9.1.js" type="text/javascript"></script>
<script src="../jquery/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#datepicker1').datepicker({
			dateFormat:'dd-mm-yy',
			dayNames: [ "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu" ],
			dayNamesMin: [ "M", "S", "S", "R", "K", "J", "S" ],
			monthNames: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
			monthNamesShort: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
			yearRange: "1985:2050",
			changeMonth:true,
			changeYear:true,
			autoSize:true,
			showAnim:'slideDown'
		});	
		$('#datepicker2').datepicker({
			dateFormat:'dd-mm-yy',
			dayNames: [ "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu" ],
			dayNamesMin: [ "M", "S", "S", "R", "K", "J", "S" ],
			monthNames: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
			monthNamesShort: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
			yearRange: "1985:2050",
			changeMonth:true,
			changeYear:true,
			autoSize:true,
			showAnim:'slideDown'
		});	
})
</script>

</head>
<body>
<div id="wrapper">
	<div id="header">
		<div>
			<img src="../<?php echo $logo['gambar'];	?>" 
            alt="logo" name="logo" id="logo" />        </div>	
  		<div id="slogan">
		  <h1><?php echo $logo['nama'];?></h1>
	  	</div>
	</div>
	<div id="menu">
		<ul>
			<li class="first">
				<span><a href="utama.php?tag=brg&opsi=lihat" > Barang </a></span>			
            </li>
            <li>
            	<span><a href="utama.php?tag=lap&opsi=lihat&td=<?php $tanggal=date('d-m-Y'); echo $tanggal;?>&ts=<?php echo $tanggal;?>&ad=all&tr=all" > Laporan </a></span>
            </li>
            <li>
            	<span><a href="utama.php?tag=brt&opsi=lihat" > Berita </a></span>
            </li>
            <li>
            	<span><a href="utama.php?tag=pro&opsi=lihat" > Toko </a></span>
            </li>
            <li>
            	<span><a href="utama.php?tag=adm&opsi=lihat" > Pegawai </a></span>
            </li>
            <li>
            	<span><a href="utama.php?tag=bnr&opsi=lihat" > Pengaturan </a></span>
            </li>
            <li class="last">
            	<span><a href="logout.php" > Keluar </a></span>
            </li>
		</ul>
	</div>
  <div id="page" align="center">
		<?php if ($_GET['opsi']=="lihat") {
	  include "../lihat/lihat".$_GET['tag'].".php"; }
	  elseif ($_GET['opsi']=="tambah") {
	  include "../tambah/tambah".$_GET['tag'].".php"; }
	  elseif ($_GET['opsi']=="ubah") {
	  include "../ubah/ubah".$_GET['tag'].".php"; }
	  ?>
	</div>
    	<br class="clearfix" />
</div>
<div id="footer">
	<marquee direction="left" scrollamount="5" align="center"><?php echo $logo['banner']?></marquee>
</div>
</body>
<script type="text/javascript">
<?php $nb = $_GET['nb'];
if ($nb=="hapus") {
echo "alert('Data berhasil dihapus');";
}
elseif ($nb=="ubah") {
echo "alert('Data berhasil diubah');";
}
elseif ($nb=="tambah") {
echo "alert('Data berhasil ditambah');";
}
elseif ($nb=="gbr") {
echo "alert('Gambar berhasil diubah');";
}
elseif ($nb=="stok") {
echo "alert('Stok berhasil ditambah');";
}
elseif ($nb=="pass") {
echo "alert('Password berhasil diubah');";
}
elseif ($nb=="ket") {
echo "alert('Detail barang berhasil diubah');";
}
?>
</script>
</html>