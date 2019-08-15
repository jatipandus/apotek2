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
jk='$jk',alamat='$alamat',rtrw='$rtrw',desa='$desa',kecamatan='$kecamatan',agama='$agama',pekerjaan='$pekerjaan',kewarganegaraan='$kewarganegaraan',
status='$status',asal='$asal',nama_ibu='$nama_ibu',pekerjaan_ibu='$pekerjaan_ibu',nama_ayah='$nama_ayah',pekerjaan_ayah='$pekerjaan_ayah' WHERE id='$id'";
  $res=$conn->query($sql) or die (mysql_error());
  if ($sql){
  echo "<script>alert('data telah di update !!'); window.location = 'detail-penduduk.php?hal=edit&kd=$id'</script>";
  } else {
    echo "gagal";
      }

?>
 