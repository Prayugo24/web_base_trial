<?php

include 'koneksi.php';

/* grab the posts from the db */
if (isset($_GET["id_kategori"])){
	$category = $_GET['id_kategori'];
	$query = "SELECT b.*, ifnull((b.harga_barang-(b.diskon * 0.01 * b.harga_barang)),0) as harga_diskon, ifnull(sum(d.qty),0) as terjual FROM tb_barang b left join tb_det_transaksi d on b.id=d.id where id_category ='$category' group by id";
}else {
	$query = "SELECT *  FROM tb_category order by category ASC";	
}

$result = mysql_query($query) or die('Errorquery: '.$query);
$rows = array();

while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{kategori:".json_encode($rows)."}";
echo $data;2
?>