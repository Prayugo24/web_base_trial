<?php
include "koneksi.php";

$id_transaksi = $_POST['id_transaksi'];
$no_resi = $_POST['no_resi'];

$query = "update tb_transaksi set no_resi = '$no_resi' where id_transaksi ='$id_transaksi'";
$result = mysql_query($query) or die ("REPORTGagal tersimpan.".$query);

$q = mysql_query("SELECT fcm_id from tb_member WHERE id_member = (SELECT id_member FROM tb_transaksi WHERE id_transaksi = '$id_transaksi')") or die ("REPORTGagal tersimpan.".$q);

if(mysql_num_rows($q) > 0 ){
	$r = mysql_fetch_array($q);
	$fcm_id[]= $r['fcm_id'];

	$judulPesan=$_POST['judul_pesan'];
	$isiPesan=$_POST['isi_pesan'];

	$message = array("judul_pesan" => "$judulPesan","isi_pesan"=>"$isiPesan");

	$message_status = send_notification($fcm_id, $message);
	echo $message_status;

}
	
	function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'data' => $message
			);

		$headers = array(
			'Authorization:key = AAAAN0VL05k:APA91bE0GIJ4KHvSEhztTbcraJL0YvYNwhv_-MvNePwK3StTVpjnOpfSeYvg1kNIqI3_hoFcchRP97Y_ZgEsCzPFzAonc6X5jAUcZquEl26hXz2EvRCuOyfdUmsE6r3I9tzt56dHB4_SAke2eqAJxhvpLZUHB6AZ9g',
				'Content-Type: application/json'
			);

	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
	}

?>