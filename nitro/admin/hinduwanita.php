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
    <title>Data Penduduk Yang Beragama Hindu</title>
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
                                        <a href="dataadmin.php">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                            Settings
                                        </a>
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
                                    <b>Data Penduduk Yang Beragama Hindu</b>

                                </header>
                                <!-- <div class="box-header"> -->
                                    <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                                <!-- </div> -->
                                <div class="panel-body table-responsive">
                                 <?php
                  
                    $query1="SELECT id,nik,nama,tempat_lahir,tgl_lahir,jk,alamat,agama,pekerjaan,status, YEAR(curdate()) - YEAR(tgl_lahir) AS usia FROM data_penduduk where ket = 'hidup' and asal !='pergi' and agama = 'hindu'  and jk = 'P'" ; 
                 
                    $tampil=$conn->query($query1) or die(mysql_error());
                    ?>
                                    <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>

                        <th><center>NIK </center></th>
                        <th><center>Nama </center></th>
                        <th><center>Tempat Lahir </center></th>
                        <th><center>Tanggal Lahir </center></th>
                        <th><center>Jenis Kelamin </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>Agama </center></th>
                        <th><center>Pekerjaan </center></th>
                        <th><center>Status Kawin </center></th>
                        <th><center>usia</center></th>
                        <th><center>Tools</center></th>
                      </tr>
                  </thead>

                                    <tbody>
                     <?php while($data=mysqli_fetch_array($tampil))
                    { ?>
                    <tr>

                    <td> <a href="detail-penduduk.php?hal=edit&kd=<?php echo $data['id'];?>"><?php echo $data['nik']; ?></a></td>

                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['tempat_lahir'];?></td>
                    <td><?php echo $data['tgl_lahir'];?></td>
                    <td><?php echo $data['jk'];?></td>
                    <td><?php echo $data['alamat'];?></td>
                    <td><?php echo $data['agama'];?></td>
                    <td><?php echo $data['pekerjaan'];?></td>
                    <td><?php echo $data['status'];?></td>
                    <td><?php echo $data['usia'];?></td>
                    <td><center><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Penduduk" href="edit-penduduk.php?hal=edit&kd=<?php echo $data['id'];?>"><span class="glyphicon glyphicon-edit"></span></a><br>

                    <a class="btn btn-sm btn-danger" data-placement="bottom" data-toggle="tooltip" title="Edit Keterangan" href="edit-penduduk-ket.php?hal=edit&kd=<?php echo $data['id'];?>"><span class="glyphicon glyphicon-remove"></span></a><br>

                    <a class="btn btn-sm btn-info" data-placement="bottom" data-toggle="tooltip" title="Migrasi" href="input-migrasi.php?hal=edit&kd=<?php echo $data['id'];?>"><span class="glyphicon glyphicon-remove"></span></a><br>

                    <a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Mutasi penduduk" href="mutasi-penduduk.php?hal=edit&kd=<?php echo $data['id'];?>"><span class="glyphicon glyphicon-share"></a>
                    </center>
                    </td></tr></div>
                 <?php
              }
              ?>
                   </tbody>
                   </table>

                  <?php $tampil=$conn->query("SELECT * from data_penduduk where ket = 'hidup' and asal != 'pergi' and agama = 'hindu' and jk = 'P'");
                        $user=mysqli_num_rows($tampil);
                    ?>
                  <center><h4>Jumlah Wanita Yang Beragama Hindu : <?php echo "$user"; ?> Orang </h4> </center>

                <div class="text-right" style="margin-top: 10px;">
                 <!-- <a href="input-migrasi.php" class="btn btn-sm btn-primary">Tambah Migrasi <i class="fa fa-arrow-circle-down"></i></a>  -->
                 <a href="input-penduduk.php" class="btn btn-sm btn-primary">Tambah Penduduk <i class="fa fa-arrow-circle-down"></i></a>
                </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy <a href="http://www.facebook/ngihiy.com" target="_blank"> Alpha.IT</a> 2017
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

                <script type="text/javascript">
                $(document).ready(function(){
                    $('table').DataTable();
                });
                </script>

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
                type: 'bar',
               data = {
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
