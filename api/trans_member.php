<?php
//$link = mysql_connect('localhost', 'cafeimers', 'jogja2015') or die('Cannot connect to the DB');
//mysql_select_db('cafeimer_cimol', $link) or die('Cannot select the DB');

include 'koneksi.php';

$id_member = $_GET['id_member'];

$query = "SELECT id_transaksi , tgl_transaksi , total, status, konf_bay, no_resi FROM tb_transaksi WHERE id_member ='$id_member' and status='1' order by id_transaksi desc";

$result = mysql_query($query) or die('Errorquery: '.$query);

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{transaksi:".json_encode($rows)."}";
echo $data;
?>