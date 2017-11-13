<?php

//require("/konfigurasi_nya.php");
require("koneksi.php");

$idBarang = $_POST['id'];
$idUser= $_POST['id_member'];
$judulKomentar= $_POST['judul'];
$isiKomentar= $_POST['isi'];
$rate= $_POST['rate'];

$query = "insert into tempat_komentar(id_member,judul_komentar,isi_komentar, rate, id) 
values('$idUser','$judulKomentar','$isiKomentar', '$rate', '$idBarang')";

$result = mysql_query($query) or die("error di ".mysql_error());

if($result){
	$status["status"] ="berhasil";
	}else{
		$status["status"] ="gagal";
	}

echo json_encode($status);

?> 