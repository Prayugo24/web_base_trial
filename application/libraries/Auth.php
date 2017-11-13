<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth
{
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function login_admin($username, $password)
	{
		$this->ci->db->select('*');
		$this->ci->db->where('email_owner', $username);
		$this->ci->db->where('password', md5($password));
		$query = $this->ci->db->get('tb_owner');

		if($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			$user_data = $query->row();
			$_SESSION['admin'] = $user_data->email_owner;
			redirect(base_url('admin/index'));
			return true;
		}
		
	}

	function is_admin_logged_in()
	{
		if(isset($_SESSION['admin']) )
		{
			return true;
		}
		else
		{

			return false;
		}

	}

	/*function restrict_admin()
	{
		if( $this->is_admin_logged_in() == false )
		{
			redirect('login');
		}
		else
		{

			return true;
		}
	}

	function restrict_admin_module($id_modul = null)
	{
		if( $id_modul != null && $this->restrict_admin() == true )
		{
			$this->ci->db->select('*');
			$this->ci->db->where('id_modul', $id_modul);
			$query = $this->ci->db->get('modul');
			$row = $query->row();
			$hak_akses = $row->hak_akses;
			$hak_akses = explode(',', $hak_akses);
			if (isset($hak_akses[1])) 
			{
				return true;
			}
			else
			{
				if ($hak_akses[0] == $_SESSION['hak_akses']) 
				{
					return true;
				}
				else
				{
					redirect(base_url('admin/page_not_found'));
				}
			}
		}
	}

	function restrict_admin_module_menu($id_modul = null)
	{
		//sementara return true
		return true;
	}*/

}