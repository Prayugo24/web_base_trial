<?php

include 'koneksi.php';

$category = $_GET['id_kategori'];
$query = "SELECT b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) as harga_diskon, ifnull(sum(d.qty),0) as terjual , 
	ifnull(sum(t.rate)/count(t.rate) , 0) AS rating  FROM tb_barang b left join tb_det_transaksi d on b.id=d.id LEFT JOIN tempat_komentar t ON b.id = t.id
 where id_category ='$category' and b.stok >0 group by id";
	//$query = "SELECT * ,(harga_barang-(diskon*0.01*harga_barang)) as harga_diskon FROM tb_barang where id_category ='$category' and stok >0 order by name ASC";	
//$result = mysql_query($query, $link) or die('Errorquery: '.$query);
$result = mysql_query($query) or die('Errorquery: '.$query);
$rows = array();

while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{kategori:".json_encode($rows)."}";
echo $data;
?>