<?php  
 include 'koneksi.php';


 $id_member=$_GET['id_user'];
 
 $sql ="SELECT max(id_transaksi) as last FROM tb_transaksi where id_member='$id_member' and status='1' ORDER BY id_transaksi ASC";
 $res= mysql_query($sql) or die(" query 1 error di ".mysql_error());
 $data = mysql_fetch_array($res);
 $id_transaksi = $data['last'];

$sql = "select * from tb_transaksi t join tb_konfirmasi k on t.id_transaksi = k.id_transaksi where k.id_transaksi='$id_transaksi'";

$result = mysql_query($sql) or die("Errro di ".mysql_error());
$output = array();
	while ($row = mysql_fetch_assoc($result))
	{
		$output[] = $row;		
	}
print (json_encode($output));

?>