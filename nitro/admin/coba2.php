<?php

include "../conn.php";
  $id =addslashes( $_POST['id']);
$alamat_asal =addslashes( $_POST['alamat_asal']);
  $rtrw_asal =addslashes ($_POST['rtrw_asal']);
  $desa_asal = addslashes($_POST['desa_asal']);
  $kecamatan_asal =addslashes( $_POST['kecamatan_asal']);
  $tgl_masuk = addslashes($_POST['tgl_masuk']);
  $asal = addslashes($_POST['asal']);

  $sql2="INSERT INTO data_migrasi(id_migrasi,alamat_asal,rtrw_asal,desa_asal,kecamatan_asal,tgl_masuk) VALUES ('$id',$alamat_asal','$rtrw_asal','$desa_asal','$kecamatan_asal','$tgl_masuk')";
  $sql3="UPDATE data_penduduk SET asal='$asal' WHERE id='$id'";
  $res2=mysql_query($sql2) or die (mysql_error());
  $res3=mysql_query($sql3) or die (mysql_error());
  if ($sql2 and $sql3){
  header('location:datapenduduk.php');
  } else {
    echo "gagal";
      }

?>