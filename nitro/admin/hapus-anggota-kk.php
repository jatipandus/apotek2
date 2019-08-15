<?php
include "../conn.php";
$nik = $_GET['kd'];
$no_kk=$_GET['kk'];
$query = $conn->query("DELETE FROM anggota_kk WHERE nik='$nik'");

                               
                           
if ($query){

	echo "<script>alert('data telah dihapus !!'); window.location = 'detail-kk.php?kd=$no_kk'</script>";
} else {
	echo "<script>alert('data gagal dihapus !!'); window.location = 'detail-kk.php?kd=$no_kk'</script>";
}
?>
