<?php
//$link = mysql_connect('localhost', 'cafeimers', 'jogja2015') or die('Cannot connect to the DB');
//mysql_select_db('cafeimer_cimol', $link) or die('Cannot select the DB');

include 'koneksi.php';

$id_transaksi = $_GET['id_transaksi'];

$query = "SELECT 
	*, 
	ROUND( sum( (tb_barang.harga_barang - ( tb_barang.diskon * 0.01 * tb_barang.harga_barang ) ) * tb_det_transaksi.qty )) AS jumlah, 
	tb_transaksi.harga_ongkir as ongkir 
from 
	tb_transaksi, tb_det_transaksi, tb_barang
WHERE 
	tb_transaksi.id_transaksi=tb_det_transaksi.id_transaksi and
	tb_det_transaksi.id=tb_barang.id and
	tb_transaksi.id_transaksi = '$id_transaksi'";
//$query = "SELECT tb_transaksi.id_transaksi, tb_transaksi.tgl_transaksi, (select sum(qty*jumlah) from tb_det_transaksi where id_transaksi = '$id_transaksi') as jumlah, (harga_ongkir * (SELECT ceil(SUM(jumlah_berat)/1000) from tb_det_transaksi where id_transaksi = '$id_transaksi')) as ongkir, tb_transaksi.total, tb_transaksi.no_resi from tb_transaksi, tb_ongkir WHERE tb_transaksi.id_transaksi = '$id_transaksi' and tb_transaksi.status='1'";
$result = mysql_query($query) or die('Errorquery: '.$query);

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{transaksi_detail:".json_encode($rows)."}";
echo $data;
?> 