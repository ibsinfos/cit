<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Tutor_notifications_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_tutor_notifications_by_id($id)
{
	$this->db->select('*');
	$this->db->from('tutor_notifications');
	$this->db->where('tn_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_tutor_notifications($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='DESC';
	$this->db->select('*');
	$this->db->from('tutor_notifications');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('tn_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('tn_id', $order_type);
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
function count_tutor_notifications($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('tutor_notifications');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('tn_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_tutor_notifications($data)
{
	$insert = $this->db->insert('tutor_notifications', $data);
	return $insert;
}
function update_tutor_notifications($id, $data)
{
	$this->db->where('tn_id', $id);
	$this->db->update('tutor_notifications', $data);
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
function delete_tutor_notifications($id)
{
	$this->db->where('tn_id', $id);
	$this->db->delete('tutor_notifications'); 
}
}