<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class student_videos_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_student_videos_by_id($id)
{
	$this->db->select('*');
	$this->db->from('student_videos');
	$this->db->where('sv_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_student_videos($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{	    
	$this->db->select('*');
	$this->db->from('student_videos');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('sv_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('sv_id', $order_type);
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
function count_student_videos($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('student_videos');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('sv_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_student_videos($data)
{
	$insert = $this->db->insert('student_videos', $data);
	return $insert;
}
function update_student_videos($id, $data)
{
	$this->db->where('sv_id', $id);
	$this->db->update('student_videos', $data);
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
function delete_student_videos($id)
{
	$this->db->where('sv_id', $id);
	$this->db->delete('student_videos'); 
}
function get_course_batches($course_id)
{		
	$sql=$this->db->query("SELECT batch_id,cb_batchname FROM course_batches WHERE cb_course_id='".$course_id."'");
	return $sql->result();
}

}