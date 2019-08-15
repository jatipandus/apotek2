<?php
$con=mysqli_connect("localhost","root","","sisfo");

	$sql = "SELECT nik FROM data_penduduk
			WHERE nik LIKE '%".$_GET['query']."%'
			LIMIT 10"; 
	$result    = mysqli_query($con,$sql);
		
	$json = [];
	while($row = $result->fetch_assoc()){
	     $json[] = $row['nik'];
	}

	echo json_encode($json);
?>