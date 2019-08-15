<?php

$servername="localhost";
$username="root";
$password="";
$dbname="tas";
$conn=new mysqli($servername, $username, $password,$dbname);

//session_start();
ob_start();

$koneksi = mysql_connect($servername,$username,$password)
or die ("Gagal terhubung ke server MySQL");
mysql_select_db($dbname, $koneksi)
or die ("Gagal terhubung ke database");
?>
