<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_socail_login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('security');
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('User_model');
		$this->load->library('HybridAuthLib');
		if(!$this->session->userdata('sess_sl_user_profile'))
		{
		  redirect('home');
		}
    }
	public function index()
	{
		$data['page_title']='Student Social Login';
		$data['description']='Student Social Login';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$this->load->view('student_socail_login_view',$data);
	}
	function submit()
    {
		$data['description']='Student Registration';		
		$data['page_title']='Student Social Login';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email|is_unique[students_tbl.std_email]',array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already taken, Please choose another email' ));
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean');
       
        if($this->form_validation->run() == FALSE)
        {
			$this->load->view('student_socail_login_view',$data);
        }
        else
        {
			$user_profile=$this->session->userdata('sess_sl_user_profile');
			$fb_id=$user_profile['identifier'];
			$name=$user_profile['name'];
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $mobile = $this->input->post('mobile');
			$pwd=rand(0000,9999);
            $password = md5($pwd);
			$new_member_insert_data1 = array(
			'usr_username' => $username,
			'usr_pwd' => md5($pwd),
			'usr_usertype' => 'student',
			'usr_sn_id' => $fb_id
			);
			$insert = $this->db->insert('tbl_users', $new_member_insert_data1);

			$last_id = $this->db->insert_id();
			$new_member_insert_data = array(
			'user_id' => $last_id,				
			'std_email' => $email,			
			'std_mobile' => $mobile,
			'std_username'=> $username,
			'std_name'=>$name,
			'std_pwd' =>''
			);
			$insert = $this->db->insert('students_tbl', $new_member_insert_data);


			$data= array(
			'user_id_sess' => $last_id,
			'usr_username' => $username,
			'usr_usertype' => 'student',
			'usr_date_time' => '',
			'user_student_is_logged_in' => true
			);
			$this->session->set_userdata($data);
			
            $to_email =$email;
			$config['protocol'] = 'sendmail';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
			$from_email="admin@chicagoinstituteoftechnology.com";
			$subject='Your User Account Created in Chicago Institute Of Techonology ';
			/*$message="Hi $name, <br />
			<p>Login Deatils :</p>
			<p>Username : $username</p>
			<p>Password : $pwd</p> <br />
			<p><b>Please login and Activate your Account </b></p>
			 
			<br /> <br />
			Thank You.
			";*/
			$message='<!doctype html>
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
				  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hello '.$name.',</p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thank You For Register in Chicago Institute Of Techonology.</p>
					
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
					<p>Login Deatils</p>
					<p>Username : $username</p>
					<p>Password : $pwd</p>
				</p>										
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
            $this->email->message($message);
            if($this->email->send())
            {
				$this->session->unset_userdata('sess_sl_user_profile');
                $url_std=base_url()."Student_dashboard";							
				redirect($url_std);
            }
        }
    }
function alpha_space_only($str)
{
	$check_user =$this->User_model->check_username($str);
	if(!preg_match("/^[a-zA-Z0-9_@.]+$/",$str))
	{	
		$this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets,numbers and underscore Only');
		return FALSE;
	}
	else if($check_user==TRUE)
	{
		$this->form_validation->set_message('alpha_space_only', 'The %s Already Taken,Please Choose Another Username');
		return FALSE;
	}
	else
	{
		return TRUE;
	}
}
	
}