<?php
class Courses_model extends CI_Model 
{

	function get_course_categories()
	{
		$sql=$this->db->query("SELECT cat_id,cat_name FROM course_categories");
		return $sql->result();
	}
	function get_allcourses_oncampus($perpage,$n)
	{
		if($this->session->userdata('cit_country_id'))
		{
			$coun_id=$this->session->userdata('cit_country_id');
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun  
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='oncampus'
            AND
			cb_coun.cb_coun_countryid='$coun_id'
			
			GROUP BY course_batches.batch_id
			 LIMIT $n,$perpage";
		}
		else
		{
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun  
			WHERE
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='oncampus'
            
			GROUP BY course_batches.batch_id
			 LIMIT $n,$perpage";
		}	
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
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun  
			WHERE
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='oncampus'
            AND
			cb_coun.cb_coun_countryid='$coun_id'
			
			GROUP BY course_batches.batch_id ";
		}
		else
		{
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun  
			WHERE
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='oncampus'
			GROUP BY course_batches.batch_id";
		}
		$query = $this->db->query($sql);
		return $query->num_rows();		
	}
	/****** *****************************************/
	function get_allcourses_oncampus_course($perpage,$n,$course_id)
	{
		if($this->session->userdata('cit_country_id'))
		{
			$coun_id=$this->session->userdata('cit_country_id');
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='oncampus'
            AND
			cb_coun.cb_coun_countryid='$coun_id'
			AND
			course_batches.cb_course_id='$course_id'
			GROUP BY course_batches.batch_id
			 LIMIT $n,$perpage";
		}
		else
		{
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='oncampus'
            AND
			course_batches.cb_course_id='$course_id' 
			GROUP BY course_batches.batch_id
			 LIMIT $n,$perpage";
		}
		/*echo $sql;exit;	*/	
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_allcourses_oncampus_course_count($course_id)
	{
	if($this->session->userdata('cit_country_id'))
		{
			$coun_id=$this->session->userdata('cit_country_id');
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='oncampus'
            AND
			cb_coun.cb_coun_countryid='$coun_id'
			AND
			course_batches.cb_course_id='$course_id'
			GROUP BY course_batches.batch_id
			  ";
		}
		else
		{
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='oncampus'
			AND
			course_batches.cb_course_id='$course_id'
			GROUP BY course_batches.batch_id
			 ";
		}
		$query = $this->db->query($sql);
		return $query->num_rows();		
	}
	/****************** *****************************/
	function get_allcourses_online($perpage,$n)
	{
		 if($this->session->userdata('cit_country_id'))
			{
				$coun_id=$this->session->userdata('cit_country_id');
				$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='online'
            AND
			cb_coun.cb_coun_countryid='$coun_id'
			
			GROUP BY course_batches.batch_id
			 LIMIT $n,$perpage";
			}
			else
			{
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='online'
            
			GROUP BY course_batches.batch_id
			 LIMIT $n,$perpage";
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
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='online'
            AND
			cb_coun.cb_coun_countryid='$coun_id'
			
			GROUP BY course_batches.batch_id
			  ";
		}
		else
		{
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='online'		
			GROUP BY course_batches.batch_id
			 ";
		}
		$query = $this->db->query($sql);
		return $query->num_rows();		
	}
	/*************** c s*****************************************/
	function get_allcourses_online_course($perpage,$n,$course_id)
	{
		 if($this->session->userdata('cit_country_id'))
			{
				$coun_id=$this->session->userdata('cit_country_id');
				$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='online'
            AND
			cb_coun.cb_coun_countryid='$coun_id'
			AND
			course_batches.cb_course_id='$course_id'
			GROUP BY course_batches.batch_id
			 LIMIT $n,$perpage";
			}
			else
			{
				$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='online'
            
			AND
			course_batches.cb_course_id='$course_id'
			GROUP BY course_batches.batch_id
			 LIMIT $n,$perpage";
			}	
			$query = $this->db->query($sql);
			return $query->result();
	}
	function get_allcourses_online_course_count($course_id)
	{
	if($this->session->userdata('cit_country_id'))
		{
			$coun_id=$this->session->userdata('cit_country_id');
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='online'
            AND
			cb_coun.cb_coun_countryid='$coun_id'
			AND
			course_batches.cb_course_id='$course_id'
			GROUP BY course_batches.batch_id ";
		}
		else
		{
			$sql="SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
			
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='online'
            AND
			course_batches.cb_course_id='$course_id'
			GROUP BY course_batches.batch_id
			  ";
		}
		$query = $this->db->query($sql);
		return $query->num_rows();		
	}
	/*********************c s**********************************/
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
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='$course_type' 
			";
			if(!empty($coun_id))
			$sql .=" AND cb_coun.cb_coun_countryid='$coun_id' ";
			if(!empty($cat))
			$sql .=" AND course_batches.cb_cat_id='$cat' ";
			if(!empty($title))
			$sql .=" AND courses.course_name LIKE '%$title%' ";
			$sql .=" GROUP BY course_batches.batch_id LIMIT $n,$perpage  ";
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
				course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
				WHERE

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
				cb_coun.cb_coun_countryid=countries.country_id
				AND
				cb_coun.cb_coun_countryid='$coun_id'	
				GROUP BY course_batches.batch_id LIMIT $n,$perpage ";
			}
			else
			{
				$sql="SELECT
				* FROM
				course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
				WHERE

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
				cb_coun.cb_coun_countryid=countries.country_id
				GROUP BY course_batches.batch_id	
				LIMIT $n,$perpage";
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
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_type.cbtype_name='$course_type' 
			";
			if(!empty($coun_id))
			$sql .=" AND cb_coun.cb_coun_countryid='$coun_id' ";
			if(!empty($cat))
			$sql .=" AND course_batches.cb_cat_id=$cat ";
			if(!empty($title))
			$sql .=" AND courses.course_name LIKE '%$title%' GROUP BY course_batches.batch_id ";
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
				course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
				WHERE

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
				cb_coun.cb_coun_countryid=countries.country_id
				AND
				cb_coun.cb_coun_countryid='$coun_id' GROUP BY course_batches.batch_id	
				";
			}
			else
			{
				$sql="SELECT
				* FROM
				course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
				WHERE

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
				cb_coun.cb_coun_countryid=countries.country_id
				GROUP BY course_batches.batch_id	
				";
			}
			$query = $this->db->query($sql);
			return $query->num_rows();
		}
	}
/*	function get_courses_details($batch_id)
	{
		$query = $this->db->query(" SELECT
		* FROM
		course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
		WHERE
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
		cb_coun.cb_coun_countryid=countries.country_id
		AND course_batches.batch_id='$batch_id'");
		if($query->num_rows()>0)
		{	
			return $query->row();
		}	
	}*/
	function get_courses_details($batch_id)
	{
		if($this->session->userdata('cit_country_id'))
		{
			$coun_id=$this->session->userdata('cit_country_id');
			$query = $this->db->query(" SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND
			cb_coun.cb_coun_countryid='$coun_id'
			AND course_batches.batch_id='$batch_id'");
			if($query->num_rows()>0)
			{	
			return $query->row();
			}
			
		}
       else
	   {		
			$query = $this->db->query(" SELECT
			* FROM
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
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
			cb_coun.cb_coun_countryid=countries.country_id
			AND course_batches.batch_id='$batch_id'");
			if($query->num_rows()>0)
			{	
				return $query->row();
			}
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
		course_batches,courses,tutors,course_categories,countries,cb_coun  
		WHERE
		
		course_batches.cb_course_id=courses.course_id
		AND
		course_batches.cb_tutor_id=tutors.tutor_id
		AND
		course_batches.cb_cat_id=course_categories.cat_id
		AND
		course_batches.batch_id=cb_coun.cb_coun_batchid 
        AND
		cb_coun.cb_coun_countryid=countries.country_id
		AND
		cb_coun.cb_coun_countryid='$coun_id'
		GROUP BY course_batches.batch_id
		ORDER BY course_batches.batch_id DESC LIMIT 0,3";
		}
		else
		{
		$sql="SELECT
		* FROM
		course_batches,courses,tutors,course_categories,countries,cb_coun  
		WHERE
		
		course_batches.cb_course_id=courses.course_id
		AND
		course_batches.cb_tutor_id=tutors.tutor_id
		AND
		course_batches.cb_cat_id=course_categories.cat_id
		AND
		course_batches.batch_id=cb_coun.cb_coun_batchid 
        AND
		cb_coun.cb_coun_countryid=countries.country_id
		GROUP BY course_batches.batch_id
		ORDER BY course_batches.batch_id DESC LIMIT 0,3";
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
	/********************************** ****************************************/
	function search_get_allcourses($perpage,$n,$search_term)
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
		course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
		WHERE
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
			if(!empty($course_type))
			$sql .=" AND cb_type.cbtype_name='$course_type' "; 
			if(!empty($coun_id))
			$sql .=" AND cb_coun.cb_coun_countryid='$coun_id' ";
			if(!empty($cat))
			$sql .=" AND course_batches.cb_cat_id='$cat' ";
			if(!empty($title))
			$sql .=" AND (courses.course_name LIKE '%$title%' OR FIND_IN_SET('$title',courses.course_tags)) ";
			$sql .=" GROUP BY course_batches.batch_id LIMIT $n,$perpage  ";
			/* echo $sql; exit; */
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
				course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
				WHERE
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
				cb_coun.cb_coun_countryid=countries.country_id
				AND
				cb_coun.cb_coun_countryid='$coun_id' GROUP BY course_batches.batch_id LIMIT $n,$perpage";
			}
			else
			{
				$sql="SELECT
				* FROM
				course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
				WHERE
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
				cb_coun.cb_coun_countryid=countries.country_id
				GROUP BY course_batches.batch_id LIMIT $n,$perpage";
			}
			$query = $this->db->query($sql);
			return $query->result();
		}
	}
	function search_get_allcourses_count($search_term)
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
			course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
			WHERE
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
			if(!empty($course_type))
			$sql .=" AND cb_type.cbtype_name='$course_type' "; 
			if(!empty($coun_id))
			$sql .=" AND cb_coun.cb_coun_countryid='$coun_id' ";
			if(!empty($cat))
			$sql .=" AND course_batches.cb_cat_id='$cat' ";
			if(!empty($title))
			$sql .=" AND (courses.course_name LIKE '%$title%' OR FIND_IN_SET('$title',courses.course_tags)) ";
			$sql .=" GROUP BY course_batches.batch_id  ";
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
				course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
				WHERE
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
				cb_coun.cb_coun_countryid=countries.country_id
				AND
				cb_coun.cb_coun_countryid='$coun_id' GROUP BY course_batches.batch_id ";
			}
			else
			{
				$sql="SELECT
				* FROM
				course_batches,courses,tutors,course_categories,countries,cb_type,cb_coun 
				WHERE
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
				cb_coun.cb_coun_countryid=countries.country_id
				GROUP BY course_batches.batch_id ";
			}
			$query = $this->db->query($sql);
			return $query->num_rows();
		}
	}
	/*********************************** ***************************************/
	
}