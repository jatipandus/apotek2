<?php 
//$_SESSION['admin'] = 'jatipandus';
include 'koneksi.php';
session_start();
  if (!isset($_SESSION["username"])) {
    # code...
    header("Location: index.php");
  }

  else{
 ?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Apotek Online</title>
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
				<li class="fh5co-active"><b>Selamat Datang Di</b></li>
				<li class="fh5co-active"><b>Apotek Online</b></li>
			</ul>
			</nav>
			<h1 id="fh5co-logo"><a href="profil.php"><img src="images/user.jpg" width="100" height="100" alt="Free HTML5 Bootstrap Website Template"></a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li class="fh5co-active"><a href="halamancustomer.php">Home</a></li>
					<li><a href="daftarobat.php">Daftar Obat</a></li>
					<li><a href="pesanan.php">Pesananmu</a></li>
					<li><a href="profil.php">Profil</a></li>
					<li><a href="about.php">About</a></li>
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
<?php 
$query = $conn->query("SELECT * FROM data_obat WHERE id_obat='$_GET[kd]'");
$data  = mysqli_fetch_array($query);
 ?>
 <center>
		<div id="fh5co-main">
			<div class="fh5co-narrow-content">
				<div class="row animate-box" data-animate-effect="fadeInLeft"> 	
					<div>
						<center>
							<?php echo "<img src='gambar/".$data['gambar']."' width='300' height='300' class='img-responsive'>" ?></center>
							<h3 class="fh5co-work-title"><center><?php echo $data['nama_obat']; ?></center></h3>
							<h3 class="fh5co-work-title"><center>Rp. <?php echo $data['harga_obat']; ?></center></h3>
							<h5 class="fh5co-work-title"><center><?php echo $data['keterangan_obat']; ?></center></h5>
					</div>
					<div>
						<form action="insert-pesanan.php" method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama Lengkap">
									</div>
									<div class="form-group">
										<textarea name="alamat_customer" id="alamat_customer" cols="30" rows="7" class="form-control" placeholder="Alamat Lengkap"></textarea>
									</div>
									<div class="form-group">
										<input type="number" class="form-control" name="jumlah_obat" id="jumlah_obat" placeholder="Jumlah Obat *Harus Angka">
									</div>
									
									<div class="form-group">
										<center>
											<input type="submit" class="btn btn-primary btn-md" value="Save">
											<input type="reset" class="btn btn-primary btn-md" value="Reset">
											<a href="halamancustomer.php" class="btn btn-primary btn-md">Batal</a>
										</center>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
					</div>
				</div>
			</div>
		</center>
	<!-- jQuery 

<h5 class="fh5co-work-title"><center><a href="form-pesanan.php?hal=edit&kd=<?php echo $data['id_obat'];?>">Save</a>&nbsp;&nbsp;&nbsp;<a href="halamancustomer.php">Batal</a></center></h5>

	-->
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