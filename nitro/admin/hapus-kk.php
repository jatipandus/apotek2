<?php
include "../conn.php";
$no_kk = $_GET['kd'];

$query = $conn->query("DELETE FROM data_kk WHERE no_kk='$no_kk'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'datakk.php'</script>";
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'datakk.php'</script>";
}
?>
