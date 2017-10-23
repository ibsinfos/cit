<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_countries extends CI_Controller
{
const VIEW_FOLDER = 'admin/countries';
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/countries_model');
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

	$config['base_url'] = base_url().'admin/countries';
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] = 20;
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
            $data['count_products']= $this->countries_model->count_countries($search_string, $order);
            $config['total_rows'] = $data['count_products'];
            if($search_string)
			{
                if($order){
                    $data['countries'] = $this->countries_model->get_countries($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['countries'] = $this->countries_model->get_countries($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else
			{
                if($order)
				{
                    $data['countries'] = $this->countries_model->get_countries('', $order, $order_type, $config['per_page'],$limit_end);        
                }
				else
				{
                    $data['countries'] = $this->countries_model->get_countries('', '', $order_type, $config['per_page'],$limit_end);        
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
            $data['count_products']= $this->countries_model->count_countries();
            $data['countries'] = $this->countries_model->get_countries('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }
	$this->load->library('pagination');
	$this->pagination->initialize($config);
	$data['main_content'] = 'admin/countries/list';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/countries/list', $data); 
	$this->load->view('includes/footer', $data); 

}
public function add()
{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
				$upload_path="images/country/"; 			
				$config = array(
				'upload_path' => $upload_path,
				'allowed_types' => "gif|jpg|png|jpeg",
				'encrypt_name'=>TRUE,
				'max_size' => "2048000", 
				'max_height' => "1024",
				'max_width' => "1024"
				);
				$this->load->library('upload', $config);
				$this->upload->do_upload('country_image');
				$imageDetailArray = $this->upload->data();
				$image =  $imageDetailArray['file_name'];
				
                $data_to_store = array(
                    'country_name' => $this->input->post('country_name'),
					'country_image' => $image,
					
                );
                if($this->countries_model->store_countries($data_to_store))
				{
                    $this->session->set_flashdata('flash_message', 'added');
                }
				else
				{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/countries');
        }
        $data['main_content'] = 'admin/countries/add';
		$this->load->view('includes/header', $data);  
		$this->load->view('includes/left_sidebar', $data);
		$this->load->view('admin/countries/add', $data); 
		$this->load->view('includes/footer', $data);		
}
public function update()
{
	$id = $this->uri->segment(4);
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

	if($_FILES['country_image']['name']!="")
	{
		$upload_path="images/country/"; 			
		$config = array(
		'upload_path' => $upload_path,
		'allowed_types' => "gif|jpg|png|jpeg",
		'encrypt_name'=>TRUE,
		'max_size' => "2048000", 
		'max_height' => "1024",
		'max_width' => "1024"
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload('country_image');
		$imageDetailArray = $this->upload->data();
		$image =  $imageDetailArray['file_name'];
	}
	else
	{
		$image=$this->input->post('old_country_image');
	}
		$data_to_store = array(
						'country_name' => $this->input->post('country_name'),
						'country_image' => $image,	);

		if($this->countries_model->update_countries($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/countries/update/'.$id.'');
	}
	$data['countries'] = $this->countries_model->get_countries_by_id($id);
	$data['main_content'] = 'admin/countries/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/countries/edit', $data); 
	$this->load->view('includes/footer', $data);
}
public function delete()
{ 
	$id = $this->uri->segment(4);
	$this->countries_model->delete_countries($id);
	redirect('admin/countries');
}
}