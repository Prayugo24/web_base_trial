<?php 

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
	

	include 'koneksi.php';
	$sql = "select fcm_id as token From tb_member where fcm_id is not null";

	$result = mysql_query($sql);
	$tokens = array();

	$judulPesan=$_POST['judul_pesan'];
	$namaBarang=$_POST['isi_pesan'];

	$message = array("judul_pesan" => "$judulPesan","isi_pesan"=>"$namaBarang");
	
	if(mysql_num_rows($result) > 0 ){
		//while ($row = mysql_fetch_assoc($result)) {
		
		while ($row = mysql_fetch_array($result)) {
			$tokens[]= $row["token"];
			//$message_status = send_notification($tokens, $message);
			//echo "token : " .$row["token"];
			//echo "\n".$message_status."\n";
		}
		$message_status = send_notification($tokens, $message);
		echo "\n".$message_status."\n";			

	}


 ?>
