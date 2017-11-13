<?php
include "koneksi.php";

$nama = $_POST["nama"];
$email = $_POST["email"];
$telp = $_POST["telp"];
$bbm = $_POST["bbm"];
$line = $_POST["line"];
$pass = md5($_POST["pass"]);

if (isset($_POST["id"])) {
	//jika id ada maka update
	$id = $_POST["id"];
	$query = "UPDATE tb_owner SET `nama_owner` = '$nama', `email_owner` = '$email', `password` = '$pass', `telp_owner` = '$telp',
`bbm` = '$bbm', `line` = '$line' WHERE `id_owner` = '$id'";
	$result = mysql_query($query) or die("error di ".mysql_error());
}else{ 
	 $id = getNo();	
	 $select = mysql_query("select * from tb_owner where email_owner = '$email'") or die("error di ".mysql_error());
	 if(mysql_num_rows($select)>0){
		$status["status"] ="gagal";	 
	 }else{
	$query ="INSERT INTO tb_owner (`id_owner`, `nama_owner`,`email_owner`, `password`, `telp_owner`, `bbm`, `line`) VALUES ('$id', '$nama', '$email', '$pass', '$telp', '$bbm', '$line')";	 
	$result = mysql_query($query) or die("error di ".mysql_error());	 
	$status["status"] ="berhasil";
	 }
}

if($result){	
	$status["status"] ="berhasil";
}else {
	$status["status"] ="gagal";
}
	
echo json_encode($status);


function getNo(){	

$query = "SELECT MAX(id_owner) as kodex  FROM  tb_owner";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kode = $data['kodex'];

	 
	$nourut = substr($kode, 3, 4); 
	$nourut++; 
	$nextid = "IO".sprintf("%04s",$nourut);
	return $nextid;
}
?>