<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('dbm');
    $this->load->library('session');
    //if($this->auth->is_admin_logged_in() == true) redirect(base_url('login'));
  }
  
  function index() 
  {
    $data['is_not_grocery'] = true;
    $this->load->view('login_view', $data);
  }

  function masuk()
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data = array('email_owner' => $username,
                  'password' => md5($password)
     );
    
    $cek = $this->dbm->ambil_data($data);
    if($cek == 1) { 
      $sesi=$this->session->set_userdata('logged_in',$data);
      redirect(base_url('admin/index'));
    }else{
      redirect(base_url('login'));
    }
  }

  public function logout()
  {
      $this->session->unset_userdata('logged_in');
      $this->session->sess_destroy();
      $this->session->set_flashdata('status', 'Logged out');
      redirect(base_url('login'));
  }
}
