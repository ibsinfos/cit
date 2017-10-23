<?php
class User_model extends CI_Model 
{ 
	function check_username($user_name)
	{
		$this->db->where('usr_username', $user_name);
		$query = $this->db->get('tbl_users');
		if($query->num_rows()== 1)
		{
			return true;
		}		
	}
	function check_user_email($email)
	{
		//$this->db->where('usr_username', $email);
		$query = $this->db->query("SELECT * FROM tbl_users,students_tbl
		WHERE
		tbl_users.usr_id=students_tbl.user_id
		AND
		(tbl_users.usr_username='$email'
		OR
		students_tbl.std_email='$email')");
		if($query->num_rows()==1)
		{
			return $query->row();						
		}else{			
			return array();
		}		
	}
	function update_login_datetime($user_id)
	{
		$cdate=date("Y-m-d H:i:s");
		$this->db->where('usr_id', $user_id);
		$this->db->update('tbl_users',array('usr_date_time'=>$cdate));
		return true;
	}
	function validate_credentils($user_name, $password)
	{
		$this->db->where('usr_username', $user_name);
		$this->db->where('usr_pwd', $password);
		$query = $this->db->get('tbl_users');
		if($query->num_rows()== 1)
		{
			return $query->row();
		}		
	}
	function create_member()
	{
		//$cdate=date("Y-m-d H:i:s");
		$new_member_insert_data1 = array(
		'usr_username' => $this->input->post('username'),
		'usr_pwd' => md5($this->input->post('password')),
		'usr_usertype' => 'student');
		$insert = $this->db->insert('tbl_users', $new_member_insert_data1);
		$std_name = $this->input->post('stuname');
		$last_id = $this->db->insert_id();
		$new_member_insert_data = array(
		'user_id' => $last_id,				
		'std_email' => $this->input->post('email'),			
		'std_mobile	' => $this->input->post('mobile'),
		'std_username' => $this->input->post('username'),
		'std_name'=>$this->input->post('stuname'),
		'std_pwd' => md5($this->input->post('password'))
		);
		$insert = $this->db->insert('students_tbl', $new_member_insert_data);
		return $insert;			
	}
	function get_home_banners()
	{
		$query = $this->db->get('banners');
		return $query->result();
	}
	function get_latest_newsevents()
	{
		$query=$this->db->query("SELECT * FROM `news` ORDER BY news_id DESC LIMIT 0,4");
		return $query->result();
	}
	function get_news_list()
	{
		$query = $this->db->get('news');
		return $query->result();
	}
	function get_blog_list()
	{
		$this->db->order_by("blog_id","DESC");
		$query = $this->db->get('blog');
		return $query->result();
	}
	function get_news_deatils($news_id)
	{
		$this->db->where('news_id',$news_id);
		$query = $this->db->get('news');
		return $query->row();
	}
	function get_blog_deatils($news_id)
	{
		$this->db->where('blog_id',$news_id);
		$query = $this->db->get('blog');
		return $query->result();
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
	function get_testimonials()
	{
		$query = $this->db->get('testimonials');
		return $query->result();
	}
	function get_account_settings()
	{
		$this->db->where('ac_id',1);
		$query = $this->db->get('account_settings');
		return $query->row();
	}
	function get_countries()
	{
		$query = $this->db->get('countries');
		return $query->result();
	}
	function get_homeimage()
	{
		$this->db->where('homeimage_id',1);
		$query = $this->db->get('homeimage');
		return $query->row();
	}
	function get_home_course_category()
	{
		$query = $this->db->get('homecategory');
		return $query->result();
	}
	function get_home_faculty_members()
	{
		$query = $this->db->get('faculty');
		return $query->result();
	}
}