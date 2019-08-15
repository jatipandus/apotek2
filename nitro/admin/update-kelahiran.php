<?php

include "../conn.php";

  $id = $_POST['id'];
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $jk= $_POST['jk'];
  $alamat = $_POST['alamat'];
  $rtrw = $_POST['rtrw'];
  $desa = $_POST['desa'];
  $kecamatan = $_POST['kecamatan'];
  $agama = $_POST['agama'];
  $pekerjaan = $_POST['pekerjaan'];
  $kewarganegaraan = $_POST['kewarganegaraan'];
  $status = $_POST['status'];
  $asal = $_POST['asal'];
  $nama_ibu = $_POST['nama_ibu'];
  $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
  $nama_ayah = $_POST['nama_ayah'];
  $pekerjaan_ayah = $_POST['pekerjaan_ayah'];


$sql="UPDATE data_penduduk SET id='$id',nik='$nik',nama='$nama',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',
jk='$jk',alamat='$alamat',rtrw='$rtrw',desa='$desa',kecamatan='$kecamatan',agama='$agama',pekerjaan='$pekerjaan',
kewarganegaraan='$kewarganegaraan',status='$status',asal='$asal',nama_ibu='$nama_ibu',pekerjaan_ibu='$pekerjaan_ibu',
nama_ayah='$nama_ayah',pekerjaan_ayah='$pekerjaan_ayah' WHERE id='$id'";
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
          <h4 class='modal-title'>Data Update Kelahiran</h4>
        </div>
        <div class='modal-body'>
          <p>Data berhasil di masukan</p>
        </div>
        <div class='modal-footer'>

           <a class='btn btn-sm btn-primary' data-placement='bottom' data-toggle='tooltip'  href='detail-kelahiran.php?hal=edit&kd=$nik'>Ok</a>
              
          <a class='btn btn-sm btn-primary' data-placement='bottom' data-toggle='tooltip' ' href='suratketlahir.php?hal=edit&kd=$nik'><span class='glyphicon glyphicon-print'></span></a><br>
                    
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
    ";}else {
    echo "gagal".$conn->error;
      }

?>
 