<?php
class Students_model extends CI_Model 
{	

function get_all_notifications()
	{
		$std_id=$this->session->userdata('user_id_sess');
		$query = $this->db->query("
		SELECT * FROM student_notifications,
		course_orders
		WHERE 
		student_notifications.sn_batch_id=course_orders.co_course_id
        AND
		course_orders.std_user_id='".$std_id."' AND
		course_orders.co_payment_status='success'
		ORDER BY student_notifications.sn_id DESC LIMIT 0,10");
		return $query->result();		
	}
	function get_old_notifications()
	{
		//$this->db->order_by("tn_id","desc");
		//$this->db->limit(10, 10);
		$std_id=$this->session->userdata('user_id_sess');
		$query = $this->db->query("
		SELECT * FROM student_notifications,
		course_orders
		WHERE 
		student_notifications.sn_batch_id=course_orders.co_course_id
        AND
		course_orders.std_user_id='".$std_id."' AND
		course_orders.co_payment_status='success'
		ORDER BY student_notifications.sn_id DESC LIMIT 10,10");
		return $query->result();		
	}
	function get_course_categories()
	{
		$sql=$this->db->query("SELECT cat_id,cat_name FROM course_categories");
		return $sql->result();
	}
	function get_course_list()
	{
		$sql=$this->db->query("SELECT course_id,course_name FROM courses");
		return $sql->result();
	}
	function get_course_batches($course_id)
	{		
		$sql=$this->db->query("SELECT batch_id,cb_batchname FROM course_batches WHERE cb_course_id='".$course_id."'");
		return $sql->result();
	}
	function check_student_resister_course($course_id,$batch_id)
	{
		//$batch_id=1;
		$std_id=$this->session->userdata('user_id_sess');
		$sql="SELECT
		* FROM
		course_orders
		WHERE
		course_orders.co_course_id='".$batch_id."' AND
		course_orders.std_user_id='".$std_id."' AND
		course_orders.co_payment_status='success' ";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	function get_all_questions_forcourse($course_id,$batch_id)
	{
		$std_id=$this->session->userdata('user_id_sess');
		$sql="SELECT * FROM questions WHERE qs_status=1 AND qs_course_id='".$course_id."' AND qs_batch_id='".$batch_id."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function get_all_answer_question($qs_id)
	{
		$sql="SELECT * FROM answers WHERE as_status=1 AND
		answers.as_question_id='".$qs_id."' ";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function get_question($qs_id)
	{
		$sql="SELECT * FROM `questions` WHERE qs_status=1 AND question_id='".$qs_id."' ";
		$query=$this->db->query($sql);
		return $query->row();
	}
	function get_student_details()
	{
		$std_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$std_id);
		$query = $this->db->get('students_tbl');
		return $query->row();
		
	}
	function get_allcourses_paid()
	{	
		$std_id=$this->session->userdata('user_id_sess');
		$sql="SELECT
		* FROM
		course_batches,course_orders,courses,tutors,course_categories,countries,cb_type,cb_coun 
		WHERE
		course_batches.batch_id=course_orders.co_course_id AND
		course_orders.std_user_id='".$std_id."' AND
		course_orders.co_payment_status='success' AND
		course_batches.cb_course_id=courses.course_id
		AND
		course_batches.cb_tutor_id=tutors.tutor_id
		AND
		course_batches.cb_cat_id=course_categories.cat_id
		AND
		course_batches.batch_id=cb_coun.cb_coun_batchid 
		AND
		course_batches.batch_id=cb_type.cbtype_batch_id  
		AND
		cb_coun.cb_coun_countryid=countries.country_id ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_allcourses_paid_search()
	{
		$keyword=trim($this->input->post('keyword'));
		$std_id=$this->session->userdata('user_id_sess');
		$sql="SELECT
		* FROM
		course_batches,course_orders,courses,tutors,course_categories,countries
		WHERE
		course_batches.batch_id=course_orders.co_course_id AND
		course_orders.std_user_id='".$std_id."' AND
		course_orders.co_payment_status='success' AND
		course_batches.cb_course_id=courses.course_id
		AND
		course_batches.cb_tutor_id=tutors.tutor_id
		AND
		course_batches.cb_cat_id=course_categories.cat_id
		AND
		course_batches.cb_country=countries.country_id ";
		if(!empty($keyword))
		$sql .=" AND courses.course_name LIKE '%".$keyword."%' ";
		$query = $this->db->query($sql);
		return $query->result();
		
	}
	function get_allebook_search()
	{
		$course_id=trim($this->input->post('course_id'));
		$std_id=$this->session->userdata('user_id_sess');
		//$sql="SELECT * FROM `student_ebooks` WHERE `se_course_id`='".$course_id."'";
		$sql="SELECT * FROM student_ebooks,course_orders
		WHERE
		student_ebooks.se_batch_id=course_orders.co_course_id
        AND		
		student_ebooks.se_course_id='".$course_id."'
		AND
        course_orders.std_user_id='$std_id'
		AND
		course_orders.co_payment_status='success'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_ebook_view($id)
	{
		$std_id=$this->session->userdata('user_id_sess');
		$sql="SELECT * FROM `student_ebooks` WHERE `se_id`='".$id."'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	function get_allvideos_search()
	{
		$course_id=trim($this->input->post('course_id'));
		$std_id=$this->session->userdata('user_id_sess');
		//$sql="SELECT * FROM `student_videos` WHERE `sv_course_id`='".$course_id."'";
		$sql="SELECT * FROM student_videos,course_orders
		WHERE
		student_videos.sv_batch_id=course_orders.co_course_id
		AND		
		student_videos.sv_course_id='".$course_id."'
		AND
        course_orders.std_user_id='$std_id'
		AND
		course_orders.co_payment_status='success'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_allcourses_oncampus_count()
	{
	if($this->session->userdata('cit_country_id'))
		{
			$coun_id=$this->session->userdata('cit_country_id');
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries 
			WHERE
			course_batches.cb_course_type='oncampus' AND
			course_batches.cb_country='$coun_id' AND
			course_batches.cb_course_id=courses.course_id
			AND
			course_batches.cb_tutor_id=tutors.tutor_id
			AND
			course_batches.cb_cat_id=course_categories.cat_id
			AND
			course_batches.cb_country=countries.country_id ";
		}
		else
		{
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries 
			WHERE
			course_batches.cb_course_type='oncampus' AND
			course_batches.cb_course_id=courses.course_id
			AND
			course_batches.cb_tutor_id=tutors.tutor_id
			AND
			course_batches.cb_cat_id=course_categories.cat_id
			AND
			course_batches.cb_country=countries.country_id";
		}
		$query = $this->db->query($sql);
		return $query->num_rows();		
	}
	function get_allcourses_online($perpage,$n)
	{
		 if($this->session->userdata('cit_country_id'))
			{
				$coun_id=$this->session->userdata('cit_country_id');
				$sql="SELECT
				* FROM
				course_batches,courses,tutors,course_categories,countries 
				WHERE
				course_batches.cb_course_type='online' AND
				course_batches.cb_country='$coun_id' AND
				course_batches.cb_course_id=courses.course_id
				AND
				course_batches.cb_tutor_id=tutors.tutor_id
				AND
				course_batches.cb_cat_id=course_categories.cat_id
				AND
				course_batches.cb_country=countries.country_id LIMIT $n,$perpage";
			}
			else
			{
				$sql="SELECT
				* FROM
				course_batches,courses,tutors,course_categories,countries 
				WHERE
				course_batches.cb_course_type='online' AND
				course_batches.cb_course_id=courses.course_id
				AND
				course_batches.cb_tutor_id=tutors.tutor_id
				AND
				course_batches.cb_cat_id=course_categories.cat_id
				AND
				course_batches.cb_country=countries.country_id LIMIT $n,$perpage";
			}	
			$query = $this->db->query($sql);
			return $query->result();
	}
	function get_allcourses_online_count()
	{
	if($this->session->userdata('cit_country_id'))
		{
			$coun_id=$this->session->userdata('cit_country_id');
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries 
			WHERE
			course_batches.cb_course_type='online' AND
			course_batches.cb_country='$coun_id' AND
			course_batches.cb_course_id=courses.course_id
			AND
			course_batches.cb_tutor_id=tutors.tutor_id
			AND
			course_batches.cb_cat_id=course_categories.cat_id
			AND
			course_batches.cb_country=countries.country_id ";
		}
		else
		{
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries 
			WHERE
			course_batches.cb_course_type='online' AND
			course_batches.cb_course_id=courses.course_id
			AND
			course_batches.cb_tutor_id=tutors.tutor_id
			AND
			course_batches.cb_cat_id=course_categories.cat_id
			AND
			course_batches.cb_country=countries.country_id ";
		}
		$query = $this->db->query($sql);
		return $query->num_rows();		
	}
	function get_allcourses($perpage,$n,$search_term)
	{
		if(!empty($search_term))
		{
			$title=$search_term['course_title'];
			$cat=$search_term['course_cat'];
			$course_type=$search_term['course_type'];
			if($this->session->userdata('cit_country_id'))
			{
				$coun_id=$this->session->userdata('cit_country_id');
			}
			else
			{
				$coun_id='';
			}	
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries 
			WHERE
			course_batches.cb_course_id=courses.course_id
			AND
			course_batches.cb_tutor_id=tutors.tutor_id
			AND
			course_batches.cb_cat_id=course_categories.cat_id
			AND
			course_batches.cb_country=countries.country_id AND
			course_batches.cb_course_type='$course_type' 
			";
			if(!empty($coun_id))
			$sql .=" AND course_batches.cb_country='$coun_id' ";
			if(!empty($cat))
			$sql .=" AND course_batches.cb_cat_id='$cat' ";
			if(!empty($title))
			$sql .=" AND courses.course_name LIKE '%$title%' ";
			$sql .=" LIMIT $n,$perpage  ";
			$query=$this->db->query($sql);
			return $query->result();
		}
		else
		{
			if($this->session->userdata('cit_country_id'))
			{
				$coun_id=$this->session->userdata('cit_country_id');
				$sql="SELECT
				* FROM
				course_batches,courses,tutors,course_categories,countries 
				WHERE
				course_batches.cb_country='$coun_id' AND
				course_batches.cb_course_id=courses.course_id
				AND
				course_batches.cb_tutor_id=tutors.tutor_id
				AND
				course_batches.cb_cat_id=course_categories.cat_id
				AND
				course_batches.cb_country=countries.country_id LIMIT $n,$perpage";
			}
			else
			{
				$sql="SELECT
				* FROM
				course_batches,courses,tutors,course_categories,countries 
				WHERE
				course_batches.cb_course_id=courses.course_id
				AND
				course_batches.cb_tutor_id=tutors.tutor_id
				AND
				course_batches.cb_cat_id=course_categories.cat_id
				AND
				course_batches.cb_country=countries.country_id LIMIT $n,$perpage";
			}
			$query = $this->db->query($sql);
			return $query->result();
		}
	}
	function get_allcourses_count($search_term)
	{
		if(!empty($search_term))
		{
			$title=$search_term['course_title'];
			$cat=$search_term['course_cat'];
			$course_type=$search_term['course_type'];
			if($this->session->userdata('cit_country_id'))
			{
				$coun_id=$this->session->userdata('cit_country_id');
			}
			else
			{
				$coun_id='';
			}
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries 
			WHERE
			course_batches.cb_course_id=courses.course_id
			AND
			course_batches.cb_tutor_id=tutors.tutor_id
			AND
			course_batches.cb_cat_id=course_categories.cat_id
			AND
			course_batches.cb_country=countries.country_id AND
			course_batches.cb_course_type='$course_type' 
			";
			if(!empty($coun_id))
			$sql .=" AND course_batches.cb_country='$coun_id' ";
			if(!empty($cat))
			$sql .=" AND course_batches.cb_cat_id=$cat ";
			if(!empty($title))
			$sql .=" AND courses.course_name LIKE '%$title%' ";
			$query=$this->db->query($sql);
			return $query->num_rows();
		}
		else
		{			
			if($this->session->userdata('cit_country_id'))
			{
				$coun_id=$this->session->userdata('cit_country_id');
				$sql="SELECT
				* FROM
				course_batches,courses,tutors,course_categories,countries 
				WHERE
				course_batches.cb_country='$coun_id' AND
				course_batches.cb_course_id=courses.course_id
				AND
				course_batches.cb_tutor_id=tutors.tutor_id
				AND
				course_batches.cb_cat_id=course_categories.cat_id
				AND
				course_batches.cb_country=countries.country_id LIMIT $n,$perpage";
			}
			else
			{
				$sql="SELECT
				* FROM
				course_batches,courses,tutors,course_categories,countries 
				WHERE
				course_batches.cb_course_id=courses.course_id
				AND
				course_batches.cb_tutor_id=tutors.tutor_id
				AND
				course_batches.cb_cat_id=course_categories.cat_id
				AND
				course_batches.cb_country=countries.country_id LIMIT $n,$perpage";
			}
			$query = $this->db->query($sql);
			return $query->num_rows();
		}
	}
	function get_courses_details($batch_id)
	{
		$query = $this->db->query(" SELECT
		* FROM
		course_batches,courses,tutors,course_categories,countries 
		WHERE
		course_batches.cb_course_id=courses.course_id
		AND
		course_batches.cb_tutor_id=tutors.tutor_id
		AND
		course_batches.cb_cat_id=course_categories.cat_id
		AND
		course_batches.cb_country=countries.country_id
		AND course_batches.batch_id='$batch_id'");
		if($query->num_rows()>0)
		{	
			return $query->row();
		}	
	}
	function get_home_gallery()
	{
		$query = $this->db->get('images');
		return $query->result();
	}
	function get_home_testimonials()
	{
		$query = $this->db->get('testimonials');
		return $query->result();
	}
	function get_content_pages($id)
	{
		$this->db->where('p_id',$id);
		$query = $this->db->get('content_pages');
		return $query->row();
	}
	function get_content_abouts($id)
	{
		$this->db->where('aboutus_id',$id);
		$query = $this->db->get('aboutus');
		return $query->row();
	}
	function get_content_internship($id)
	{
		$this->db->where('internship_id',$id);
		$query = $this->db->get('internship');
		return $query->row();
	}
	function get_content_live_projects($id)
	{
		$this->db->where('live_projects_id',$id);
		$query = $this->db->get('live_projects');
		return $query->row();
	}
	function get_content_careers($id)
	{
		$this->db->where('careers_id',$id);
		$query = $this->db->get('careers');
		return $query->row();
	}
	function get_content_corporate_training($id)
	{
		$this->db->where('corporate_services_id',$id);
		$query = $this->db->get('corporate_services');
		return $query->row();
	}
	function get_content_latest_info()
	{
		$query = $this->db->get('faqs');
		return $query->result();
	}
	function get_latest_courses()
	{
		if($this->session->userdata('cit_country_id'))
		{
		$coun_id=$this->session->userdata('cit_country_id');
		$sql="SELECT
		* FROM
		course_batches,courses,tutors,course_categories,countries 
		WHERE
		course_batches.cb_country='$coun_id' AND
		course_batches.cb_course_id=courses.course_id
		AND
		course_batches.cb_tutor_id=tutors.tutor_id
		AND
		course_batches.cb_cat_id=course_categories.cat_id
		AND
		course_batches.cb_country=countries.country_id ORDER BY course_batches.batch_id DESC LIMIT 0,3";
		}
		else
		{
		$sql="SELECT
		* FROM
		course_batches,courses,tutors,course_categories,countries 
		WHERE
		course_batches.cb_course_id=courses.course_id
		AND
		course_batches.cb_tutor_id=tutors.tutor_id
		AND
		course_batches.cb_cat_id=course_categories.cat_id
		AND
		course_batches.cb_country=countries.country_id ORDER BY course_batches.batch_id DESC LIMIT 0,3";
		}
		$query = $this->db->query($sql);
		return $query->result();		
	}
	function insert_course_inquiry($data)
	{
		$this->db->insert('course_inquiry_form',$data);
		return true;
	}
	function insert_course_orders($data_insert)
	{
		$this->db->insert('course_orders',$data_insert);
		return $this->db->insert_id();
	}
	function update_course_orders($amount,$trans,$row_id)
	{
		$this->db->query("UPDATE course_orders SET co_trans_id='$trans',co_amount='$amount',co_payment_status='success' WHERE co_id='".$row_id."'");
		return true;
	}
	function get_all_quiz_forcourse($course_id,$batch_id)
	{
		$std_id=$this->session->userdata('user_id_sess');
		$sql="SELECT * FROM course_orders,quiz,courses
		WHERE course_orders.std_user_id='".$std_id."' 
		AND
		course_orders.co_payment_status='success'
		AND
		course_orders.co_course_id='".$batch_id."'
		AND quiz.qz_batch_id='".$batch_id."'
       AND quiz.qz_course_id=courses.course_id
		";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function get_tutor_quiz_deatils($qz_id)
	{
		$std_id=$this->session->userdata('user_id_sess');
		$sql="SELECT * FROM quiz,course_batches,courses WHERE 
		quiz.qz_id='".$qz_id."'
		AND       		
		quiz.qz_batch_id=course_batches.batch_id
		AND
		quiz.qz_course_id=courses.course_id ";
		$query=$this->db->query($sql);
		return $query->row();
	}
	function create_exam($data,$batch_id)
	{
	   $std_id=$this->session->userdata('user_id_sess');   
	   $sql="SELECT * FROM `exams` WHERE `ex_user_id`='".$std_id."' AND `ex_batch_id`='".$batch_id."'";
	   $q=$this->db->query($sql);
	   if($q->num_rows()==1)
	   {
			$row=$q->row();
			$id=$row->ex_id;
			$this->db->where('ex_id', $id);
			$this->db->update('exams', $data);
			return true;
	   }  
	  else
		{
			$this->db->insert('exams',$data);
			return true;
		 }	  
	}
	function stu_regi_course_drop()
	{
		$std_id=$this->session->userdata('user_id_sess'); 
		$sql="SELECT courses.course_id,courses.course_name FROM course_orders,course_batches,courses
		WHERE
		course_orders.std_user_id='".$std_id."'
		AND
		course_orders.co_payment_status='success'
		AND
		course_orders.co_course_id=course_batches.batch_id 
		AND
		course_batches.cb_course_id=courses.course_id
		GROUP BY courses.course_id";
		$query=$this->db->query($sql);
		return $query->result();	
	}
}