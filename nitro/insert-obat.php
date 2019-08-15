<?php
include 'koneksi.php';



  	$nama_file = $_FILES['gambar_obat']['name'];
	$ukuran_file = $_FILES['gambar_obat']['size'];
	$tipe_file = $_FILES['gambar_obat']['type'];
	$tmp_file = $_FILES['gambar_obat']['tmp_name'];
	
	$nama_obat = $_POST["nama_obat"];
	$harga_obat = $_POST["harga_obat"];
	$keterangan_obat = $_POST["keterangan_obat"];
 
  $path = "gambar/".$nama_file;

  $sql="INSERT INTO data_obat(gambar_obat, nama_obat, harga_obat, keterangan_obat) VALUES
    ('$nama_file', '$nama_obat', '$harga_obat', '$keterangan_obat')";
  $res=$conn->query($sql) or die (mysqli_error());
  if ($sql){
    echo"
          
<!DOCTYPE html>
<html>
<head>
 <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Menampilkan Modal Bootstrap | AmazingLight</title>

   <link href='../css/bootstrap.min.css' rel='stylesheet'>
  
</head>

<body>

<div class='container'> 
  <!-- Modal -->
  <div class='modal fade' id='myModal' role='dialog'>
    <div class='modal-dialog modal-sm'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Data Obat</h4>
        </div>
        <div class='modal-body'>
          <p>Data berhasil di masukan</p>
        </div>
        <div class='modal-footer'>
          <a class='btn btn-sm btn-primary' data-placement='bottom' data-toggle='tooltip'  href='daftarobat.php'>Ok</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src='../js/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script type='text/javascript'>
   $('#myModal').modal('show');

</script>
</body>
</html>
    ";
  } else {
  	 echo "gagal".$conn->error;
      }

?>
