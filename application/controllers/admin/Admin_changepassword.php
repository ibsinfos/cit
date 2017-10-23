<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_changepassword extends CI_Controller
{
const VIEW_FOLDER = 'admin/changepassword';
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/changepassword_model');
	$this->load->helper('form');
	if(!$this->session->userdata('is_logged_in'))
	{
		redirect('admin/login');
	}
}
function __encrip_password($password)
{
	return md5($password);
}
public function index()
{
	$search_string = $this->input->post('search_string');        
	$order = $this->input->post('order'); 
	$order_type = $this->input->post('order_type'); 
	$config['per_page'] = 5;

	$config['base_url'] = base_url().'admin/changepassword';
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
            $data['count_products']= $this->changepassword_model->count_changepassword($search_string, $order);
            $config['total_rows'] = $data['count_products'];
            if($search_string)
			{
                if($order){
                    $data['changepassword'] = $this->changepassword_model->get_changepassword($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['changepassword'] = $this->changepassword_model->get_changepassword($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else
			{
                if($order)
				{
                    $data['changepassword'] = $this->changepassword_model->get_changepassword('', $order, $order_type, $config['per_page'],$limit_end);        
                }
				else
				{
                    $data['changepassword'] = $this->changepassword_model->get_changepassword('', '', $order_type, $config['per_page'],$limit_end);        
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
            $data['count_products']= $this->changepassword_model->count_changepassword();
            $data['changepassword'] = $this->changepassword_model->get_changepassword('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }
	$this->load->library('pagination');
	$this->pagination->initialize($config);
	$data['main_content'] = 'admin/changepassword/list';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/changepassword/list', $data); 
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
                if($this->changepassword_model->store_changepassword($data_to_store))
				{
                    $this->session->set_flashdata('flash_message', 'added');
                }
				else
				{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/changepassword');
			}	
        }
        $data['main_content'] = 'admin/changepassword/add';
		$this->load->view('includes/header', $data);  
		$this->load->view('includes/left_sidebar', $data);
		$this->load->view('admin/changepassword/add', $data); 
		$this->load->view('includes/footer', $data);		
}
public function update()
{
	$id = $this->uri->segment(4);
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('current_pwd', 'Current Password', 'required');
		$this->form_validation->set_rules('new_pwd', 'New Password', 'required');
		$this->form_validation->set_rules('new_cpwd', 'Re-enter New Password', 'required|matches[new_pwd]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		if($this->form_validation->run())
        {
			$current_pwd=$this->input->post('current_pwd');
			$new_pwd=$this->input->post('new_pwd');			
			$res=$this->changepassword_model->get_changepassword_by_id($id);
			if($res->pass_word==md5($current_pwd))
			{	
				$data_to_store = array('pass_word' =>$this->__encrip_password($this->input->post('new_pwd')),);
				if($this->changepassword_model->update_changepassword($id, $data_to_store) == TRUE)
				{
					$this->session->set_flashdata('flash_message', 'updated');
				}
				else
				{
					$this->session->set_flashdata('flash_message', 'updated');
				}				
			}
			else
			{
				$this->session->set_flashdata('current_pwd_error', 'Please enter Correct Current Password');				
			}
			
			redirect('admin/changepassword/update/'.$id.'');
		}
	}
	$data['changepassword'] = $this->changepassword_model->get_changepassword_by_id($id);
	$data['main_content'] = 'admin/changepassword/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/changepassword/edit', $data); 
	$this->load->view('includes/footer', $data);
}
public function delete()
{ 
	$id = $this->uri->segment(4);
	$this->changepassword_model->delete_changepassword($id);
	redirect('admin/changepassword');
}

}