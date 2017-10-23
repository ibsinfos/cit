<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Content_pages_model extends CI_Model
{
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }
    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_content_pages_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('content_pages');
		$this->db->where('p_id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    /**
    * Fetch content_pages data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_content_pages($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {	    
		$this->db->select('*');
		$this->db->from('content_pages');

		if($search_string){
			$this->db->like('page_name', $search_string);
		}
		$this->db->group_by('p_id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('p_id', $order_type);
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

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_content_pages($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('content_pages');
		if($search_string){
			$this->db->like('page_name', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('p_id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }
    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_content_pages($data)
    {
		$insert = $this->db->insert('content_pages', $data);
	    return $insert;
	}
    /**
    * Update manufacture
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_content_pages($id, $data)
    {
		$this->db->where('p_id', $id);
		$this->db->update('content_pages', $data);
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
    /**
    * Delete manufacturer
    * @param int $id - manufacture id
    * @return boolean
    */
	function delete_content_pages($id)
	{
		$this->db->where('p_id', $id);
		$this->db->delete('content_pages'); 
	}
}