<?php
//session_start();
if (empty($_SESSION['username'])){
    header('location:../index.php');
} else {
    include "../conn.php";
}
$kawin = $conn->query("SELECT * FROM data_penduduk WHERE status = 'kawin'");
 $totalkawin = mysqli_num_rows($kawin) ;

$belumkawin = $conn->query("SELECT * FROM data_penduduk WHERE status = 'belum_kawin'");
 $totalbelumkawin = mysqli_num_rows($belumkawin) ;

$duda = $conn->query("SELECT * FROM data_penduduk WHERE status = 'duda'");
 $totalduda = mysqli_num_rows($duda) ;

$janda = $conn->query("SELECT * FROM data_penduduk WHERE status = 'janda'");
 $totaljanda = mysqli_num_rows($janda) ;
?>

<html>
    <head>
        <style type="text/css">
             
            table {
                font-family: arial, sans-serif;
                font-size: 90%;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                padding: 1px;
                padding-left: 1px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            
        </style>

    </head>
    <body>
<div id="piechartstatus"></div>
<script type="text/javascript" src="loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Kawin', <?php echo "$totalkawin"; ?>],
  ['Belum Kawin', <?php echo "$totalbelumkawin"; ?>],
  ['Janda', <?php echo "$totaljanda"; ?>],
  ['Duda', <?php echo "$totalduda"; ?>]     
]);
  // Optional; add a title and set the width and height of the chart

  var options = {'width':530, 'height':250};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechartstatus'));
  chart.draw(data, options);
}

</script>   
<table>
  <tr>
    <th><center>Status</center></th>
    <th><center>Detail Data</center></th>
  </tr>
  <tr>
    <td><center>Kawin</center></td>
    <td><center> <a href="kawin.php"><?php echo "$totalkawin"; ?></a></center></td>
  </tr>

  <tr>
    <td><center>Belum kawin</center></td>
    <td><center> <a href="belumkawin.php"><?php echo "$totalbelumkawin"; ?></a></center></td>
  </tr>

  <tr>
    <td><center>Duda</center></td>
    <td><center><a href="duda.php"><?php echo "$totalduda"; ?></a> </center></td>
  </tr>

  <tr>
    <td><center>Janda</center></td>
    <td><center> <a href="janda.php"><?php echo "$totaljanda"; ?></a></center></td>
  </tr>

  
</table>

    </body>
</html>