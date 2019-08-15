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
    <title>Edit Data kk</title>
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



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">

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
                                       <!--  <a href="dataadmin.php">
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
                            <!-- search form -->
                            <!--<form action="#" method="get" class="sidebar-form">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form> -->
                            <!-- /.search form -->
                            <!-- sidebar menu: : style can be found in sidebar.less -->
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
                                    <b>Edit Data Kartu keluarga</b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->
                    <?php
                    $query = $conn->query("SELECT * FROM data_kk WHERE no_kk='$_GET[kd]'");
                    $data  = mysqli_fetch_array($query);
                    $nik= $data['nik'];

                   
                    ?>
                                <!-- </div> -->
                                <div class="panel-body">
                      <form class="form-horizontal style-form" style="margin-top: 20px;" action="update-kk.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          

                                </header>
                                <div class="box-header"> 
                                     <center><h3 class="box-title">Data Kepala Keluarga</h3> </center>

                                 </div> 
                               <div class="panel-body">
                      <form class="form-horizontal style-form" style="margin-top: 20px;" action="update-kk.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No KK</label>
                              <div class="col-sm-8">
                                  <input name="no_kk" type="text" id="no_kk" class="form-control" value="<?php echo $data['no_kk']; ?>" readonly />
                                 
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
                              <div class="col-sm-8">
                                  <input name="nama_lengkap" type="text" id="nama_lengkap" class="form-control"  value="<?php echo $data['nama_kepalakeluarga']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-8">
                                  <input name="alamat" type="text" id="alamat" class="form-control"  value="<?php echo $data['alamat']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Desa/kelurahan</label>
                              <div class="col-sm-6">
                                  <input name="desakelurahan" type="text" id="desakelurahan" class="form-control"  value="<?php echo $data['desakelurahan']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">rt/rw</label>
                              <div class="col-sm-6">
                                  <input name="rtrw" type="text" id="rtrw" class="form-control"  value="<?php echo $data['rtrw']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kecamatan</label>
                              <div class="col-sm-6">
                                  <input name="kecamatan" type="text" id="kecamatan" class="form-control"  value="<?php echo $data['kecamatan']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kabupaten/kota</label>
                              <div class="col-sm-6">
                                  <input name="kabupatenkota" type="text" id="kabupatenkota" class="form-control"  value="<?php echo $data['kabupatenkota']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode pos</label>
                              <div class="col-sm-6">
                                  <input name="kodepos" type="text" id="kodepos" class="form-control"  value="<?php echo $data['kodepos']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Provinsi</label>
                              <div class="col-sm-6">
                                  <input name="provinsi" type="text" id="provinsi" class="form-control"  value="<?php echo $data['provinsi']; ?>" required />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NIK</label>
                              <div class="col-sm-8">
                                  <input name="nik" type="text" id="nik" class="form-control" value="<?php echo $data['nik']; ?>" required />
                                  
                              </div>
                          </div>
                          <?php  $sql = $conn->query("SELECT * FROM anggota_kk WHERE nik='$nik'");
                                $dataa = mysqli_fetch_array($sql); 
                    ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis kelamin</label>
                              <div class="col-sm-4">
                                  <select class="form-control" value="<?php echo $daata['jk']; ?>" name="jk" id="jk" readonly>
                                  <option><?php echo $dataa['jk']?></option>
                                 
                                  
                                  </select>
                              </div>
                            </div>
                            </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tempat lahir</label>
                              <div class="col-sm-8">
                                  <input name="tempat_lahir" class="form-control" id="tempat_lahir" type="text" value="<?php echo $dataa['tempat_lahir']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal lahir</label>
                              <div class="col-sm-8">
                                  <input name="tgl_lahir" class="form-control" id="tgl_lahir" type="date" value="<?php echo $dataa['tgl_lahir']; ?>" required />
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Agama</label>
                              <div class="col-sm-4">
                                  <select class="form-control" value"<?php echo $dataa['agama']?>" name="agama" id="agama">
                                  <option><?php echo $dataa['agama']?></option>
                                  <option value="islam"> Islam</option>
                                  <option value="protestan"> Protestan</option>
                                  <option value="katolik"> Katolik</option>
                                  <option value="hindu"> Hindu</option>
                                  <option value="budha"> Budha</option>
                                  <option value="konghuchu"> Konghuchu</option>
                                  <option value="lain"> Lain-Lainnya</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pendidikan</label>
                              <div class="col-sm-8">
                                  <input name="pendidikan" class="form-control" id="pendidikan" type="text" value="<?php echo $dataa['pendidikan']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis pekerjaan</label>
                              <div class="col-sm-8">
                                  <input name="jenis_pekerjaan" class="form-control" id="jenis_pekerjaan" type="text" value="<?php echo $dataa['jenis_pekerjaan']; ?>" required />
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="status_pernikahan" value="<?php echo $dataa['status_pernikahan']; ?>" id="status_pernikahan">
                                  <option> <?php echo $dataa['status_pernikahan']; ?></option>
                                  <option value="kawin"> Kawin</option>
                                  <option value="belum_kawin"> Belum Kawin</option>
                                  <option value="duda"> Duda</option>
                                  <option value="janda"> Janda</option>
                                  </select>
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status hubungan dalam keluarga</label>
                              <div class="col-sm-8">
                                  <input name="status_hubungankeluarga" class="form-control" id="status_hubungankeluarga" type="text" value="<?php echo $dataa['status_hubungankeluarga']; ?>" readonly />
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kewarganegaraan</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="kewarganegaraan" value="<?php echo $dataa['kewarganegaraan']; ?>" id="kewarganegaraan">
                                  <option> <?php echo $dataa['kewarganegaraan']; ?></option>
                                  <option value="wni"> WNI</option>
                                  <option value="wna"> WNA</option>
                                  </select>
                              </div>
                          </div>
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No paspor</label>
                              <div class="col-sm-8">
                                  <input name="no_paspor" class="form-control" id="no_paspor" type="text" value="<?php echo $dataa['no_paspor']; ?>" required />
                              </div>
                          </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Kitas/Kitap</label>
                              <div class="col-sm-8">
                                  <input name="no_kitaskitap" class="form-control" id="no_kitaskitap" type="text" value="<?php echo $dataa['no_kitaskitap']; ?>" required />
                              </div>
                          </div>
                          <div class="box-header"> 
                                     <center><h3 class="box-title">Nama orang tua</h3><br/> </center>

                                 </div> 
                                 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Ayah</label>
                              <div class="col-sm-8">
                                  <input name="ayah" class="form-control" id="ayah" type="text" value="<?php echo $dataa['ayah']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Ibu</label>
                              <div class="col-sm-8">
                                  <input name="ibu" class="form-control" id="bu" type="text" value="<?php echo $dataa['ibu']; ?>" required />
                              </div>
                          </div> 
                       
                       
                         

                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="datakk.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                          <div style="margin-top: 20px;"></div>
                      </form>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy <a href="http://www.facebook/ngihiy.com" target="_blank">Newbie.IT</a> 2017
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

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
</body>
</html>
