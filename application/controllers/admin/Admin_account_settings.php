<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_account_settings extends CI_Controller
{
const VIEW_FOLDER = 'admin/account_settings';
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/account_settings_model');
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
	$config['per_page'] = 5;

	$config['base_url'] = base_url().'admin/account_settings';
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] = 20;
	$config['full_tag_open'] = '<ul class="pagination" >';
	$config['full_tag_close'] = '</ul>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a>';
	$config['cur_tag_close'] = '</a></li>';
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
            $data['count_products']= $this->account_settings_model->count_account_settings($search_string, $order);
            $config['total_rows'] = $data['count_products'];
            if($search_string)
			{
                if($order){
                    $data['account_settings'] = $this->account_settings_model->get_account_settings($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['account_settings'] = $this->account_settings_model->get_account_settings($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else
			{
                if($order)
				{
                    $data['account_settings'] = $this->account_settings_model->get_account_settings('', $order, $order_type, $config['per_page'],$limit_end);        
                }
				else
				{
                    $data['account_settings'] = $this->account_settings_model->get_account_settings('', '', $order_type, $config['per_page'],$limit_end);        
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
            $data['count_products']= $this->account_settings_model->count_account_settings();
            $data['account_settings'] = $this->account_settings_model->get_account_settings('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }
	$this->load->library('pagination');
	$this->pagination->initialize($config);
	$data['main_content'] = 'admin/account_settings/list';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/account_settings/list', $data); 
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
                if($this->account_settings_model->store_account_settings($data_to_store))
				{
                    $this->session->set_flashdata('flash_message', 'added');
                }
				else
				{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/account_settings');
			}	
        }
        $data['main_content'] = 'admin/account_settings/add';
		$this->load->view('includes/header', $data);  
		$this->load->view('includes/left_sidebar', $data);
		$this->load->view('admin/account_settings/add', $data); 
		$this->load->view('includes/footer', $data);		
}
public function update()
{
	$id = $this->uri->segment(4);
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		if($this->form_validation->run())
        {
			$data_to_store = array(
							'title' => $this->input->post('title'),
							'email' => $this->input->post('email'),
							'mobile' => $this->input->post('mobile'),
							'facebook' => $this->input->post('facebook'),
							'twitter' => $this->input->post('twitter'),
							'linkedin' => $this->input->post('linkedin'),
							'youtube' => $this->input->post('youtube'),
							'google' => $this->input->post('google'),
							'faculty' => $this->input->post('faculty'),
							'news' => $this->input->post('news'),
							'gallery' => $this->input->post('gallery')
							);

			if($this->account_settings_model->update_account_settings($id, $data_to_store) == TRUE)
			{
				$this->session->set_flashdata('flash_message', 'updated');
			}
			else
			{
				$this->session->set_flashdata('flash_message', 'not_updated');
			}
			redirect('admin/account_settings/update/'.$id.'');
		}
	}
	$data['account_settings'] = $this->account_settings_model->get_account_settings_by_id($id);
	$data['main_content'] = 'admin/account_settings/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/account_settings/edit', $data); 
	$this->load->view('includes/footer', $data);
}
public function delete()
{ 
	$id = $this->uri->segment(4);
	$this->account_settings_model->delete_account_settings($id);
	redirect('admin/account_settings');
}

}