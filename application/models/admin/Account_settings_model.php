<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_settings_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_account_settings_by_id($id)
{
	$this->db->select('*');
	$this->db->from('account_settings');
	$this->db->where('ac_id', $id);
	$query = $this->db->get();
	return $query->result_array();
}
public function get_account_settings($search_string=null, $order=null, $order_type='DESC', $limit_start=null, $limit_end=null)
{
	$order_type='DESC';
	$this->db->select('*');
	$this->db->from('account_settings');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('ac_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('ac_id', $order_type);
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
function count_account_settings($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('account_settings');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('ac_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();
}
function store_account_settings($data)
{
	$insert = $this->db->insert('account_settings', $data);
	return $insert;
}
function update_account_settings($id, $data)
{
	$this->db->where('ac_id', $id);
	$this->db->update('account_settings', $data);
	$report = array();
	$report['error'] = '';
	$report['message'] = '';
	if($report !==0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function delete_account_settings($id)
{
	$this->db->where('ac_id', $id);
	$this->db->delete('account_settings');
}
}