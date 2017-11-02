<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Courses extends CI_Controller
{	
	public function __construct()
	{	
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('security');
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('Courses_model');
		$this->load->model('User_model');
		$this->load->library('pagination');
		$this->load->library('HybridAuthLib');
    }
	public function oncampus()
	{
		$search_term = array();
		$config = array();
		$config["base_url"] = base_url() ."courses/oncampus";
		$total_row = $this->Courses_model->get_allcourses_oncampus_count();
		$config["total_rows"] =$total_row;
		$config["per_page"] = 8;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
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
		$this->pagination->initialize($config);
		if($this->uri->segment(3))
		{
			$page =($this->uri->segment(3) * $config['per_page']) - $config['per_page'];
		}
		else
		{
			$page =0;
		}
		$data['page_title']='On compus Courses';
		$data['description']='On compus Courses';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['rec_courses']=$this->Courses_model->get_allcourses_oncampus($config["per_page"],$page);
		$data['course_cat_list']=$this->Courses_model->get_course_categories();
		$data['res_setting']=$this->User_model->get_account_settings();
		$this->load->view('oncampus_courses_view',$data);
	}
	public function oncampus_course($course_id)
	{
		$search_term = array();
		$config = array();
		$config["base_url"] = base_url() ."courses/oncampus_course/$course_id";
		$total_row = $this->Courses_model->get_allcourses_oncampus_course_count($course_id);
		$config["total_rows"] =$total_row;
		$config["per_page"] = 8;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
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
		$this->pagination->initialize($config);
		if($this->uri->segment(4))
		{
			$page =($this->uri->segment(4) * $config['per_page']) - $config['per_page'];
		}
		else
		{
			$page =0;
		}
		$data['page_title']='On compus Courses';
		$data['description']='On compus Courses';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['rec_courses']=$this->Courses_model->get_allcourses_oncampus_course($config["per_page"],$page,$course_id);
		$data['course_cat_list']=$this->Courses_model->get_course_categories();
		$data['res_setting']=$this->User_model->get_account_settings();
		$this->load->view('oncampus_courses_view',$data);
	}
	public function online()
	{
		$search_term = array();
		$config = array();
		$config["base_url"] = base_url() ."courses/online";
		$total_row = $this->Courses_model->get_allcourses_online_count();
		$config["total_rows"] =$total_row;
		$config["per_page"] = 8;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
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
		$this->pagination->initialize($config);
		if($this->uri->segment(3))
		{
			$page =($this->uri->segment(3) * $config['per_page']) - $config['per_page'];
		}
		else
		{
			$page =0;
		}
		$data['page_title']='Online Courses';
		$data['description']='Courses';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['rec_courses']=$this->Courses_model->get_allcourses_online($config["per_page"],$page);
		$data['course_cat_list']=$this->Courses_model->get_course_categories();
		$this->load->view('online_courses_view',$data);
	}
	public function online_course($course_id)
	{
		$search_term = array();
		$config = array();
		$config["base_url"] = base_url() ."courses/online_course/$course_id";
		$total_row = $this->Courses_model->get_allcourses_online_course_count($course_id);
		$config["total_rows"] =$total_row;
		$config["per_page"] = 8;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
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
		$this->pagination->initialize($config);
		if($this->uri->segment(4))
		{
			$page =($this->uri->segment(4) * $config['per_page']) - $config['per_page'];
		}
		else
		{
			$page =0;
		}
		$data['page_title']='Online Courses';
		$data['description']='Courses';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['rec_courses']=$this->Courses_model->get_allcourses_online_course($config["per_page"],$page,$course_id);
		$data['course_cat_list']=$this->Courses_model->get_course_categories();
		$this->load->view('online_courses_view',$data);
	}
	public function search_oncampus()
	{
		
		/*if($this->input->post('course_cat')!="")
		{
			$course_cat=$this->input->post('course_cat');
		}
		else{
			$course_cat='';
		}
		if($this->input->post('course_title')!="")
		{
			$course_title=$this->input->post('course_title');
		}
		else{
			$course_title='';
		}
		if($this->input->post('course_search_btn')!="")
		{
			$course_search_btn=$this->input->post('course_search_btn');
			$search_term=array('course_cat'=>$course_cat,'course_title'=>$course_title,'')
		}
		else{
			$course_search_btn='';
		}*/
		$search_term = array();
		if ($this->input->post('course_search_btn'))
		{
			$search_term = array('course_cat'=>$this->input->post('course_cat'),'course_title'=>$this->input->post('course_title'),'course_type'=>$this->input->post('course_type'));
			$this->session->set_userdata('search_term', $search_term);
		}
		else if($this->session->userdata('search_term'))
		{
			$search_term =$this->session->userdata('search_term');
			
			 
		}
		/*print_r($search_term); exit; */
		$data['posted_data']=$search_term;
		$config = array();
		$config["base_url"] = base_url() ."courses/search_oncampus";
		$total_row = $this->Courses_model->get_allcourses_count($search_term);
		$config["total_rows"] =$total_row;
		$config["per_page"] = 8;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
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
		$this->pagination->initialize($config);
		if($this->uri->segment(3))
		{
			$page =($this->uri->segment(3) * $config['per_page']) - $config['per_page'];
		}
		else
		{
			$page =0;
		}
		$data['page_title']='Search Oncampus Courses';
		$data['description']='Courses';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['rec_courses']=$this->Courses_model->get_allcourses($config["per_page"],$page,$search_term);
		$data['course_cat_list']=$this->Courses_model->get_course_categories();
		$this->load->view('oncampus_courses_view',$data);
	}
	public function search_online()
	{
		
		/*if($this->input->post('course_cat')!="")
		{
			$course_cat=$this->input->post('course_cat');
		}
		else{
			$course_cat='';
		}
		if($this->input->post('course_title')!="")
		{
			$course_title=$this->input->post('course_title');
		}
		else{
			$course_title='';
		}
		if($this->input->post('course_search_btn')!="")
		{
			$course_search_btn=$this->input->post('course_search_btn');
			$search_term=array('course_cat'=>$course_cat,'course_title'=>$course_title,'')
		}
		else{
			$course_search_btn='';
		}*/
		$search_term = array();
		if ($this->input->post('course_search_btn'))
		{
			$search_term = array('course_cat'=>$this->input->post('course_cat'),'course_title'=>$this->input->post('course_title'),'course_type'=>$this->input->post('course_type'));
			$this->session->set_userdata('search_term', $search_term);
		}
		else if($this->session->userdata('search_term'))
		{
			$search_term =$this->session->userdata('search_term');	 
		}
		$data['posted_data']=$search_term;
		/*print_r($search_term); exit;*/
		$config = array();
		$config["base_url"] = base_url() ."courses/search_online";
		$total_row = $this->Courses_model->get_allcourses_count($search_term);
		$config["total_rows"] =$total_row;
		$config["per_page"] = 8;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
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
		$this->pagination->initialize($config);
		if($this->uri->segment(3))
		{
			$page =($this->uri->segment(3) * $config['per_page']) - $config['per_page'];
		}
		else
		{
			$page =0;
		}
		$data['page_title']='Search Oncampus Courses';
		$data['description']='Courses';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['rec_courses']=$this->Courses_model->get_allcourses($config["per_page"],$page,$search_term);
		$data['course_cat_list']=$this->Courses_model->get_course_categories();
		$this->load->view('online_courses_view',$data);
	}
	public function details($batch_id)
	{
		$batch_id=(int)$batch_id;
		if(!empty($batch_id))
		{
			$results=$this->Courses_model->get_courses_details($batch_id);
			if(!empty($results))
			{	
				$data['courses_details']=$results;
				$data['latest_courses']=$this->Courses_model->get_latest_courses();
				$data['page_title']=$results->course_name;
				$data['description']='Courses Details';
				$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
				$data['res_setting']=$this->User_model->get_account_settings();
				$this->load->view('course_details_view',$data);
			}
			else
			{
				$this->pagenotfound();
			}	
		}
		else
		{
			$this->pagenotfound();
		}
		
	}
	function pagenotfound()
	{
		$this->load->view('pagenotfound');
	}
	public function payment_gateway($batch_id)
	{
		if(!$this->session->userdata('user_student_is_logged_in'))
		redirect('home');									
	   $batch_id=(int)$batch_id;
		if(!empty($batch_id))
		{
			$results=$this->Courses_model->get_courses_details($batch_id);
			if(!empty($results))
			{	
		        $this->session->set_userdata('co_course_id',$batch_id);
				$data['courses_details']=$results;
				$data['page_title']='Course payment gateway';
				$data['description']='Course payment gateway';
				$data['res_setting']=$this->User_model->get_account_settings();
				$this->load->view('payment_gateway_view',$data);
			}
			else
			{
				$this->pagenotfound();
			}	
		}
		else
		{
			$this->pagenotfound();
		}
	}
	public function course_inquiry($batch_id)
	{
		$this->form_validation->set_rules('cd_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cd_email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('cd_phone', 'Phone', 'trim|required|xss_clean');      
		$this->form_validation->set_rules('cd_des', 'Description', 'trim|required|xss_clean'); 	   
        if($this->form_validation->run() == FALSE)
        {
			
            $results=$this->Courses_model->get_courses_details($batch_id);
			if(!empty($results))
			{	
				$data['courses_details']=$results;
				$data['latest_courses']=$this->Courses_model->get_latest_courses();
				$data['page_title']=$results->course_name;
				$data['description']='Courses Details';
				$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
				$data['res_setting']=$this->User_model->get_account_settings();
				$this->load->view('course_details_view',$data);
			}
        }
        else
        {
			$uname = $this->input->post('cd_name');
            $email = $this->input->post('cd_email');
            $mobile = $this->input->post('cd_phone');
			$c_message = $this->input->post('cd_des');
			$data_form=array('cd_name'=>$uname,'cd_email'=>$email,'cd_phone'=>$mobile,'cd_des'=>$c_message);
			$this->Courses_model->insert_course_inquiry($data_form);
			$data['res_setting']=$this->User_model->get_account_settings();
			 $to_email =$data['res_setting']->email ;
			$from_email="admin@chicagoinstituteoftechnology.com";
			$subject="Course details page Inquiry Form";
			$message="			
			<h1>Course details Page Inquiry Form Details, </h1><br />
			<table>
			<tr>
			<td>
			<p>Name:$uname</p>
			<p>Email:$email</p> 
			<p>Mobile:$mobile</p>			
			<p>Description:<p>$c_message</p></p>
			</td>
			</tr>
			</table>
			
			<br /> <br />
			
			";
			$to_email =$data['res_setting']->email ;
			$config['protocol'] = 'sendmail';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";
            $this->email->initialize($config);			
            $this->email->from($from_email,'chicagoinstituteoftechnology');
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send())
            {
				$this->session->set_flashdata('msg','Your course inquiry Deatils Submitted ');
				redirect('courses/details/'.$batch_id);
            }
            else
            {
				$this->session->set_flashdata('errormsg','There is error  in database,Please Try again ');
				redirect('courses/details/'.$batch_id);
            }
		}
	}
	public function success()
	{
		if(!$this->session->userdata('user_student_is_logged_in'))
		redirect('home');
		if($_POST['x_response_code']==1)
		{
			$amount=$_POST['x_amount'];
			$trans=$_POST['x_trans_id'];
			/*
			  x_first_name,x_last_name,x_city,x_state,x_country,x_phone,x_fax,x_email
			  x_fp_timestamp
			*/
			$row_id=$this->session->userdata('row_uni_id_ss');
			$this->Courses_model->update_course_orders($amount,$trans,$row_id);
			$data['page_title']='Course payment gateway success';
			$data['description']='Course payment gateway success';
			/*************Email Template*************************************/
			$user_id_sess=$this->session->userdata('user_id_sess');
			$sql=$this->db->query("SELECT std_email,std_name FROM students_tbl WHERE user_id='$user_id_sess'");
			$st_data=$sql->row();
			$bt_id=$this->session->userdata('co_course_id');
			$sqlb=$this->db->query("SELECT * FROM `course_batches`,courses WHERE course_batches.cb_course_id=courses.course_id AND course_batches.batch_id='$bt_id'");
			$course_data=$sqlb->row();
			$course_name=$course_data->course_name;		
			$to_email =$st_data->std_email;
			$config['protocol'] = 'sendmail';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
			$from_email="admin@chicagoinstituteoftechnology.com";
			$subject='Course Payment Details in Chicago Institute Of Techonology ';			
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
				  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align:justify;" valign="top">
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Dear '.$st_data->std_name.',</p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thank you for your enrolling '.$course_name.' with Chicago Institute of Technology. All of your information will be kept secure and private.</p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">This email confirms your enrollment was successful.</p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
					Please contact one of our highly experienced Admission Advisor by calling 630-237-4456 or emailing at trainings@chicagoinstituteoftechnology.com and we can help you to answer any questions you may have.</p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Amount :'.$amount.' </p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Transaction id : '.$trans.'</p>					
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">We are looking forward to help you learn '.$course_name.' .</p>
					<p>
					Sincerely,<br />
					Chicago Institute of Technology<br />
					113 Fairfield Way, Suite 204<br />
					Bloomingdale, IL 60108<br />
					U.S.A<br />
					Tel: 630-237-4456<br />
					info@chicagoinstituteoftechnology.com<br />
					www.chicagoinstituteoftechnology.com<p>
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
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($email_template);
            $this->email->send();			
			/*************End Email *************************************/
			$this->session->unset_userdata('co_course_id');
		    $this->session->unset_userdata('row_uni_id_ss');
			redirect('courses/transation_success/'.$amount.'/'.$trans);	
		}
        else if($_POST['x_response_code']==2 || $_POST['x_response_code']==3)
		{
			$row_id=$this->session->userdata('row_uni_id_ss');
			$this->db->query("UPDATE course_orders SET co_payment_status='declined' WHERE co_id='".$row_id."'");
			$data['page_title']='Course payment gateway declined';
			$data['description']='Course payment gateway declined';
			$this->session->unset_userdata('co_course_id');
		    $this->session->unset_userdata('row_uni_id_ss');
			redirect('courses/transation_fail');
			
		}
	}
	function transation_success($amount,$trans)
	{
	  $data['amount']=$amount;
	  $data['trans_id']=$trans;
	  $data['page_title']='Course payment gateway success';
	  $data['description']='Course payment gateway success';
	  $data['res_setting']=$this->User_model->get_account_settings();
	  $this->load->view('success_view1',$data);	
	}
	function transation_fail()
	{
	  $data['page_title']='Course payment gateway declined';
	  $data['description']='Course payment gateway declined';
	  $data['res_setting']=$this->User_model->get_account_settings();
	  $this->load->view('fail_view',$data);
	}	
	function secure_payment_gateway()
	{
	  if($this->input->post('secure_btn'))
	  {	  
		if(!$this->session->userdata('user_student_is_logged_in'))
		redirect('home');
	    $results=$this->Courses_model->get_courses_details($this->session->userdata('co_course_id'));
         if(!empty($results))
		 {
			$data['courses_details']=$results;
			$order_id=$this->generateRandomString();
			$std_id=$this->session->userdata('user_id_sess');
			$batch_id=$this->session->userdata('co_course_id');
			$pdate=date('Y-m-d h:i:s');
			$insert_data=array('std_user_id'=>$std_id,'co_course_id'=>$batch_id,'co_order_id'=>$order_id,'co_date_time'=>$pdate,'co_payment_status'=>'pending');
            $row_uni_id=$this->Courses_model->insert_course_orders($insert_data);
            $this->session->set_userdata('row_uni_id_ss',$row_uni_id);		
			$data['page_title']='Course payment gateway';
			$data['description']='Course payment gateway';
			$data['res_setting']=$this->User_model->get_account_settings();
			$this->load->view('samplegge4payment',$data);
		 }
      }		
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
/*************************** *****************************************/
public function search_all()
{
	$search_term = array();
	if ($this->input->post('course_search_btn_mn'))
	{
		$search_term = array('course_cat'=>$this->input->post('course_cat'),'course_title'=>$this->input->post('hcourse_title'),'course_type'=>$this->input->post('course_type'));
		$this->session->set_userdata('search_term', $search_term);
	}
	else if($this->session->userdata('search_term'))
	{
		$search_term =$this->session->userdata('search_term');	 
	}
	$data['posted_data']=$search_term;
	/*print_r($search_term); exit;*/
	$config = array();
	$config["base_url"] = base_url() ."courses/search_all";
	$total_row = $this->Courses_model->search_get_allcourses_count($search_term);
	$config["total_rows"] =$total_row;
	$config["per_page"] = 8;
	$config['use_page_numbers'] = TRUE;
	$config['num_links'] = $total_row;
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
	$this->pagination->initialize($config);
	if($this->uri->segment(3))
	{
		$page =($this->uri->segment(3) * $config['per_page']) - $config['per_page'];
	}
	else
	{
		$page =0;
	}
	$data['page_title']='Search Courses';
	$data['description']='Courses';
	$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
	$data['res_setting']=$this->User_model->get_account_settings();
	$data['rec_courses']=$this->Courses_model->search_get_allcourses($config["per_page"],$page,$search_term);
	$data['course_cat_list']=$this->Courses_model->get_course_categories();
	$this->load->view('search_courses_view',$data);
}
/*************************** *****************************************/
	
}