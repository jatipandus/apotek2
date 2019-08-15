<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="apotek";
$conn= new mysqli($servername,$username,$password,$dbname);

//cek koneksi
if($conn->connect_error){
die("koneksi gagal : ".$conn->connect_error);
}

//mengambil variable dari form
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$username=$_POST["username"];
$password=$_POST["password"];
$nama_user=$_POST["nama_user"];

$path = "gambar/".$nama_file;

//sql untuk menambahkan data

$sql=" INSERT INTO data_user (gambar,username,password,nama_user)
VALUES('$nama_file','$username','$password','$nama_user')";
//echo "<body background=kayu.JPG>";

//eksekusi sql
if($conn->query($sql)===true){
   echo "<script>alert('Registrasi Berhasil');window.location='index.php'</script>";
}
else {
  echo "<script>alert('Maaf, Registrasi Gagal!');history.go(-1);</script>";
}

//keluar dari koneksi
$conn->close();

//kembali kehalaman sebelumnya


$url=isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';

echo "</body>";
?>