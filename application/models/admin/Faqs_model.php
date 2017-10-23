<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faqs_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_faqs_by_id($id)
{
	$this->db->select('*');
	$this->db->from('faqs');
	$this->db->where('faq_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_faqs($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='ASC';
	$this->db->select('*');
	$this->db->from('faqs');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('faq_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('faq_id', $order_type);
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
function count_faqs($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('faqs');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('faq_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_faqs($data)
{
	$insert = $this->db->insert('faqs', $data);
	return $insert;
}
function update_faqs($id, $data)
{
	$this->db->where('faq_id', $id);
	$this->db->update('faqs', $data);
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
function delete_faqs($id)
{
	$this->db->where('faq_id', $id);
	$this->db->delete('faqs'); 
} 
}