<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Question_answer_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_question_answer_by_id($id)
{
	$this->db->select('*');
	$this->db->from('answers');
	$this->db->where('as_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_question_answer($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null,$qs_id)
{	    
	$this->db->select('*');
	$this->db->from('answers');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('as_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('as_id', $order_type);
	}
	if($limit_start && $limit_end){
	  $this->db->limit($limit_start, $limit_end);	
	}
	if($limit_start != null){
	  $this->db->limit($limit_start, $limit_end);    
	}
	$this->db->where('as_question_id', $qs_id);
	$query = $this->db->get();
	return $query->result_array();	
}
function count_question_answer($search_string=null, $order=null,$qs_id)
{
	$this->db->select('*');
	$this->db->from('answers');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('as_id', 'Asc');
	}
	$this->db->where('as_question_id', $qs_id);
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_question_answer($data)
{
	$insert = $this->db->insert('answers', $data);
	return $insert;
}
function update_question_answer($id, $data)
{
	$this->db->where('as_id', $id);
	$this->db->update('answers', $data);
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
function delete_question_answer($id)
{
	$this->db->where('as_id', $id);
	$this->db->delete('answers');
}
 
}