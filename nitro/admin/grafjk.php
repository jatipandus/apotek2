<?php
//session_start();
if (empty($_SESSION['username'])){
    header('location:../index.php');
} else {
    include "../conn.php";
}
$pria = $conn->query("SELECT * FROM data_penduduk WHERE jk = 'L' and ket = 'hidup' and asal != 'pergi'");
 $l = mysqli_num_rows($pria) ;
 $wanita = $conn->query("SELECT * FROM data_penduduk WHERE jk = 'P' and ket = 'hidup' and asal != 'pergi'" );
 $p = mysqli_num_rows($wanita) ;
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
        
<div id="piechartjk"></div>
<script type="text/javascript" src="loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Pria', <?php echo "$l"; ?>],
  ['Wanita', <?php echo "$p"; ?>]     
]);
  // Optional; add a title and set the width and height of the chart

  var options = {'width':530, 'height':250};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechartjk'));
  chart.draw(data, options);
}

</script>    
        <table>
  <tr>
    <th colspan="2"><center>Detail Data</center></th>
  </tr>

  <tr>
    <th><center>Pria</center></th>
    <th><center>Wanita</center></th>
  </tr>

  <tr>
    <td><center> <a href="jkpria.php"><?php echo "$l"; ?></a> </center></td>
    <td><center> <a href="jkwanita.php"><?php echo "$p"; ?></a></center></td>
  </tr>
</table>
<br><br>
    </body>
</html>