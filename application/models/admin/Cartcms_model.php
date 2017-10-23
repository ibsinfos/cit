<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Cartcms_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_cartcms_by_id($id)
{
	$this->db->select('*');
	$this->db->from('cartcms');
	$this->db->where('cartcms_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_cartcms($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='ASC';
	$this->db->select('*');
	$this->db->from('cartcms');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('cartcms_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('cartcms_id', $order_type);
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
function count_cartcms($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('cartcms');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('cartcms_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_cartcms($data)
{
	$insert = $this->db->insert('cartcms', $data);
	return $insert;
}
function update_cartcms($id, $data)
{
	$this->db->where('cartcms_id', $id);
	$this->db->update('cartcms', $data);
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
function delete_cartcms($id)
{
	$this->db->where('cartcms_id', $id);
	$this->db->delete('cartcms'); 
} 
}