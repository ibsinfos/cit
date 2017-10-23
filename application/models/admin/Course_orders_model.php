<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Course_orders_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_course_orders_by_id($id)
{
	$this->db->select('*');
	$this->db->from('course_orders');
	$this->db->where('co_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_course_orders($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='DESC';
	$this->db->select('*');
	$this->db->from('course_orders');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('co_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('co_id', $order_type);
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
function count_course_orders($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('course_orders');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('co_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}

function store_course_orders($data)
{
	
	$insert = $this->db->insert('course_orders', $data);
	return $insert;
}
function update_course_orders($id, $data)
{
	$this->db->where('co_id', $id);
	$this->db->update('course_orders', $data);
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
function delete_course_orders($id)
{
	$this->db->where('co_id', $id);
	$this->db->delete('course_orders'); 
} 
}