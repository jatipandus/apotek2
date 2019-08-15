<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="tas";
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

$nama_tas=$_POST["nama_tas"];
$harga_tas=$_POST["harga_tas"];
$keterangan_tas=$_POST["keterangan_tas"];

$path = "gambar/".$nama_file;

//sql untuk menambahkan data

$sql=" INSERT INTO data_tas (gambar,nama_tas,harga_tas,keterangan_tas)
VALUES('$nama_file','$nama_tas','$harga_tas','$keterangan_tas')";
//echo "<body background=kayu.JPG>";

//eksekusi sql
if($conn->query($sql)===true){
   echo "<script>alert('Input Data Tas Berhasil');window.location='daftartas.php'</script>";
   move_uploaded_file($_FILES['gambar']['tmp_name'],"tas/".$nama_file);
}
else {
  echo "<script>alert('Data Tas Gagal di tambahkan!');history.go(-1);</script>";
}

//keluar dari koneksi
$conn->close();

//kembali kehalaman sebelumnya


$url=isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';

echo "</body>";
?>