<!DOCTYPE html>
<html>
<head>
	<title>Surat Pengantar Kelahiran</title>
</head>
<body>
<?php
	include '../conn.php';
                    $query1="SELECT * FROM data_penduduk WHERE id='$_GET[kd]'";
                    $tampil=mysql_query($query1) or die(mysql_error());
                   
                    
                    	 $query2=mysql_query("UPDATE data_penduduk SET status_cetak='1' where id='$_GET[kd]'");
                        
                   

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
<br>
<br>
<br>
</table>
<p align="center">UNTUK YANG BERSANGKUTAN</p>
<h3 align="center"><b>SURAT KETERANGAN KTP</b></h3>
<br>
Yang bertanda tangan dibawah ini, menerangkan bahwa pada :
<table>
<?php while($data=mysql_fetch_array($tampil))
                    { ?>
    <tr>
		<td>NIK</td>
		<td>:</td>
		<td><?php echo $data['nik']?></td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><?php echo $data['nama']?></td>
	</tr>
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
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo $data['jk']?></td>
	</tr>
	<tr>
		<td>Agama</td>
		<td>:</td>
		<td><?php echo $data['agama']?></td>
	</tr>
	<tr>
		<td>Status</td>
		<td>:</td>
		<td><?php echo $data['status']?></td>
	</tr>
	<tr>
		<td>Pekerjaan</td>
		<td>:</td>
		<td><?php echo $data['pekerjaan']?></td>
	</tr>
	<tr>
		<td>Kewarganegaraan</td>
		<td>:</td>
		<td><?php echo $data['kewarganegaraan']?></td>
	</tr>

	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $data['alamat']?>, RT/RW <?php echo $data['rtrw']?>, Desa <?php echo $data['desa']?>, Kecamatan <?php echo $data['kecamatan']?></td>
	</tr>

	<?php
		}
	?>
	
</table>

<br>
Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya 

<br>
<table align="center" width="100%">
	<tr>
		<td>Ketua RT</td>
		<td></td>
		<td>Ketua RW</td><br><br>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr>
		<td></td>
		<td></td>
		<td>..............</td><br><br>
	</tr>
</table>
<script>
window.print();
</script>
</body>
</html>