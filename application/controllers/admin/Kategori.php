<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {
	
  
   public function __construct()
  {
    parent::__construct();
	$this->load->model('dbm');
	$this->load->helper('url');
	$this->load->database('tb_category');
	// $this->load->library('session');
    //if($this->auth->is_admin_logged_in() == true) redirect(base_url('login'));
  }

	public function index()
	{

		if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
		$data['results'] = $this->dbm->select('tb_category')->result();  //disini oi
		$this->load->view('nav_content/header');
		$this->load->view('kategori', $data); 
		$this->load->view('nav_content/footer'); 
	}
	
	function hapus($id_category){
		if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
		$where = array('id_category'=> $id_category);
		$this->dbm->hapus_data($where,'tb_category');
		redirect('admin/kategori/index');

	}

	public function delete_multiple() {
		if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
			$this->dbm->remove_checked_kategori();
			redirect('admin/Kategori/index');
		}

	public function tambah()
	{
		if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
		$id=$this->dbm->buat_kode_cat();
		$category=$_POST['category'];
		//die($category);
		$data=array
		(
			'id_category'=>$id,
			'category'=>$category
		);

		$this->dbm->input_data($data,'tb_category');
		$this->session->set_flashdata('status', 'success');
		redirect('admin/Kategori ');

	}

	public function kode()
	{
		if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
		$data['kode'] = $this->dbm->buat_kode_cat()->result();
		$this->load->view('kategori', $data); 
		$this->load->view('nav_content/header');
		$this->load->view('nav_content/footer');
	}

	function pencarian_kategori()
	{
		if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
		$cari_kategori = $this->input->post('pencarian');
		$num=$this->dbm->cari_kategori($cari_kategori)->num_rows();
		if($num=='0'){
			echo "data tidak ditemukan";
			return $this->load->view('kategori');
		}
			else {
				$data['results']=$this->dbm->cari_kategori($cari_kategori)->result();
				$this->load->view('nav_content/header');
				$this->load->view('kategori', $data);
				$this->load->view('nav_content/footer');
				}
	}
}