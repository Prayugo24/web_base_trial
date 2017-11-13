<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {
	var $gallery_path;
    	var $gallery_path_url;
  
   public function __construct()
  {
    parent::__construct();
    $this->load->model('dbm');
    //if($this->auth->is_admin_logged_in() == true) redirect(base_url('login'));
    $this->load->database('tb_barang');
    $this->load->library('session');
    $this->gallery_path = realpath(APPPATH . '/Gambar/');
    $this->gallery_path_url = base_url() . 'http://cimols.com/user/Cimols_Trial/Gambar/';
    $this->load->helper(array('url','html','form'));
  }

	public function index()
	{
		if ( ! $this->session->userdata('logged_in')) {
            	return redirect(base_url('login'));
        }
        	$data['category'] = $this->dbm->select('tb_category')->result(); 
		$this->load->view('nav_content/header');
		$this->load->view('barang', $data); //datanya tak ilangi
		$this->load->view('nav_content/footer'); //hohoho
	}
  

	
	
	public function notif()
	{
	echo 'sampe sini ga';

	$data=$this->dbm->send_notif();

$r = array(); 
foreach($data as $row){
$r[] = $row['token'];
}
	$message = array(
		'judul_pesan' => "New Notif",
		'isi_pesan'=>"Update produk terbaru"
		
	);
	//print_r($data);

		$url = 'https://fcm.googleapis.com/fcm/send';
		 $fields = array(
			 'registration_ids' => $r,
			 'data' => $message
			);

		$headers = array(
			'Authorization:key=AAAAN0VL05k:APA91bE0GIJ4KHvSEhztTbcraJL0YvYNwhv_-MvNePwK3StTVpjnOpfSeYvg1kNIqI3_hoFcchRP97Y_ZgEsCzPFzAonc6X5jAUcZquEl26hXz2EvRCuOyfdUmsE6r3I9tzt56dHB4_SAke2eqAJxhvpLZUHB6AZ9g',
				'Content-Type: application/json'
			);


	   	$ch = curl_init();
       		curl_setopt($ch, CURLOPT_URL, $url);
       		curl_setopt($ch, CURLOPT_POST, true);
       		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       		$result = curl_exec($ch);           
       		if ($result === FALSE) {
           		die('Curl failed: ' . curl_error($ch));
       		}
       		curl_close($ch);
       		echo "\n".$result."\n";	
       		
       		
	}


	public function upload_masal()
    	{
    	if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $berat = $this->input->post('berat');
        $stok = $this->input->post('stok');
        $diskon = $this->input->post('diskon');
        $kategori = $this->input->post('kategori');
        $id = $this->dbm->buat_kode_barang();
        $date = date('Y-m-d');
        $idb = explode(',', $id);
        $caption = $this->input->post('deskrip');

        $config['file_name'] = $id;
        $config['upload_path'] = FCPATH.'Gambar/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '2000';
        $config['max_width']  = '2000'; //pixels
        $config['max_height']  = '2000'; //pixels
        
        $this->load->library('upload', $config);

         if ( ! is_dir(FCPATH.'Gambar/')) {
            mkdir(FCPATH.'Gambar/', 0777, true);
        }
	$data = array();
        if ( ! $this->upload->do_upload('media')) {
            $pesan = json_encode(array('status' => 'error', 'message' => "Proses".$this->upload->display_errors()));
            return $pesan;
        } else {
        	$this->upload->overwrite=true;

        	$file = $this->upload->data();

        	foreach ($idb as $idb) {
                $data = array(
                    'id' => $idb,
                    'gambar' => $file['file_name'],
                    'name' => $nama,
                    'berat' => $berat,
                    'harga_barang' => $harga,
                    'diskon' => $diskon,
                    'deskripsi' => $caption,
                    'stok' => $stok,
                    'date' => $date,
                    'id_category' => $kategori
                );
                $media_id = $this->dbm->insert_media($data);
                $file = $this->upload->data();
$config_thumb = array(
            	'image_library' => 'gd2',
            	'source_image' => $file['full_path'],
            	'maintain_ratio' => TRUE,
            	'quality' => '90%',
            	'width' => 300,
            	'height' => 300
        	);

        $this->load->library('image_lib', $config_thumb);
        $this->image_lib->resize();
 
                $this->notif();
		redirect('admin/Edt_Barang/view');
		}
        }
        }
         
         

}