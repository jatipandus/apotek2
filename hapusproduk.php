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
//sql untuk menambahkan data
$id_tas = $_GET['id_tas'];
$sql = "DELETE FROM data_tas WHERE id_tas='$id_tas'";
//echo "<body background=kayu.JPG>";

//eksekusi sql
if($conn->query($sql)===true){
   echo "<script>alert('Hapus Data Tas Berhasil');window.location='daftartas.php'</script>";
   move_uploaded_file($_FILES['gambar']['tmp_name'],"tas/".$nama_file);
}//detail_produk.php?id_tas=<?php echo $resultRow['id_tas'];
else {
  echo "<script>alert('Data Tas Gagal di Hapus!');history.go(-1);</script>";
}

//keluar dari koneksi
$conn->close();

//kembali kehalaman sebelumnya


$url=isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';

echo "</body>";
?>