<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Live_projects_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_live_projects_by_id($id)
{
	$this->db->select('*');
	$this->db->from('live_projects');
	$this->db->where('live_projects_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_live_projects($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='ASC';
	$this->db->select('*');
	$this->db->from('live_projects');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('live_projects_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('live_projects_id', $order_type);
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
function count_live_projects($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('live_projects');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('live_projects_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_live_projects($data)
{
	$insert = $this->db->insert('live_projects', $data);
	return $insert;
}
function update_live_projects($id, $data)
{
	$this->db->where('live_projects_id', $id);
	$this->db->update('live_projects', $data);
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
function delete_live_projects($id)
{
	$this->db->where('live_projects_id', $id);
	$this->db->delete('live_projects'); 
}
}