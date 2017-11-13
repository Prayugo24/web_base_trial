<?php
//$link = mysql_connect('localhost', 'cafeimers', 'jogja2015') or die('Cannot connect to the DB');
//mysql_select_db('cafeimer_cimol') or die('Cannot select the DB');
include 'koneksi.php';

$name = $_GET['name'];
$stokting = $_GET['stokting'];
$stokrend = $_GET['stokrend'];
$diskonting = $_GET['diskonting'];
$diskonrend = $_GET['diskonrend'];
$hargating = $_GET['hargating'];
$hargarend = $_GET['hargarend'];
$jualting = $_GET['jualting'];
$jualrend = $_GET['jualrend'];
$result="";

if($stokting){
	$query = "SELECT b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon, ifnull(sum(d.qty),0) as terjual FROM tb_barang b left join tb_det_transaksi d on b.id=d.id where b.name like '%$name%' and b.diskon = 0 group by id order by b.stok desc";
	$result = mysql_query($query) or die('Errorquerystokting: '.mysql_error());
}elseif($stokrend){
	$query = "SELECT b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon, ifnull(sum(d.qty),0) as terjual FROM tb_barang b left join tb_det_transaksi d on b.id=d.id where b.name like '%$name%' and b.diskon = 0 group by id order by b.stok asc";
	$result = mysql_query($query) or die('Errorquerystokrend: '.mysql_error());
}elseif($diskonting){
	$query = "SELECT b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon, ifnull(sum(d.qty),0) as terjual FROM tb_barang b left join tb_det_transaksi d on b.id=d.id where b.name like '%$name%' and b.diskon > 0 group by id order by b.diskon desc";
	$result = mysql_query($query) or die('Errorquerydiskonting: '.mysql_error());
}elseif($diskonrend){
	$query = "SELECT b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon, ifnull(sum(d.qty),0) as terjual FROM tb_barang b left join tb_det_transaksi d on b.id=d.id where b.name like '%$name%' and b.diskon > 0 group by id order by b.diskon asc";
	$result = mysql_query($query) or die('Errorquerydisktonrend: '.mysql_error());
}elseif($hargating){
	$query = "SELECT b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon, ifnull(sum(d.qty),0) as terjual FROM tb_barang b left join tb_det_transaksi d on b.id=d.id where b.name like '%$name%' and b.diskon = 0 group by id order by b.harga_barang desc";
	$result = mysql_query($query) or die('Errorqueryhargating: '.mysql_error());
}elseif($hargarend){
	$query = "SELECT b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon, ifnull(sum(d.qty),0) as terjual FROM tb_barang b left join tb_det_transaksi d on b.id=d.id where b.name like '%$name%' and b.diskon = 0 group by id order by b.harga_barang asc";
	$result = mysql_query($query) or die('Errorqueryhargarend: '.mysql_error());
}elseif($jualting){
	$query = "SELECT b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon, ifnull(sum(d.qty),0) as terjual FROM tb_barang b left join tb_det_transaksi d on b.id=d.id where b.name like '%$name%' and b.diskon = 0 group by id order by terjual desc";
	$result = mysql_query($query) or die('Errorquerystokting: '.mysql_error());
}elseif($jualrend){
	$query = "SELECT b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon, ifnull(sum(d.qty),0) as terjual FROM tb_barang b left join tb_det_transaksi d on b.id=d.id where b.name like '%$name%' and b.diskon = 0 group by id order by terjual asc";
	$result = mysql_query($query) or die('Errorquerystokrend: '.mysql_error());
}elseif($name){
	$query = "SELECT b.*, ROUND(if(diskon >0, (b.harga_barang - ( b.diskon * 0.01 * b.harga_barang )), '0')) AS harga_diskon, ifnull(sum(d.qty),0) as terjual FROM tb_barang b left join tb_det_transaksi d on b.id=d.id where b.name like '%$name%' and b.diskon = 0 group by id";
	$result = mysql_query($query) or die('Errorqueryname: '.mysql_error());
}

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{barang:".json_encode($rows)."}";
echo $data;
?>