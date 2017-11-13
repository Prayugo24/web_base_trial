<?php
//$link = mysql_connect('localhost', 'cafeimers', 'jogja2015') or die('Cannot connect to the DB');
//mysql_select_db('cafeimer_cimol', $link) or die('Cannot select the DB');
include 'koneksi.php';

/* grab the posts from the db */
//$query = "select b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon ,  ifnull(sum(d.qty),0) as terjual from tb_barang b left join tb_det_transaksi d on b.id = d.id where  b.stok > 0 and b.diskon = 0 group by b.id order by date desc limit 0,20";
$query = "SELECT 
	b . * , 
	ROUND( if( diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang ) ) , '0' )) AS harga_diskon, 
	ifnull( sum( d.qty ) , 0 ) AS terjual, 
	ifnull(sum(t.rate)/count(t.rate) , 0) AS rating 
FROM 
	tb_barang b 
LEFT JOIN tb_det_transaksi d ON b.id = d.id
LEFT JOIN tempat_komentar t ON b.id = t.id
WHERE 
	b.stok >0
GROUP BY 
	b.id
ORDER BY 
	date DESC";
$result = mysql_query($query) or die('Errorquery: '.mysql_error());

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{barang:".json_encode($rows)."}";
echo $data;
?>