<?php
//student_notifications1

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_student_notifications1 extends CI_Controller
{
const VIEW_FOLDER = 'admin/student_notifications1';
public function __construct()
{
	parent::__construct();
	$this->load->model('admin/student_notifications1_model');
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

	$config['base_url'] = base_url().'admin/student_notifications1';
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] =$this->student_notifications1_model->count_student_notifications1();
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
            $data['count_products']= $this->student_notifications1_model->count_student_notifications1($search_string, $order);
            $config['total_rows'] = $data['count_products'];
            if($search_string)
			{
                if($order){
                    $data['student_notifications1'] = $this->student_notifications1_model->get_student_notifications1($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['student_notifications1'] = $this->student_notifications1_model->get_student_notifications1($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else
			{
                if($order)
				{
                    $data['student_notifications1'] = $this->student_notifications1_model->get_student_notifications1('', $order, $order_type, $config['per_page'],$limit_end);        
                }
				else
				{
                    $data['student_notifications1'] = $this->student_notifications1_model->get_student_notifications1('', '', $order_type, $config['per_page'],$limit_end);        
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
            $data['count_products']= $this->student_notifications1_model->count_student_notifications1();
            $data['student_notifications1'] = $this->student_notifications1_model->get_student_notifications1('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }
	$this->load->library('pagination');
	$this->pagination->initialize($config);
	$data['main_content'] = 'admin/student_notifications1/list';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/student_notifications1/list', $data); 
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
				$arr=$this->input->post('std_id');
				$str_std=implode(',',$arr);			
                $data_to_store = array(
				   'sg_batch_id' => $this->input->post('batch_id'),
					'sg_course_id' => $this->input->post('course_id'),
					'sg_student' => serialize($this->input->post('std_id')),
					'sg_str'=>$str_std,
                    'sg_title' => $this->input->post('title'),				
					'sg_date' => $this->input->post('sn_date'),
					'sg_des' => $this->input->post('sn_des')													
					);
                if($this->student_notifications1_model->store_student_notifications1($data_to_store))
				{
					$tit=$this->input->post('title');
					$des=$this->input->post('sn_des');
					$arr=$this->input->post('std_id');
					$str_std=implode(',',$arr);
					$sql=$this->db->query("SELECT group_concat(`std_email` separator ',') as emails_list  FROM `students_tbl` WHERE `user_id` IN(".$str_std.")");
					$rec=$sql->row();
					$email_to=$rec->emails_list;
					/*echo $email_to; exit;*/
			$this->load->library(array('email'));
			$config['protocol'] = 'sendmail';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
			$from_email="admin@chicagoinstituteoftechnology.com";
			$subject=$tit;
			
			$email_template='<!doctype html>
			<html>
			<head>
			<meta name="viewport" content="width=device-width">
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>Simple Transactional Email</title>
			<style media="all" type="text/css">
			@media all {
			.btn-primary table td:hover {
			background-color: #34495e !important;
			}
			.btn-primary a:hover {
			background-color: #34495e !important;
			border-color: #34495e !important;
			}
			}

			@media all {
			.btn-secondary a:hover {
			border-color: #34495e !important;
			color: #34495e !important;
			}
			}

			@media only screen and (max-width: 620px) {
			table[class=body] h1 {
			font-size: 28px !important;
			margin-bottom: 10px !important;
			}
			table[class=body] h2 {
			font-size: 22px !important;
			margin-bottom: 10px !important;
			}
			table[class=body] h3 {
			font-size: 16px !important;
			margin-bottom: 10px !important;
			}
			table[class=body] p,
			table[class=body] ul,
			table[class=body] ol,
			table[class=body] td,
			table[class=body] span,
			table[class=body] a {
			font-size: 16px !important;
			}
			table[class=body] .wrapper,
			table[class=body] .article {
			padding: 10px !important;
			}
			table[class=body] .content {
			padding: 0 !important;
			}
			table[class=body] .container {
			padding: 0 !important;
			width: 100% !important;
			}
			table[class=body] .header {
			margin-bottom: 10px !important;
			}
			table[class=body] .main {
			border-left-width: 0 !important;
			border-radius: 0 !important;
			border-right-width: 0 !important;
			}
			table[class=body] .btn table {
			width: 100% !important;
			}
			table[class=body] .btn a {
			width: 100% !important;
			}
			table[class=body] .img-responsive {
			height: auto !important;
			max-width: 100% !important;
			width: auto !important;
			}
			table[class=body] .alert td {
			border-radius: 0 !important;
			padding: 10px !important;
			}
			table[class=body] .span-2,
			table[class=body] .span-3 {
			max-width: none !important;
			width: 100% !important;
			}
			table[class=body] .receipt {
			width: 100% !important;
			}
			}

			@media all {
			.ExternalClass {
			width: 100%;
			}
			.ExternalClass,
			.ExternalClass p,
			.ExternalClass span,
			.ExternalClass font,
			.ExternalClass td,
			.ExternalClass div {
			line-height: 100%;
			}
			.apple-link a {
			color: inherit !important;
			font-family: inherit !important;
			font-size: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
			text-decoration: none !important;
			}
			}
			</style>
			</head>
			<body class="" style="font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f6f6f6; margin: 0; padding: 0;">

			<table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;" width="100%" bgcolor="#f6f6f6">
			<tr>
			<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
			<td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto !important; max-width: 580px; padding: 10px; width: 580px;" width="580" valign="top">
			<div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

			<!-- START CENTERED WHITE CONTAINER -->
			
			<table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #fff; border-radius: 3px;" width="100%">

			<!-- START MAIN CONTENT AREA -->
			<tr>
			<td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
			  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
			   <tr>
				<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top" >
				<img src="http://chicagoinstituteoftechnology.com/assets/images/logo_new.png" alt="" width="350" alt="chicago institute of technology"     ><br />
				
				</td></tr>
				<tr>
				  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;text-align:justify;" valign="top">
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Dear Student,</p>
					
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.$des.'.</p>
					
				<p style="text-align:justi">Sincerely,<br />
				Chicago Institute of Technology<br />
				113 Fairfield Way, Suite 204<br />
				Bloomingdale, IL 60108<br />
				U.S.A.<br />
				Tel: 630-237-4456<br />
				info@chicagoinstituteoftechnology.com<br />
				www.chicagoinstituteoftechnology.com</p>
					
				  </td>
				</tr>
			  </table>
			</td>
			</tr>


			</table>



			</div>
			</td>
			<td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp; </td>
			</tr>
			</table>
			</body>
			</html>';
            $this->email->from($from_email,'chicagoinstituteoftechnology');
            $this->email->to($email_to);
            $this->email->subject($subject);
            $this->email->message($email_template);
            $this->email->send();
					
                    $this->session->set_flashdata('flash_message', 'added');
                }
				else
				{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/admin_student_notifications1');
			}	
        }
        $data['main_content'] = 'admin/student_notifications1/add';
		$this->load->view('includes/header', $data);  
		$this->load->view('includes/left_sidebar', $data);
		$this->load->view('admin/student_notifications1/add', $data); 
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
					'sn_batch_id' => $this->input->post('batch_id'),
					'sn_course_id' => $this->input->post('course_id'),
					'sn_title' => $this->input->post('title'),					
					'sn_date' => $this->input->post('sn_date'),
					'sn_des' => $this->input->post('sn_des')					
					);
		if($this->student_notifications1_model->update_student_notifications1($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/admin_student_notifications1/update/'.$id.'');
	}
	$data['student_notifications1'] = $this->student_notifications1_model->get_student_notifications1_by_id($id);
	$data['main_content'] = 'admin/student_notifications1/edit';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/admin_student_notifications1/edit', $data); 
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
		if($this->student_notifications1_model->update_student_notifications1($id, $data_to_store) == TRUE)
		{
			$this->session->set_flashdata('flash_message', 'updated');
		}
		else
		{
			$this->session->set_flashdata('flash_message', 'not_updated');
		}
		redirect('admin/student_notifications1/update/'.$id.'');
	}*/
	$data['student_notifications1'] = $this->student_notifications1_model->get_student_notifications1_by_id($id);
	$data['main_content'] = 'admin/student_notifications1/details';
	$this->load->view('includes/header', $data);  
	$this->load->view('includes/left_sidebar', $data);
	$this->load->view('admin/student_notifications1/details', $data);
	$this->load->view('includes/footer', $data);
}
public function delete()
{
	$id = $this->uri->segment(4);
	$this->student_notifications1_model->delete_student_notifications1($id);
	redirect('admin/admin_student_notifications1');
}
function get_course_batch()
{
	$course_id=$this->input->get('q');
	$results=$this->student_notifications1_model->get_course_batches($course_id);
	$data='<select class="form-control hunper" name="batch_id" id="batch_id" required  onchange="fun_get_student_list(this.value);" >
								<option value="" >Select Your Batch</option>';
	foreach($results as $row):
	$data .='<option value="'.$row->batch_id.'" >'.$row->cb_batchname.'</option>';
	endforeach;
	$data .='</select>';
	echo $data;
}
function get_course_batch_students()
{
	$batch_id=$this->input->get('q');
	$results=$this->student_notifications1_model->get_course_batche_std($batch_id);
	$data='';
	foreach($results as $row):
	$data .='<input type="checkbox" name="std_id[]" value="'.$row->user_id.'" > '.$row->std_username.' &nbsp; ';
	endforeach;
	echo $data;
}

}