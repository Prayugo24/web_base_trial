<?php
/**
* 
*/
class Logout extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		unset($_SESSION['admin']);
		unset($_SESSION['anggota']);
		redirect(base_url('admin/login'));
		
	}
}