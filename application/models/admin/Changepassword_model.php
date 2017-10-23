<?php
class Changepassword_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_changepassword_by_id($id)
{
	$this->db->select('*');
	$this->db->from('membership');
	$this->db->where('id', $id);
	$query = $this->db->get();
	return $query->row();
}
public function get_changepassword($search_string=null, $order=null, $order_type='DESC', $limit_start=null, $limit_end=null)
{
	$order_type='DESC';
	$this->db->select('*');
	$this->db->from('membership');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('id', $order_type);
	}
	if($limit_start && $limit_end){
	  $this->db->limit($limit_start, $limit_end);
	}
	if($limit_start != null){
	  $this->db->limit($limit_start, $limit_end);
	}
	$query = $this->db->get();
	return $query->result_array();
}
function count_changepassword($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('membership');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();
}
function store_changepassword($data)
{
	$insert = $this->db->insert('membership', $data);
	return $insert;
}
function update_changepassword($id, $data)
{
	$this->db->where('id', $id);
	$this->db->update('membership', $data);
	$report = array();
	$report['error'] = '';
	$report['message'] = '';
	if($report !==0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function delete_changepassword($id)
{
	$this->db->where('id', $id);
	$this->db->delete('membership');
}
}