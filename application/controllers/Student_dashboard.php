<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('security');
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('User_model');
		$this->load->model('Students_model');
		if(!$this->session->userdata('user_student_is_logged_in'))
		{
			redirect('home');
		}
		/*if($this->session->userdata('user_is_logged_in'))
		{
			if($this->session->userdata('usr_usertype')=='student')
			 redirect('Student_dashboard');
		}*/
		
    }
	public function index()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['res_std']=$this->Students_model->get_student_details();
		$data['notifications']=$this->Students_model->get_all_notifications();
		$data['page_title']='Student Dashboard | Chicago Institute Of Techonology ';
		$data['description']='';
		$data['old_n']='no';
		$this->load->view('student_dashboard',$data);
	}
	public function notifications_old()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['notifications']=$this->Students_model->get_old_notifications();
		$data['page_title']='Tutor Dashboard | Chicago Institute Of Techonology ';
		$data['description']='';
		$data['old_n']='yes';
		$this->load->view('student_dashboard',$data);
		//$this->load->view('tutor/tutor_dashboard',$data);
	}
	public function courses()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['paid_courses']=$this->Students_model->get_allcourses_paid();
		$data['page_title']='Student courses | Chicago Institute Of Techonology ';
		$data['description']='';	
		$this->load->view('template/dash_header',$data);
		$this->load->view('student_courses_view',$data);
	}
	function search_courses()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['paid_courses']=$this->Students_model->get_allcourses_paid_search();
		$data['page_title']='Student courses | Chicago Institute Of Techonology ';
		$data['description']='';	
		$this->load->view('template/dash_header',$data);
		$this->load->view('student_courses_view',$data);
	}
	public function ebooks()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['course_drp']=$this->Students_model->stu_regi_course_drop();
		$data['page_title']='Student E books | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('stu_dash_ebooks',$data);
	}
	public function search_ebooks()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['ebooks']=$this->Students_model->get_allebook_search();
		$data['page_title']='Student E books | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('stu_dash_ebooks_view',$data);
	}
	function pdfbook_view($id)
	{
		if($id)
		{	
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['ebooks']=$this->Students_model->get_ebook_view($id);
			$data['page_title']='Student E books | Chicago Institute Of Techonology ';
			$data['description']='';
			$this->load->view('stu_dash_pdfbook_view',$data);
		}
	}
	public function video_tutorials()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['course_drp']=$this->Students_model->stu_regi_course_drop();
		$data['page_title']='Student Video Tutorials | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('stu_dash_videos',$data);
	}
	function search_videos()
	{
		
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['videos']=$this->Students_model->get_allvideos_search();
		$data['page_title']='Student E books | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('stu_dash_videos_view',$data);
	}
	function get_course_batch()
	{
		$course_id=$this->input->get('q');
		$results=$this->Students_model->get_course_batches($course_id);
		$data='<select class="form-control hunper" name="batch_id" id="batch_id" required >
                                	<option value="" >Select Your Batch</option>';
		foreach($results as $row):
		$data .='<option value="'.$row->batch_id.'" >'.$row->cb_batchname.'</option>';
		endforeach;
		$data .='</select>';
		echo $data;
	}
	public function group_discussion()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['course_drp']=$this->Students_model->stu_regi_course_drop();
		$data['page_title']='Student group discussion | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('stu_dash_groupdis',$data);
	}
	function group_discussion_view()
	{
		$course_id=$this->input->post('course_id');
		$batch_id=$this->input->post('batch_id');
		$results=$this->Students_model->check_student_resister_course($course_id,$batch_id);
		if($results>0)
		{	
	        $this->session->set_userdata('gd_course_id',$course_id);
			$this->session->set_userdata('gd_batch_id',$batch_id);			
			$data['questions_all']=$this->Students_model->get_all_questions_forcourse($course_id,$batch_id);
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Student group discussion | Chicago Institute Of Techonology ';
			$data['description']='';
			//$this->load->view('stu_group_discuss_view',$data);
			redirect('Student_dashboard/group_discussion_view1/'.$course_id.'/'.$batch_id);
		}
		else
		{
			$this->session->set_flashdata('msg_st','Your not registered for this course, Please purchase course');
			redirect('Student_dashboard/group_discussion');
		}
	}
	
	function group_discussion_view1($course_id,$batch_id)
	{
		//$course_id=$this->input->post('course_id');
		//$batch_id=$this->input->post('batch_id');
		$results=$this->Students_model->check_student_resister_course($course_id,$batch_id);
		if($results>0)
		{	
	        //$this->session->set_userdata('gd_course_id',$course_id);
			//$this->session->set_userdata('gd_batch_id',$batch_id);			
			$data['questions_all']=$this->Students_model->get_all_questions_forcourse($course_id,$batch_id);
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Student group discussion | Chicago Institute Of Techonology ';
			$data['description']='';
			$this->load->view('stu_group_discuss_view',$data);
		}
		else
		{
			$this->session->set_flashdata('msg_st','Your not registered for this course, Please purchase course');
			redirect('Student_dashboard/group_discussion');
		}
	}
	function group_discussion_del($course_id,$batch_id,$id)
	{	
		$this->db->where('question_id', $id);
	   $this->db->delete('questions');
	   $this->db->where('as_question_id', $id);
	   $this->db->delete('answers');
       redirect('Student_dashboard/group_discussion_view1/'.$course_id.'/'.$batch_id);	   
	}
	public function gd_ask_question()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['page_title']='Student  group discussion | Chicago Institute Of Techonology ';
		$data['description']='';
		$data['form_submit']=0;
		$this->load->view('stu_ask',$data);
	}
	public function gd_answer_question($qs_id)
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['answer_all']=$this->Students_model->get_all_answer_question($qs_id);
		$data['ques']=$this->Students_model->get_question($qs_id);
		$data['page_title']='Student  group discussion | Chicago Institute Of Techonology ';
		$data['description']='';
		//$data['form_submit']=0;
		$this->load->view('student_ques_view',$data);
	}
	function gd_question_post()
	{
		if($this->input->post('qs_title'))
		{
			$user_id=$this->session->userdata('user_id_sess');
			$usr_usertype=$this->session->userdata('usr_usertype');
			
			$course_id=$this->session->userdata('gd_course_id');
			$batch_id=$this->session->userdata('gd_batch_id');
			$title=$this->input->post('qs_title');
			$qs_des=$this->input->post('qs_des');
			$date=date('Y-m-d');
			$data_insert= array(
			'qs_userid' => $user_id,
			'qs_usertype' => $usr_usertype,
			'qs_title' => $title,
			'qs_des' => $qs_des,
			'qs_course_id' => $course_id,
			'qs_batch_id' => $batch_id,
			'qs_date' => $date,
			);
			$this->db->insert('questions', $data_insert);
			
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Student  group discussion | Chicago Institute Of Techonology ';
			$data['description']='';
			$data['form_submit']=1;
			$this->load->view('stu_ask',$data);
		}
	}
	function gd_answer_post($as_question_id)
	{
		if($this->input->post('qs_des'))
		{
			$user_id=$this->session->userdata('user_id_sess');
			$usr_usertype=$this->session->userdata('usr_usertype');
			$course_id=$this->session->userdata('gd_course_id');
			$batch_id=$this->session->userdata('gd_batch_id');
			//$as_question_id=$this->input->post('as_question_id');
			$qs_des=$this->input->post('qs_des');
			$date=date('Y-m-d');
			$data_insert= array(
			'as_userid' => $user_id,
			'as_usertype' => $usr_usertype,
			'as_question_id' => $as_question_id,
			'as_des' => $qs_des,
			'as_date' => $date
			);
			$this->db->insert('answers', $data_insert);
			redirect('Student_dashboard/gd_answer_question/'.$as_question_id.'?mt=1');
			/*$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Student  group discussion | Chicago Institute Of Techonology ';
			$data['description']='';
			$data['form_submit']=1;
			$this->load->view('stu_ask',$data);*/
		}
	}
	public function quiz()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['course_drp']=$this->Students_model->stu_regi_course_drop();
		//$data['quiz_list']=$this->Student_dashboard->get_student__list();
		$data['page_title']='Student quiz | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('stu_dash_quiz',$data);
	}
	function quiz_view()
	{
		$course_id=$this->input->post('course_id');
		$batch_id=$this->input->post('batch_id');
		$results=$this->Students_model->check_student_resister_course($course_id,$batch_id);
		if($results>0)
		{	
	        $this->session->set_userdata('qz_course_id',$course_id);
			$this->session->set_userdata('qz_batch_id',$batch_id);		
			$data['quiz_all']=$this->Students_model->get_all_quiz_forcourse($course_id,$batch_id);
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Student group discussion | Chicago Institute Of Techonology ';
			$data['description']='';
			$this->load->view('stu_dash_quiz_view',$data);
		}
		else
		{
			$this->session->set_flashdata('msg_st','Your not registered for this course, Please purchase course');
			redirect('Student_dashboard/quiz');
		}
	}
	public function quiz_upload_answer_sheet($qz_id)
	{
		$data['quiz_dt']=$this->Students_model->get_tutor_quiz_deatils($qz_id);
		//print_r($data['quiz_dt']); exit;
		$rules = 	[				       
						 [
				                'field' => 'quiz_name',
				                'label' => 'Quiz Name',
				                'rules' => 'required'
				        ]				       
					];
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()==FALSE)
		{
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Tutor quiz | Chicago Institute Of Techonology ';
			$data['description']='';
			$this->load->view('stu_answer_view',$data);
		}
        else
		{
			 $config =	[
							'upload_path'	=> './quiz/',
	            			'allowed_types' => 'doc|docx|pdf',
							'encrypt_name'=>TRUE,
	            			'max_size'      => 2048
            			];

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('quiz_file'))
            {
                    $error = array('error' => $this->upload->display_errors());
					$data['error']=$error;
					$data['res_setting']=$this->User_model->get_account_settings();
					$data['page_title']='Tutor quiz | Chicago Institute Of Techonology ';
					$data['description']='';
					$this->load->view('stu_answer_view',$data);
            }
            else
            {
				 //print_r($_POST);exit;
                    $file = $this->upload->data();
                    $file_name=$file['file_name'];
					$qz_id=$this->input->post('qz_id');
					$course_id=$this->input->post('qz_course_id');
					$batch_id=$this->input->post('qz_batch_id');
					$u_id=$this->session->userdata('user_id_sess');
                    $data_insert = [
								'ex_user_id'=>$u_id,
								'ex_qz_id'=>$qz_id,
                    			'ex_file' => $file['file_name'],
                    			'ex_course_id'=> strip_tags($course_id),
                    			'ex_batch_id'=> strip_tags($batch_id),
								'ex_status'=>'exam written',
								'ex_date'=>date('Y-m-d')
                    		];
                    $this->Students_model->create_exam($data_insert,$batch_id);
					$this->session->set_flashdata('message','<b style="color:green;"> Uploaded Successfully.</b>');
					redirect('Student_dashboard/quiz');
            }
			
		}		
	}
	public function contact_admin()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['page_title']='Student contact admin | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->form_validation->set_rules('question_type', 'Select', 'trim|required|xss_clean');
		
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
		$this->form_validation->set_rules('subject', 'subject', 'trim|required|xss_clean');        
		//$this->form_validation->set_rules('c_message', 'Message', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('stu_contact_admin',$data);
		}
		else
		{
			$username = $this->session->userdata('usr_username');
			$type = $this->input->post('question_type');
			$subject = $this->input->post('subject');
			$c_message = $this->input->post('message');
			$to_email =$data['res_setting']->email ;
			$config['protocol'] = 'sendmail';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
			$from_email="info@chicagoinstituteoftechnology.com";
			$subject=$subject;
			$message="			
			<h1>Student Contact form Details, </h1><br />
			<table>
			<tr>
			<td>
			<p>Username :$username</p>
			<p>Feedback:$type</p> 
			
			<p>Subject:$subject</p>
			<p>Details:<p>$c_message</p></p>
			</td>
			</tr>
			</table>
			
			<br /> <br />
			
			";
			$this->db->query("INSERT INTO `student_contact`( `username`, `subject`, `message`,contact_type) VALUES ('$username','$subject','$c_message','$type')");
            $this->email->from($from_email,'chicagoinstituteoftechnology');
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send())
            {
				$this->session->set_flashdata('msg','Your Contact Deatils Submitted ');
				redirect('student_dashboard/contact_admin');
            }
            else
            {
			   $this->session->set_flashdata('errormsg','There is error  in database,Please Try again ');
			   redirect('student_dashboard/contact_admin');
            }
		}	
	}
	public function settings()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['res_std']=$this->Students_model->get_student_details();
		$data['page_title']='Student settings | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
        {
			$this->load->view('stu_settings',$data);
		}
		else
		{
			$student_name=$this->input->post('student_name');
			$email=$this->input->post('email');
			$mobile=$this->input->post('mobile');
			$gender=$this->input->post('gender');
			$city=$this->input->post('city');
			$education=$this->input->post('education');
			$dob=$this->input->post('dob');
			$userid=$this->session->userdata('user_id_sess');
			$this->db->query("UPDATE `students_tbl` SET `std_email`='$email',`std_name`='$student_name',`std_mobile`='$mobile',std_gender='$gender',std_city='$city',std_education='$education',std_dob='$dob' WHERE user_id='".$userid."' ");
			$this->session->set_flashdata('msg','Updated Successfully!');
			redirect('student_dashboard/settings');
		}	
	}
	public function profile()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['res_std']=$this->Students_model->get_student_details();
		$data['page_title']='Student Profile | Chicago Institute Of Techonology ';
		$data['description']='';
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
        {
			$this->load->view('stu_profile_view',$data);
		}
		else
		{
			 $config =	[
							'upload_path'	=> './images/profile/',
	            			'allowed_types' => 'png|jpeg|jpg|gif',
							'encrypt_name'=>TRUE,
	            			'max_size'      => 2048
            			];
            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('std_file'))
            {
                    $error = array('error' => $this->upload->display_errors());
					$data['error']=$error;
					$data['res_setting']=$this->User_model->get_account_settings();
					$data['res_std']=$this->Students_model->get_student_details();
					$data['page_title']='Student Profile | Chicago Institute Of Techonology ';
					$data['description']='';
					$this->load->view('stu_profile_view',$data);
            }
            else
            {
                    $file = $this->upload->data();
                    $file_name=$file['file_name'];
					$userid=$this->session->userdata('user_id_sess');
					$this->db->query("UPDATE `students_tbl` SET std_image='$file_name' WHERE user_id='".$userid."' ");
					$this->session->set_flashdata('msg','<b style="color:green; ">Updated Successfully!</b>');
					redirect('student_dashboard');
            }
			
		}	
	}
	function logout()
	{
		$this->session->unset_userdata('user_id_sess');
		$this->session->unset_userdata('usr_username');
		$this->session->unset_userdata('usr_usertype');
		$this->session->unset_userdata('user_student_is_logged_in');
		//$this->session->sess_destroy();
		redirect('home');
	}
}