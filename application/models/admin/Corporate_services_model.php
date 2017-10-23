<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Corporate_services_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_corporate_services_by_id($id)
{
	$this->db->select('*');
	$this->db->from('corporate_services');
	$this->db->where('corporate_services_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_corporate_services($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='ASC';
	$this->db->select('*');
	$this->db->from('corporate_services');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('corporate_services_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('corporate_services_id', $order_type);
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
function count_corporate_services($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('corporate_services');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('corporate_services_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_corporate_services($data)
{
	$insert = $this->db->insert('corporate_services', $data);
	return $insert;
}
function update_corporate_services($id, $data)
{
	$this->db->where('corporate_services_id', $id);
	$this->db->update('corporate_services', $data);
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
function delete_corporate_services($id)
{
	$this->db->where('corporate_services_id', $id);
	$this->db->delete('corporate_services'); 
}
}