<?php

class Dbm extends CI_Model
{
	function general_select($table, $column = NULL, $where = NULL, $where_value = NULL, $order_column = NULL, $order_sort = NULL, $limit = NULL)
	{
		if ($column != NULL) {
			$this->db->select($column);
		} else {
			$this->db->select('*');
		}
		
		if ($where != NULL && $where_value != NULL) {
		$this->db->where($where, $where_value);
		}
		
		if ($order_column != NULL && $order_sort != NULL) {
		$this->db->order_by($order_column, $order_sort);
		}
		
		if ($limit != NULL) {
		$this->db->limit($limit);
		}

		$this->db->from($table);
		$query = $this->db->get();
		
		return $query;
	}

	public function login_admin($data)
	{
		$this->db->select('*');
		$this->db->from('tb_owner');
		$this->db->where('email_owner', $data['username']);
		$this->db->where('password', md5($data['password']));
		$query = $this->db->get();
		return $query->num_rows();
		
	}

	function ambil_data($data)
	{ 
		$user = $this->db->get_where('tb_owner',$data); 
	 	return $user->num_rows();
	}

	function select($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		
		return $query;
	}

function get_byimage($id) 
 	{
        $this->db->from('tb_barang');
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }


	function select_where_barang($table, $column, $where_value)
	{
		$this->db->select($column);
		$this->db->where('id', $where_value);
		$this->db->from($table);
		$query = $this->db->get();
		
		return $query;
	}


	// Select single data
	function select_where($table, $column, $where, $where_value)
	{
		$this->db->select($column);
		$this->db->where($where, $where_value);
		$this->db->from($table);
		$query = $this->db->get();
		
		return $query;
	}

		function select_owner($table, $column, $where_value)
	{
		$this->db->select($column);
		$this->db->where('id_owner', $where_value);
		$this->db->from($table);
		$query = $this->db->get();
		
		return $query;
	}

	// Select single data
	function select_where_2($table, $column, $where, $where_value, $where2, $where_value2)
	{
		$this->db->select($column);
		$this->db->where($where, $where_value);
		$this->db->where($where2, $where_value2);
		$this->db->from($table);
		$query = $this->db->get();
		
		return $query;
	}

	function select_sum_where($table, $column_sum, $where, $where_value)
	{
		$this->db->select_sum($column_sum);
		$this->db->where($where, $where_value);
		$query = $this->db->get($table);
		return $query;
	}

	function select_order_by($table, $order_column, $order_sort)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($order_column, $order_sort);
		$query = $this->db->get();
		
		return $query;
	}

	// // Select count of data in table
	// function num_rows($table, $column, $where, $where_value)
	// {
	// 	$this->db->select($column);
	// 	$this->db->where($where, $where_value);
	// 	$this->db->from($table);
	// 	$query = $this->db->get();
		
	// 	return $query->num_rows();
	// }
	// // Select count of data in 2 table
	// function num_rows2($table, $column, $where, $where_value, $where2, $where_value2)
	// {
	// 	$this->db->select($column);
	// 	$this->db->where($where, $where_value);
	// 	$this->db->where($where2, $where_value2);
	// 	$this->db->from($table);
	// 	$query = $this->db->get();
		
	// 	return $query->num_rows();
	// }
	function select_barang($id)
	{
		$data['res']=$this->db->query("SELECT * FROM tb_barang a, tb_category b WHERE a.id_category=b.id_category");
		return $data;
	}

 
    function update_resi($id_transaksi, $no_resi) {

        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->update('tb_transaksi', array('no_resi' => $no_resi ));
    }

    function update_barang($id, $data) {

        $this->db->where('id', $id);
        return $this->db->update('tb_barang', $data);
    }
   	function getid($id) 
   	{
        return $this->db->get_where('tb_barang', array('id' => $id))->row();
    }
    
	function getidowner($id_owner) 
   	{
        return $this->db->get_where('tb_owner', array('id_owner' => $id_owner))->row();
    }

    function get_id($id_transaksi) {
        return $this->db->get_where('tb_transaksi', array('id_transaksi' => $id_transaksi))->row();
    }



	function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function update($table, $id, $data)
	{
		$this->db->where('id_owner', $id);
		$this->db->update($table, $data);
	}


	function updatenya($table, $id, $data)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update($table, $data);
	}

	function update_column($table, $where, $where_value, $data)
	{
		$this->db->where($where, $where_value);
		$this->db->update($table, $data);
	}

	// function login_admin($username, $password)
	// {
	// 	$this->db->select('*');
	// 	$this->db->where('username', $username);
	// 	$this->db->where('password', $password);
	// 	$query = $this->db->get('user');

	// 	if($query->num_rows() == 0)
	// 	{
	// 		return false;
	// 	}
	// 	else
	// 	{
	// 		return true;
	// 	}
	// }

	function get_admin_session($username, $password)
	{
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		$admin_data = $query->row();
		return $admin_data;
	}

	function join_2($first_table, $second_table, $select, $col_first, $col_second)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
		$query = $this->db->get();
		return $query;
	}

	function join_order_by($first_table, $second_table, $select, $col_first, $col_second, $order_column, $order_by)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
		$this->db->order_by($order_column, $order_sort);
		$query = $this->db->get();
		return $query;
	}

	function join_where($first_table, $second_table, $select, $col_first, $col_second, $where, $where_value)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
        $this->db->where($where, $where_value); 
		$query = $this->db->get();
		return $query;
	}

	function join_where2($first_table, $second_table, $select, $col_first, $col_second, $where, $where_value, $where2, $where_value2)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
        $this->db->where($where, $where_value); 
        $this->db->where($where2, $where_value2); 
		$query = $this->db->get();
		return $query;
	}

	function join_where23($first_table, $second_table, $select, $col_first, $col_second, $where, $where_value, $where2, $where_value2, $where3, $where_value3)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
        $this->db->where($where, $where_value); 
        $this->db->where($where2, $where_value2); 
        $this->db->where($where3, $where_value3); 
		$query = $this->db->get();
		return $query;
	}

	function join_where_limit($first_table, $second_table, $select, $col_first, $col_second, $where, $where_value, $limit)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
        $this->db->where($where, $where_value); 
		$this->db->limit($limit);
		$query = $this->db->get();
		return $query;
	}

	function join_where_limit_order_by($first_table, $second_table, $select, $col_first, $col_second, $where, $where_value, $limit, $order_column, $order_sort)
	{
		$this->db->select($select);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
        $this->db->where($where, $where_value); 
		$this->db->limit($limit);
		$this->db->order_by($order_column, $order_sort);
		$query = $this->db->get();
		return $query;
	}

	function join_3_tables_where($id_transaksi)
	{
		$this->db->select('*');
    	$this->db->from('tb_konfirmasi');     	
    	$this->db->join('tb_transaksi', 'tb_konfirmasi.id_transaksi = tb_transaksi.id_transaksi');
    	$this->db->join('tb_det_transaksi', 'tb_transaksi.id_transaksi = tb_det_transaksi.id_transaksi');
        $this->db->where('tb_transaksi.id_transaksi', $id_transaksi); 
        $query = $this->db->get();
        return $query;
	}
    	function join_3_tables($tgl_transaksi)
	{
		$this->db->select('*');
    	$this->db->from('tb_konfirmasi');     	
    	$this->db->join('tb_transaksi', 'tb_konfirmasi.id_transaksi = tb_transaksi.id_transaksi');
    	$this->db->join('tb_det_transaksi', 'tb_transaksi.id_transaksi = tb_det_transaksi.id_transaksi');
    	$this->db->join('tb_barang', 'tb_det_transaksi.id = tb_barang.id'); 
        $this->db->where('tb_transaksi.tgl_transaksi', $tgl_transaksi); 
        $query = $this->db->get();
        return $query;
	}

	function free_join_3_tables_where($select ,$first_table, $second_table, $third_table, $col_first, $col_second, $col_third, $where, $where_value)
	{
		$this->db->select($select);
        $this->db->from($first_table); 
        $this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first, 'left');
        $this->db->join($third_table, $third_table.'.'.$col_third .'='. $second_table.'.'.$col_third, 'left');
        $this->db->where($where, $where_value);      
        $query = $this->db->get();
        return$query;
	}

	function select_limit($table, $limit)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($limit);
		$query = $this->db->get();
		
		return $query;
	}

	function select_limit_order_by($table, $limit, $order_column, $order_by)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->limit($limit);
		$this->db->order_by($order_column, $order_by);
		$query = $this->db->get();
		
		return $query;
	}

	function select_limit_order_by_where($table, $limit, $order_column, $order_by, $where, $where_value)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where, $where_value);
		$this->db->limit($limit);
		$this->db->order_by($order_column, $order_by);
		$query = $this->db->get();
		
		return $query;
	}

	function get_pagination($table, $column, $where, $where_value, $order_column, $order_sort, $limit_start, $limit_stop)
    {
    	$this->db->select($column);
		$this->db->from($table);
		if($where!=NULL || $where_value!=NULL)
		{
			$this->db->where($where, $where_value);
		}
		$this->db->order_by($order_column, $order_sort);
		$this->db->limit($limit_start, $limit_stop);
		$query = $this->db->get();
		
		return $query;
    }

	function get_pagination_join($first_table, $second_table, $column, $col_first, $col_second, $where, $where_value, $order_column, $order_sort, $limit_start, $limit_stop)
    {
    	$this->db->select($column);
		$this->db->from($first_table);
		$this->db->join($second_table, $second_table.'.'.$col_second .'='. $first_table.'.'.$col_first);
		if($where!=NULL || $where_value!=NULL)
		{
			$this->db->where($where, $where_value);
		}
		$this->db->order_by($order_column, $order_sort);
		$this->db->limit($limit_start, $limit_stop);
		$query = $this->db->get();
		
		return $query;
    }
//-----admin-----------
    function input_data($data,$table){
		$this->db->insert($table,$data);
	}
//--------------------
	function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function insert_last_id($table, $data)
	{
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function delete($table, $where, $where_value)
	{
		$this->db->where($where, $where_value);
		$this->db->delete($table);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function buat_kode_cat()
	{
		$this->db->select('RIGHT(tb_category.id_category,4) as kode', FALSE);
		$this->db->order_by('id_category','DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_category');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
			}
				else
			{
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "IC".$kodemax;
		return $kodejadi;
	}

	function buat_kode_barang()
	{
		$this->db->select('RIGHT(tb_barang.id,4) as kode', FALSE);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_barang');
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode) + 1;
			}
				else
			{
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "IB".$kodemax;
		return $kodejadi;
	}
	
	function remove_checked_kategori() 
	{
		// $action = $this->input->post('action');
		// if ($action == "delete") {
			$delete = $this->input->post('msg');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id_category', $delete[$i]);
				$this->db->delete('tb_category');
			// }
		}
	}

	function cari_barang($id)
	{
		$results=$this->db->query("SELECT * FROM tb_barang WHERE id = '%$id%' OR name LIKE '%$id%' OR stok LIKE '%$id%';");
		return $results;
	}

	function cari_kategori($id_category)
	{
		$results=$this->db->query("SELECT * FROM tb_category WHERE id_category = '%$id_category%' OR category LIKE '%$id_category%';");
		return $results;
	}
    
    function cari_laporan($tgl_transaksi1,$tgl_transaksi2)
	{
		              
		$results=$this->db->query("SELECT *, ((harga_barang-(harga_barang*diskon/100))*qty) as harbar FROM tb_konfirmasi a, tb_transaksi b, tb_det_transaksi c, tb_barang d where a.id_transaksi=b.id_transaksi and b.id_transaksi=c.id_transaksi and c.id=d.id and tgl_transaksi between '$tgl_transaksi1' and '$tgl_transaksi2';");
		return $results;
	}

    function jumlah_laporan($tgl_transaksi1,$tgl_transaksi2)
	{
		              
		$results=$this->db->query("SELECT sum((harga_barang-(harga_barang*diskon/100))*qty) as jumlah, avg((harga_barang-(harga_barang*diskon/100))*qty) as rata FROM tb_konfirmasi a, tb_transaksi b, tb_det_transaksi c, tb_barang d where a.id_transaksi=b.id_transaksi and b.id_transaksi=c.id_transaksi and c.id=d.id and tgl_transaksi between '$tgl_transaksi1' and '$tgl_transaksi2'");
		return $results;
	}


	function join_barang_aja($id_transaksi)
	{
		$results=$this->db->query("SELECT * FROM tb_konfirmasi a, tb_transaksi b, tb_det_transaksi c, tb_barang d where a.id_transaksi=b.id_transaksi and b.id_transaksi=c.id_transaksi and c.id=d.id and a.id_transaksi='$id_transaksi' ");
		return $results;
	}


	public function insert_media($data)
    {
        $this->db->insert('tb_barang', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    
   public function rekap()
    {
        $results=$this->db->query("SELECT SUM(total) as total, monthname(tgl_transaksi) as bulan FROM tb_transaksi GROUP BY MONTH(tgl_transaksi)");
        return $results;
    }

	public function select_konf()
    {
        $query=$this->db->query("SELECT * FROM tb_transaksi a, tb_konfirmasi b where a.id_transaksi=b.id_transaksi");
        return $query;
    }

    
	public function send_notif()
    {
        $query=$this->db->query("select fcm_id as token From tb_member where fcm_id is not null");
       

	//$this->db->select('fcm_id');
	//$this->db->from('tb_member');
	//$query = $this->db->get();
	return $query->result_array();
    }
	
}

?>