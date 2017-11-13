<?php
//$link = mysql_connect('localhost', 'cafeimers', 'jogja2015') or die('Cannot connect to the DB');
//mysql_select_db('cafeimer_cimol', $link) or die('Cannot select the DB');
include 'koneksi.php';
/* grab the posts from the db */
$query = "select b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon ,ifnull(sum(d.qty),0) as terjual , ifnull( sum( t.rate ) / count( t.rate ) , 0 ) AS rating  from tb_barang b left join tb_det_transaksi d on b.id = d.id  LEFT JOIN tempat_komentar t ON b.id = t.id where (select ifnull(sum(d.qty),0) as terjual)>0 and stok>0 group by b.id order by terjual desc";

$result = mysql_query($query) or die('Errorquery: '.mysql_error());

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{barang:".json_encode($rows)."}";
echo $data;
?>

