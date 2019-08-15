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
//$id_obat = $_POST["id_obat"];
$nama_customer=$_POST["nama_customer"];
$alamat_customer=$_POST["alamat_customer"];
$jumlah_obat=$_POST["jumlah_obat"];

//sql untuk menambahkan data

$sql=" INSERT INTO pesanan (nama_customer, alamat_customer, jumlah_obat)
VALUES('$nama_customer','$alamat_customer','$jumlah_obat')";
//echo "<body background=kayu.JPG>";
$query = $conn->query("SELECT * FROM pesanan WHERE id_pesanan='$_GET[kd]'");
$data  = mysqli_fetch_array($query);
//eksekusi sql
if($conn->query($sql)===true){
   echo "<script>alert('Pesanan Berhasil Dibuat');
   	window.location='bayar.php'
   </script>";
}
else {
  echo "<script>alert('Pesanan Gagal Dibuat!');</script>";
}

//keluar dari koneksi
$conn->close();

//kembali kehalaman sebelumnya


$url=isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';

echo "</body>";
?>