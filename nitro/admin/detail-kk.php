<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:../index.php');
} else {
    include "../conn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail Data KK</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
     <meta name="description" content="Alpha.IT">
    <meta name="keywords" content="Sistem Informasi Kependudukan">
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />


        <!-- PANGGAH - DITAMBAH INI -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <!-- SAMPAI SINI -->



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">
table, th, td {
    
    border-collapse: collapse;
    
     

}
th, td {
    
}
th {
    
    text-align: right;
}

          </style>
      </head>
            <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">SISPEN</a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li >
                            <a href="notif_buat_ktp.php">
                                 <?php $tampil=$conn->query("SELECT id,nik,nama,tempat_lahir,tgl_lahir,jk,alamat,agama,pekerjaan,status, YEAR(curdate()) - YEAR(tgl_lahir) AS usia FROM data_penduduk where ket = 'hidup' and asal !='pergi' and YEAR(curdate()) - YEAR(tgl_lahir)='17' and MONTH(tgl_lahir) = MONTH(curdate()) and DAY(tgl_lahir) <= DAY(curdate())  " );
                                         $user=mysqli_num_rows($tampil);
                                           ?>
                              <i class="fa fa-bell-o"></i>
                              <span class="label label-warning"> <?php echo"$user "; ?></span>
                            </a>
                                                <li class="dropdown user user-menu">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                    <li>
                                        <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                        <!-- <a href="dataadmin.php">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                            Settings
                                        </a> -->
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../login.html"; // Set logout URL

$timeout = $timeout * 500; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div>
                                    <center><img src="<?php echo $_SESSION['gambar']; ?>" height="90" width="90" class="img-circle" alt="User Image" style="border: 2px solid white;" /></center>
                                </div>
                                <div class="info">
                                    <center><p><?php echo $_SESSION['fullname']; ?></p></center>

                                </div>
                            </div>
                            
                            <?php include "menu.php"; ?>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                  

                                </header>
                           <?php
                               $datakk=$conn->query("SELECT * from data_kk where no_kk='$_GET[kd]'");

                             $data=mysqli_fetch_array($datakk);
                               ?>
                                <div class="panel-body table-responsive">
                     <h1><b><center>Kartu Keluarga</center></b></h1>
                        <h3><center>No. <?php echo $data['no_kk']; ?></center></h3>

              <table  border="0" class="#" width="100%" align="right">
                  <thead>
                   <tr>
                       <th>Nama :<td> <?php echo $data['nama_kepalakeluarga']; ?></th>
                       <th>Desa/Kelurahan :<td> <?php echo $data['desakelurahan']; ?></th>

                   </tr>
                   <tr>
                       <th>Alamat :<td> <?php echo $data['alamat']; ?></th>
                       <th>Kecamatan :<td> <?php echo $data['kecamatan']; ?></th>
                   </tr>
                   <tr>
                       <th>Rt/Rw :<td> <?php echo $data['rtrw']; ?></th>
                        <th>Kabupaten/Kota :<td> <?php echo $data['kabupatenkota']; ?></th>
                   </tr>
                   <tr>
                       <th>Kode pos :<td> <?php echo $data['kodepos']; ?></th>
                       <th>Provinsi :<td> <?php echo $data['provinsi']; ?></th>
                   </tr>
                   </thead>
                    </table>   



 


           
                  
              

<!--tabel atas-->
<table border="1" width="100%">

                           <div class="panel-body table-responsive">
                                 <?php
                  
                    $query1="SELECT * from anggota_kk where no_kk='$_GET[kd]' " ; 
                 
                    $tampil=$conn->query($query1) or die(mysql_error());
                    ?>
                               
             
    <tr><td>
                 <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>

                        <th><center>No. </center></th>
                        <th><center>Nama Lengkap </center></th>
                        <th><center>NIK </center></th>
                        <th><center>Jenis Kelamin </center></th>
                        <th><center>Tempat Lahir </center></th>
                        <th><center>Tanggal Lahir </center></th>
                        <th><center>Agama </center></th>
                        <th><center>Pendidikan </center></th>                        
                        <th><center>Jenis Pekerjaan </center></th>
                        </tr>
                  </thead>

  <tbody>
                     <?php
                      $no=0;
                      while($data=mysqli_fetch_array($tampil))
                    { 
                      $no+=1;
                      ?>
                    <tr>
                    <td><center><?php echo $no ?></center> </td>
                    <td><?php echo $data['nama_lengkap']; ?></td>
                    <td><?php echo $data['nik']; ?></td>
                     <td><?php echo $data['jk'];?></td>
                    <td><?php echo $data['tempat_lahir'];?></td>
                    <td><?php echo $data['tgl_lahir'];?></td>
                    <td><?php echo $data['agama'];?></td>
                    <td><?php echo $data['pendidikan'];?></td>
                    <td><?php echo $data['jenis_pekerjaan'];?></td>
                   
                   </tr></div>
                 <?php
              }
              ?>
                   </tbody>
                   </table>
               
               <!--tabel atas sampai sini-->


<!--bawah atas-->
                            
                                 <?php
                  
                    $query1="SELECT * from anggota_kk where no_kk='$_GET[kd]'" ; 
                 
                    $tampil=$conn->query($query1) or die(mysql_error());
                    ?>
                               
               
                 <table id="example" class="table table-hover table-bordered" width="100%">
                  <thead>
                      <tr>

                         <th><center>No. </center></th>
                        <th><center>Status Perkawinan </center></th>
                        <th><center>Status Hubungan Dalam Keluarga </center></th>
                        <th><center>Kewarganegaraan</center></th>
                        <th><center>No paspor </center></th>
                        <th><center>no kitas</center></th>
                        <th><center>ayah </center></th>
                        <th><center>ibu </center></th> 
                        <th><center>Tool </center></th>              
                        </tr>
                  </thead>

                     <?php
                     $no=0;
                      while($data=mysqli_fetch_array($tampil))
                    { 
                      $no+=1;
                      ?>
                    <tr>
                    <td><center><?php echo $no ?></center> </td>
                    <td><?php echo $data['status_pernikahan']; ?></td>
                    <td><?php echo $data['status_hubungankeluarga']; ?></td>
                     <td><?php echo $data['kewarganegaraan'];?></td>
                    <td><?php echo $data['no_paspor'];?></td>
                    <td><?php echo $data['no_kitaskitap'];?></td>
                    <td><?php echo $data['ayah'];?></td>
                    <td><?php echo $data['ibu'];?></td>
                    <td><center><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit data anggota" href="edit-anggota-kk.php?hal=edit&kd=<?php echo $data['nik'];?>"><span class="glyphicon glyphicon-edit"></span></a>

                    <a class="btn btn-sm btn-danger" data-placement="bottom" data-toggle="tooltip" title="Hapus data" href="hapus-anggota-kk.php?kk=<?php echo $data['no_kk'];?>&kd=<?php echo $data['nik'];?>"><span class="glyphicon glyphicon-trash"></a>
                        

                    </center>
                    </td>
                   
                   </tr>
                 <?php
              }
              ?>
                   
                   </table>
            </table>  
                  
               <!--tabel bawah sampai sini-->
</td></tr>
          
     <div class="text-right" style="margin-top: 10px;">
       <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit KK" href="edit-kk.php?hal=edit&kd=<?php echo $_GET['kd']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit_KK</a>

                    <a class="btn btn-sm btn-danger" data-placement="bottom" data-toggle="tooltip" title="Hapus data" href="hapus-kk.php?kd=<?php echo $_GET['kd']; ?>"><span class="glyphicon glyphicon-trash"> Hapus_kk</a><br><br>
            
                
                 <a href="input-anggota-kk.php?hal=edit&kd=<?php echo $_GET['kd']; ?>" class="btn btn-sm btn-primary">Tambah Anggota KK <i class="fa fa-arrow-circle-down"></i></a>
                </div>


                            </div><!-- /.box-body -->
                            </div><!-- /.box -->
                   
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy <a href="http://www.facebook/ngihiy.com" target="_blank"> NewBie.IT</a> 2017
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="../js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="../js/plugins/chart.js" type="text/javascript"></script>

                <!-- PANGGAH -  TAMBAH INI -->

                <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" charset="utf-8"></script>

                

                <!-- SAMPAI SINI -->

                <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="../js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="../js/Director/dashboard.js" type="text/javascript"></script>

      
</body>
</html>
