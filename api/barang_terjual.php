<?php
//$link = mysql_connect('localhost', 'cafeimers', 'jogja2015') or die('Cannot connect to the DB');
//mysql_select_db('cafeimer_cimol', $link) or die('Cannot select the DB');
//require("/koneksi.php");
include 'koneksi.php';

$query = "Select tb_barang.*, ifnull(sum(tb_det_transaksi.qty),0) as terjual, tempat_komentar.* from tempat_komentar, tb_barang, tb_det_transaksi where tempat_komentar.id=tb_barang.id and tb_barang.id=tb_det_transaksi.id group by tempat_komentar.id";
$result = mysql_query($query) or die('Errorquery: '.$query);

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{komentar:".json_encode($rows)."}";
echo $data;
?>