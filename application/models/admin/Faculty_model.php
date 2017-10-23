<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faculty_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_faculty_by_id($id)
{
	$this->db->select('*');
	$this->db->from('faculty');
	$this->db->where('faculty_id', $id);
	$query = $this->db->get();
	return $query->result_array();
}
public function get_faculty($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='ASC';
	$this->db->select('*');
	$this->db->from('faculty');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('faculty_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('faculty_id', $order_type);
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
function count_faculty($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('faculty');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('faculty_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_faculty($data)
{
	$insert = $this->db->insert('faculty', $data);
	return $insert;
}
function update_faculty($id, $data)
{
	$this->db->where('faculty_id', $id);
	$this->db->update('faculty', $data);
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
function delete_faculty($id)
{
	$this->db->where('faculty_id', $id);
	$this->db->delete('faculty'); 
}
}