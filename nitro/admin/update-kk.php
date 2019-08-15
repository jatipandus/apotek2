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



  $sql=$conn->query("UPDATE data_kk set no_kk='$no_kk',nama_kepalakeluarga='$nama_kepalakeluarga',alamat='$alamat',
    desakelurahan='$desakelurahan',rtrw='$rtrw',kecamatan='$kecamatan',
      kabupatenkota='$kabupatenkota',kodepos='$kodepos',provinsi='$provinsi',nik='$nik' WHERE no_kk='$no_kk'"); 

     if ($sql){
  $sqll=$conn->query("UPDATE anggota_kk SET no_kk='$no_kk',nama_lengkap='$nama_lengkap',
    nik='$nik',jk='$jk',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',agama='$agama',
    pendidikan='$pendidikan',jenis_pekerjaan='$jenis_pekerjaan',status_pernikahan='$status_pernikahan',
    status_hubungankeluarga='$status_hubungankeluarga',kewarganegaraan='$kewarganegaraan',no_paspor='$no_paspor',
    no_kitaskitap='$no_kitaskitap',ayah='$ayah',ibu='$ibu'"); 

     if ($sqll){
   echo "<script>alert('data telah update !!'); window.location = 'detail-kk.php?hal=edit&kd=$no_kk'</script>";
   } else {
    echo "gagal".$conn->error;
      }

  } else {
    echo "gagal".$conn->error;
      }

?>
