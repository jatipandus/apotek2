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

 
  

  $sql="INSERT INTO data_penduduk(id,nik,nama,tempat_lahir,tgl_lahir,jk,alamat,rtrw,desa,kecamatan,agama,pekerjaan,kewarganegaraan,status,asal,nama_ibu,
    pekerjaan_ibu,nama_ayah,pekerjaan_ayah) VALUES
    ('$id','$nik','$nama','$tempat_lahir','$tgl_lahir','$jk','$alamat','$rtrw','$desa','$kecamatan','$agama','$pekerjaan','$kewarganegaraan','$status',
      '$asal','$nama_ibu','$pekerjaan_ibu','$nama_ayah','$pekerjaan_ayah')";
  $res=$conn->query($sql) or die (mysqli_error());
  if ($sql){
  header('location:datapenduduk.php');
  } else {
  	 echo "gagal".$conn->error;
      }

?>
