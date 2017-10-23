<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Course_batches_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_course_batches_by_id($id)
{
	$this->db->select('*');
	$this->db->from('course_batches');
	$this->db->where('batch_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_course_batches($search_string=null, $order=null, $order_type='DESC', $limit_start=null, $limit_end=null)
{	    
	$this->db->select('*');
	$this->db->from('course_batches');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('batch_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('batch_id','DESC');
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
function count_course_batches($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('course_batches');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('batch_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_course_batches($data)
{
	 $arr_coun=$this->input->post('course_country');
	 $arr_type=$this->input->post('course_type');
	$insert = $this->db->insert('course_batches', $data);
	$id = $this->db->insert_id();
	for($i=0;$i<count($arr_coun);$i++)
	{
		$country_id=$arr_coun[$i];
		$this->db->query("INSERT INTO `cb_coun`( `cb_coun_batchid`, `cb_coun_countryid`) VALUES ($id,$country_id)");
	}
	for($i=0;$i<count($arr_type);$i++)
	{
		$type=$arr_type[$i];
		$this->db->query("INSERT INTO `cb_type`( `cbtype_batch_id`, `cbtype_name`) VALUES ($id,'$type')");
	}
	return true;
}
function update_course_batches($id, $data)
{
	$arr_coun=$this->input->post('course_country');
	$arr_type=$this->input->post('course_type');
	$this->db->where('batch_id', $id);
	$this->db->update('course_batches', $data);
	
	$this->db->where('cb_coun_batchid', $id);
	$this->db->delete('cb_coun');
	$this->db->where('cbtype_batch_id', $id);
	$this->db->delete('cb_type');
	for($i=0;$i<count($arr_coun);$i++)
	{
		$country_id=$arr_coun[$i];
		$this->db->query("INSERT INTO `cb_coun`( `cb_coun_batchid`, `cb_coun_countryid`) VALUES ($id,$country_id)");
	}
	for($i=0;$i<count($arr_type);$i++)
	{
		$type=$arr_type[$i];
		$this->db->query("INSERT INTO `cb_type`( `cbtype_batch_id`, `cbtype_name`) VALUES ($id,'$type')");
	}
	return true;
	/*$report = array();
	$report['error'] = '';
	$report['message'] = '';
	if($report !== 0)
	{
		return true;
	}
	else{
		return false;
	}*/
}
function delete_course_batches($id)
{
	$this->db->where('batch_id', $id);
	$this->db->delete('course_batches'); 
} 
}