<?php
include "../conn.php";
$nik = $_GET['kd'];

$query =$conn->query("DELETE FROM data_migrasi WHERE nik='$nik'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'datamigrasi.php'</script>";
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'datamigrasi.php'</script>";
}
?>
