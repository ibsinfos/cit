<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tutors_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_tutors_by_id($id)
{
	$this->db->select('*');
	$this->db->from('tutors');
	$this->db->where('tutor_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_tutors($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='ASC';
	$this->db->select('*');
	$this->db->from('tutors');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('tutor_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('tutor_id', $order_type);
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
function count_tutors($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('tutors');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('tutor_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_tutors_users($data)
{	
	$insert = $this->db->insert('tbl_users',$data);
	return $this->db->insert_id();
}
function store_tutors($data)
{
	
	$insert = $this->db->insert('tutors', $data);
	return $insert;
}
function update_tutors($id, $data)
{
	$this->db->where('tutor_id', $id);
	$this->db->update('tutors', $data);
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
function delete_tutors($id)
{
	$this->db->where('tutor_id', $id);
	$this->db->delete('tutors'); 
} 
}