<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('security');
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('User_model');
		$this->load->model('Courses_model');
		$this->load->library('HybridAuthLib');
    }
	public function index()
	{
		if(!$this->session->userdata('cit_country'))
		{
			$ip_add=$_SERVER['REMOTE_ADDR'];
			$data_country_ip=unserialize(convertTocountry($ip_add));
			if(!empty($data_country_ip))
			{
				$data_cip_name=ucfirst($data_country_ip['geoplugin_countryName']);
			}
			else{
				$data_cip_name='';
			}
		$res_country=$this->User_model->get_countries();
		foreach($res_country as $rowip)
			{
				
				if(ucfirst($rowip->country_name)==$data_cip_name)
				{
				$this->session->set_userdata('cit_country',$rowip->country_name);
				$this->session->set_userdata('cit_country_id',$rowip->country_id); 
				}
			}
			
		}
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['news_home']=$this->User_model->get_latest_newsevents();
		$data['res_banners']=$this->User_model->get_home_banners();
		$data['res_gallery']=$this->User_model->get_home_gallery();
		$data['res_testimonials']=$this->User_model->get_home_testimonials();
		
		$data['res_homeimages']=$this->User_model->get_homeimage();
		$data['res_homecat']=$this->User_model->get_home_course_category();
		$data['res_faculty']=$this->User_model->get_home_faculty_members();
		
		$data['page_title']=$data['res_homeimages']->meta_title;
		$data['meta_des']=$data['res_homeimages']->meta_des;
		$data['c_message'] ='';
		$data['ci_cat']='';
		/*$data['rec_courses']=$this->Courses_model->get_allcourses_oncampus(3,0);*/
		$this->load->view('template/header',$data);
		$this->load->view('index',$data);
		$this->load->view('template/footer');
	}
	public function country()
	{
		if($this->input->post('drpcountry_name'))
		{	
	      $drp_cname=$this->input->post('drpcountry_name');
		  $drp_cid=$this->input->post('drpcountry_id');
		  $drp_url=$this->input->post('drpcountry_url');
		  $this->session->set_userdata('cit_country',$drp_cname);
		  $this->session->set_userdata('cit_country_id',$drp_cid);
		  redirect($drp_url);
	  }	
	}
	public function course_inquiry()
	{
		
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['news_home']=$this->User_model->get_latest_newsevents();
		$data['res_banners']=$this->User_model->get_home_banners();
		$data['res_gallery']=$this->User_model->get_home_gallery();
		$data['res_testimonials']=$this->User_model->get_home_testimonials();
		$data['res_homeimages']=$this->User_model->get_homeimage();
		$data['page_title']=$data['res_homeimages']->meta_title;
		$data['meta_des']=$data['res_homeimages']->meta_des;
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_homecat']=$this->User_model->get_home_course_category();
		$data['res_faculty']=$this->User_model->get_home_faculty_members();
		$data['rec_courses']=$this->Courses_model->get_allcourses_oncampus(3,0);
		$this->form_validation->set_rules('ci_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ci_email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('ci_mobile', 'Mobile', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ci_cat', 'Category', 'trim|required|xss_clean');        
       $this->form_validation->set_rules('ci_des', 'Description', 'trim|required|xss_clean'); 
	   $this->form_validation->set_rules('ci_captcha', 'Captcha', 'trim|required|xss_clean|callback_check_captcha_val');
        if ($this->form_validation->run() == FALSE)
        {
            $data['c_message'] = $this->input->post('ci_des');
			$data['ci_cat']= $this->input->post('ci_cat');
			$this->load->view('template/header',$data);
			$this->load->view('index',$data);
			$this->load->view('template/footer');
        }
        else
        {
			$uname = $this->input->post('ci_name');
            $email = $this->input->post('ci_email');
            $mobile = $this->input->post('ci_mobile');
			$cat = $this->input->post('ci_cat');
			$c_message = $this->input->post('ci_des');
			
			$data_insert=array(
								'name'=>$uname,
								'email'=>$email,
								'mobile'=>$mobile,
								'course_name'=>$cat,
								'message'=>$c_message);
			$this->db->insert('course_contact',$data_insert);	
			$to_email =$data['res_setting']->email ;			
			$from_email="admin@chicagoinstituteoftechnology.com";
			$subject="Course Inquiry Form";
			$message="			
			<h1>Course Inquiry Form Details, </h1><br />
			<table>
			<tr>
			<td>
			<p>Name:$uname</p>
			<p>Email:$email</p> 
			<p>Mobile:$mobile</p>
			<p>Course Category:$cat</p>
			<p>Comments:<p>$c_message</p></p>
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
				redirect('home');
            }
            else
            {
				$this->session->set_flashdata('errormsg','There is error  in database,Please Try again ');
				redirect('home');
            }
		}
	}
	function check_captcha_val($str)
	{
		if($str=="")
		{
			$this->form_validation->set_message('check_captcha_val', 'PLease Enter Sum of two values');
			return FALSE;
		}
		else if($str==$this->session->userdata('ci_captcha'))
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_captcha_val', 'Enter Correct value ');
			return FALSE;
		}
	}
	public function privacy_statement()
	{
		$data['page_title']='Privacy Statement';
		$data['description']='';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['res_homeimages']=$this->User_model->get_homeimage();
		$data['res_homecat']=$this->User_model->get_home_course_category();
		$data['res_faculty']=$this->User_model->get_home_faculty_members();
		$data['res_privacy_statement']=$this->User_model->get_content_pages(6);
		$this->load->view('privacy_statement_view',$data);
	}
	public function refund_policy()
	{
		$data['page_title']='Refund Policy';
		$data['description']='';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['res_homeimages']=$this->User_model->get_homeimage();
		$data['res_homecat']=$this->User_model->get_home_course_category();
		$data['res_faculty']=$this->User_model->get_home_faculty_members();
		$data['res_refund_policy']=$this->User_model->get_content_pages(5);
		$this->load->view('refund_policy_view',$data);
	}
	public function terms_and_conditions()
	{
		$data['page_title']='Terms And Conditions';
		$data['description']='';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['res_homeimages']=$this->User_model->get_homeimage();
		$data['res_homecat']=$this->User_model->get_home_course_category();
		$data['res_faculty']=$this->User_model->get_home_faculty_members();
		$data['res_terms']=$this->User_model->get_content_pages(4);
		$this->load->view('terms_and_conditions_view',$data);
	}
	function submit()
    {
		$data['title']='Student Registration';
		$data['description']='Student Registration';
		$this->form_validation->set_rules('stuname', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email|is_unique[students_tbl.std_email]',array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already taken, Please choose another email' ));
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');        
       $this->form_validation->set_rules('conpassword', 'Confirm Password', 'trim|required|xss_clean|matches[password]'); 
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
			$std_name = $this->input->post('stuname');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $mobile = $this->input->post('mobile');
            $password = md5($this->input->post('password'));
            if($this->User_model->create_member())
			{
            
            $to_email =$email;
			$config['protocol'] = 'sendmail';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
			$from_email="admin@chicagoinstituteoftechnology.com";
			$subject='Your User Account Created in Chicago Institute Of Techonology !';
			/*$message="Hi $std_name, <br />
			<p>Thank You For Register With US , We Will Get Back You As Soon As Possible.</p>
			<p><b>Please login and Activate your Account </b></p>
			 Thank You For Register in Chicago Institute Of Techonology. Your registration Process completed successfully
			<br /> <br />
			Thank You.
			";*/
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
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Dear '.$std_name.',</p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thank you for your interest with Chicago Institute of Technology. All of your information will be kept secure and private. </p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
					This email confirms your registration was successful. You can now select and register courses and make a payment to secure your seat in training by exploring courses from our website. We offer wide range of Technology and Business education which was designed by our Highly experienced Instructors who are in the industry for more than 15 years. We also offer career counseling at the end of every course and offer our students to practice in our live projects and chance to get internship in the Companies like DigiTek IT Inc, Shear Circle LLC.</p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px; text">
					Please contact one of our highly experienced Admission Advisor by calling 630-237-4456 or emailing at trainings@chicagoinstituteoftechnology.com and we can help you select our course that can excel your career.</p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">We look forward to speaking with you and helping you.</p>
				<p style="text-align:justi">Sincerely,<br />
				Chicago Institute of Technology<br />
				109 Fairfield Way, Suite 303<br />
				Bloomingdale, IL-60108<br />
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
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($email_template);
            if($this->email->send())
            {
                echo "YES";
            }
            else
            {
                echo "NO";
            }
		  }	
        }
    }
	function quick_inquiry()
    {
		$data['title']='Home | Chicago Institute Of Techonology ';
		$data['description']='Home | Chicago Institute Of Techonology ';
		$data['res_setting']=$this->User_model->get_account_settings();
        $this->form_validation->set_rules('qi_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qi_email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('qi_phone', 'Phone / Mobile', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qi_message', 'Message', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $name = $this->input->post('qi_name');
            $email = $this->input->post('qi_email');
            $mobile = $this->input->post('qi_phone');
            $c_message = $this->input->post('qi_message');
			$page_name=$this->input->post('qi_page');
			
			$data_insert=array(
								'name'=>$name,
								'email'=>$email,
								'mobile'=>$mobile,
								'pagename'=>$page_name,
								'message'=>$c_message);
			$this->db->insert('quick_inquiry',$data_insert);
			//echo "YES"; exit;
            //if($this->User_model->create_member())
			//{
			$data['res_setting']=$this->User_model->get_account_settings();	
            $to_email =$data['res_setting']->email ;
			$config['protocol'] = 'sendmail';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
			$from_email="admin@chicagoinstituteoftechnology.com";
			$subject="Quick Inquiry Form";
			$message="			
			<h1>Quick Inquiry Form Details, </h1><br />
			<table>
			<tr>
			<td>
			<p>Name:$name</p>
			<p>Email:$email</p> 
			<p>Phone /Mobile:$mobile</p>
			<p>Message :<p>$c_message</p></p>
			</td>
			</tr>
			</table>
			
			<br /> <br />
			
			";
            $this->email->from($from_email,'chicagoinstituteoftechnology');
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send())
            {
                echo "YES";
            }
            else
            {
                echo "NO";
            }
		  //}	
        }
    }
	function user_signin()
    {
		$data['title']='About Us';
		$data['description']='About Us';
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {            
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
			$page_course_id=trim($this->input->post('page_course_id'));
			$log_page_name=trim($this->input->post('log_page_name'));
			$log_page_url=trim($this->input->post('log_page_url'));
            $res=$this->User_model->validate_credentils($username,$password);				
            if(!empty($res))
            {
				
				$this->User_model->update_login_datetime($res->usr_id);
				if($res->usr_usertype=='student')
				{
					$data = array(
					'user_id_sess' => $res->usr_id,
					'usr_username' => $res->usr_username,
					'usr_usertype' => $res->usr_usertype,
					'usr_date_time' => $res->usr_date_time,
					'user_student_is_logged_in' => true
					);
					$this->session->set_userdata($data);
				  $rd_url=base_url().'courses/details/'.$page_course_id;
				  if($log_page_name=='courses' && $log_page_url==$rd_url)
				    echo 'courses';
				  else					  
				  echo 'Student_dashboard';
				}  
				else if($res->usr_usertype=='tutor')
				{
					$data = array(
					'user_id_sess' => $res->usr_id,
					'usr_username' => $res->usr_username,
					'usr_usertype' => $res->usr_usertype,
					'usr_date_time' => $res->usr_date_time,
					'user_tutor_is_logged_in' => true
					);
					$this->session->set_userdata($data);	
					echo 'Tutor_dashboard';
				}	
				/*redirect('Student_dashboard');
				echo "YES";*/
            }
            else
            {
                echo "NO";
            }		  	
        }
    }
function forgot_pwd()
{
		$data['title']='Forgot Password';
		$data['description']='Forgot Password';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
        $this->form_validation->set_rules('forgotpwd_email', 'Username', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {            
            $username = $this->input->post('forgotpwd_email');         
            $res=$this->User_model->check_user_email($username);				
            if(!empty($res))
            {
				if($res->usr_usertype=='student')
				{
					$this->db->where('user_id', $res->usr_id);
					$query1 = $this->db->get('students_tbl');
					$row=$query1->row();
					$email=$row->std_email;
					
					$this->session->set_userdata('sess_forgot_uid',$res->usr_id);
				}
				else
				{
					$this->db->where('user_id', $res->usr_id);
					$query1 = $this->db->get('tutors');
					$row= $query1->row();
					$email=$row->tutor_email;
					$this->session->set_userdata('sess_forgot_uid',$res->usr_id);					
				}
				$to_email =$email;
				$pwd_code=mt_rand(1000,9999);
				$this->session->set_userdata('sess_forgot_pwd',$pwd_code);
				$config['protocol'] = 'sendmail';
				$config['mailtype'] = 'html';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['newline'] = "\r\n";
				$this->email->initialize($config);
				$from_email="admin@chicagoinstituteoftechnology.com";
				$subject="Password Recovery";
				/*$message="			
				<h3>Password Recovery</h3><br />
				<p>Forgot Password Recovery code: ".$pwd_code."</p>
				<br /> <br />
               <P><b> Thanks & Regards,</b></p>
				chicagoinstituteoftechnology.com
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
				<img src="http://chicagoinstituteoftechnology.com/assets/images/logo_new.png" alt="" width="350" alt="chicago institute of technology"     > <br />
				
				</td></tr>
				<tr>
				  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hello '.$row->std_name.',</p>
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Password Recovery .</p>
					
					<p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Forgot Password Recovery code: '.$pwd_code.'</p>
				<br /><br />	
               <p><b> Thanks & Regards,</b></p>
				chicagoinstituteoftechnology.com
					
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
					echo "YES";
				}
				else
				{
					echo "sending email fail";
				}
            }
            else
            {
                echo "NO";
            }		  	
        }
}	
 /****************** custom validation function to accept alphabets and space **************************************************/
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