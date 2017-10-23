<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_notifications1_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_student_notifications1_by_id($id)
{
	$this->db->select('*');
	$this->db->from('student_notifications1');
	$this->db->where('sg_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_student_notifications1($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='DESC';
	$this->db->select('*');
	$this->db->from('student_notifications1');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('sg_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('sg_id', $order_type);
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
function count_student_notifications1($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('student_notifications1');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('sg_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_student_notifications1($data)
{
	$insert = $this->db->insert('student_notifications1', $data);
	return $insert;
}
function update_student_notifications1($id, $data)
{
	$this->db->where('sg_id', $id);
	$this->db->update('student_notifications1', $data);
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
function delete_student_notifications1($id)
{
	$this->db->where('sg_id', $id);
	$this->db->delete('student_notifications1'); 
}
function get_course_batches($course_id)
{		
	$sql=$this->db->query("SELECT batch_id,cb_batchname FROM course_batches WHERE cb_course_id='".$course_id."'");
	return $sql->result();
}
function get_course_batche_std($batch_id)
{
	$sql=$this->db->query("SELECT
	students_tbl.user_id,students_tbl.std_email,students_tbl.std_username
	FROM course_orders,students_tbl WHERE

	course_orders.std_user_id=students_tbl.user_id
	AND
	course_orders.co_course_id='".$batch_id."'
	AND
	course_orders.co_payment_status='success'");
	return $sql->result();
}

}