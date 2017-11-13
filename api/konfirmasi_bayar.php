<?php
include 'koneksi.php';

$id_trans = $_POST['id_transaksi'];
 $nama = $_POST['nama'];
 $norek = $_POST['no_rek'];
 $jumlah = $_POST['jumlah'];
 $id_member= $_POST['id_member'];
/*
 $qty = $_POST['qty'];
 $id = $_POST['id'];
 $ket= $_POST['ket'];
*/
 /*$sql ="SELECT max(id_transaksi) as last FROM tb_transaksi where id_member='$id_member' ORDER BY id_transaksi ASC";

 $res = mysql_query($sql); 
 $data = mysql_fetch_array($res);
 $idtrans = $data['last'];*/
 
$sql = "INSERT INTO tb_konfirmasi (id_transaksi,nama,no_rek,jumlah) VALUES ('$id_trans','$nama','$norek','$jumlah')";
$result = mysql_query($sql) ;

if($result){
	$status["status"] ="berhasil";
		/* $sql ="SELECT max(id_transaksi) as lastid FROM tb_transaksi where id_member='$id_member' ORDER BY id_transaksi ASC";

		$res = mysql_query($sql); 
		$data = mysql_fetch_array($res);
		$id_trans = $data['lastid'];*/
		
/*		$que = "INSERT INTO tb_det_transaksi(id_transaksi, id, qty, jumlah, jumlah_berat, ket) VALUES ('$id_trans', '$id', '$qty', (select ifnull(('$qty' * (Select harga_barang from tb_barang where id = '$id')),0) as jumlah) , (select ifnull(('$qty' * (Select berat from tb_barang where id = '$id')),0) as jumlah_berat),'$ket')";
		$hasil = mysql_query($que);
*/		
				
		$qupdate = "update tb_transaksi set konf_bay = '1' where id_transaksi='$id_trans' and id_member='$id_member'";
		//$qupdate = "update tb_transaksi set status = '1' where id_transaksi='$id_trans' and id_member='$id_member'";
		$rupdate = mysql_query($qupdate) or die ("Error : ".mysql_error()) ;
		
		//if ($res){
		//	$stat["stue"]="suksesss";
			
		//		$sql ="SELECT max(id_transaksi) as lastidnya FROM tb_transaksi where id_member='$id_member' ORDER BY id_transaksi ASC";
			
		//		$res = mysql_query($sql); 
		//		$data = mysql_fetch_array($res);
		//		$id_transnya = $data['lastidnya'];
				
				//$sql2 ="SELECT * FROM tb_det_transaksi join tb_transaksi where tb_det_transaksi.id_transaksi=tb_transaksi.id_transaksi and tb_det_transaksi.id_transaksi='$id_trans'";
				$sql2 =mysql_query("SELECT * FROM tb_det_transaksi  where id_transaksi='$id_trans'");
				while($dat=mysql_fetch_array($sql2)) {			
					$id_barang= $dat['id'];					
					$stokTerjual = $dat['qty'];					
					///$query = "update tb_barang set stok = (select stok-b.qty from tb_det_transaksi b WHERE id=b.id and id_transaksi='$id_trans' and id='$id_barang') where id='$id_barang'";
					$query = "update tb_barang set stok =(tb_barang.stok - '$stokTerjual') where id='$id_barang'";
					$rest = mysql_query($query) or die ("Error : ".mysql_error()) ;
				}


				//$rest = mysql_query($sql2); 
				//$dat = mysql_fetch_array($rest);
				//$id_barang = $dat['id'];
						//} else {
		//	$stat["stue"]="gagal";
		//	$stat["error"] =mysql_error();
		//}
}else{
	$status["status"] ="gagal";
	$status["error"] =mysql_error();
	
}

echo json_encode($status); 	

//notification was here
	$sql = "select fcm_id as token From tb_owner where fcm_id is not null";
	$result = mysql_query($sql);
	$tokens = array();

	$judulPesan=$_POST['judul_pesan'];
	$namaBarang=$_POST['isi_pesan'];

	$message = array("judul_pesan" => "$judulPesan","isi_pesan"=>"$namaBarang");
	
	if(mysql_num_rows($result) > 0 ){
		while ($row = mysql_fetch_assoc($result)) {
			$tokens[]= $row["token"];
			$message_status = send_notification($tokens, $message);
			//echo "token : " .$row["token"];
			echo "\n".$message_status."\n";
		}
	}


function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'data' => $message
			);

		$headers = array(
			'Authorization:key = AAAA2kY5K6E:APA91bHH4LD_ynFY_DtJxkn_MVRHgdN198l2_fwoN7_zV7Y-ZwxJ8PxSY7YqzBSKrjpux0Xq3UudeJo1GzTqEBdreBnulrCUsQglQeOzUQG2CQk97NaJE_QN-JF7oJXphTR0kK2YKXAMwwbFhvP1f6-AI00ZPcAEdQ',
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
