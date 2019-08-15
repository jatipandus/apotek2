<!DOCTYPE html>
<html>
<head>
	
</head>

<?php
	include '../conn.php';
                    $query1="SELECT * FROM data_penduduk";
                   
                     $tampil=$conn->query($query1) or die(mysql_error());
                     while($data=mysqli_fetch_array($tampil))
                    { 
?>
<br><br>
<body>
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
<br>
<br>
<br>
</table>
<p align="center">UNTUK YANG BERSANGKUTAN</p>
<h3 align="center"><b>SURAT KETERANGAN KELAHIRAN</b></h3>
<br>
Yang bertanda tangan dibawah ini, menerangkan bahwa pada :
<table>

	<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><?php echo $data['tgl_lahir']?></td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><?php echo $data['tempat_lahir']?></td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><?php echo $data['nama']?></td>
	</tr>
	<tr>
		<td>NIK</td>
		<td>:</td>
		<td><?php echo $data['nik']?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo $data['jk']?></td>
	</tr>
		

</table>
<br>
Anak Dari :
<br>
<br>
<table>
	<tr>
		<td>Nama Ibu</td>
		<td>:</td>
		<td><?php echo $data['nama_ibu']?></td>
	</tr>
	<tr>
		<td>Pekerjaan</td>
		<td>:</td>
		<td><?php echo $data['pekerjaan_ibu']?></td>
	</tr>

	<tr>
		<td>Nama Bapak</td>
		<td>:</td>
		<td><?php echo $data['nama_ayah']?></td>
	</tr>
	<tr>
		<td>Pekerjaan</td>
		<td>:</td>
		<td><?php echo $data['pekerjaan_ayah']?></td>
	</tr>

	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $data['alamat']?>, RT/RW <?php echo $data['rtrw']?>, Desa <?php echo $data['desa']?>, Kecamatan <?php echo $data['kecamatan']?></td>
	</tr>

	
</table>
<br>
Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya 

<br>
<table align="right">
	<tr>
		<td></td>
		<td></td>
		<td>Kepala Desa</td><br><br><br><br>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr>
		<td></td>
		<td></td>
		<td>..............</td><br><br>
	</tr>


</table>
<br>
<br>	
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



</body>
<?php
		}
	?>
	<script>
window.print();
</script>
</html>