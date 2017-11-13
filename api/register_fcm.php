<?php
include "koneksi.php";

$fcm_id = $_POST["fcm_id"];
$id_member= $_POST['id_member'];

//$q = mysql_query("SELECT fcm_id from tb_member WHERE id_member = '$id_member'") or die ("REPORTGagal tersimpan.".$q);
//$r = mysql_fetch_array($q);
//$hasil = $r['fcm_id'];

///if($hasil == ''){
	$query = "update tb_member set fcm_id = '$fcm_id' where id_member ='$id_member'";
	$result = mysql_query($query);
//}else{}
	if($result) {
		 $status["status"] ="berhasil";
	}else {
		$status["status"] ="gagal";
		$status["error"] =mysql_error();
	}
	echo json_encode($status);
	

?>