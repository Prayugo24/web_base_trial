<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Panduan extends CI_Controller
{
	public function __construct()
	{
		# code...
		parent::__construct();
		//$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->auth->restrict_admin();
	}

	public function index(){
	    $this->load->view('nav_content/header');
		$this->load->view('login_view, $data');
		$this->load->view('nav_content/footer');
	
	}

	function logout(){
	   $this->session->unset_flashdata('login');
	   session_destroy();
	   redirect('dashboard', 'refresh');
	}
		
	public function profile(){
		$this->load->view('nav_content/header');
		$this->load->view('edt_profile');
		$this->load->view('nav_content/footer');
	}

	public function edt_barang(){
		$this->load->view('nav_content/header');
		$this->load->view('edt_barang');
		$this->load->view('nav_content/footer');
	}

	public function barang(){
		$this->load->view('nav_content/header');
		$this->load->view('admin/barang');
		$this->load->view('nav_content/footer');
	}

	public function tmb_kat(){
		$this->load->view('nav_content/header');
		$this->load->view('kategori');
		$this->load->view('nav_content/footer');
	}

	public function tmb_resi(){
		$this->load->view('nav_content/header');
		$this->load->view('resi');
		$this->load->view('nav_content/footer');
	}

	public function laporan(){
		$this->load->view('nav_content/header');
		$this->load->view('laporan');
		$this->load->view('nav_content/footer');
	}

}
