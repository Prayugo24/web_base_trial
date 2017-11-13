<?php
include "koneksi.php";

$id_member = $_POST['id_member'];
$qty = $_POST['qty'];
$ket = $_POST['ket'];
$id = $_POST['id'];

$sql = "SELECT max(id_transaksi) as terakhir from tb_transaksi";
$hasil = mysql_query($sql);
$data = mysql_fetch_array($hasil);

$lastid = $data['terakhir'];
$lastnumber = substr($lastid, 4, 8);
$nextnumber = $lastnumber + 1;
$nextid = "TR".sprintf("%04s",$nextnumber);

$qid = mysql_query("Select id_transaksi from tb_transaksi where id_member = '$id_member' and status = '0'");
$getid = mysql_num_rows($qid);

if($getid == 0){
	$query = "INSERT INTO  tb_transaksi  ( id_transaksi ,  tgl_transaksi , id_member , status ) VALUES ('$nextid', curdate(), '$id_member', '0')";
	$result = mysql_query($query) or die ("REPORTGagal tersimpan.");
	
	$get = "SELECT id_transaksi FROM tb_transaksi WHERE id_member = '$id_member' and status = '0' ORDER BY id_transaksi DESC ";
	$data = mysql_query($get);
	$hasil =  mysql_fetch_array($data);
	$id_transaksi = $hasil['id_transaksi'];

	$q2 = mysql_query("Select id from tb_det_transaksi where id_transaksi = '$id_transaksi' and id ='$id'");
	$gotid = mysql_num_rows($q2);
	if($gotid == 0){
		$que = "INSERT INTO tb_det_transaksi(id_transaksi, id, qty, jumlah, jumlah_berat, ket) VALUES ('$id_transaksi', '$id', $qty, $qty * (Select ceil(harga_barang - harga_barang*diskon/100) as harga_barang from tb_barang where id = '$id'), $qty * (Select berat from tb_barang where id = '$id'),'$ket')";

		$res = mysql_query($que) or die ("REPORTGagal tersimpan.");
		if($res){
			$status['status'] = "berhasil";
		}else {
			$status['status'] = "gagal";			
		}
	}else{
		$query = "update tb_det_transaksi set qty = qty + $qty, jumlah = qty * (Select ceil(harga_barang - harga_barang*diskon/100) as harga_barang from tb_barang where id = '$id'), jumlah_berat = qty * (Select berat from tb_barang where id = '$id') where id ='$id' and id_transaksi = '$id_transaksi'";
		$result = mysql_query($query) or die ("REPORTGagal tersimpan.");
		if($result){
			$status['status'] = "berhasil";
		}else {
			$status['status'] = "gagal";			
		}
	}
	
}else{
	
	$get = "(SELECT id_transaksi FROM tb_transaksi WHERE id_member = '$id_member' and status = '0' ORDER BY id_transaksi DESC LIMIT 1)";
	$data = mysql_query($get);
	$hasil =  mysql_fetch_array($data);
	$id_transaksi = $hasil['id_transaksi'];

	$q2 = mysql_query("Select id from tb_det_transaksi where id_transaksi = '$id_transaksi' and id ='$id'");
	$gotid = mysql_num_rows($q2);
	if($gotid == 0){
		$que = "INSERT INTO tb_det_transaksi(id_transaksi, id, qty, jumlah, jumlah_berat, ket) VALUES ('$id_transaksi', '$id', $qty, $qty * (Select ceil(harga_barang - harga_barang*diskon/100) as harga_barang from tb_barang where id = '$id'), $qty * (Select berat from tb_barang where id = '$id'),'$ket')";

		$res = mysql_query($que) or die ("REPORTGagal tersimpan.");
		if($res){
			$status['status'] = "berhasil";
		}else {
			$status['status'] = "gagal";			
		}

	}else{
		$query = "update tb_det_transaksi set qty = qty + $qty, jumlah = qty * (Select ceil(harga_barang - harga_barang*diskon/100) as harga_barang from tb_barang where id = '$id'), jumlah_berat = qty * (Select berat from tb_barang where id = '$id') where id ='$id' and id_transaksi = '$id_transaksi'";
		$result = mysql_query($query) or die ("REPORTGagal tersimpan.");
		if($result){
			$status['status'] = "berhasil";
		}else {
			$status['status'] = "gagal";			
		}
	}
	echo json_encode($status);
	
}
?>


	
	