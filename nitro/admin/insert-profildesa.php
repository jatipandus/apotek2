<?php

include "../conn.php";

 
  $kepala=$_POST['kepaladesa'];
  $desa=$_POST['desa'];
  $alamat=$_POST['alamat'];
  $kecamatan=$_POST['kecamatan'];
  $kabupaten=$_POST['kabupaten'];
  $provinsi=$_POST['provinsi'];
 

$sql=$conn->query("INSERT into profil_desa values('','$kepala','$desa','$alamat','$kecamatan','$kabupaten','$provinsi')");
  if ($sql){

  echo "<script>alert('data profil desa berhasil di masukan, mohon login kembali !!'); window.location = 'index.php'</script>";
  } else {
    echo "gagal".$conn->error;
      }

?>
  <!-- $sql="UPDATE data_penduduk SET nik='$nik', nama='$nama', ttl='$ttl', jk='$jk', alamat='$alamat', rtrw='$rtrw', desa='$desa', kecamatan='$kecamatan', agama='$agama', pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan', status='$status' WHERE id='$id'";

  $res=$conn->query($sql) or die (mysql_error());
  if ($sql){
  header('location:datapenduduk.php');
  } else {
    echo "gagal";
      }

?>
 -->