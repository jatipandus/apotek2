<?php 
//$_SESSION['admin'] = 'jatipandus';

$host_name = "localhost"; 
$user_name = "root";
$password = "";
$database = "tas"; 

mysql_connect($host_name, $user_name, $password);
mysql_select_db($database);
session_start();
  if (!isset($_SESSION["username"])) {
    # code...
    header("Location: index.php");
  }

  else{
  	require_once("koneksi.php");
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
	<div id="fh5co-main" class="animate-box" data-animate-effect="fadeInLeft">
        <div class="title" class="animate-box" data-animate-effect="fadeInLeft"><h2><center><br>Pembayaran</center></h2></div>
     			
        <center>
<?php
		
function kd_transaksi() {
	$sql = "SELECT transaksi_id FROM transaksi ORDER BY transaksi_id DESC LIMIT 0,1";
	$query = mysql_query($sql);
	list ($id_temp) = mysql_fetch_row($query);

	if ($id_temp == '') {
		$id_trans = 'T00001';
		
		} else {
		$jum = substr($id_temp,1,6);
		$jum++;
		if($jum <= 9) {
			$id_trans = 'T0000' . $jum;
		} elseif ($jum <= 99) {
			$id_trans = 'T000' . $jum;
		} elseif ($jum <= 999) {
			$id_trans = 'T00' . $jum;
		} elseif ($jum <= 9999) {
			$id_trans = 'T0' . $jum;
		} elseif ($jum <= 99999) {
			$id_trans = 'T' . $jum; 	
		} else {
			die("Kode transaksi melebih batas");			
		}
	}
		return $id_trans;
}

function acakangkahuruf($panjang)
{
	$karakter='0123456789';
	$string = '';
	# code...
	for ($i=0; $i < $panjang; $i++) { 
		# code...
		$pos = rand(0, strlen($karakter)-1);
		$string .=$karakter{$pos}; 
	}
	return $string;
}

	if(isset($_POST['finish'])) {
		$transaksi_id = kd_transaksi();
		//session_destroy();
	
		$sql_transaksi = "INSERT INTO transaksi (transaksi_id,transaksi_nama,transaksi_alamat,transaksi_total,transaksi_hp) 
		VALUES ('$transaksi_id','$_POST[nama]','$_POST[alamat]','$_POST[total]','$_POST[no_hp]')";
		mysql_query($sql_transaksi) or die(mysql_error());
		
		foreach($_SESSION['cart'] as $name => $value){
			$sql_transaksi_detail = "INSERT INTO pesanan (transaksi_id,barang_id,transaksi_jumlah) VALUES ('$transaksi_id','$name','$value')";
			$query = mysql_query($sql_transaksi_detail) or die(mysql_error());
			}
		$sql = "SELECT * FROM transaksi,pesanan WHERE transaksi.transaksi_id = '$transaksi_id' AND pesanan.transaksi_id = '$transaksi_id'";
		$query = mysql_query($sql);
		$data = mysql_fetch_array($query);
		echo "<p>Terimakasih telah berbelanja di toko online kami, <b>" . $data['transaksi_nama'] . "</b>";
			if (isset($data)) {
				$sql_detail = "SELECT * FROM data_tas,transaksi,pesanan WHERE pesanan.barang_id = data_tas.id_tas AND transaksi.transaksi_id = '" . $data['transaksi_id'] . "' AND pesanan.transaksi_id = '" . $data['transaksi_id'] . "' AND transaksi.transaksi_id = pesanan.transaksi_id";
				$query_detail = mysql_query($sql_detail);
				echo "<p>Rincian Tas yang anda beli : ";
				$i = 1;
				while($data_detail = mysql_fetch_array($query_detail) or mysql_error()) {
					echo "<p>$i. </td><td>$data_detail[nama_tas], </td><td>Harga satuan : $data_detail[harga_tas], </td><td>Jumlah : $data_detail[transaksi_jumlah]</td></tr>".mysql_error();
					$i++;
				}
				$ongkir = 21000;
				$totalbayar = $ongkir+$data['transaksi_total'];
				echo "<p> Total Belanja <b>Rp. " . $data['transaksi_total']. "</b> Ongkos Kirim <b>Rp. " . $ongkir. "</b>";
				echo "<p>Total biaya yang harus anda bayar <b>Rp. " . $totalbayar . "</b>";
				echo "<p>Pembayaran dapat dilakukan melalui transfer bank ke nomor rekening <br>BRI : <b>"; echo(acakangkahuruf(16)); echo " </b> Atas Nama : <b>Jati Pandu Saputra </b><br>Dalam 24 Jam Ke Depan";
				echo "Barang akan dikirim ke alamat : <b>" . $data['transaksi_alamat'] . "</b> setelah konfirmasi transfer kami terima";
			}
		} else {
?>
</center>
<div id="fh5co-main">
	<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
<form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-10">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										
										<input type="hidden" name="total" class="form-control" value="<?php echo abs((int)$_GET['total']); ?>">
									</div>
									<div class="form-group">
										<input type="text" name="nama" size="52" placeholder="Nama Lengkap" class="form-control"  required>
									</div>
									<div class="form-group">
										<textarea name="alamat" cols="30" rows="7" class="form-control" placeholder="Alamat Lengkap" required></textarea>
									</div>
									<div class="form-group">
										<input type="text" name="no_hp" size="52" placeholder="Nomor HP" class="form-control" required>
									</div>
									<div class="form-group">
										<center>
											<input type="submit" name="finish" class="btn btn-primary btn-md" value="Finish">
											<input type="reset" class="btn btn-primary btn-md" value="Reset">
											<a href="daftartas.php" class="btn btn-primary btn-md">Batal</a>
										</center>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
</div>
<?php } ?>
            
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