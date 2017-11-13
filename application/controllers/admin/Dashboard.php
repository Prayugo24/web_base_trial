<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	 var $gallery_path;
    var $gallery_path_url;
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Dbm');
    $this->load->library('session');
  }
  
  

	public function view()
	{
	header('Content-Type: application/json');

	define('DB_HOST', 'localhost');
	define('DB_USERNAME', 'cimolsco');
	define('DB_PASSWORD', 'D2fVo1t94j');
	define('DB_NAME', 'cimolsco_trial');

	$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if(!$mysqli)
	{
		die("Connection failed: " . $mysqli->error);
	}

	$query = sprintf("SELECT SUM(total) as total, monthname(tgl_transaksi) as bulan FROM tb_transaksi GROUP BY MONTH(tgl_transaksi)");
	$result = $mysqli->query($query);

	$data = array();
	foreach ($result as $row) {
	$data[] = $row;
	}

	$result->close();

	//close connection
	$mysqli->close();

	//now print the data
	print json_encode($data);

}
}
