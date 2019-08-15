<?php

include "../conn.php";

  $id_penduduk = $_POST['id_penduduk'];
  $id = $_POST['id'];
  $tgl_mati = $_POST['tgl_mati'];
  $tmpt_makam = $_POST['tmpt_makam'];
  $ket = $_POST['ket'];
  $nama_pelapor = $_POST['nama_pelapor'];
  $nik_pelapor = $_POST['nik_pelapor'];
  $hubungan_pelapor = $_POST['hubungan_pelapor'];


  $sql1="INSERT INTO data_kematian(id_kematian,tgl_mati,tmpt_makam,nama_pelapor,nik_pelapor,hubungan_pelapor,id_penduduk) VALUES
    ('$id','$tgl_mati','$tmpt_makam','$nama_pelapor','$nik_pelapor','$hubungan_pelapor','$id_penduduk')";

  $sql2="UPDATE data_penduduk SET ket='$ket' WHERE id='$id_penduduk'";

  $res1=mysql_query($sql1) or die (mysql_error());
  $res2=mysql_query($sql2) or die (mysql_error());
  if ($sql1 and $sql2){
  header('location:datapenduduk.php');
  } else {
  	echo "gagal";
      }

?>
