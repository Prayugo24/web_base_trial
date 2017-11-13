<?php
//$link = mysql_connect('localhost', 'root', '') or die('Cannot connect to the DB');
//mysql_select_db('projectolshop', $link) or die('Cannot select the DB');
include 'koneksi.php';

$id_barang = $_POST['id'];	
$name = $_POST['name'];
$berat = $_POST['berat'];
$stok = $_POST['stok'];
$deskripsi = $_POST['deskripsi'];
$harbar = $_POST['harga_barang'];
$diskon = $_POST['diskon'];
$kategori = $_POST['category'];

if(!empty($_POST['gambar'])) {
	$image = $_POST['gambar'];
	$path = "Gambar/$id_barang.png";
	$actualpath = "localhost/cimol-web/$path";
	file_put_contents($path,base64_decode($image));
	$sql = "update tb_barang set gambar='$id_barang.png', name='$name', berat='$berat', harga_barang='$harbar', stok='$stok', deskripsi='$deskripsi', diskon='$diskon',id_category='$kategori' where id='$id_barang'";
}else {
	$sql = "update tb_barang set name='$name', berat='$berat', harga_barang='$harbar', stok='$stok', deskripsi='$deskripsi', diskon='$diskon',id_category='$kategori' where id='$id_barang'";
}
$result = mysql_query($sql) or die("error di ".mysql_error());
echo "Successfully Uploaded";
//$result = mysql_query($sql) or die("error di ".mysql_error());
?>