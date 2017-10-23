<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Courses_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_courses_by_id($id)
{
	$this->db->select('*');
	$this->db->from('courses');
	$this->db->where('course_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_courses($search_string=null, $order=null, $order_type='DESC', $limit_start=null, $limit_end=null)
{
	$this->db->select('*');
	$this->db->from('courses');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('course_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('course_id', 'DESC');
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
function count_courses($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('courses');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('course_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_courses($data)
{
	$insert = $this->db->insert('courses', $data);
	return $insert;
}
function update_courses($id, $data)
{
	$this->db->where('course_id', $id);
	$this->db->update('courses', $data);
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
function delete_courses($id)
{
	$this->db->where('course_id', $id);
	$this->db->delete('courses'); 
}
}