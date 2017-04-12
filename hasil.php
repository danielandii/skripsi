<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include "koneksi.php"; 
$mnu=$_GET['menu']; 
$smn=$_GET['smenu'];
$cari=$_GET['cari']; 
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
			<img src="<?php echo $logo['gambar'];	?>" 
            alt="logo" name="logo" id="logo" />        </div>	
  		<div id="slogan">
		  <h1><?php echo $logo['nama'];?></h1>
	  	</div>
	</div>
	<div id="menu">
		<ul>
			<li class="first">
				<span><a href="index.php" >Halaman Utama</a></span>			
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
				Halaman :<?php
				$cari = $_GET['cari'];
				if ($cari=="")
				$sql="SELECT * FROM barang where menu='$mnu' and sub_menu='$smn' order by nm_barang";
				else
				$sql="SELECT * FROM barang where menu like '%$cari%' || sub_menu like '%$cari%' || nm_barang like '%$cari%' order by nm_barang";
				
				$query_count=mysql_query($sql);
				$per_page =30;
				$count = mysql_num_rows($query_count);
				$pages = ceil($count/$per_page);
				
				if($_GET['page']=="")
				$page="1";
				else
				$page=$_GET['page'];
				
				$start = ($page - 1) * $per_page;
				$sql = $sql." LIMIT $start,$per_page";
				$query2=mysql_query($sql);
				for ($i = 1; $i <= $pages; $i++)
				{?>
				<a href="hasil.php?menu=<?php echo $mnu."&smenu=".$smn."&cari=".$cari."&page=".$i;?>"><?php echo $i;?></a>
				<?php } ?>
			</div>
            <div class="box">
				<table width="100%">
                <tr>
					<?php
					while ($isi=mysql_fetch_array($query2)) { ?>
        			<td width="6%">&nbsp;</td>
       			  <td width="56%"><a href="lihatket.php?id=<?php echo $isi['kd_barang'];?>"><?php echo $isi['nm_barang'];?></a></td>
       			  <td width="32%">Rp. <?php $hrg = number_format($isi['harga'], 0, ',', '.');echo $hrg;?></td>
       			  <td width="6%">&nbsp;</td>
      			</tr> <?php } ?>
                </table>
			</div>
            <div class="box">
				Halaman :<?php for ($i = 1; $i <= $pages; $i++)
				{?>
				<a href="hasil.php?menu=<?php echo $mnu."&smenu=".$smn."&cari=".$cari."&page=".$i;?>"><?php echo $i;?></a>
				<?php } ?>
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