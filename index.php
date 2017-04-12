<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include "koneksi.php"; 
$gambar= mysql_query("select * from banner", $koneksi);
$logo=mysql_fetch_array($gambar); ?>
<head>
<title><?php echo $logo['nama'];?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery/jquery.dropotron-1.0.js"></script>
<script type="text/javascript" src="jquery/jquery.slidertron-1.1.js"></script>
<script type="text/javascript">
	$(function() {
		$('#menu > ul').dropotron({
			mode: 'fade',
			globalOffsetY: 11,
			offsetY: -15
		});
	});
</script>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div>
			<img src="<?php $gambar= mysql_query("select * from banner", $koneksi);
			$logo=mysql_fetch_array($gambar); echo $logo['gambar'];	?>" 
            alt="logo" name="logo" id="logo" />        </div>	
  		<div id="slogan">
		  <h1><?php echo $logo['nama'];?></h1>
	  	</div>
	</div>
	<div id="menu">
		<ul>
			<li class="first">
				<span class="opener"><a href="index.php" >Halaman Utama</a></span>			
            </li>
				<?php $qry1=mysql_query("select menu from barang group by menu",$koneksi);
				while ($menu=mysql_fetch_array($qry1)) { ?>
        	<li>
            	<span class="opener"><?php echo $menu['menu'];?><b></b></span>
        		<ul>
					<?php $mn = $menu['menu'];
					$qry = mysql_query("select sub_menu from barang where menu='$mn' group by sub_menu", $koneksi);
	          		while ($sub=mysql_fetch_array($qry)) { ?>
                	<li><a href="hasil.php?menu=<?php echo $menu['menu'];?>&smenu=<?php echo $sub['sub_menu'];?>" >
			 			<?php echo $sub['sub_menu'];?> </a>                    
                    </li><?php }  ?>
                </ul>
        	</li>	
			<?php } ?>   
		</ul>
	</div>
  <div id="page">
  		<div>
			<marquee direction="left" scrollamount="5" align="center" ><h5><?php echo $logo['banner']?></h5></marquee>
		</div>
        <div>&nbsp;</div>
		<div id="content">
  			<div class="box">
				<h2>Berita Terbaru</h2>
                <ul class="list">
				<?php $berita=mysql_query("select * from berita order by tgl desc",$koneksi);
        		while ($blog=mysql_fetch_array($berita)) {?>
        			<li><table width="100%"><tr align="center">
					<td><img src="<?php echo $blog['gambar'];?>" name="gbr" id="gbr" width="320" height="320"/><br />
						</td></tr>
						<tr><td>
						<?php echo $blog['judul'];?><br /><br />
						<?php echo $blog['isi'];?><br /><br />
						<?php echo date('d-m-Y', strtotime($blog['tgl']));?>
						</td></tr></table>
        			</li>
					<?php } ?>
                </ul>
			</div>
		</div>
		<div id="sidebar">
        	<div class="box">
            	<form id="form1" name="form1" method="post" action="search.php">
  					<input type="text" name="kata" id="kata" class="form-text"/>
 					<input type="submit" name="button" id="button" class="form-submit" value="Cari" />
				</form>
            </div>
			<div class="box">
				<h3>Toko</h3>
				<ul class="list">
				<?php $profil= mysql_query("select * from profil",$koneksi);
				while ($tampil=mysql_fetch_array($profil)) { ?>
                <li><?php echo $tampil['nm_profil'];?><br/>
					<?php echo $tampil['alamat'];?><br/>
					<?php echo "telp : ".$tampil['telp'];?><br/>
					<?php echo "fax : ".$tampil['fax'];?><br/>
					<?php echo "email : ".$tampil['email'];?></li>
    				<?php } ?>   
				</ul>
			</div>
		</div>
	</div>
    	<br class="clearfix" />
</div>
<div id="footer">
	<marquee direction="left" scrollamount="5" align="center"><?php echo $logo['banner']?></marquee>
</div>
</body>
</html>