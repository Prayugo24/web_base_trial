<?php
//$link = mysql_connect('localhost', 'cafeimers', 'jogja2015') or die('Cannot connect to the DB');
//mysql_select_db('cafeimer_cimol', $link) or die('Cannot select the DB');

include 'koneksi.php';

$id = $_GET["id"];
$query = "SELECT tempat_komentar.id_member, tempat_komentar.judul_komentar, tempat_komentar.isi_komentar, tb_member.nama_member FROM tb_member, tempat_komentar WHERE tb_member.id_member=tempat_komentar.id_member and tempat_komentar.id = '$id' order by tempat_komentar.komentar_id DESC";
//$query = "select komentar_id,tempat_komentar.id_member,judul_komentar,isi_komentar,nama_member from tempat_komentar, tb_member where tb_member.id_member = tempat_komentar.id_member order by komentar_id DESC";
//$result = mysql_query($query, $link) or die('Errorquery: '.$query);
$result = mysql_query($query) or die('Errorquery: '.$query);

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
$rows[] = $r;
}
$data = "{komentar:".json_encode($rows)."}";
echo $data;
?>