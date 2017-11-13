<?php

include 'koneksi.php';
$row_array = array();
	
if(!empty($_POST['id_category'])){
	$id_category= $_POST['id_category'];
	$query = "delete from tb_category where id_category = '$id_category'";
	$result = mysql_query($query) or die('Errorquery: '.$query);
	if($result){
		$status["status"] ="berhasil";
	}else {
		$status["status"] ="gagal";		
	}
	echo json_encode($status);
}else if(!empty($_POST['category'])){
	$category = $_POST['category'];
	$query = "SELECT * FROM  `tb_category` WHERE  `category` LIKE  '%$category%'";
	$sql= mysql_query($query) or die ('Query Error:'.mysql_error());
	if(mysql_num_rows($sql)>0){
		$status["status"] ="ada";				
	}else {
		$id = getID();
		$query = "insert into tb_category (id_category, category) values ('$id', '$category')";
		$result = mysql_query($query) or die('Errorquery: '.$query);
			if($result){
				$status["status"] ="berhasil";
			}else {
				$status["status"] ="gagal";		
				}
				echo json_encode($status);
			} 	
}else{
	$query = "select * from tb_category order by category asc";
	$result = mysql_query($query) or die('Errorquery: '.mysql_error());

	$rows = array();
	while ($r = mysql_fetch_assoc($result)) {
	$rows[] = $r;
	}
	$data = "{category:".json_encode($rows)."}";
	echo $data;

	echo json_encode($status);
}

function getID(){
	$sql = "SELECT max(id_category) as terakhir from tb_category";
	$hasil = mysql_query($sql);
	$data = mysql_fetch_array($hasil);

	$lastid = $data['terakhir'];
	$lastnumber = substr($lastid, 4, 8);
	$nextnumber = $lastnumber + 1;
	$nextid = "IC".sprintf("%04s",$nextnumber);
	return $nextid;
}

?>