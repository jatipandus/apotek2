<?php
$namafolder="gambar_pelanggan/"; //tempat menyimpan file

include "../conn.php";

  $no_kk = $_POST['no_kk'];
  $nama_kepalakeluarga = $_POST['nama_lengkap'];
  $nama_lengkap=$_POST['nama_lengkap'];
  $alamat= $_POST['alamat'];
  $desakelurahan=$_POST['desakelurahan'];
  $rtrw=$_POST['desakelurahan'];
  $kecamatan=$_POST['kecamatan'];
  $kabupatenkota=$_POST['kabupatenkota'];
  $kodepos=$_POST['kodepos'];
  $provinsi=$_POST['provinsi'];
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



  $sql=$conn->query("INSERT INTO data_kk VALUES
    ('$no_kk','$nama_kepalakeluarga','$alamat','$desakelurahan','$rtrw','$kecamatan',
      '$kabupatenkota','$kodepos','$provinsi','$nik')"); 

     if ($sql){
  $sqll=$conn->query("INSERT INTO anggota_kk(no_kk,nama_lengkap,nik,jk,tempat_lahir,tgl_lahir,agama,pendidikan,jenis_pekerjaan,status_pernikahan,status_hubungankeluarga,kewarganegaraan,no_paspor,no_kitaskitap,ayah,ibu) VALUES
    ('$no_kk','$nama_lengkap','$nik','$jk','$tempat_lahir','$tgl_lahir','$agama','$pendidikan','$jenis_pekerjaan','$status_pernikahan','$status_hubungankeluarga','$kewarganegaraan','$no_paspor','$no_kitaskitap','$ayah','$ibu')"); 

     if ($sqll){
   echo "<script>alert('data telah dimasukan !!'); window.location = 'datakk.php'</script>";
   } else {
    echo "gagal".$conn->error;
      }

  } else {
  	echo "gagal".$conn->error;
      }

?>
