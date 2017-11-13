<?php
//$link = mysql_connect('localhost', 'cafeimers', 'jogja2015') or die('Cannot connect to the DB');
//mysql_select_db('cafeimer_cimol', $link) or die('Cannot select the DB');

include 'koneksi.php';

$id_transaksi= $_GET['id_transaksi'];

$query = "select (select sum(qty*jumlah) from tb_det_transaksi where id_transaksi = '$id_transaksi') as jumlah, ((select a.ongkir from tb_ongkir a, tb_transaksi b where a.id_ongkir=b.id_ongkir and b.id_transaksi='$id_transaksi') * (SELECT ceil(SUM(jumlah_berat)/1000) from tb_det_transaksi where id_transaksi = '$id_transaksi')) as ongkir, ((select sum(qty*jumlah) from tb_det_transaksi where id_transaksi = '$id_transaksi') + (select a.ongkir from tb_ongkir a, tb_transaksi b where a.id_ongkir=b.id_ongkir and b.id_transaksi='$id_transaksi') * (SELECT ceil(SUM(jumlah_berat)/1000) from tb_det_transaksi where id_transaksi = '$id_transaksi')) as total from tb_transaksi where id_transaksi='$id_transaksi'";
$result = mysql_query($query) or die('Errorquery: '.$query);

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{hitung:".json_encode($rows)."}";
echo $data;
?>