<?php
//tutor_notifications

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_tutor_notifications extends CI_Controller
{
const VIEW_FOLDER = 'admin/tutor_notifications';
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/tutor_notifications_model');
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
	$config['per_page'] = 10;

	$config['base_url'] = base_url().'admin/tutor_notifications';
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] =$this->tutor_notifications_model->count_tutor_notifications();
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
            $data['count_products']= $this->tutor_notifications_model->count_tutor_notifications($search_string, $order);
            $config['total_rows'] = $data['count_products'];
            if($search_string)
			{
                if($order){
                    $data['tutor_notifications'] = $this->tutor_notifications_model->get_tutor_notifications($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['tutor_notifications'] = $this->tutor_notifications_model->get_tutor_notifications($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else
			{
                if($order)
				{
                    $data['tutor_notifications'] = $this->tutor_notifications_model->get_tutor_notifications('', $order, $order_type, $config['per_page'],$limit_end);        
                }
				else
				{
                    $data['tutor_notifications'] = $this->tutor_notifications_model->get_tutor_notifications('', '', $order_type, $config['per_page'],$limit_end);        
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
            $data['count_products']= $this->tutor_notifications_model->count_tutor_notifications();
            $data['tutor_notifications'] = $this->tutor_notifications_model->get_tutor_notifications('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }
	$this->load->library('pagination');
	$this->pagination->initialize($config);
	$data['main_content'] = 'admin/tutor_notifications/list';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/tutor_notifications/list', $data); 
	$this->load->view('includes/footer', $data);
}
public function add()
{
		$this->load->helper(array('form', 'url'));
		
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			
			if($this->form_validation->run() == TRUE)
			{
				$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
							
                $data_to_store = array(
                    'tn_title' => $this->input->post('title'),					
					'tn_date' => $this->input->post('tn_date'),
					'tn_des' => $this->input->post('tn_des')													
					);
                if($this->tutor_notifications_model->store_tutor_notifications($data_to_store))
				{
                    $this->session->set_flashdata('flash_message', 'added');
                }
				else
				{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/tutor_notifications');
			}	
        }
        $data['main_content'] = 'admin/tutor_notifications/add';
		$this->load->view('includes/header', $data);  
		$this->load->view('includes/left_sidebar', $data);
		$this->load->view('admin/tutor_notifications/add', $data); 
		$this->load->view('includes/footer', $data);		
}

public function update()
{
	$id = $this->uri->segment(4);
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

		$data_to_store = array(
					 'tn_title' => $this->input->post('title'),					
					'tn_date' => $this->input->post('tn_date'),
					'tn_des' => $this->input->post('tn_des')					
					);
		if($this->tutor_notifications_model->update_tutor_notifications($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/tutor_notifications/update/'.$id.'');
	}
	$data['tutor_notifications'] = $this->tutor_notifications_model->get_tutor_notifications_by_id($id);
	$data['main_content'] = 'admin/tutor_notifications/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/tutor_notifications/edit', $data); 
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
		if($this->tutor_notifications_model->update_tutor_notifications($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/tutor_notifications/update/'.$id.'');
	}*/
	$data['tutor_notifications'] = $this->tutor_notifications_model->get_tutor_notifications_by_id($id);
	$data['main_content'] = 'admin/tutor_notifications/details';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/tutor_notifications/details', $data);
	$this->load->view('includes/footer', $data);
}
public function delete()
{ 
	$id = $this->uri->segment(4);
	$this->tutor_notifications_model->delete_tutor_notifications($id);
	redirect('admin/tutor_notifications');
}

}