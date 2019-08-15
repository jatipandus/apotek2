<?php
//session_start();
if (empty($_SESSION['username'])){
    header('location:../index.php');
} else {
    include "../conn.php";
}


$islam = $conn->query("SELECT * FROM data_penduduk WHERE agama = 'islam'");
 $totalislam = mysqli_num_rows($islam) ;

$kristen = $conn->query("SELECT * FROM data_penduduk WHERE agama = 'Kristen'");
 $totalkristen = mysqli_num_rows($kristen) ; 

$katolik = $conn->query("SELECT * FROM data_penduduk WHERE agama = 'Katolik'");
 $totalkatolik = mysqli_num_rows($katolik) ;

$hindu = $conn->query("SELECT * FROM data_penduduk WHERE agama = 'Hindu'");
 $totalhindu = mysqli_num_rows($hindu) ;

$budha = $conn->query("SELECT * FROM data_penduduk WHERE agama = 'Budha'");
 $totalbudha = mysqli_num_rows($budha) ;

$lainnya = $conn->query("SELECT * FROM data_penduduk WHERE agama = 'Lainnya'");
 $totallainnya = mysqli_num_rows($lainnya) ;
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
<div id="piechartagama"></div>
<script type="text/javascript" src="loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Islam', <?php echo "$totalislam"; ?>],
  ['Kristen', <?php echo "$totalkristen"; ?>],
  ['Katolik', <?php echo "$totalkatolik"; ?>],
  ['Hindu', <?php echo "$totalhindu"; ?>],
  ['Budha', <?php echo "$totalbudha"; ?>],
  ['Lainnya', <?php echo "$totallainnya"; ?>]     
]);
  // Optional; add a title and set the width and height of the chart

  var options = {'width':530, 'height':250};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechartagama'));
  chart.draw(data, options);
}

</script>   
<table>
  <tr>
    <th><center>Agama</center></th>
    <th><center>Detail Data</center></th>
  </tr>

  <tr>
    <td><center>Islam</center></td>
    <td><center> <a href="islam.php"><?php echo "$totalislam"; ?></a></center></td>
  </tr>
  
  <tr>
    <td><center>Kristen</center></td>
    <td><center> <a href="kristen.php"><?php echo "$totalkristen"; ?></a></center></td>
  </tr>

  <tr>
    <td><center>Katolik</center></td>
    <td><center> <a href="katolik.php"><?php echo "$totalkatolik"; ?></a></center></td>
  </tr>

  <tr>
    <td><center>Hindu</center></td>
    <td><center> <a href="hindu.php"><?php echo "$totalhindu"; ?></a></center></td>
  </tr>

  <tr>
    <td><center>Budha</center></td>
    <td><center> <a href="budha.php"><?php echo "$totalbudha"; ?></a></center></td>
  </tr>

  <tr>
    <td><center>Lainnya*</center></td>
    <td><center> <a href="lainnya.php"><?php echo "$totallainnya"; ?></a></center></td>
  </tr>
</table>
*Lainnya : Atheis, Dan Lain-Lain
    </body>
</html>