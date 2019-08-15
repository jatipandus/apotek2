<?php
include "../conn.php";
$id = $_GET['kd'];


/*$query = mysql_query("DELETE FROM data_kematian WHERE id_kematian='$id'");*/
/*$query = mysql_query("DELETE  data_penduduk.nik, data_penduduk.nama, data_kematian.tgl_mati, data_kematian.tmpt_makam FROM data_penduduk, data_kematian WHERE data_penduduk.id = data_kematian.id_kematian");
*/
$sql = "DELETE FROM data_penduduk WHERE id='$id'";
$sql1 = "DELETE FROM data_kematian WHERE id='$id'";

 
$proses = mysql_query($sql and $sql1);
 
if ($proses){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'datakematian.php'</script>";
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'datakematian.php'</script>";
}
?>
