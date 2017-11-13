<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	
  
   public function __construct()
  {
    parent::__construct();
    //if($this->auth->is_admin_logged_in() == true) redirect(base_url('login'));
    // $this->load->library('session');
  }

	public function index()
	{

		if ($this->session->userdata('logged_in')) {

			//$data['tb_barang'] = $this->barang_model->all();  disini oi
			$this->load->view('nav_content/header');
			$this->load->view('dashboard'); //datanya tak ilangi
			$this->load->view('nav_content/footer'); //hohoho
            
        }else {
        	# code...
        	return redirect(base_url('login'));
        }
		
	}
	
	
}