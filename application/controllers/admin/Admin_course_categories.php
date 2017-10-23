<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_course_categories extends CI_Controller
{
const VIEW_FOLDER = 'admin/course_categories';
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/course_categories_model');
	$this->load->helper('form');
	if(!$this->session->userdata('is_logged_in'))
	{
		redirect('admin/login');
	}
}
public function index()
{
	$search_string = $this->input->post('search_string');        
	$order = $this->input->post('order'); 
	$order_type = $this->input->post('order_type'); 
	$config['per_page'] =10;

	$config['base_url'] = base_url().'admin/course_categories';
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] =$this->course_categories_model->count_course_categories();
	$config['full_tag_open'] = '<ul class="pagination" >';
	$config['full_tag_close'] = '</ul>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a>';
	$config['cur_tag_close'] = '</a></li>';
	$config['next_tag_open'] = '<li >';
	$config['next_link'] = ' &rarr;';
	$config['next_tag_close'] = '</li>';

	$config['prev_tag_open'] = '<li >';
	$config['prev_link'] = '&larr;';
	$config['prev_tag_close'] = '</li>';
	$page = $this->uri->segment(3);
	$limit_end = ($page * $config['per_page']) - $config['per_page'];
	if ($limit_end < 0)
	{
		$limit_end = 0;
	}
	if($order_type)
	{
		$filter_session_data['order_type'] = $order_type;
	}
	else
	{
		if($this->session->userdata('order_type'))
		{
			$order_type = $this->session->userdata('order_type');    
		}
		else
		{
			$order_type = 'Asc';    
		}
	}
	$data['order_type_selected'] = $order_type;
        if($search_string !== false && $order !== false || $this->uri->segment(3) == true)
		{
            if($search_string)
			{
                $filter_session_data['search_string_selected'] = $search_string;
            }
			else
			{
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;

            if($order){
                $filter_session_data['order'] = $order;
            }
            else{
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;
            if(isset($filter_session_data)){
              $this->session->set_userdata($filter_session_data);    
            }
            $data['count_products']= $this->course_categories_model->count_course_categories($search_string, $order);
            $config['total_rows'] = $data['count_products'];
            if($search_string)
			{
                if($order){
                    $data['course_categories'] = $this->course_categories_model->get_course_categories($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['course_categories'] = $this->course_categories_model->get_course_categories($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else
			{
                if($order)
				{
                    $data['course_categories'] = $this->course_categories_model->get_course_categories('', $order, $order_type, $config['per_page'],$limit_end);        
                }
				else
				{
                    $data['course_categories'] = $this->course_categories_model->get_course_categories('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }
		else
		{
            $filter_session_data['manufacture_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);
            $data['search_string_selected'] = '';
            $data['order'] = 'id';
            $data['count_products']= $this->course_categories_model->count_course_categories();
            $data['course_categories'] = $this->course_categories_model->get_course_categories('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }
	$this->load->library('pagination');
	$this->pagination->initialize($config);
	$data['main_content'] = 'admin/course_categories/list';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/course_categories/list', $data); 
	$this->load->view('includes/footer', $data); 

}
public function add()
{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
            $this->form_validation->set_rules('cat_name', 'Category name', 'required');			
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			if($this->form_validation->run())
            {
                $data_to_store = array(
                    'cat_name' => $this->input->post('cat_name'),);
                if($this->course_categories_model->store_course_categories($data_to_store))
				{
                    $this->session->set_flashdata('flash_message', 'added');
                }
				else
				{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/course_categories');
			}	
        }
        $data['main_content'] = 'admin/course_categories/add';
		$this->load->view('includes/header', $data);  
		$this->load->view('includes/left_sidebar', $data);
		$this->load->view('admin/course_categories/add', $data); 
		$this->load->view('includes/footer', $data);		
}
public function update()
{
	$id = $this->uri->segment(4);
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cat_name', 'Name', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		if($this->form_validation->run())
        {
			$data_to_store = array(
							'cat_name' => $this->input->post('cat_name'),);

			if($this->course_categories_model->update_course_categories($id, $data_to_store) == TRUE)
			{
				$this->session->set_flashdata('flash_message', 'updated');
			}
			else
			{
				$this->session->set_flashdata('flash_message', 'not_updated');
			}
			redirect('admin/course_categories/update/'.$id.'');
		}
	}
	$data['course_categories'] = $this->course_categories_model->get_course_categories_by_id($id);
	$data['main_content'] = 'admin/course_categories/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/course_categories/edit', $data); 
	$this->load->view('includes/footer', $data);
}
public function delete()
{ 
	$id = $this->uri->segment(4);
	$this->course_categories_model->delete_course_categories($id);
	$this->db->where('cat_id', $id);
	$query=$this->db->get('courses');
	$ddd=$query->row();
	$cou_id=$ddd->course_id;
	$this->db->where('cat_id', $id);
	$this->db->delete('courses');
     	
	$this->db->where('cb_course_id', $cou_id);
	$this->db->delete('course_batches');
	
	redirect('admin/course_categories');
}

}