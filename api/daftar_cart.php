<?php
include 'koneksi.php';

$id_member=$_GET['id_member'];

$query1 = "SELECT sum(jumlah_berat) AS total_berat FROM tb_det_transaksi WHERE id_transaksi = ( SELECT id_transaksi FROM tb_transaksi WHERE id_member = '$id_member' AND STATUS = '0' ) limit 1"; 

$json_response = array(); //Create an array
$rows = array();

$result1 = mysql_query($query1) or die('Errorquery: '.$mysql_error());
$value = mysql_fetch_object($result1);
$rows['berat_total'] = $value->total_berat;
//$rows['berat_total'] = "1500";

$rows['cart'] = array();


$query2 = "select tb_transaksi.*, tb_det_transaksi.*, tb_barang.id, tb_barang.name, (tb_barang.harga_barang-(tb_barang.diskon*0.01*tb_barang.harga_barang)) as harga_barang, tb_barang.berat, tb_barang.gambar FROM tb_det_transaksi ,tb_barang,tb_transaksi WHERE tb_barang.id = tb_det_transaksi.id AND tb_transaksi.id_transaksi=tb_det_transaksi.id_transaksi AND tb_transaksi.id_transaksi=(SELECT id_transaksi from tb_transaksi where id_member='$id_member' and status = '0')";
$result2 = mysql_query($query2) or die('Errorquery: '.$mysql_error());


while ($opt = mysql_fetch_assoc($result2)) {

        $rows['cart'][] = array(
                'id' => $opt['id'],
                'name' => $opt['name'],
                'jumlah' => $opt['jumlah'],
                'qty' => $opt['qty'],
                'gambar' => $opt['gambar'],
                'id_transaksi' => $opt['id_transaksi'],
                'harga_barang' => $opt['harga_barang'],
                'qty' => $opt['qty'],
                'berat' => $opt['berat']
                
        );

}
	
	array_push($json_response, $rows); //push the values in the array
	echo json_encode($rows);

?>