<?php

require('koneksi.php');

//if (!empty($_POST)) {
$no = getNo();	
$nama =$_POST['nama_member']; 						
$email =$_POST['e_mail']; 						
$telp =$_POST['Telp_member']; 					
$password=md5($_POST['pass']); 			


//$cek = mysql_num_rows(mysql_query("SELECT * FROM tb_member WHERE e_mail='$email' and pass='$password'"));
/*
if ($cek > 0){
echo "<script>window.alert('Email yang anda masukan sudah ada')
window.location=’registrasi.php'</script>";
}			
*/						
$cek = mysql_num_rows(mysql_query("SELECT * FROM tb_member WHERE e_mail='$email'"));
if($cek == 0) {
	$sql = "insert into tb_member(id_member,nama_member,e_mail,Telp_member,pass)values('$no','$nama','$email','$telp','$password')";
	$result = mysql_query($sql);

	if($result){
		$status["status"] ="berhasil";
	}else{
		$status["status"] ="gagal";
		$status["error"] =mysql_error();
	}				
	}else {
		$status["status"] ="gagal";
		$status["error"] ="Email sudah terdaftar!";
	}
	echo json_encode($status);

/*}else {
	$status["status"] ="gagal";
	$status["error"] ="Email sudah terdaftar!";
}*/


function getNo(){	

$query = "SELECT MAX(id_member) as kodex  FROM  tb_member";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kode = $data['kodex'];

	 
	$nourut = substr($kode, 3, 4); 
	$nourut++; 
	$nextid = "IM".sprintf("%04s",$nourut);
	return $nextid;
}

?>