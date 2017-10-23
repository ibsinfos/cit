<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_contact_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_student_contact_by_id($id)
{
	$this->db->select('*');
	$this->db->from('student_contact');
	$this->db->where('id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_student_contact($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='DESC';
	$this->db->select('*');
	$this->db->from('student_contact');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('id', $order_type);
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
function count_student_contact($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('student_contact');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_student_contact($data)
{
	$insert = $this->db->insert('student_contact', $data);
	return $insert;
}
function update_student_contact($id, $data)
{
	$this->db->where('id', $id);
	$this->db->update('student_contact', $data);
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
function delete_student_contact($id)
{
	$this->db->where('id', $id);
	$this->db->delete('student_contact'); 
}
}