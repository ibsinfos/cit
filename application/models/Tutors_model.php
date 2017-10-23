<?php
class Tutors_model extends CI_Model 
{
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
	function get_course_batch_list()
	{
		$sql=$this->db->query("SELECT batch_id,cb_batchname FROM course_batches");
		return $sql->result();
	}
	function get_course_batches($course_id)
	{		
		$sql=$this->db->query("SELECT batch_id,cb_batchname FROM course_batches WHERE cb_course_id='".$course_id."'");
		return $sql->result();
	}
	function get_all_questions_forcourse($course_id,$batch_id)
	{
		//$std_id=$this->session->userdata('user_id_sess');
		$sql="SELECT * FROM questions WHERE qs_status=1 AND qs_course_id='".$course_id."' AND qs_batch_id='".$batch_id."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function get_all_answer_question($qs_id)
	{
		$sql="SELECT * FROM answers WHERE as_status=1 AND answers.as_question_id='".$qs_id."' ";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function get_question($qs_id)
	{
		$sql="SELECT * FROM `questions` WHERE qs_status=1 AND question_id='".$qs_id."' ";
		$query=$this->db->query($sql);
		return $query->row();
	}
	function get_tutor_details()
	{
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
		return $query->row();
	}
	function get_all_notifications()
	{
		$this->db->order_by("tn_id","desc");
		$this->db->limit(10, 0);
		$query = $this->db->get('tutor_notifications');
		return $query->result();		
	}
	function get_old_notifications()
	{
		$this->db->order_by("tn_id","desc");
		$this->db->limit(10, 10);
		$query = $this->db->get('tutor_notifications');
		return $query->result();		
	}
	function get_tutor_courses_list()
	{
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
	    $rec=$query->row();
		$tutorid=$rec->tutor_id;
		$sql="SELECT * 
		FROM course_batches,courses
		WHERE
		course_batches.cb_tutor_id='".$tutorid."' AND
		course_batches.cb_course_id=courses.course_id 
		GROUP BY course_batches.cb_course_id ";
		$query=$this->db->query($sql);
		return $query->result();
		
	}
	function get_tutor_course_ongoing($course_id)
	{
		$cdate=date('Y-m-d');
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
	    $rec=$query->row();
		$tutorid=$rec->tutor_id;
		
		$sql="SELECT * 
		FROM course_batches
		WHERE
		course_batches.cb_tutor_id='".$tutorid."' AND
		course_batches.cb_course_id='".$course_id."' AND
		course_batches.cb_start_date<='".$cdate."'
		AND
		course_batches.cb_end_date>='".$cdate."'
		";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
	function get_tutor_course_completed($course_id)
	{
		$cdate=date('Y-m-d');
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
	    $rec=$query->row();
		$tutorid=$rec->tutor_id;
		$sql="SELECT * 
		FROM course_batches
		WHERE
		course_batches.cb_tutor_id='".$tutorid."' AND
		course_batches.cb_course_id='".$course_id."' AND
		course_batches.cb_start_date<='".$cdate."'
		AND
		course_batches.cb_end_date<='".$cdate."'
		";
		$query=$this->db->query($sql);
		return $query->num_rows();	
	}
	function get_total_ongoing_batches()
	{
		$cdate=date('Y-m-d');
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
	    $rec=$query->row();
		$tutorid=$rec->tutor_id;
		
		$sql="SELECT * 
		FROM course_batches
		WHERE
		course_batches.cb_tutor_id='".$tutorid."' AND
		course_batches.cb_start_date<='".$cdate."'
		AND
		course_batches.cb_end_date>='".$cdate."'
		";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
	function get_total_complated_batches()
	{
		$cdate=date('Y-m-d');
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
	    $rec=$query->row();
		$tutorid=$rec->tutor_id;
		$sql="SELECT * 
		FROM course_batches
		WHERE
		course_batches.cb_tutor_id='".$tutorid."' AND
		course_batches.cb_start_date<='".$cdate."'
		AND
		course_batches.cb_end_date<='".$cdate."'
		";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
	function get_total_students_course($course_id)
	{
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
	    $rec=$query->row();
		$tutorid=$rec->tutor_id;
		$sql="SELECT * 
		FROM course_batches,course_orders
		WHERE
		course_batches.cb_tutor_id='".$tutorid."' AND
		course_batches.cb_course_id='".$course_id."' AND
		course_batches.batch_id=course_orders.co_course_id AND
        course_orders.co_payment_status='success'
		";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
	function get_total_students_all()
	{
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
	    $rec=$query->row();
		$tutorid=$rec->tutor_id;
		$sql="SELECT * 
		FROM course_batches,course_orders
		WHERE
		course_batches.cb_tutor_id='".$tutorid."' AND
		course_batches.batch_id=course_orders.co_course_id AND
        course_orders.co_payment_status='success'
		";
		$query=$this->db->query($sql);
		return $query->num_rows();
	}
	function get_search_batch_students($course_id,$batch_id,$type)
	{
		$cdate=date('Y-m-d');
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
	    $rec=$query->row();
		$tutorid=$rec->tutor_id;
		
		$sql="SELECT * 
		FROM course_batches,course_orders
		WHERE
		course_batches.cb_tutor_id='".$tutorid."' AND
		course_batches.cb_course_id='".$course_id."' AND
		course_batches.batch_id='".$batch_id."' AND 
		course_batches.batch_id=course_orders.co_course_id AND
        course_orders.co_payment_status='success' ";
		/*if($type=='ongoing')
		$sql .=" AND course_batches.cb_start_date<='".$cdate."' AND course_batches.cb_end_date>='".$cdate."'";
		if($type=='completed')
		$sql .=" AND course_batches.cb_start_date<='".$cdate."' AND course_batches.cb_end_date>='".$cdate."'";*/
	if($type=='ongoing')
		$sql .=" AND course_orders.co_coursestatus='ongoing' ";
		if($type=='completed')
		$sql .=" AND course_orders.co_coursestatus='completed' ";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function create_quiz($data)
	{
		$this->db->insert('quiz',$data);
		return true;
	}
	function get_tutor_quiz_list()
	{
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
	    $rec=$query->row();
		$tutorid=$rec->tutor_id;
		$sql="SELECT * FROM quiz,course_batches,courses WHERE quiz.qz_user_id='".$tutorid."' 
		AND 
		quiz.qz_batch_id=course_batches.batch_id
		AND
		quiz.qz_course_id=courses.course_id ";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function get_tutor_quiz_deatils($qz_id)
	{
		$tutor_id=$this->session->userdata('user_id_sess');
		$this->db->where('user_id',$tutor_id);
		$query = $this->db->get('tutors');
	    $rec=$query->row();
		$tutorid=$rec->tutor_id;
		
		$sql="SELECT * FROM quiz,course_batches,courses WHERE 
		quiz.qz_id='".$qz_id."'
		AND
		quiz.qz_user_id='".$tutorid."' 
		AND       		
		quiz.qz_batch_id=course_batches.batch_id
		AND
		quiz.qz_course_id=courses.course_id ";
		$query=$this->db->query($sql);
		return $query->row();
	}
	function tutor_exam_final($batch_id)
	{
		$sql="SELECT * FROM 
		exams,students_tbl 
		WHERE
		exams.ex_batch_id='".$batch_id."'
		And
		exams.ex_user_id=students_tbl.user_id ";
		$query=$this->db->query($sql);
		return $query->result();
	}
}