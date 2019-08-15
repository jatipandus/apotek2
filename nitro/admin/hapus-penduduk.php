<?php
include "../conn.php";
$id = $_GET['kd'];

$query = $conn->query("DELETE FROM data_penduduk WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'datapenduduk.php'</script>";
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'datapenduduk.php'</script>";
}
?>
