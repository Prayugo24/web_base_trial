<?php
include 'koneksi.php';

$query = "SELECT id_owner, nama_owner, email_owner, nama_toko, telp_owner, bbm, line, alamat_owner, asal_kota, keterangan, rekening FROM  tb_owner";
$result = mysql_query($query) or die('Errorquery: '.$query);

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{owner:".json_encode($rows)."}";
echo $data;
?>