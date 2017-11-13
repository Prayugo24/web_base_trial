<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
  
   public function __construct()
  	{
    parent::__construct();
    //if($this->auth->is_admin_logged_in() == true) redirect(base_url('login'));	
    // $this->load->library('session');
    }


    public function update(){
        /*if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }*/
        
   	
        $id_owner= $this->input->post('id_owner');
        $nama_toko = $this->input->post('nama_toko');
        $nama_pemilik = $this->input->post('nama_pemilik');
        //$email = $this->input->post('Email');
        $telp = $this->input->post('telp');
        $bbm = $this->input->post('bbm');
        //$line = $this->input->post('line');
        //$kota = $this->input->post('kabupaten');
        $alamt = $this->input->post('almt');
        $ket = $this->input->post('ket');
        $rekening = $this->input->post('rekening');        
       
        $data=array(
                'id_owner'=>$id_owner, 
                'nama_toko'=>$nama_toko,
                'nama_owner'=>$nama_pemilik,
                //'email_owner'=>$email,
                'bbm'=>$bbm,
                
                //'line'=>$line,
                'telp_owner'=>$telp,
                //'asal_kota'=>$kota,
                'alamat_owner'=>$alamt,
                'keterangan'=>$ket, 
                'rekening'=>$rekening
                );
	
        	$where = array('id_owner' => $id_owner);
        	$this->dbm->update_data($where, $data,'tb_owner');        
        	redirect('admin/Profile/daftar');
      
        
    }
    
        public function update_password(){
        /*if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }*/
        
   	//$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
   	//$this->form_validation->set_rules('passkonf', 'Password confirmation', 'trim|required|matches[password]');
   
   	$post = $this->input->post(NULL, TRUE);
        $hashed = md5($post['password']);
        //unset($post['passkonf']);     
        $id_owner= $this->input->post('id_owner');
             
        //$passkonf = $this->input->post('passkonf');
        $password = $this->input->post('password');
        $data=array(
                'id_owner'=>$id_owner,                 
                'password' => md5($password),
                //'bbm'=>$bbm,
                //'role'          => $this->roles[0]
               
                );
	
        	$where = array('id_owner' => $id_owner);
        	$this->dbm->update_data($where, $data,'tb_owner');        
        	redirect('login/logout');
    }


    public function view($id_owner) 
        {/*
        if ( ! $this->session->userdata('logged_in')) {
            return redirect(base_url('login'));
        }*/
        //$data['results'] = $this->dbm->select('tb_owner')->result();

        $data['id_owner']=$this->dbm->getidowner($id_owner);
        $data['results'] = $this->dbm->select_owner('tb_owner', '*', $id_owner)->result();
        $data['kabupaten'] = $this->dbm->select('domesticcities')->result();

        $this->load->view('nav_content/header');
        $this->load->view('edt_profile', $data); 
        $this->load->view('nav_content/footer'); 
    }

    function hapus($id_owner){
      $where = array('id_owner'=> $id_owner);
      $this->dbm->hapus_data($where,'tb_owner');
      redirect('admin/profile/daftar');

    }

    public function daftar() 
    {

        $data['results'] = $this->dbm->select('tb_owner')->result();
        $data['kabupaten'] = $this->dbm->select('domesticcities')->result();

        $this->load->view('nav_content/header');
        $this->load->view('daftar_profile', $data); 
        $this->load->view('nav_content/footer'); 
    }

}
	
