<?php
	require 'fpdf.php';
	$db = new mysqli("localhost", "root", "", "tas");

	/**
	* 
	*/
	class PDF extends FPDF
	{
		
		function BasicTable($header, $data)
		{
			
			$this->SetFont('Arial', 'i',12); //i=italic
			foreach ($header as $col) 
				
				$this->Cell(38,7,$col,1);
				$this->Ln();
				$this->SetFont('Arial', 'B', 9);

$no=1;
			
			foreach ($data as $key => $value) {
				$this->Cell(38, 7, $no++,1);
				$this->Cell(38, 7, $value['transaksi_nama'],1);
				$this->Cell(38, 7, $value['transaksi_alamat'],1);
				$this->Cell(38, 7, $value['transaksi_total'],1);
				$this->Cell(38, 7, $value['transaksi_hp'],1);
				$this->Ln();
			}
				
		}
	}

$db = new mysqli("localhost", "root", "", "tas");
$pdf = new PDF();
//coloumn heading
$header = array("No", "Nama Customer", "Alamat Customer","Total Transaksi","No Hp");
//data loading
$data = $db->query("SELECT *from transaksi");
$pdf->SetFont('Arial', 'B', 10);
$pdf->AddPage();
$pdf->Image('bag.png',90,10,25,0,'PNG');


$pdf->Ln();
$pdf->Cell(0,9, '', '0', '1', 'C');
$pdf->Cell(0,9, '', '0', '1', 'C');
$pdf->Cell(0,9, '', '0', '1', 'C');
$pdf->Cell(0,5, 'Laporan Transaksi Apotek', '0', '1', 'C'); //spasi anatar baris. C= Center
$pdf->Cell(0,5, 'Jalan Selokan Mataran No.420 Condongcatur Depok, Kab. Sleman', '0', '1', 'C'); //spasi anatar baris. C= Center
$pdf->Cell(0,5, 'Daerah Istimewa Yogyakarta 55283', '0', '1', 'C'); //spasi anatar baris. C= Center

$pdf->Ln();
$pdf->Ln();
$pdf->BasicTable($header, $data);
$pdf->Ln(); //barias baru
$pdf->Output();


?>