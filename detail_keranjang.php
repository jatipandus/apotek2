<?php 
//$_SESSION['admin'] = 'jatipandus';

$host_name = "localhost"; 
$user_name = "root";
$password = "";
$database = "tas"; 

mysql_connect($host_name, $user_name, $password);
mysql_select_db($database);
session_start();
  if (!isset($_SESSION['username'])) {
    # code...
    header("Location: index.php");
  }

  else{
  	require_once("koneksi.php"); 
 ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Jual Tas Online</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
<body>
<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">
			<nav id="fh5co-main-menu" role="navigation">
			<ul>
				<li class="fh5co-active"><b>Selamat Datang <?php echo $_SESSION['username']; ?></b></li>
			</ul>
			</nav>
			<h1 id="fh5co-logo"><a href="profil.php"><img src="images/user.jpg" width="100" height="100" alt="Free HTML5 Bootstrap Website Template"></a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li><a href="halamancustomer.php">Home</a></li>
					<li><a href="daftartas.php">Daftar Obat</a></li>
					<li><a href="laporan_transaksi.php">Laporan</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<p>Ikuti Kami</p>
				<ul>
					<li><a href="http://www.facebook.com"><i class="icon-facebook"></i></a></li>
					<li><a href="http://www.twitter.com"><i class="icon-twitter"></i></a></li>
					<li><a href="http://www.instagram.com"><i class="icon-instagram"></i></a></li>
					<li><a href="http://www.linkedin.com"><i class="icon-linkedin"></i></a></li>
				</ul>
			</div>

		</aside>
	</div>
	<div id="fh5co-main"><br><br>
        <div class="title"><h2><center>Detail Keranjang Belanja</center></h2></div>
     			<table border="0" align="center" width="75%" cellspacing="0" cellpadding="3">
				<tr>
					<th><center>No.</center></th>
					<th><center>Nama Barang</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Harga Satuan</center></th>
					<th><center>Sub Total</center></th>
					<th><center>Action</center></th>
				</tr>
				
			    <?php
				//Detail keranjang belanja
				$total = 0;
				$no = 1;
				foreach($_SESSION['cart'] as $name => $value){
					if($value > 0){
							$get = mysql_query('SELECT * FROM data_tas WHERE id_tas='.mysql_real_escape_string((int)$name));
							while($get_row = mysql_fetch_array($get)){
								if($no % 2 == 0){
									$warna = "#EAEAEA";
								} else {
									$warna = "#F4F4F4";
								}
								$sub = $get_row['harga_tas'] * $value;
								echo '
								<tr">
									<td align="center">'.$no.'</td>
									<td align="center">'.$get_row['nama_tas'].'</td>
									<td align="center">'.$value.'</td>
									<td align="center">Rp. '.$get_row['harga_tas'].'</td>
									<td align="center">Rp. '.$sub.'</td>
									<td align="center">
										<a href="detail_keranjang.php?add='.$name.'"><button class="btn btn-primary btn-md" >Tambah</button></a> 
										<a href="detail_keranjang.php?remove='.$name.'"><button class="btn btn-primary btn-md" >Kurang</button></a> 
										<a href="detail_keranjang.php?delete='.$name.'" onclick="return confirm(\'Anda Yakin?\');"><button class="btn btn-primary btn-md">Batal</button></a><br>
									</td>
								</tr>							
								';
								$no++;$total += $sub;
							}
							
						}
					}
				if($total == 0){
					echo '<tr><td colspan="5" align="center">Keranjang belanja masih kosong!</td></tr></table>';
					echo '<p><div align="center">
						<a href="daftartas.php"><button class="btn btn-primary btn-md">Lanjutkan Belanja</button></a>
						</div></p>';
				} else {
					echo '
						<tr><td colspan="4" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.$total.'</b></td></td></td><td></td></tr></table>
						<p><div align="center">
						<a href="daftartas.php"><button class="btn btn-primary btn-md">Lanjutkan Belanja</button></a>
						<a href="selesai.php?total='.$total.'"><button class="btn btn-primary btn-md" >Lanjut ke Pembayaran</button></a>
						</div></p>
					';
				}
				?>
			
				<?php
				// Menambah jumlah produk yang akan dibeli
				if(isset($_GET['add'])){
					$qt = mysql_query('SELECT id_tas, stok_tas FROM data_tas WHERE id_tas='.mysql_real_escape_string((int)$_GET['add']));
					while($qt_row = mysql_fetch_array($qt)){
						if($qt_row['barang_jumlah'] != $_SESSION['cart'][$_GET['add']]){
							$_SESSION['cart'][$_GET['add']]+='1';
							header("Location: detail_keranjang.php");
						} else {
							echo '<script language="javascript">alert("Stok barang tidak mencukupi"); document.location="detail_keranjang.php";</script>';
						}
					}
				}
				
				// Menghapus jumlah produk yang akan dibeli
				if(isset($_GET['remove'])){
					$_SESSION['cart'][$_GET['remove']]--;
					header("Location: detail_keranjang.php");
				}
				
				// Menghapus semua produk yang akan dibeli
				if(isset($_GET['delete'])){
					$_SESSION['cart'][$_GET['delete']]='0';
					header("Location: detail_keranjang.php");
				}
				?>
			</table>

		<div class="clear"></div>

		

	</div>
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>