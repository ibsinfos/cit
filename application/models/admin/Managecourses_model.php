<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Managecourses_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_managecourses_by_id($id)
{
	$this->db->select('*');
	$this->db->from('course_orders');
	$this->db->where('co_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_managecourses($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null,$std_id)
{	    
	$this->db->select('*');
	$this->db->from('course_orders');
	$this->db->where('std_user_id', $std_id);
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
function count_managecourses($search_string=null, $order=null,$std_id)
{
	$this->db->select('*');
	$this->db->from('course_orders');
	$this->db->where('std_user_id', $std_id);
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
function store_managecourses($data)
{
	$insert = $this->db->insert('course_orders', $data);
	return $insert;
}
function update_managecourses($id, $data)
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
function update_managecourses1($id, $data)
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

function delete_managecourses($id)
{
	$this->db->where('co_id', $id);
	$this->db->delete('course_orders'); 
}
function get_course_batches($course_id,$ctype,$cid)
{
	
	$sql=$this->db->query("SELECT course_batches.batch_id,course_batches.cb_batchname FROM course_batches,cb_type,cb_coun WHERE
	course_batches.batch_id=cb_type.cbtype_batch_id AND
	course_batches.batch_id=cb_coun.cb_coun_batchid AND
	course_batches.cb_course_id='".$course_id."' AND cb_type.cbtype_name='".$ctype."' AND cb_coun.cb_coun_countryid='$cid'
	GROUP BY course_batches.batch_id
	");
	return $sql->result();
}
function get_course_batches1($b_id)
{	
	$sql=$this->db->query("SELECT cb_price,cb_end_date FROM course_batches WHERE batch_id='$b_id'");
	return $sql->row();
}

}