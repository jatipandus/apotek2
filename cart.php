<?php
require_once("koneksi.php");

if(isset($_GET['add'])) {
	$id_tas = mysql_real_escape_string((int)$_GET['add']);
	$cart_sql = mysql_query("SELECT id_tas, stok_tas FROM data_tas WHERE id_tas='$id_tas'");
	$cart_row = mysql_fetch_array($cart_sql);
	if (isset($_SESSION['cart'][$id_tas]) && $cart_row['stok_tas'] != $_SESSION['cart'][$id_tas] 
	&& $cart_row['stok_tas'] > 0 ) {
		$_SESSION['cart'][$id_tas] += '1';
		echo '<script language="javascript">alert("Produk berhasil dimasukan ke keranjang anda..");			
		document.location="index.php";</script>';
	} elseif(isset($_SESSION['cart'][$id_tas]) && $cart_row['stok_tas'] = $_SESSION['cart'][$id_tas]){
		echo '<script language="javascript">alert("Stok barang tidak mencukupi!"); 
		document.location="index.php";</script>';
	} elseif(!isset($_SESSION['cart'][$id_tas])) {
		$_SESSION['cart'][$id_tas] = '1';
		echo '<script language="javascript">alert("Produk berhasil dimasukan ke keranjang anda..");			
		document.location="index.php";</script>';
	}
}
	
function cart(){
	$total = 0;
	$jum_barang = 0;
	if(isset($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $name => $value){
			if($value > 0){
				$get = mysql_query("SELECT * FROM data_tas WHERE id_tas='$name'");
				while($get_row = mysql_fetch_array($get)){
					$sub = $get_row['harga_tas'] * $value;			
					$total += $sub;
					$jum_barang += $value;
				}
			}
		}
	}

	if($total == 0){
		echo 'Keranjang Belanja Kosong!';
	} else {
		echo "Detail<br>Total belanja = Rp. $total<br>";
		echo "Total jumlah barang = $jum_barang";
		echo '<br><a href="detail_keranjang.php"">Lihat 
		Detail Keranjang</a>';
	}
}
?>