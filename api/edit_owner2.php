<?php

//$link = mysql_connect('localhost', 'root', '') or die('Cannot connect to the DB');
//mysql_select_db('projectolshop', $link) or die('Cannot select the DB');
//require('koneksi.php');
include 'koneksi.php';

if (!empty($_POST)) {
$id_owner =$_POST['id_owner']; 						
$nama_owner =$_POST['nama_owner']; 						
$nama_toko =$_POST['nama_toko']; 						
$email =$_POST['email_owner']; 						
$bbm =$_POST['bbm']; 						
$line =$_POST['line']; 						
$telp=$_POST['telp_owner']; 						
$alamat=$_POST['alamat_owner']; 						
$ket=$_POST['keterangan']; 							
$askot=$_POST['asal_kota']; 						
$rek=$_POST['rekening']; 						
$password=$_POST['password']; 						
						
//$sql = "insert into tb_owner(id_owner,nama_owner,nama_toko,email_owner,telp_owner,alamat_owner,keterangan,password) values('$no','$nama_owner','$nama_toko','$email','$telp','$alamat','$ket','$password')";
$sql="UPDATE tb_owner SET `nama_owner` = '$nama_owner', `nama_toko` = '$nama_toko', `email_owner` = '$email', `telp_owner` = '$telp', `alamat_owner` = '$alamat',`asal_kota` = '$askot',  `keterangan` = '$ket', `rekening` = '$rek', `bbm` = '$bbm', `line` = '$line' WHERE `tb_owner`.`id_owner` = '$id_owner'";
$result = mysql_query($sql) or die("error di ".mysql_error());
if($result){
		$status["status"] ="berhasil";
		echo json_encode($status);
	}else{
		$status["status"] ="gagal";
		echo json_encode($status);
	}		
}else {

$result= mysql_query("select * from tb_owner limit 1") or die ('Query Error:'.mysql_error());
$output = array();
	while ($row = mysql_fetch_assoc($result))
	{
		$output[] = $row;		
	}

print (json_encode($output));
	
}

?>