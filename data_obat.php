<?php
$con=mysqli_connect("localhost","root","","tas");

	$sql = "SELECT nama_tas  FROM data_tas
			WHERE nama_tas LIKE '%".$_GET['query']."%'
			LIMIT 10"; 
	$result    = mysqli_query($con,$sql);
		
	$json = [];
	while($row = $result->fetch_assoc()){
	     $json[] = $row['nama_tas'];
	}

	echo json_encode($json);
?>