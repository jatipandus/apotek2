<?php
include "../conn.php";
$user_id       = $_POST['user_id'];
$username      = $_POST['username'];
$password = md5($_POST['password']);
$fullname      = $_POST['fullname'];

$query = $conn->query("UPDATE admin SET username='$username', password='$password', fullname='$fullname' WHERE user_id='$user_id'")or die(mysql_error());
if ($query){
header('location:dataadmin.php');	
} else {
	echo "gagal";
    }
?>
