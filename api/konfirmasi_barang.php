<?php  
 include 'koneksi.php';

 $id_member=$_GET['id'];
 $ket=$_GET['ket'];
 
 $sql ="SELECT max(id_transaksi) as last FROM tb_transaksi where id_member='$id_member' ORDER BY id_transaksi ASC";
 $res= mysql_query($sql);
 $data = mysql_fetch_array($res);
 $id_transaksi = $data['last'];

$sql = "UPDATE tb_konfirmasi SET `konfirmasi_barang` = '$ket' WHERE `tb_konfirmasi`.`konfirmasi_barang` ='belum' and `tb_konfirmasi`.`id_transaksi` ='$id_transaksi'";

$result = mysql_query($sql);

if($result){
	$status["status"] ="berhasil";
}else{
	$status["status"] ="gagal";
	$status["error"] = mysql_error();	
}
echo json_encode($status);
?>