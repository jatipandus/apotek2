<?php
$namafolder="gambar_pelanggan/"; //tempat menyimpan file

include "../conn.php";

  $id_migrasi = $_POST['id_migrasi'];
  $nik=$_POST['nik'];
  $nama=$_POST['nama'];
  $tempat_lahir=$_POST['tempat_lahir'];
  $tanggal_lahir=$_POST['tanggal_lahir'];
  $jk=$_POST['jk'];
  $agama=$_POST['agama'];
  $pekerjaan=$_POST['pekerjaan'];
  $kewarganegaraan=$_POST['kewarganegaraan'];
  $status=$_POST['status'];
  $tgl_masuk = $_POST['tgl_masuk'];


  $rtrw_asal = $_POST['rtrw_asal'];
  $desa_asal = $_POST['desa_asal'];
  $kecamatan_asal = $_POST['kecamatan_asal'];
  $kabupaten_asal = $_POST['kabupaten_asal'];


  $rtrw_domisili = $_POST['rtrw_domisili'];
  $desa_domisili = $_POST['desa_domisili'];
  $kecamatan_domisili = $_POST['kecamatan_domisili'];
  $kabupaten_domisili = $_POST['kabupaten_domisili'];


  $sql2=$conn->query("INSERT INTO data_migrasi
   VALUES('$id_migrasi','$nik','$nama','$tempat_lahir','$agama','$jk','$status','$pekerjaan',
    '$kewarganegaraan','$tanggal_lahir','$rtrw_asal','$desa_asal','$kecamatan_asal','$kabupaten_asal',
    '$tgl_masuk','$rtrw_domisili','$desa_domisili','$kecamatan_domisili','$kabupaten_domisili')");

 
  if ($sql2){
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
          <h4 class='modal-title'>Data Migrasi</h4>
        </div>
        <div class='modal-body'>
          <p>Data berhasil di masukan</p>
        </div>
        <div class='modal-footer'>

           <a class='btn btn-sm btn-primary' data-placement='bottom' data-toggle='tooltip'  href='datamigrasi.php'>Ok</a>
              
          <a class='btn btn-sm btn-primary' data-placement='bottom' data-toggle='tooltip' target='_blank' href='suratmigrasi.php?hal=edit&kd=$nik'><span class='glyphicon glyphicon-print'></span></a><br>
                    
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
