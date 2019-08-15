<?php 
//$_SESSION['admin'] = 'jatipandus';

$host_name = "localhost"; 
$user_name = "root";
$password = "";
$database = "apotek"; 

mysql_connect($host_name, $user_name, $password);
mysql_select_db($database);
session_start();
  if (!isset($_SESSION["username"])) {
    # code...
    header("Location: index.php");
  }

  else{
  	//require_once 'produk.php';
  	require_once("cart.php"); 

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
					<li><a href="profil.php">Profil</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			
			<div class="fh5co-footer">
				<?php cart(); ?>
				</p>

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
$sql = mysql_query("select * from data_obat") or die (mysql_error());
$sqll = mysql_query("select * from data_obat order by id_obat desc") or die (mysql_error());
 ?>
		<div id="fh5co-main">

			<div class="fh5co-narrow-content">
				<h3 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Daftar Produk Kami</h3>

					<div style="margin-bottom:15px;" align="right">
  <form action="" method="post" class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">
    <script src="jquery.js"></script>
  <script src="bootstrap3-typeahead.min.js"></script>
              <input type="text" class="typeahead form-control" required="required" name="input_cari" placeholder="Cari Obat.." autocomplete="off">
              <input type="submit" name="cari" value="Cari" class="btn btn-primary btn-md"  style="padding:3px;" margin="6px;" width="50px;"  />
         <script>
$('input.typeahead').typeahead({
  source:  function (query, process) {
  return $.get('data_obat.php', { query: query }, function (data) {
      console.log(data);
      data = $.parseJSON(data);
      return process(data);
    });
  }
});
</script>

  </form>
 </div>
		<div class="row animate-box" data-animate-effect="fadeInLeft">

<?php 

   $input_cari = @$_POST['input_cari']; 
   $cari = @$_POST['cari'];

   // jika tombol cari di klik
    if($cari) {

    // jika kotak pencarian tidak sama dengan kosong
    if($input_cari != "") {
    
    $sql = mysql_query("select * from data_obat where nama_obat  like '%$input_cari%'") or die (mysql_error());   
    } 

    else {
    $sql = mysql_query("select * from data_obat") or die (mysql_error());
    }
    }

     else {
    $sql = mysql_query("select * from data_obat") or die (mysql_error());
    }

   // mengecek data
   $cek = mysql_num_rows($sql);
   // jika data kurang dari 1
   if($cek < 1) {
    ?>
     <tr> <!--muncul peringata bahwa data tidak di temukan-->
      <td colspan="7" align="center" style=" padding:10px";> Data Tidak Ditemukan</td>
     </tr>
    <?php
   } else {

   // mengulangi data agar tidak hanya 1 yang tampil
   while($data = mysql_fetch_array($sql)) {

   ?>
				<div class="col-md-4">
					<center><?php echo "<img src='gambar/".$data['gambar']."' width='200' height='150' class='img-responsive'>" ?></center>
		            <h3 class="fh5co-work-title"><center> <?php echo $data['nama_obat']; ?></center> </h3>
		            <h5 class="fh5co-work-title"><center><?php echo $data['keterangan_obat']; ?></center></h5>
		            <h5 class="fh5co-work-title"><center>Stok : <?php echo $data['stok_obat']; ?></center></h5>
		            <center><button class="btn btn-primary btn-md" onClick="window.location='daftarobat.php?add=<?php echo $data['id_obat']; ?>'">Beli</button></center>
		        </div>
					  <?php 

  } 
 }
?>

				</div>
			</div>
		</div>

	<!-- jQuery -->
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
