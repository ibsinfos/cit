<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Homefollow_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_homefollow_by_id($id)
{
	$this->db->select('*');
	$this->db->from('homefollow');
	$this->db->where('homefollow_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_homefollow($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='DESC';
	$this->db->select('*');
	$this->db->from('homefollow');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('homefollow_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('homefollow_id', $order_type);
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
function count_homefollow($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('homefollow');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('homefollow_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_homefollow($data)
{
	$insert = $this->db->insert('homefollow', $data);
	return $insert;
}
function update_homefollow($id, $data)
{
	$this->db->where('homefollow_id', $id);
	$this->db->update('homefollow', $data);
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
function delete_homefollow($id)
{
	$this->db->where('homefollow_id', $id);
	$this->db->delete('homefollow'); 
} 
}