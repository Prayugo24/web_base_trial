<?php
include "koneksi.php";
		
$id_member = $_POST['id_member'];
//$id_transaksi= $_POST['id_transaksi'];

$atas_nama = $_POST['atas_nama'];
$alamat = $_POST['alamat'];
$kode_pos = $_POST['kode_pos'];
$telepon = $_POST['telepon'];
$agen= $_POST['agen'];
$ongkir= $_POST['ongkir'];
$total= $_POST['total'];
$kecamatan = $_POST['kecamatan'];
$kab_kot = $_POST['kab_kot'];
$provinsi = $_POST['provinsi'];

$get = "(SELECT id_transaksi FROM tb_transaksi WHERE id_member = '$id_member' and status = '0' ORDER BY id_transaksi DESC LIMIT 1)";
$data = mysql_query($get);
$hasil =  mysql_fetch_array($data);
$id_transaksi = $hasil['id_transaksi'];


//$query = "update tb_transaksi set tgl_transaksi = curdate(),total=((select sum(qty*jumlah) from tb_det_transaksi where id_transaksi = '$id_transaksi') + (select ongkir from tb_ongkir where provinsi = '$provinsi' and kabupaten_kota = '$kabupaten_kota' and kec = '$kec') * (SELECT ceil(SUM(jumlah_berat)/1000) from tb_det_transaksi where id_transaksi = '$id_transaksi')), atas_nama='$atas_nama', alamat='$alamat', id_ongkir=(select id_ongkir from tb_ongkir where provinsi = '$provinsi' and kabupaten_kota = '$kabupaten_kota' and kec = '$kec'), kode_pos='$kode_pos', telepon='$telepon' where tb_transaksi.id_transaksi='$id_transaksi'";

$sql="UPDATE `tb_transaksi` SET 
`total` = '$total', `atas_nama` = '$atas_nama', `alamat` = '$alamat',
`kode_pos` = '$kode_pos', `telepon` = '$telepon', `agen_pengiriman` = '$agen', `harga_ongkir` = '$ongkir', `kecamatan` = '$kecamatan', `kab_kot` = '$kab_kot', `provinsi` = '$provinsi' WHERE `tb_transaksi`.`id_transaksi` = '$id_transaksi'";

//$result = mysql_query($query) or die ("REPORT Gagal tersimpan.".$query);
$result = mysql_query($sql) or die("error di ".mysql_error());

if($result){
	$status["status"] ="berhasil";
}else{
	$status["status"] ="gagal";
}
	echo json_encode($status);


$query="update tb_transaksi set status = '1' where id_transaksi = '$id_transaksi'";

$res = mysql_query($query) or die ("error di ".mysql_error());

if($res){
	$status["status"] ="berhasil";
}else{
	$status["status"] ="gagal";
}
	echo json_encode($status);


//notifikasi was here
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
			'Authorization:key = AIzaSyBjpOd9DyuouUgbPzrf0ojvehBfMMOtfqI',
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

