<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Group_discussion_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_group_discussion_by_id($id)
{
	$this->db->select('*');
	$this->db->from('questions');
	$this->db->where('question_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_group_discussion($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{	    
	$this->db->select('*');
	$this->db->from('questions');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('question_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('question_id','DESC');
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
function count_group_discussion($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('questions');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('question_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_group_discussion($data)
{
	$insert = $this->db->insert('questions', $data);
	return $insert;
}
function update_group_discussion($id, $data)
{
	$this->db->where('question_id', $id);
	$this->db->update('questions', $data);
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
function delete_group_discussion($id)
{
	$this->db->where('question_id', $id);
	$this->db->delete('questions');	
	$this->db->where('as_question_id', $id);
	$this->db->delete('answers'); 
} 
}