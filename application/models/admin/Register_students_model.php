<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_students_model extends CI_Model
{
	
public function __construct()
{
    $this->load->database();
}
public function get_register_students_by_id($id)
{
	$this->db->select('*');
	$this->db->from('students_tbl');
	$this->db->where('std_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_register_students($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='DESC';
	$this->db->select('*');
	$this->db->from('students_tbl');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('std_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('std_id', $order_type);
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
function count_register_students($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('students_tbl');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('std_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_student_users($data)
{	
	$insert = $this->db->insert('tbl_users', $data);
	return $this->db->insert_id();
}
function store_register_students($data)
{
	
	$insert = $this->db->insert('students_tbl', $data);
	return $insert;
}
function update_register_students($id, $data)
{
	$this->db->where('std_id', $id);
	$this->db->update('students_tbl', $data);
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
function delete_register_students($id)
{
	$this->db->where('std_id', $id);
	$this->db->delete('students_tbl'); 
} 
}