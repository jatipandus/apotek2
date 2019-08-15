<?php

include "../conn.php";

  $id = $_POST['id'];
  $alamat=$_POST['alamat'];
  $kepala=$_POST['kepaladesa'];
  $desa=$_POST['desa'];
  $kecamatan=$_POST['kecamatan'];
  $kabupaten=$_POST['kabupaten'];
  $provinsi=$_POST['provinsi'];



$sql=$conn->query("UPDATE profil_desa set kepaladesa='$kepala',alamat='$alamat',desa='$desa',kecamatan='$kecamatan',kabupaten='$kabupaten',provinsi='$provinsi' where id='$id'");
  if ($sql){

  echo "<script>alert('data berhasil  di perbaharui'); window.location = 'profildesa.php'</script>";
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