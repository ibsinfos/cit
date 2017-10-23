<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News_model extends CI_Model
{
public function __construct()
{
    $this->load->database();
}
public function get_news_by_id($id)
{
	$this->db->select('*');
	$this->db->from('news');
	$this->db->where('news_id', $id);
	$query = $this->db->get();
	return $query->result_array(); 
}
public function get_news($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
{
	$order_type='ASC';
	$this->db->select('*');
	$this->db->from('news');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	$this->db->group_by('news_id');
	if($order){
		$this->db->order_by($order, $order_type);
	}else{
		$this->db->order_by('news_id', $order_type);
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
function count_news($search_string=null, $order=null)
{
	$this->db->select('*');
	$this->db->from('news');
	if($search_string){
		$this->db->like('page_name', $search_string);
	}
	if($order){
		$this->db->order_by($order, 'Asc');
	}else{
		$this->db->order_by('news_id', 'Asc');
	}
	$query = $this->db->get();
	return $query->num_rows();        
}
function store_news($data)
{
	$insert = $this->db->insert('news', $data);
	return $insert;
}
function update_news($id, $data)
{
	$this->db->where('news_id', $id);
	$this->db->update('news', $data);
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
function delete_news($id)
{
	$this->db->where('news_id', $id);
	$this->db->delete('news'); 
} 
}