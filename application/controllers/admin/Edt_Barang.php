<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edt_Barang extends CI_Controller {
	 var $gallery_path;
    var $gallery_path_url;
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('dbm');
    // $this->load->helper('url');
    $this->load->helper(array('form', 'url'));
    $this->load->database('tb_barang');
    $this->load->library('session');
    //if($this->auth->is_admin_logged_in() == true) redirect(base_url('login'));
    $this->gallery_path = realpath(APPPATH . 'http://cimols.com/user/Cimols_Trial/Gambar/');
    $this->gallery_path_url = base_url() . 'http://cimols.com/user/Cimols_Trial/Gambar/';
    $this->load->helper(array('url','html','form'));
  }
  
  

	public function view()
	{
    if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('Login'));
        }
		$data['results'] = $this->dbm->select_order_by('tb_barang', 'date', 'desc')->result(); 
		$this->load->view('nav_content/header');
		$this->load->view('edt_barang', $data); 
		$this->load->view('nav_content/footer'); //hohoho
	}


	public function edit($id)
	{
    if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
		$data['id']=$this->dbm->getid($id);
		$data['res'] = $this->dbm->select_where_barang('tb_barang', '*', $id)->result(); 
		$data['category'] = $this->dbm->select('tb_category')->result(); 
		$this->load->view('nav_content/header');
		$this->load->view('edt_barang_owner', $data); 
		$this->load->view('nav_content/footer');
	}

function hapus($id){
      if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }     
      
      
      $where = array('id'=> $id);
      $nama= $this->dbm->get_byimage($id);
      $path = 'Gambar/'.$nama['gambar'];
      unlink($path);
      $this->dbm->hapus_data($where,'tb_barang');       
      redirect('admin/Edt_Barang/view');

    }

    function upload() {
    	# error_reporting(E_ALL); 
	# ini_set('display_errors', 1);
     	 if ( ! $this->session->userdata('logged_in')) {
     	       return redirect(base_url('login'));
     	  }
     
                $this->load->library('upload');
                
                $id = $this->input->post('id');
                $name  = $this->input->post('name');
                $harga_barang  = $this->input->post('harbar');
                $stok  = $this->input->post('stok');
                $berat  = $this->input->post('berat');
                $image = $this->input->post('gambar');
                $kategori  = $this->input->post('kategori');
                $deskripsi = $this->input->post('deskripsi');
                $tgl = date('Y-m-d H:i:s');

                $config['file_name'] = $id;
                //$config['upload_path'] = $this->gallery_path;
                $config['upload_path'] = FCPATH.'Gambar/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '2000'; //KB
                $config['max_width']  = '2000'; //pixels
                $config['max_height']  = '2000'; //pixels
                $config['overwrite'] = true;
                $this->load->library('upload', $config);

                $this->upload->initialize($config);
                
                
                $data = array();

                if (!$this->upload->do_upload('userfile'))
                {
               
                    $this->dbm->update_barang($id,array(
                        'id' => $id,
                        'name'=>$name,
                        'harga_barang'=>$harga_barang,
                        'stok'=>$stok,
                        'berat'=>$berat,
                        'deskripsi'=>$deskripsi,
                        'id_category'=>$kategori,
                        'gambar' => $image,
                        'date' => $tgl,
                ));
                	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                  	redirect('admin/Edt_Barang/view');
                    
                } else {
           

                  
                    $this->upload->overwrite=true;
       
                     if ($this->upload->do_upload('userfile'))
            		{

            		
            		
                	$gbr = $this->upload->data();                   
                    	$this->dbm->update_barang($id,array(
                        'id' => $id,
                        'name'=>$name,
                        'harga_barang'=>$harga_barang,
                        'stok'=>$stok,
                        'berat'=>$berat,
                        'deskripsi'=>$deskripsi,
                        'id_category'=>$kategori,
                        'gambar' => $gbr['file_name'],
                        'date' => $tgl,
                    ));
                    $this->session->set_flashdata("pesan", "<div class='col-md-12'><div class='alert alert-success' id='alert'>Upload gambar berhasil !!</div></div>");
                	redirect('admin/Edt_Barang/view');
                	}else{
                   $this->session->set_flashdata("pesan", "<div class='col-md-12'><div class='alert alert-danger' id='alert'>Gagal upload gambar !!</div></div>");
                	redirect('admin/Edt_Barang/edit/'.$id);
            }
                }

         
	 }
        
	 
	
	function pencarian_barang()
	{
    	if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
		$cari_barang = $this->input->post('id');
		$num=$this->dbm->cari_barang($cari_barang)->num_rows();
		if($num=='0')
		{
			echo "data tidak ditemukan";
			return $this->load->view('edt_barang');
		}
			else 
		{
				$data['results']=$this->dbm->cari_barang($cari_barang)->result();
				$this->load->view('nav_content/header');
				$this->load->view('edt_barang', $data);
				$this->load->view('nav_content/footer');
		}
	}
}
