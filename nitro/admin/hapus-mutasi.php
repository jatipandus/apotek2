
<?php
include "../conn.php";
$nik = $_GET['kd'];

$query =$conn->query("DELETE FROM data_mutasi WHERE nik='$nik'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'datamutasi.php'</script>";
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'datamutasi.php'</script>";
}
?>
