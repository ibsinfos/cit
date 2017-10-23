<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tutor_dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('security');
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('User_model');
		$this->load->model('Tutors_model');
		if(!$this->session->userdata('user_tutor_is_logged_in'))
		{
			redirect('home');
		}
		/*if($this->session->userdata('user_is_logged_in'))
		{
			if($this->session->userdata('usr_usertype')=='tutor')
			 redirect('Tutor_dashboard');
		}*/	
    }
	public function index()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['res_std']=$this->Tutors_model->get_tutor_details();
		$data['notifications']=$this->Tutors_model->get_all_notifications();
		$data['page_title']='Tutor Dashboard | Chicago Institute Of Techonology ';
		$data['description']='';
		$data['old_n']='no';
		$this->load->view('tutor/tutor_dashboard',$data);
		//$this->load->view('tutor/tutor_dashboard',$data);
	}
	public function notifications_old()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['notifications']=$this->Tutors_model->get_old_notifications();
		$data['page_title']='Tutor Dashboard | Chicago Institute Of Techonology ';
		$data['description']='';
		$data['old_n']='yes';
		$this->load->view('tutor/tutor_dashboard',$data);
		//$this->load->view('tutor/tutor_dashboard',$data);
	}
	public function courses()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['course_list']=$this->Tutors_model->get_tutor_courses_list();		
		$data['page_title']='Tutor courses | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('tutor/tutor_courses',$data);
	}
	public function batches()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['page_title']='Tutor Batches | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('tutor/tutor_batches',$data);
	}
	function search_batch_students()
	{
		$course_id=$this->input->post('course_id');
		$type=$this->input->post('type');
		$batch_id=$this->input->post('batch_id');
		$data['std_list']=$this->Tutors_model->get_search_batch_students($course_id,$batch_id,$type);
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['page_title']='Tutor Batches | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('tutor/tutor_batches_view',$data);
	}
	/*public function video_tutorials()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['page_title']='Student Video Tutorials | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('stu_dash_videos',$data);
	}*/
	function get_course_batch()
	{
		$course_id=$this->input->get('q');
		$results=$this->Tutors_model->get_course_batches($course_id);
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
		$data['page_title']='Tutor group discussion | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('tutor/tutor_groupdis',$data);
	}
	function group_discussion_view()
	{
		$course_id=$this->input->post('course_id');
		$batch_id=$this->input->post('batch_id');
		/*$results=$this->Tutors_model->check_tutor_resister_course($course_id,$batch_id);
		if($results>0)
		{	*/
	        $this->session->set_userdata('gd_course_id',$course_id);
			$this->session->set_userdata('gd_batch_id',$batch_id);			
			$data['questions_all']=$this->Tutors_model->get_all_questions_forcourse($course_id,$batch_id);
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Tutor group discussion | Chicago Institute Of Techonology ';
			$data['description']='';
			redirect('tutor_dashboard/group_discussion_view1/'.$course_id.'/'.$batch_id);
			//$this->load->view('tutor/tutor_group_discuss_view',$data);
		/*}
		else
		{
			$this->session->set_flashdata('msg_st','Your not registered for this course, Please purchase course');
			redirect('Tutor_dashboard/group_discussion');
		}*/
	}
	function group_discussion_view1($course_id,$batch_id)
	{
		//$course_id=$this->input->post('course_id');
		//$batch_id=$this->input->post('batch_id');
			
	        //$this->session->set_userdata('gd_course_id',$course_id);
			//$this->session->set_userdata('gd_batch_id',$batch_id);			
			$data['questions_all']=$this->Tutors_model->get_all_questions_forcourse($course_id,$batch_id);
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Tutor group discussion | Chicago Institute Of Techonology ';
			$data['description']='';
			$data['description']='';
			$this->load->view('tutor/tutor_group_discuss_view',$data);
		
	}
	public function gd_answer_question($qs_id)
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['answer_all']=$this->Tutors_model->get_all_answer_question($qs_id);
		$data['ques']=$this->Tutors_model->get_question($qs_id);
		$data['page_title']='Tutor group discussion | Chicago Institute Of Techonology ';
		$data['description']='';
		//$data['form_submit']=0;
		$this->load->view('tutor/tutor_ques_view',$data);
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
			redirect('tutor_dashboard/gd_answer_question/'.$as_question_id.'?mt=1');
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
		$data['quiz_list']=$this->Tutors_model->get_tutor_quiz_list();
		$data['page_title']='Tutor quiz | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('tutor/tutor_quizandexams',$data);
	}
	function quiz_deatils($qz_id)
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['quiz_dt']=$this->Tutors_model->get_tutor_quiz_deatils($qz_id);
		$data['page_title']='Tutor quiz | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('tutor/tutor_quizandexams_view',$data);
	}
	function tutor_exam_final_view($batch_id)
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['quiz_final']=$this->Tutors_model->tutor_exam_final($batch_id);
		$data['page_title']='Tutor quiz | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->load->view('tutor/tutor_exam_final_view',$data);
	}
	function update_exam_marks($ex_id)
	{
		$this->form_validation->set_rules('marks','Marks','required');
		if($this->form_validation->run() == FALSE)
		{
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Tutor quiz | Chicago Institute Of Techonology ';
			$data['description']='';
			$this->load->view('tutor/update_exam_marks',$data);
		}
        else
		{
			$marks=$this->input->post('marks');
			$ex_id=$this->input->post('ex_id');
			$re=$this->db->query("UPDATE exams SET ex_marks='$marks',ex_status='completed' WHERE ex_id='".$ex_id."'");
			$this->session->set_flashdata('message','<b style="color:green;">Updated Successfully.</b>');
			redirect('Tutor_dashboard/update_exam_marks/'.$ex_id);			
		}	
	}
	function marksgain_exam_marks($ex_id)
	{
		$this->form_validation->set_rules('marks','Marks','required');
		if($this->form_validation->run() == FALSE)
		{
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Tutor quiz | Chicago Institute Of Techonology ';
			$data['description']='';
			$this->load->view('tutor/marksgain_exam_marks',$data);
		}
        else
		{
			$ex_status=strip_tags($this->input->post('marks'));
			$ex_id=strip_tags($this->input->post('ex_id'));
			$re=$this->db->query("UPDATE exams SET ex_status='$ex_status' WHERE ex_id='".$ex_id."'");
			$this->session->set_flashdata('message','<b style="color:green;">Updated Successfully.</b>');
			redirect('Tutor_dashboard/marksgain_exam_marks/'.$ex_id);			
		}	
	}
	public function create_quiz()
	{
		$rules = 	[
				        [
				                'field' => 'course_id',
				                'label' => 'Course',
				                'rules' => 'required'
				        ],
						 [
				                'field' => 'quiz_name',
				                'label' => 'Quiz Name',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'batch_id',
				                'label' => 'Batch',
				                'rules' => 'required'
				        ]
					];
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE)
		{
			$data['res_setting']=$this->User_model->get_account_settings();
			$data['page_title']='Tutor quiz | Chicago Institute Of Techonology ';
			$data['description']='';
			$this->load->view('tutor/tutor_create_quiz',$data);
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
					$this->load->view('tutor/tutor_create_quiz',$data);
            }
            else
            {
                    $file = $this->upload->data();
                    $file_name=$file['file_name'];
					$name=$this->input->post('quiz_name');
					$course_id=$this->input->post('course_id');
					$batch_id=$this->input->post('batch_id');
					$tutor_id=$this->session->userdata('user_id_sess');
                    $data_insert = [
								'qz_user_id'=>$tutor_id,
								'qz_name'=>$name,
                    			'qz_filename' => $file['file_name'],
                    			'qz_course_id'=> strip_tags($course_id),
                    			'qz_batch_id'=> strip_tags($batch_id),
								'qz_date'=>date('Y-m-d')
                    		];
                    $this->Tutors_model->create_quiz($data_insert);
					$this->session->set_flashdata('message','<b style="color:green;">New Quiz Created.</b>');
					redirect('Tutor_dashboard/create_quiz');
            }
			
		}		
	}
	public function contact_admin()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['page_title']='Tutor contact admin | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->form_validation->set_rules('question_type', 'Select', 'trim|required|xss_clean');
		
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
		$this->form_validation->set_rules('subject', 'subject', 'trim|required|xss_clean');        
		//$this->form_validation->set_rules('c_message', 'Message', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('tutor/tutor_contact_admin',$data);
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
			<h1>Tutor Contact form Details, </h1><br />
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
			$this->db->query("INSERT INTO `tutor_contact`( `username`, `subject`, `message`,contact_type) VALUES ('$username','$subject','$c_message','$type')");
            $this->email->from($from_email,'chicagoinstituteoftechnology');
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send())
            {
				$this->session->set_flashdata('msg','Your Contact Deatils Submitted ');
				redirect('tutor_dashboard/contact_admin');
            }
            else
            {
			   $this->session->set_flashdata('errormsg','There is error  in database,Please Try again ');
			   redirect('tutor_dashboard/contact_admin');
            }
		}
	}
	public function profile()
	{
		$user_id=$this->session->userdata('user_id_sess');
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['res_std']=$this->Tutors_model->get_tutor_details();
		$data['page_title']='Tutor Profile | Chicago Institute Of Techonology ';
		$data['description']='';
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
        {
			$this->load->view('tutor/tutor_profile_view',$data);
		}
		else
		{
			 $config =	[
							'upload_path'	=> './images/tutor/',
	            			'allowed_types' => 'png|jpeg|jpg|gif',
							'encrypt_name'=>TRUE,
	            			'max_size'      => 2048
            			];
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('std_file'))
            {
                    $error = array('error' => $this->upload->display_errors());
					$data['error']=$error;
					$data['res_setting']=$this->User_model->get_account_settings();
					$data['res_std']=$this->Tutors_model->get_tutor_details();
					$data['page_title']='Tutor Profile | Chicago Institute Of Techonology ';
					$data['description']='';
					$this->load->view('tutor/tutor_profile_view',$data);
            }
            else
            {
                    $file = $this->upload->data();
                    $file_name=$file['file_name'];
					$userid=$this->session->userdata('user_id_sess');
					$this->db->query("UPDATE `tutors` SET tutor_image='$file_name' WHERE user_id='".$userid."' ");
					$this->session->set_flashdata('msg','<b style="color:green; ">Updated Successfully!</b>');
					redirect('Tutor_dashboard');
            }
			
		}	
	}
	public function settings()
	{
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['rec']=$this->Tutors_model->get_tutor_details();
		$data['page_title']='Tutor settings | Chicago Institute Of Techonology ';
		$data['description']='';
		$this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
        {
			$this->load->view('tutor/tutor_settings',$data);
		}
		else
		{
			$email=$this->input->post('email');
			$tutor_name=$this->input->post('tutor_name');
			$mobile=$this->input->post('mobile');
			$gender=$this->input->post('gender');
			$city=$this->input->post('city');
			$education=$this->input->post('education');
			$dob=$this->input->post('dob');
			$userid=$this->session->userdata('user_id_sess');
			$this->db->query("UPDATE `tutors` SET `tutor_email`='$email',`tutor_name`='$tutor_name',`tutor_mobile`='$mobile',tutor_gender='$gender',tutor_city='$city',tutor_education='$education',tutor_dob='$dob' WHERE user_id='".$userid."' ");
			$this->session->set_flashdata('msg','Updated Successfully!');
			redirect('tutor_dashboard/settings');
		}	
	}
	function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata('user_id_sess');
		$this->session->unset_userdata('usr_username');
		$this->session->unset_userdata('usr_usertype');
		$this->session->unset_userdata('user_tutor_is_logged_in');
		//$this->session->sess_destroy();
		redirect('home');
	}
}