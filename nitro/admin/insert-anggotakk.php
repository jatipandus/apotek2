<?php
//tempat menyimpan file

include "../conn.php";
  $no_kk = $_POST['no_kk'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $nik = $_POST['nik'];
  $jk = $_POST['jk'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $agama = $_POST['agama'];
  $pendidikan = $_POST['pendidikan'];
  $jenis_pekerjaan = $_POST['jenis_pekerjaan'];
  $status_pernikahan = $_POST['status_pernikahan'];
  $status_hubungankeluarga = $_POST['status_hubungankeluarga'];
  $kewarganegaraan = $_POST['kewarganegaraan'];
  $no_paspor = $_POST['no_paspor'];
  $no_kitaskitap = $_POST['no_kitaskitap'];
  $ayah = $_POST['ayah'];
  $ibu = $_POST['ibu'];

  $sql=$conn->query("INSERT INTO anggota_kk(no_kk,nama_lengkap,nik,jk,tempat_lahir,tgl_lahir,agama,pendidikan,jenis_pekerjaan,status_pernikahan,status_hubungankeluarga,kewarganegaraan,no_paspor,no_kitaskitap,ayah,ibu) VALUES
    ('$no_kk','$nama_lengkap','$nik','$jk','$tempat_lahir','$tgl_lahir','$agama','$pendidikan','$jenis_pekerjaan','$status_pernikahan','$status_hubungankeluarga','$kewarganegaraan','$no_paspor','$no_kitaskitap','$ayah','$ibu')"); 

     if ($sql){
   echo "<script>alert('data telah dimasukan !!'); window.location = 'detail-kk.php?kd=$no_kk'</script>";

  } else {
    echo "gagal".$conn->error;
      }

?>
