<?php 	session_start();
		include "../koneksi.php";
	  	include "../session2.php"; 
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
	
  <div id="page">
  		<div id="content-box2">
        <div class="box">
            	<?php if($_GET['no']==1)
				echo "User dan Password tidak cocok";
				elseif($_GET['no']==2)
				echo "Silahkan Login terlebih dahulu"; ?>
            </div>
			<form id="form1" name="form1" method="post" action="ceklog.php">
            <div class="box">
        		User ID &nbsp;&nbsp;&nbsp;: 	
        		<input type="text" name="userid" id="userid" required="required"/>
        	</div>
            <div class="box">
        		Password : <input type="password" name="password" id="password" required="required"/>
        	</div>
            <div class="box" align="center">
        		<input type="submit" name="login" class="button" id="login" value="Log In" />
        	</div>
            </form>
        </div>
	</div>
    	<br class="clearfix" />
</div>
<div id="footer">
	<marquee direction="left" scrollamount="5" align="center"><?php echo $logo['banner']?></marquee>
</div>
</body>
</html>