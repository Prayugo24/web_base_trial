<?php
include "koneksi.php";

$id_member = $_GET['id_member'];

$get = "SELECT id_transaksi FROM tb_transaksi WHERE id_member = '$id_member' and status = '0' ORDER BY id_transaksi DESC";
$data = mysql_query($get);
$hasil =  mysql_fetch_array($data);
$id_transaksi = $hasil['id_transaksi'];

$query = "update tb_transaksi set status = '1' where id_transaksi = '$id_transaksi'";
$result = mysql_query($query) or die ("REPORTGagal tersimpan.".$query);
?>