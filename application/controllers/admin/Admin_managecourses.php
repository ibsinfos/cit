<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_managecourses extends CI_Controller
{
const VIEW_FOLDER = 'admin/managecourses';
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/managecourses_model');
	$this->load->helper('form');
	if(!$this->session->userdata('is_logged_in'))
	{
		redirect('admin/login');
	}
}
public function index($std_id)
{
	
	$search_string = $this->input->post('search_string');        
	$order = $this->input->post('order'); 
	$order_type = $this->input->post('order_type'); 
	$config['per_page'] =15;

	$config['base_url'] = base_url().'admin/managecourses/'.$std_id;
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] = $this->managecourses_model->count_managecourses('','',$std_id);
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
	$page = $this->uri->segment(4);
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
        if($search_string !== false && $order !== false || $this->uri->segment(4) == true)
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
            $data['count_products']= $this->managecourses_model->count_managecourses($search_string,$order,$std_id);
            $config['total_rows'] = $data['count_products'];
            if($search_string)
			{
                if($order){
                    $data['managecourses'] = $this->managecourses_model->get_managecourses($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['managecourses'] = $this->managecourses_model->get_managecourses($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else
			{
                if($order)
				{
                    $data['managecourses'] = $this->managecourses_model->get_managecourses('', $order, $order_type, $config['per_page'],$limit_end,$std_id);        
                }
				else
				{
                    $data['managecourses'] = $this->managecourses_model->get_managecourses('', '', $order_type, $config['per_page'],$limit_end,$std_id);        
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
            $data['count_products']= $this->managecourses_model->count_managecourses('','',$std_id);
            $data['managecourses'] = $this->managecourses_model->get_managecourses('', '', $order_type, $config['per_page'],$limit_end,$std_id);        
            $config['total_rows'] = $data['count_products'];

        }
	$this->load->library('pagination');
	$this->pagination->initialize($config);
	$data['main_content'] = 'admin/managecourses/list';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/managecourses/list', $data); 
	$this->load->view('includes/footer', $data);
}
public function add()
{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			$order_id=time();	
			$cdate=date('Y-m-d H:i:s');	
				$id=$this->input->post('std_id');
                $exp_date=date('Y-m-d',strtotime($this->input->post('exp_date')));			
				$data_to_store = array(
				'co_coursetype'=>$this->input->post('course_type'),
				'std_user_id' => $this->input->post('std_id'),
				'co_country' => $this->input->post('course_country'),					
				'co_course_id' => $this->input->post('batch_id'),
				'co_course' => $this->input->post('course_id'),
				'co_amount' => $this->input->post('course_amount'),
				'co_date_time'=>$cdate,
				'co_trans_id'=>$order_id,										
				'co_exp_date' =>strtotime($exp_date),
				'co_payvia'=>'manual',
				'co_payment_status'=>'success'				
				);
                if($this->managecourses_model->store_managecourses($data_to_store))
				{
                    $this->session->set_flashdata('flash_message', 'added');
                }
				else
				{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/managecourses/add?id='.$id);
        }
        $data['main_content'] = 'admin/managecourses/add';
		$this->load->view('includes/header', $data);  
		$this->load->view('includes/left_sidebar', $data);
		$this->load->view('admin/managecourses/add', $data); 
		$this->load->view('includes/footer', $data);		
}
function generateRandomString($length = 10)
{
	$characters = '123456789';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
	$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}
public function update()
{
	/*$id = $this->uri->segment(4);*/
	$id = $this->input->get('id');
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('course_name', 'name', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

	
		$exp_date=date('Y-m-d',strtotime($this->input->post('exp_date')));				
                $data_to_store = array(
				    'co_coursetype'=>$this->input->post('course_type'),
                   
					'co_country' => $this->input->post('course_country'),					
					'co_course_id' => $this->input->post('batch_id'),
					'co_course' => $this->input->post('course_id'),
					'co_amount' => $this->input->post('course_amount'),
					'co_exp_date' =>strtotime($exp_date),
					'co_payvia'=>'manual',
					'co_payment_status'=>'success'				
					);
		if($this->managecourses_model->update_managecourses($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/managecourses/update?id='.$id.'');
	}
	$data['managecourses'] = $this->managecourses_model->get_managecourses_by_id($id);
	$data['main_content'] = 'admin/managecourses/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/managecourses/edit', $data); 
	$this->load->view('includes/footer', $data);
}
public function edit_coursestatus()
{
	$id = $this->uri->segment(4);
	//$id = $this->input->get('id');
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('course_name', 'name', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

	   $std_user_id=$this->input->post('std_user_id');
		$exp_date=date('Y-m-d',strtotime($this->input->post('exp_date')));				
                $data_to_store = array(
				    'co_coursestatus'=>$this->input->post('course_status')
                   				
					);
		if($this->managecourses_model->update_managecourses1($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/managecourses/'.$std_user_id.'');
	}
	
	$data['managecourses'] = $this->managecourses_model->get_managecourses_by_id($id);
	$data['main_content'] = 'admin/managecourses/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/managecourses/edit_coursestatus', $data);
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
		if($this->managecourses_model->update_managecourses($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/managecourses/update/'.$id.'');
	}*/
	$data['managecourses'] = $this->managecourses_model->get_managecourses_by_id($id);
	$data['main_content'] = 'admin/managecourses/details';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/managecourses/details', $data);
	$this->load->view('includes/footer', $data);
}
public function delete()
{ 
	$id = $this->uri->segment(4);
	$this->managecourses_model->delete_managecourses($id);
	redirect('admin/managecourses');
}
function get_course_batch()
{
	$course_id=$this->input->get('q');
	$ctype=$this->input->get('ctype');
	$cid=$this->input->get('cid');
	$results=$this->managecourses_model->get_course_batches($course_id,$ctype,$cid);
	$data='<select class="form-control hunper" name="batch_id" id="batch_id" onchange="fun_course_cat1(this.value)" >
								<option value="" >Select Batch</option>';
	foreach($results as $row):
	$data .='<option value="'.$row->batch_id.'" >'.$row->cb_batchname.'</option>';
	endforeach;
	$data .='</select>';
	echo $data;
}
function get_course_batch1()
{
	$b_id=$this->input->get('q');	
	$results=$this->managecourses_model->get_course_batches1($b_id);
	$cdate=date('m/d/Y',strtotime($results->cb_end_date));
	$str=$results->cb_price.",".$cdate;
	echo $str;
}

}