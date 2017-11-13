<?php
include "koneksi.php";
 
$email    = $_POST["email_owner"];
$password = md5($_POST["password"]);
 
$query = "select * from tb_owner where email_owner='$email' and password='$password' ";
 
$hasil = mysql_query($query);
if (mysql_num_rows($hasil) > 0) {
$response = array();
$response["login"] = array();
while ($data = mysql_fetch_array($hasil))
{
$h['id_owner']           		= $data['id_owner'] ;
$h['nama_owner']         	   = $data['nama_owner'] ;
$h['email_owner']         	   = $data['email_owner'] ;
$h['password']      		   = $data['password'];
$h['status']				=$data['status'];
 
 array_push($response["login"], $h);
}
    $response["success"] = "1";
    echo json_encode($response);
}
else {
    $response["success"] = "0";
    $response["message"] = "Tidak ada data";
    echo json_encode($response);
}
?>