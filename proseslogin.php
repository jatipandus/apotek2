<?php
include ("koneksi.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username =$_POST['username']; 
$password = $_POST['password'];

if (empty($username) && empty($password)) {
	header('location:index.html?error1');
	
} else if (empty($username)) {
	header('location:index.html?error=2');
	
} else if (empty($password)) {
	header('location:index.html?error=3');

}else{

//$admin = $conn->query("SELECT * from login where id='108'");
$result = $conn->query("SELECT * from data_user where username= '$username' and password= '$password'");
//$cs = $conn->query("SELECT * from ")
$row = mysqli_fetch_array ($result);



if (mysqli_num_rows($result) == 1) {
  //  $_SESSION['user_id'] = $row['user_id'];
	$_SESSION['username'] = $username;
	$_SESSION['nama_user'] = $row['nama_user'];

 //   $_SESSION['gambar'] = $row['gambar'];	
	header('location:halamancustomer.php');
	
} 

else {
	header('location:index.php?error=4');

}}
?>