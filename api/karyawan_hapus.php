<?php
include "koneksi.php";
$id = $_GET['id_karyawan'];

$que = "DELETE FROM tb_owner WHERE id_owner = '$id' ";

	$result = mysql_query($que) or die("error di ".mysql_error());
	if($result){
		$status["status"] ="berhasil";
	}else{
		$status["status"] ="gagal";
	}	
echo json_encode($status);
?>