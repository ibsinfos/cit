<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_course_orders extends CI_Controller
{
const VIEW_FOLDER = 'admin/course_orders';
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/course_orders_model');
	$this->load->helper('form');
	if(!$this->session->userdata('is_logged_in'))
	{
		redirect('admin/login');
	}
}
 function __encrip_password($password) {
        return md5($password);
    }	
public function index()
{
	$search_string = $this->input->post('search_string');        
	$order = $this->input->post('order'); 
	$order_type = $this->input->post('order_type'); 
	$config['per_page'] =10;

	$config['base_url'] = base_url().'admin/course_orders';
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] =$this->course_orders_model->count_course_orders();
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
            $data['count_products']= $this->course_orders_model->count_course_orders($search_string, $order);
            $config['total_rows'] = $data['count_products'];
            if($search_string)
			{
                if($order){
                    $data['course_orders'] = $this->course_orders_model->get_course_orders($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['course_orders'] = $this->course_orders_model->get_course_orders($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else
			{
                if($order)
				{
                    $data['course_orders'] = $this->course_orders_model->get_course_orders('', $order, $order_type, $config['per_page'],$limit_end);        
                }
				else
				{
                    $data['course_orders'] = $this->course_orders_model->get_course_orders('', '', $order_type, $config['per_page'],$limit_end);        
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
            $data['count_products']= $this->course_orders_model->count_course_orders();
            $data['course_orders'] = $this->course_orders_model->get_course_orders('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }
	$this->load->library('pagination');
	$this->pagination->initialize($config);
	$data['main_content'] = 'admin/course_orders/list';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/course_orders/list', $data); 
	$this->load->view('includes/footer', $data);
}
public function add()
{
		$this->load->helper(array('form', 'url'));
		
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('tutor_name', 'Name', 'trim|required');
			//$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			//$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');			
			$this->form_validation->set_rules('tutor_username', 'Username','required|min_length[3]|max_length[32]|is_unique[tbl_users.usr_username]',array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.' ));
			//$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			//$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
			if($this->form_validation->run() == TRUE)
			{
				$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
				$upload_path="images/tutor/";		
				$config = array(
				'upload_path' => $upload_path,
				'allowed_types' => "gif|jpg|png|jpeg",
				'encrypt_name'=>TRUE,
				'max_size' => "2048000", 
				'max_height' => "1024",
				'max_width' => "1024"
				);
				$this->load->library('upload', $config);
				$this->upload->do_upload('tutor_image');
				$imageDetailArray = $this->upload->data();
				$image =  $imageDetailArray['file_name'];
                 	
				
                $data_to_store = array(
				    'user_id' => 0,
                    'tutor_name' => $this->input->post('tutor_name'),
					'tutor_email' => $this->input->post('tutor_email'),
					'tutor_mobile' => $this->input->post('tutor_mobile'),
					'tutor_username' => $this->input->post('tutor_username'),
					'tutor_pwd' => $this->__encrip_password($this->input->post('tutor_pwd')),
					'tutor_image' => $image,
					'tutor_des' => $this->input->post('tutor_des'),					
					'tutor_rating' => $this->input->post('tutor_rating'),					
					'tutor_courses_id' => serialize($this->input->post('tutor_course_id')),					
					);
                if($this->course_orders_model->store_course_orders($data_to_store))
				{
                    $this->session->set_flashdata('flash_message', 'added');
                }
				else
				{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/course_orders');
			}	
        }
        $data['main_content'] = 'admin/course_orders/add';
		$this->load->view('includes/header', $data);  
		$this->load->view('includes/left_sidebar', $data);
		$this->load->view('admin/course_orders/add', $data); 
		$this->load->view('includes/footer', $data);		
}

public function update()
{
	$id = $this->uri->segment(4);
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('course_name', 'name', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

	if($_FILES['tutor_image']['name']!="")
	{
		$upload_path="images/tutor/";		
		$config = array(
		'upload_path' => $upload_path,
		'allowed_types' => "gif|jpg|png|jpeg",
		'encrypt_name'=>TRUE,
		'max_size' => "2048000", 
		'max_height' => "1024",
		'max_width' => "1024"
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload('tutor_image');
		$imageDetailArray = $this->upload->data();
		$image =  $imageDetailArray['file_name'];
	}
	else
	{
		$image=$this->input->post('old_tutor_image');
	}
		$data_to_store = array(
					 'tutor_name' => $this->input->post('tutor_name'),
					'tutor_email' => $this->input->post('tutor_email'),
					'tutor_mobile' => $this->input->post('tutor_mobile'),					
					'tutor_image' => $image,
					'tutor_des' => $this->input->post('tutor_des'),					
					'tutor_rating' => $this->input->post('tutor_rating'),					
					'tutor_courses_id' => serialize($this->input->post('tutor_course_id')),		
					);
		if($this->course_orders_model->update_course_orders($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/course_orders/update/'.$id.'');
	}
	$data['course_orders'] = $this->course_orders_model->get_course_orders_by_id($id);
	$data['main_content'] = 'admin/course_orders/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/course_orders/edit', $data); 
	$this->load->view('includes/footer', $data);
}

public function details()
{
	
	$id = $this->uri->segment(4);
	/*if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('course_name', 'name', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

	if($_FILES['course_image']['name']!="")
	{
		$upload_path="images/course/";		
		$config = array(
		'upload_path' => $upload_path,
		'allowed_types' => "gif|jpg|png|jpeg",
		'encrypt_name'=>TRUE,
		'max_size' => "2048000", 
		'max_height' => "1024",
		'max_width' => "1024"
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload('course_image');
		$imageDetailArray = $this->upload->data();
		$image =  $imageDetailArray['file_name'];
	}
	else
	{
		$image=$this->input->post('old_course_image');
	}
		$data_to_store = array(
					'course_name' => $this->input->post('course_name'),
					'course_country' => $this->input->post('course_country'),
					'course_type' => $this->input->post('course_type'),
					'cat_id' => $this->input->post('cat_id'),					
					'course_image' => $image,
					'course_des' => $this->input->post('course_des'),
					'course_price' => $this->input->post('course_price'),
					'course_time' => $this->input->post('course_time'),
					'course_duration' => $this->input->post('course_duration'),
					'course_rating' => $this->input->post('course_rating'),
					'lesson_name' => serialize($this->input->post('lesson_name')),
					'lesson_time' => serialize($this->input->post('lesson_time')),
					);
		if($this->course_orders_model->update_course_orders($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/course_orders/update/'.$id.'');
	}*/
	$data['course_orders'] = $this->course_orders_model->get_course_orders_by_id($id);
	$data['main_content'] = 'admin/course_orders/details';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/course_orders/details', $data);
	$this->load->view('includes/footer', $data);
}
public function delete()
{ 
	$id = $this->uri->segment(4);
	$this->course_orders_model->delete_course_orders($id);
	redirect('admin/course_orders');
}

}