<?php
include "koneksi.php";
 
$email    = $_POST["e_mail"];
$password = md5($_POST["pass"]);

 
$query = "select * from tb_member where e_mail='$email' and pass='$password'";
 
$hasil = mysql_query($query);
if (mysql_num_rows($hasil) > 0) {
	$response = array();
	$response["login"] = array();
	while ($data = mysql_fetch_array($hasil))
	{
	$h['id_member']            = $data['id_member'] ;
	$h['nama_member']          = $data['nama_member'] ;
	$h['e_mail']         	   = $data['e_mail'] ;
	$h['pass']      		   = $data['pass'];
	 
	 array_push($response["login"], $h);
	}
	    $response["success"] = "1";
	    echo json_encode($response);
}
else {
    $response["success"] = "0";
    $response["message"] = "Tidak ada data";
    //$response["md5"] = "$password";
    echo json_encode($response);
}
?>