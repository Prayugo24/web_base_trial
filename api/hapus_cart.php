<?php
include "koneksi.php";
//$link = mysql_connect('localhost', 'root', '') or die('Cannot connect to the DB');
$id_member = $_GET['id_member'];
$id = $_GET['id'];


$get = "(SELECT id_transaksi FROM tb_transaksi WHERE id_member = '$id_member' and status = '0' ORDER BY id_transaksi DESC LIMIT 1)";
$data = mysql_query($get);
$hasil =  mysql_fetch_array($data);
$id_transaksi = $hasil['id_transaksi'];

$que = "DELETE FROM tb_det_transaksi WHERE id_transaksi = '$id_transaksi' and id = '$id'";
$res = mysql_query($que) ;

if($res){
	$status['status']="berhasil";
}else {
	$status['status']="gagal";
	$status['error']=mysql_error();

}
echo json_encode($status);
?>