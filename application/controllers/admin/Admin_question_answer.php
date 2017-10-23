<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_question_answer extends CI_Controller
{
const VIEW_FOLDER = 'admin/question_answer';
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/question_answer_model');
	$this->load->helper('form');
	if(!$this->session->userdata('is_logged_in'))
	{
		redirect('admin/login');
	}
}
public function index($qs_id)
{
	$search_string = $this->input->post('search_string');        
	$order = $this->input->post('order'); 
	$order_type = $this->input->post('order_type'); 
	$config['per_page'] = 100;

	$config['base_url'] = base_url().'admin/question_answer';
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] =$this->question_answer_model->count_question_answer('','',$qs_id);
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
            $data['count_products']= $this->question_answer_model->count_question_answer($search_string, $order,$qs_id);
            $config['total_rows'] = $data['count_products'];
            if($search_string)
			{
                if($order){
                    $data['question_answer'] = $this->question_answer_model->get_question_answer($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['question_answer'] = $this->question_answer_model->get_question_answer($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else
			{
                if($order)
				{
                    $data['question_answer'] = $this->question_answer_model->get_question_answer('', $order, $order_type, $config['per_page'],$limit_end);        
                }
				else
				{
                    $data['question_answer'] = $this->question_answer_model->get_question_answer('', '', $order_type, $config['per_page'],$limit_end,$qs_id);        
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
            $data['count_products']= $this->question_answer_model->count_question_answer('','',$qs_id);
            $data['question_answer'] = $this->question_answer_model->get_question_answer('', '', $order_type, $config['per_page'],$limit_end,$qs_id);        
            $config['total_rows'] = $data['count_products'];

        }
	$this->load->library('pagination');
	$this->pagination->initialize($config);
	$data['main_content'] = 'admin/question_answer/list';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/question_answer/list', $data); 
	$this->load->view('includes/footer', $data);
}
public function add()
{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
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
				$this->upload->do_upload('cb_image');
				$imageDetailArray = $this->upload->data();
				$image =  $imageDetailArray['file_name'];              				
                $data_to_store = array(
					'cb_batchname' => $this->input->post('batchname'),
                    'cb_course_id' => $this->input->post('course_id'),
					'cb_tutor_id' => $this->input->post('tutor_id'),
					'cb_country' => $this->input->post('course_country'),
					'cb_course_type' => $this->input->post('course_type'),
					'cb_cat_id' => $this->input->post('cat_id'),					
					'cb_image' => $image,					
					'cb_price' => $this->input->post('course_price'),
					'cb_time' => $this->input->post('course_time'),
					'cb_duration' => $this->input->post('course_duration'),
					'cb_rating' => $this->input->post('course_rating'),	
					'cb_course_shortdes' => $this->input->post('cb_course_shortdes'),
					'cb_course_des' => $this->input->post('cb_course_des'),
					'cb_week_days' => $this->input->post('cb_week_days'),
					'cb_day_time' => $this->input->post('cb_day_time'),
					'lesson_name' => serialize($this->input->post('lesson_name')),
					'lesson_time' => serialize($this->input->post('lesson_time')),	
					'cb_start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
					'cb_end_date' =>date('Y-m-d',strtotime($this->input->post('end_date'))),
					);
                if($this->question_answer_model->store_question_answer($data_to_store))
				{
                    $this->session->set_flashdata('flash_message', 'added');
                }
				else
				{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/question_answer');
        }
        $data['main_content'] = 'admin/question_answer/add';
		$this->load->view('includes/header', $data);  
		$this->load->view('includes/left_sidebar', $data);
		$this->load->view('admin/question_answer/add', $data); 
		$this->load->view('includes/footer', $data);		
}
public function reject()
{
	$id = $this->uri->segment(4);
	$data_to_store = array('as_status' =>2);
	if($this->question_answer_model->update_question_answer($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		 $this->db->select('*');
		 $this->db->from('answers');
		 $this->db->where('as_id', $id);
	     $query = $this->db->get();
		 $row=$query->row();
		 $qsid=$row->as_question_id;
		redirect('admin/admin_question_answer/index/'.$qsid);
}		
public function update()
{
	$id = $this->uri->segment(4);
	$data_to_store = array('as_status' =>1);
	if($this->question_answer_model->update_question_answer($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		 $this->db->select('*');
		 $this->db->from('answers');
		 $this->db->where('as_id', $id);
	     $query = $this->db->get();
		 $row=$query->row();
		 $qsid=$row->as_question_id;
		redirect('admin/admin_question_answer/index/'.$qsid);
	/*if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('course_name', 'name', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

	if($_FILES['cb_image']['name']!="")
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
		$this->upload->do_upload('cb_image');
		$imageDetailArray = $this->upload->data();
		$image =  $imageDetailArray['file_name'];
	}
	else
	{
		$image=$this->input->post('old_cb_image');
	}
		$data_to_store = array(
					'cb_batchname' => $this->input->post('batchname'),
					 'cb_course_id' => $this->input->post('course_id'),
					'cb_tutor_id' => $this->input->post('tutor_id'),
					'cb_country' => $this->input->post('course_country'),
					'cb_course_type' => $this->input->post('course_type'),
					'cb_cat_id' => $this->input->post('cat_id'),					
					'cb_image' => $image,					
					'cb_price' => $this->input->post('course_price'),
					'cb_time' => $this->input->post('course_time'),
					'cb_duration' => $this->input->post('course_duration'),
					'cb_rating' => $this->input->post('course_rating'),
					'cb_course_shortdes' => $this->input->post('cb_course_shortdes'),
					'cb_course_des' => $this->input->post('cb_course_des'),
					'cb_week_days' => $this->input->post('cb_week_days'),
					'cb_day_time' => $this->input->post('cb_day_time'),
					'lesson_name' => serialize($this->input->post('lesson_name')),
					'lesson_time' => serialize($this->input->post('lesson_time')),		
					'cb_start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
					'cb_end_date' => date('Y-m-d',strtotime($this->input->post('end_date'))),
					);
		if($this->question_answer_model->update_question_answer($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/question_answer/update/'.$id.'');
	}
	$data['question_answer'] = $this->question_answer_model->get_question_answer_by_id($id);
	$data['main_content'] = 'admin/question_answer/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/question_answer/edit', $data); 
	$this->load->view('includes/footer', $data);*/
}
function get_course_cat()
{
	$cat_id=$this->input->get('q');
	$sql=$this->db->query("SELECT * FROM `courses` WHERE `cat_id`='$cat_id'");
	if($sql->num_rows()>0)
	{
		$res=$sql->result();
		$daa='<select  class="form-control" name="course_id" >';
		foreach($res as $row)
		{
			$daa .='<option value="'.$row->course_id.'" >'.$row->course_name.'</option>';
		}
		$daa .='</select>';
		echo $daa;
	}	
	else
	{
		$daa='<select  class="form-control" name="course_id" >';
		
		$daa .='</select>';
		echo $daa;
	}
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
		if($this->question_answer_model->update_question_answer($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/question_answer/update/'.$id.'');
	}*/
	$data['question_answer'] = $this->question_answer_model->get_question_answer_by_id($id);
	$data['main_content'] = 'admin/question_answer/details';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/question_answer/details', $data);
	$this->load->view('includes/footer', $data);
}
public function delete()
{ 
	$id = $this->uri->segment(4);
	$this->db->select('*');
	$this->db->from('answers');
	$this->db->where('as_id', $id);
	$query = $this->db->get();
	$row=$query->row();
	$qsid=$row->as_question_id;
	$this->question_answer_model->delete_question_answer($id);  
	redirect('admin/admin_question_answer/index/'.$qsid);
	//redirect('admin/question_answer');
}

}