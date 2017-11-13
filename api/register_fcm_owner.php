<?php
include "koneksi.php";

$fcm_id = $_POST["fcm_id"];
$id_owner= $_POST['id_owner'];
	$query = "update tb_owner set fcm_id = '$fcm_id' where id_owner ='$id_owner'";
	$result = mysql_query($query);
	if($result) {
		 $status["status"] ="berhasil";
	}else {
		$status["status"] ="gagal";
		$status["error"] =mysql_error();
	}
	echo json_encode($status);
	

?>