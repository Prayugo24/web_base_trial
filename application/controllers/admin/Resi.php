<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resi extends CI_Controller {
	
  
   public function __construct()
  {
    parent::__construct();
    //if($this->auth->is_admin_logged_in() == true) redirect(base_url('login'));
    // $this->load->library('session');
  }

	public function index()
	{
        /*if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }*/
		$data['results'] = $this->dbm->select_konf()->result();
		$this->load->view('nav_content/header');
		$this->load->view('resi', $data); 
		$this->load->view('nav_content/footer'); 
	}

 	function update_form($id_transaksi)
 	{
        /*if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }
    */
    $data['id']=$this->dbm->get_id($id_transaksi);
    $data['read'] = $this->dbm->join_3_tables_where($id_transaksi)->result();
    $data['result'] = $this->dbm->join_barang_aja($id_transaksi)->result();
    
 	$this->load->view('nav_content/header');
    $this->load->view('inpt_resi', $data); 
    $this->load->view('nav_content/footer'); 
	}

	function update()
 	{    
    $id = $this->input->post('id_transaksi'); 
    $no_resi = $this->input->post('no_resi'); 
    // echo $id;
    $this->dbm->update_resi($id,$no_resi);
    $data['read'] = $this->dbm->join_3_tables_where($id_transaksi)->result();
    $data['result'] = $this->dbm->join_barang_aja($id)->result();
    redirect('admin/resi');
	}

	function view($id_transaksi)
	{
	
	$data['id']=$this->dbm->get_id($id_transaksi);
    $data['read'] = $this->dbm->join_3_tables_where($id_transaksi)->result();
    
 	$this->load->view('nav_content/header');
    $this->load->view('inpt_resi', $data); 
    $this->load->view('nav_content/footer'); 
	}
}