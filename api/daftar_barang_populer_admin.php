<?php
//$link = mysql_connect('localhost', 'cafeimers', 'jogja2015') or die('Cannot connect to the DB');
//mysql_select_db('cafeimer_cimol', $link) or die('Cannot select the DB');

include 'koneksi.php';
/* grab the posts from the db */
$query = "select b.*,ifnull(sum(d.qty),0) as terjual from tb_barang b left join tb_det_transaksi d on b.id = d.id where b.diskon = 0  and (select ifnull(sum(d.qty),0) as terjual)>0 group by b.id order by terjual desc limit 0,20";
$result = mysql_query($query) or die('Errorquery: '.$query);

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{barang:".json_encode($rows)."}";
echo $data;
?>