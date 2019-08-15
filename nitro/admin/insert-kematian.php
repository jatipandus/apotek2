<?php
$namafolder="gambar_pelanggan/"; //tempat menyimpan file

include "../conn.php";

  $id_kematian = $_POST['id_kematian'];
  $tgl_mati = $_POST['tgl_kematian'];
  $tmpt_makam = $_POST['tmpt_makam'];
  $nama_pelapor = $_POST['nama_pelapor'];
  $nik_pelapor= $_POST['nik_pelapor'];
  $hubungan_pelapor = $_POST['hubungan_pelapor'];
  $id_penduduk = $_POST['id_penduduk'];
  

  $sql1="INSERT INTO data_kematian(id_kematian,tgl_mati,tmpt_makam,nama_pelapor,nik_pelapor,hubungan_pelapor,id_penduduk) VALUES
    ('$id_kematian','$tgl_mati','$tmpt_makam','$nama_pelapor','$nik_pelapor','$hubungan_pelapor','$id_penduduk')";



       if($conn->query($sql1)==TRUE){
   $sql2="UPDATE data_penduduk SET ket='mati' WHERE id='$id_penduduk'";
        if($conn->query($sql2)==TRUE){
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
          <h4 class='modal-title'>Data Kematian</h4>
        </div>
        <div class='modal-body'>
          <p>Data berhasil di masukan</p>
        </div>
        <div class='modal-footer'>

           <a class='btn btn-sm btn-primary' data-placement='bottom' data-toggle='tooltip'  href='datakematian.php'>Ok</a>
              
          <a class='btn btn-sm btn-primary' data-placement='bottom' data-toggle='tooltip' target='_blank' href='suratkematian.php?hal=edit&kd=$id_kematian'><span class='glyphicon glyphicon-print'></span></a><br>
                    
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
    echo "gagal".$sql1."<br>".$conn->error;
      }
}
?>