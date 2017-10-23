<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_homefollow extends CI_Controller
{
const VIEW_FOLDER = 'admin/homefollow';
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/homefollow_model');
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

	$config['base_url'] = base_url().'admin/homefollow';
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
            $data['count_products']= $this->homefollow_model->count_homefollow($search_string, $order);
            $config['total_rows'] = $data['count_products'];
            if($search_string)
			{
                if($order){
                    $data['homefollow'] = $this->homefollow_model->get_homefollow($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['homefollow'] = $this->homefollow_model->get_homefollow($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else
			{
                if($order)
				{
                    $data['homefollow'] = $this->homefollow_model->get_homefollow('', $order, $order_type, $config['per_page'],$limit_end);        
                }
				else
				{
                    $data['homefollow'] = $this->homefollow_model->get_homefollow('', '', $order_type, $config['per_page'],$limit_end);        
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
            $data['count_products']= $this->homefollow_model->count_homefollow();
            $data['homefollow'] = $this->homefollow_model->get_homefollow('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }
	$this->load->library('pagination');
	$this->pagination->initialize($config);
	$data['main_content'] = 'admin/homefollow/list';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/homefollow/list', $data); 
	$this->load->view('includes/footer', $data);
}
public function add()
{
		$this->load->helper(array('form', 'url'));
		
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'title', 'trim|required');
			
			if($this->form_validation->run() == TRUE)
			{
				$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
				$upload_path="images/";		
				$config = array(
				'upload_path' => $upload_path,
				'allowed_types' => "gif|jpg|png|jpeg",
				'encrypt_name'=>TRUE,
				'max_size' => "20480000", 
				'max_height' => "1924",
				'max_width' => "1924"
				);
				$this->load->library('upload', $config);
				
				$this->upload->do_upload('h_image');
				$imageDetailArray = $this->upload->data();
				$image =  $imageDetailArray['file_name'];
				
				$this->upload->do_upload('bg_image');
				$imageDetailArray = $this->upload->data();
				$bgimage =  $imageDetailArray['file_name'];
                 				
                $data_to_store = array(
					 'cdate' => $this->input->post('cdate'),
					'title' => $this->input->post('title'),	
					'tname' => $this->input->post('tname'),				
					'h_image' => $image,
					'bg_image' => $bgimage,
					'des' => $this->input->post('des'),	
					'clink' => $this->input->post('clink'),
					'cdisplay' => $this->input->post('cdisplay')					
					);
                if($this->homefollow_model->store_homefollow($data_to_store))
				{
                    $this->session->set_flashdata('flash_message', 'added');
                }
				else
				{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/homefollow');
			}	
        }
        $data['main_content'] = 'admin/homefollow/add';
		$this->load->view('includes/header', $data);  
		$this->load->view('includes/left_sidebar', $data);
		$this->load->view('admin/homefollow/add', $data); 
		$this->load->view('includes/footer', $data);		
}

public function update()
{
	$id = $this->uri->segment(4);
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title1', 'title1', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

	/*if($_FILES['h_image']['name']!="")
	{
		$upload_path="images/";		
		$config = array(
		'upload_path' => $upload_path,
		'allowed_types' => "gif|jpg|png|jpeg",
		'encrypt_name'=>TRUE,
		'max_size' => "20480000", 
		'max_height' => "1990",
		'max_width' => "1924"
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload('h_image');
		$imageDetailArray = $this->upload->data();
		$image =  $imageDetailArray['file_name'];
	}
	else
	{
		$image=$this->input->post('old_h_image');
	}
	
	if($_FILES['bg_image']['name']!="")
	{
		$upload_path="images/";		
		$config = array(
		'upload_path' => $upload_path,
		'allowed_types' => "gif|jpg|png|jpeg",
		'encrypt_name'=>TRUE,
		'max_size' => "20480000", 
		'max_height' => "1990",
		'max_width' => "1924"
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload('bg_image');
		$imageDetailArray = $this->upload->data();
		$bgimage =  $imageDetailArray['file_name'];
	}
	else
	{
		$bgimage=$this->input->post('old_bg_image');
	}*/
		$data_to_store = array(
					 
					'title1' => $this->input->post('title1'),	
					'ff_count' => $this->input->post('ff_count'),
					'title2' => $this->input->post('title2'),	
					'cc_count' => $this->input->post('cc_count'),
					'title3' => $this->input->post('title3'),	
					'se_count' => $this->input->post('se_count'),
					'title4' => $this->input->post('title4'),	
					'ct_count' => $this->input->post('ct_count')					
										
					);
		if($this->homefollow_model->update_homefollow($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/admin_homefollow/update/'.$id.'');
	}
	$data['homefollow'] = $this->homefollow_model->get_homefollow_by_id($id);
	$data['main_content'] = 'admin/homefollow/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/homefollow/edit', $data); 
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
		if($this->homefollow_model->update_homefollow($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/homefollow/update/'.$id.'');
	}*/
	$data['homefollow'] = $this->homefollow_model->get_homefollow_by_id($id);
	$data['main_content'] = 'admin/homefollow/details';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/homefollow/details', $data);
	$this->load->view('includes/footer', $data);
}
public function delete()
{ 
	$id = $this->uri->segment(4);
	$this->homefollow_model->delete_homefollow($id);
	redirect('admin/homefollow');
}

}