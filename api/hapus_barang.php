<?php
include 'koneksi.php';
$id_barang = $_GET['id'];	

$path = "../Gambar/$id_barang.png";
if(unlink($path)) { 
	//echo "Deleted '$id_barang'"; 
} else {
	//echo "Gambar can’t be deleted";
}

$sql = "delete from tb_barang where id='$id_barang'";
$result = mysql_query($sql) ;//or die("error di ".mysql_error());
if($result){
	$status["status"] ="berhasil";
}else{
	$status["status"] ="gagal";
	$status["error"] ="mysql_error()";
}
echo json_encode($status);
?> 