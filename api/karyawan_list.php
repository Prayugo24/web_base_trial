<?php

//$link = mysql_connect('localhost', 'root', '') or die('Cannot connect to the DB');
//mysql_select_db('projectolshop', $link) or die('Cannot select the DB');
require('koneksi.php');

//0 = karyawan 
//1 = bos				
//$sql = "select id_owner,nama_owner,password,email_owner,telp_owner,bbm,line from tb_owner where status='0'";
$sql = "select id_owner,nama_owner,email_owner,telp_owner,bbm,line from tb_owner where status='0'";
$result = mysql_query($sql) or die("error di ".mysql_error());


	while ($row = mysql_fetch_assoc($result))
	{
		$output[] = $row;
	}

print (json_encode($output));


?>