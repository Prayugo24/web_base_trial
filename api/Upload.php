<?php 
include 'koneksi.php';

 $image = $_POST['gambar'];
 $name = $_POST['name'];
 $berat = $_POST['berat'];
 $harbar = $_POST['harga_barang'];
 $desk = $_POST['deskripsi'];
 $stok = $_POST['stok'];
 $diskon = $_POST['diskon'];
 $kategori= $_POST['kategori'];

//require_once('config.php');

 $sql ="SELECT max(id) as last FROM tb_barang ORDER BY id ASC";

 $res = mysql_query($sql);
 $data = mysql_fetch_array($res);
	$lastid = $data['last'];
	$lastnumber = substr($lastid, 4, 8);
	$nextnumber = $lastnumber + 1;
	$id = "IB".sprintf("%04s",$nextnumber);

 $path = "../Gambar/$id.png";
 //$actualpath = "cimol.cafeimers.com/cimol-web/$path";
 //$actualpath = "cimol.cafeimers.com/cimol-web/$path";

 $sql = "INSERT INTO tb_barang (id,gambar,name,berat,harga_barang,diskon,deskripsi,stok,date,id_category) VALUES ('$id','$id.png','$name','$berat','$harbar','$diskon','$desk','$stok',curdate() , '$kategori')";

 if(mysql_query($sql)){
	 $sql = "select fcm_id as token From tb_member where fcm_id is not null";
	$result = mysql_query($sql);
	$tokens = array();
	
	$judulPesan="Produk baru!";
	$namaBarang=$name;
	
	$message = array("judul_pesan" => "$judulPesan","isi_pesan"=>"$namaBarang");	
	if(mysql_num_rows($result) > 0 ){
		while ($row = mysql_fetch_array($result)) {
			$tokens[]= $row["token"];
		}
		$message_status = send_notification($tokens, $message);
		//echo "\n".$message_status."\n";			
	}
	
 	file_put_contents($path,base64_decode($image));
 	echo "Successfully Uploaded";
 	
 }else{
	echo "Error";
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