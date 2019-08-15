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
        
    Website:        http://freehtml5.co/
    Email:          info@freehtml5.co
    Twitter:        http://twitter.com/fh5co
    Facebook:       https://www.facebook.com/fh5co

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
<?php
require_once("koneksi.php");
function produk(){
    $numPerCol = 3;
    $result = mysql_query("SELECT * FROM data_tas");
    $numCols = ceil(mysql_num_rows($result) / $numPerCol);
    for($col = 1; $col <= $numCols; $col++) {
    for($row = 0; $row < $numPerCol; $row++) {
            $resultRow = mysql_fetch_array($result);
            if($resultRow == false) {
               break;
            }?>
        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
            <center><?php echo "<img src='tas/".$resultRow['gambar']."' width='200' height='150' class='img-responsive'>" ?></center>
            <h3 class="fh5co-work-title"><a href="detail_produk.php?id_tas=<?php echo $resultRow['id_tas']; ?>"><center> <?php echo $resultRow['nama_tas']; ?></center> </a></h3>
            <h5 class="fh5co-work-title"><center>Rp. <?php echo $resultRow['harga_tas']; ?></center></h5>
            <center><button class="btn btn-primary btn-md" onClick="window.location='halamancustomer.php?add=<?php echo $resultRow['id_tas']; ?>'">Beli</button></center>
        </div>
            <?php    
         }
     }
} 

function produkk(){
    $numPerCol = 3;
    $result = mysql_query("SELECT * FROM data_tas order by id_tas desc limit 3");
    $numCols = ceil(mysql_num_rows($result) / $numPerCol);
    for($col = 1; $col <= $numCols; $col++) {
    for($row = 0; $row < $numPerCol; $row++) {
            $resultRow = mysql_fetch_array($result);
            if($resultRow == false) {
               break;
            }?>
        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
            <center><?php echo "<img src='tas/".$resultRow['gambar']."' width='200' height='150' class='img-responsive'>" ?></center>
            <h3 class="fh5co-work-title"><a href="detail_produk.php?id_tas=<?php echo $resultRow['id_tas']; ?>"><center> <?php echo $resultRow['nama_tas']; ?></center></a> </h3>
            <h5 class="fh5co-work-title"><center>Rp. <?php echo $resultRow['harga_tas']; ?></center></h5>
            <center><button class="btn btn-primary btn-md" onClick="window.location='halamancustomer.php?add=<?php echo $resultRow['id_tas']; ?>'">Beli</button></center>
        </div>
            <?php    
         }
     }
}
?>
                    
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