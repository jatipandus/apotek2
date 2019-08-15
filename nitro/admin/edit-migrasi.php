<?php
session_start();
if (empty($_SESSION['username'])){
  header('location:../index.php');
} else {
  include "../conn.php";

$tampil=$conn->query("SELECT * from data_migrasi where nik='$_GET[kd]' ");
$data=mysqli_fetch_array($tampil); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Input Data Migrasi</title>
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
                        <li >
                            <a href="notif_buat_ktp.php">
                                 <?php $tampil=$conn->query("SELECT id,nik,nama,tempat_lahir,tgl_lahir,jk,alamat,agama,pekerjaan,status, YEAR(curdate()) - YEAR(tgl_lahir) AS usia FROM data_penduduk where ket = 'hidup' and asal !='pergi' and YEAR(curdate()) - YEAR(tgl_lahir)='17' and MONTH(tgl_lahir) = MONTH(curdate()) and DAY(tgl_lahir) <= DAY(curdate())  " );
                                         $user=mysqli_num_rows($tampil);
                                           ?>
                              <i class="fa fa-bell-o"></i>
                              <span class="label label-warning"> <?php echo"$user "; ?></span>
                            </a>
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
                                    <b>Input Data Migrasi</b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body">
                      <form class="form-horizontal style-form" style="margin-top: 20px;" action="update-migrasi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID</label>
                              <div class="col-sm-8">
                                  <input name="id_migrasi" type="text" id="id_migrasi" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" />
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NIK</label>
                              <div class="col-sm-8">
                                  <input name="nik" type="text" id="nik" class="form-control" value="<?php echo $data['nik']; ?>" readonly/>
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-8">
                                  <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $data['nama']; ?>"required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
                              <div class="col-sm-8">
                                  <input name="tempat_lahir" type="text" id="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                              <div class="col-sm-8">
                                  <input name="tanggal_lahir" type="date" id="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" class="form-control" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="jk" id="jk" value="<?php echo $data['jk']; ?>">>
                                  <option ><?php echo $data['jk']; ?></option>
                                  <option value="laki-laki"> Laki - Laki</option>
                                  <option value="perempuan"> Perempuan</option>
                                  </select>
                              </div>
                          </div>
                        
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Agama</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="agama" id="agama" value="<?php echo $data['agama']; ?>">
                                  <option> <?php echo $data['agama']; ?></option>
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

                          <!-- <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Agama</label>
                              <div class="col-sm-8">
                                  <input name="agama" class="form-control" id="agama" type="text" placeholder="Agama" required />
                              </div>
                          </div> -->

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pekerjaan</label>
                              <div class="col-sm-8">
                                  <input name="pekerjaan" class="form-control" id="pekerjaan" type="text" placeholder="Pekerjaan" value="<?php echo $data['pekerjaan']; ?>" required />
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kewarganegaraan</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="kewarganegaraan" id="kewarganegaraan" value="<?php echo $data['kewarganegaraan']; ?>">
                                  <option> <?php echo $data['kewarganegaraan']; ?></option>
                                  <option value="wni"> WNI</option>
                                  <option value="wna"> WNA</option>
                                  </select>
                              </div>
                          </div>

                          <!-- <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kewarganegaraan</label>
                              <div class="col-sm-8">
                                  <input name="kewarganegaraan" class="form-control" id="kewarganegaraan" type="text" placeholder="Kewarganegaraan" required />
                              </div>
                          </div> -->


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="status" id="status" value="<?php echo $data['status']; ?>">
                                  <option> <?php echo $data['status']; ?></option>
                                  <option value="kawin"> Kawin</option>
                                  <option value="belum_kawin"> Belum Kawin</option>
                                  </select>
                              </div>
                          </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">tanggal masuk</label>
                              <div class="col-sm-8">
                                  <input name="tgl_masuk" class="form-control" id="tgl_masuk" type="date"  value="<?php echo $data['tgl_masuk']; ?>" required />
                              </div>
                          </div>
                       
                       


                           <h3><b><center>Alamat Asal</center></b></h3>


                              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">RT/RW</label>
                              <div class="col-sm-7">
                                  <input name="rtrw_asal" class="form-control" id="rtrw_asal" type="text" value="<?php echo $data['rtrw_asal']; ?>" required />
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Desa/Kel</label>
                              <div class="col-sm-7">
                                  <input name="desa_asal" class="form-control" id="desa_asal" type="text" value="<?php echo $data['desa_asal']; ?>" required />
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Kecamatan</label>
                              <div class="col-sm-7">
                                  <input name="kecamatan_asal" class="form-control" id="kecamatan_asal" type="text" value="<?php echo $data['kecamatan_asal']; ?>" required />
                              </div>
                              </div>
                                <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Kabupaten</label>
                              <div class="col-sm-7">
                                  <input name="kabupaten_asal" class="form-control" id="kabupaten_asal" type="text" value="<?php echo $data['kabupaten_asal']; ?>"required />
                              </div>
                              </div>
                              <h3><b><center>Alamat Domisili</center></b></h3>


                              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">RT/RW</label>
                              <div class="col-sm-7">
                                  <input name="rtrw_domisili" class="form-control" id="rtrw_domisili" type="text" value="<?php echo $data['rtrw_domisili']; ?>"required />
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Desa/Kel</label>
                              <div class="col-sm-7">
                                  <input name="desa_domisili" class="form-control" id="desa_domisili" type="text" value="<?php echo $data['desa_domisili']; ?>" required />
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Kecamatan</label>
                              <div class="col-sm-7">
                                  <input name="kecamatan_domisili" class="form-control" id="kecamatan_domisili" type="text" value="<?php echo $data['kecamatan_domisili']; ?>" required />
                              </div>
                              </div>
                                <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Kabupaten</label>
                              <div class="col-sm-7">
                                  <input name="kabupaten_domisili" class="form-control" id="kabupaten_domisili" type="text" value="<?php echo $data['kabupaten_domisili']; ?>"required />
                              </div>
                              </div>




                          


                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="input-penduduk.php" class="btn btn-sm btn-danger">Batal </a>
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
                    Copyright &copy <a href="http://www.facebook/ngihiy.com" target="_blank">NewBie.IT</a> 2017
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

</body>
</html>
