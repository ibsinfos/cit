<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Newsletters_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_newsletters_by_id($id)
{
	$this->db->select('*');
	$this->db->from('newsletters');
	$this->db->where('nl_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_newsletters($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='DESC';
	$this->db->select('*');
	$this->db->from('newsletters');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('nl_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('nl_id', $order_type);
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
function count_newsletters($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('newsletters');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('nl_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_newsletters($data)
{
	$insert = $this->db->insert('newsletters', $data);
	return $insert;
}
function update_newsletters($id, $data)
{
	$this->db->where('nl_id', $id);
	$this->db->update('newsletters', $data);
	$report = array();
	$report['error'] = '';
	$report['message'] = '';
	if($report !== 0)
	{
		return true;
	}
	else{
		return false;
	}
}
function delete_newsletters($id)
{
	$this->db->where('nl_id', $id);
	$this->db->delete('newsletters'); 
}
}