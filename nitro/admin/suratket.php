<!DOCTYPE html>
<html>
<head>
	<title>Surat Pengantar Kematian</title>
</head>
<body>
<?php
	include '../conn.php';
                    $query1="SELECT * FROM data_penduduk,data_kematian WHERE data_penduduk.id = data_kematian.id_kematian and id='$_GET[kd]'";
                   $tampil=$conn->query($query1) or die(mysql_error());
?>
<table>
	<tr>
		<td>Pemerintah Provinsi</td>
		<td>:</td>
		<td>JAWA TENGAH</td>
	</tr>
	<tr>
		<td>Pemerintah kabupaten</td>
		<td>:</td>
		<td>WONOGIRI</td>
	</tr>
	<tr>
		<td>Kecamatan</td>
		<td>:</td>
		<td>NGADIREJO</td>
	</tr>
	<tr>
		<td>Desa Kelurahan</td>
		<td>:</td>
		<td>JATIMARTO</td>
	</tr>
</table>
<p align="center">UNTUK YANG BERSANGKUTAN</p>
<h4 align="center"><b>SURAT KETERANGAN KEMATIAN</b></h4>
<br>
Yang bertanda tangan dibawah ini, menerangkan bahwa :
<table>
<?php while($data=mysqli_fetch_array($tampil))
                    { ?>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><?php echo $data['nama']; ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo $data['jk']; ?></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><?php echo $data['tgl_lahir']; ?></td>
	</tr>
	<tr>
		<td>Agama</td>
		<td>:</td>
		<td><?php echo $data['agama']; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $data['alamat']?>, RT/RW <?php echo $data['rtrw']?>, Desa <?php echo $data['desa']?>, Kecamatan <?php echo $data['kecamatan']?></td>
	</tr>
	
</table>
<br>
Telah Meninggal Dunia pada :
<table>

	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><?php echo $data['tgl_mati']; ?></td>
	</tr>
	<tr>
		<td>Tempat Pemakaman</td>
		<td>:</td>
		<td><?php echo $data['tmpt_makam']; ?></td>
	</tr>
</table>
<br>
Surat Keterangan ini dibuat berdasarkan pelapor :
<table>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><?php echo $data['nama_pelapor']; ?></td>
	</tr>
	<tr>
		<td>NIK</td>
		<td>:</td>
		<td><?php echo $data['nik_pelapor']; ?></td>
	</tr>
	<tr>
		<td>Hubungan</td>
		<td>:</td>
		<td><?php echo $data['hubungan_pelapor']; ?></td>
	</tr>
	<?php
}
	?>
</table>
Hubungan Pelapor dengan yang meninggal
<br>
<br>
<table align="right">
	<tr>
		<td></td>
		<td></td>
		<td>Kepala Desa</td><br><br>
	</tr>
</table>
<script>
window.print();
</script>
</body>
</html>