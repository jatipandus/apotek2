<?php
include "../conn.php";
$user_id = $_GET['kd'];

$query = $conn->query("DELETE FROM admin WHERE user_id='$user_id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'dataadmin.php'</script>";
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'dataadmin.php'</script>";
}
?>
