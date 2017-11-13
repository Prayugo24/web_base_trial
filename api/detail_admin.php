<?php
//$link = mysql_connect('localhost', 'cafeimers', 'jogja2015') or die('Cannot connect to the DB');
//mysql_select_db('cafeimer_cimol', $link) or die('Cannot select the DB');

include 'koneksi.php';

$id_transaksi = $_GET['id_transaksi'];

$query = "select 
	tb_det_transaksi.id, 
	tb_barang.name,
	tb_det_transaksi.qty, ceil(tb_barang.harga_barang - (tb_barang.harga_barang * diskon/100)) * tb_det_transaksi.qty as jumlah,
	tb_det_transaksi.ket, 
	tb_barang.gambar 
from 
	tb_barang, tb_det_transaksi, tb_transaksi 
where 
	tb_barang.id = tb_det_transaksi.id and tb_transaksi.id_transaksi=tb_det_transaksi.id_transaksi and tb_transaksi.id_transaksi = '$id_transaksi'";
$result = mysql_query($query) or die('Errorquery: '.$query);

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{detail:".json_encode($rows)."}";
echo $data;
?>