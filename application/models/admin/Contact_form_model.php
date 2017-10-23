<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class contact_form_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_contact_form_by_id($id)
{
	$this->db->select('*');
	$this->db->from('contact_form');
	$this->db->where('cf_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_contact_form($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='DESC';
	$this->db->select('*');
	$this->db->from('contact_form');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('cf_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('cf_id', $order_type);
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
function count_contact_form($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('contact_form');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('cf_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_contact_form($data)
{
	$insert = $this->db->insert('contact_form', $data);
	return $insert;
}
function update_contact_form($id, $data)
{
	$this->db->where('cf_id', $id);
	$this->db->update('contact_form', $data);
	$report = array();
	$report['error'] = '';
	$report['message'] = '';
	if($report !== 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function delete_contact_form($id)
{
	$this->db->where('cf_id', $id);
	$this->db->delete('contact_form'); 
}
}