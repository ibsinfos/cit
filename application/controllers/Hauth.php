<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hauth extends CI_Controller {

	public function __construct()
	{
		// Constructor to auto-load HybridAuthLib
		parent::__construct();
		$this->load->library('HybridAuthLib');
	}

	public function index()
	{
		// Send to the view all permitted services as a user profile if authenticated
		$login_data['providers'] = $this->hybridauthlib->getProviders();
		foreach($login_data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$login_data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}

		$this->load->view('hauth/home', $login_data);
	}

	public function login($provider)
	{
		log_message('debug', "controllers.HAuth.login($provider) called");

		try
		{
			log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
			$this->load->library('HybridAuthLib');

			if ($this->hybridauthlib->providerEnabled($provider))
			{
				log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
				$service = $this->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					log_message('debug', 'controller.HAuth.login: user authenticated.');

					$user_profile = $service->getUserProfile();

					log_message('info', 'controllers.HAuth.login: user profile:'.PHP_EOL.print_r($user_profile, TRUE));

					$data12['user_profile'] = $user_profile;
                     //echo $provider."<br />";
					 //print_r($user_profile->identifier);exit;
					// if($provider=='Facebook')
					   // {
							$fb_id=$user_profile->identifier;
							$name=$user_profile->firstName.' '.$user_profile->lastName;
							$gender=$user_profile->gender;
							$email=$user_profile->email;
							$pwd=rand(0000,9999);
							$uname=$email;
						$sql_sl="SELECT * FROM tbl_users,students_tbl 
						WHERE tbl_users.usr_id=students_tbl.user_id
						AND
						students_tbl.std_email='".$email."'";
						$query = $this->db->query($sql_sl);
						if($query->num_rows()==0)
						{
								$data_arr=array(
										'identifier' => $user_profile->identifier,
										'name' => $user_profile->firstName.' '.$user_profile->lastName,
										'email' => $user_profile->email,
										'provider' => $provider
										);
							$this->session->set_userdata('sess_sl_user_profile',$data_arr);
							
							/*$new_member_insert_data1 = array(
							'usr_username' => $fb_id.'facebook',
							'usr_pwd' => md5($pwd),
							'usr_usertype' => 'student',
							'usr_sn_id' => $fb_id,
							'usr_from'=>'facebook'
							);
							$insert = $this->db->insert('tbl_users', $new_member_insert_data1);
							$std_name = $this->input->post('stuname');
							$last_id = $this->db->insert_id();
							$new_member_insert_data = array(
							'user_id' => $last_id,				
							'std_email' => $email,			
							'std_mobile' => '',
							'std_username'=> $fb_id.'facebook',
							'std_name'=>$name,
							'std_pwd' =>''
							);
							$insert = $this->db->insert('students_tbl', $new_member_insert_data);
							
							
							$data= array(
							'user_id_sess' => $last_id,
							'usr_username' => $fb_id.'facebook',
							'usr_usertype' => 'student',
							'usr_date_time' => date('Y-m-d H:i:s'),
							'user_student_is_logged_in' => true
							);
							$this->session->set_userdata($data);
							*/
							
							$url_std=base_url()."student_socail_login";							
							redirect($url_std);
						}	
						else
						{
							$res=$query->row();
							$data = array(
							'user_id_sess' => $res->usr_id,
							'usr_username' => $res->usr_username,
							'usr_usertype' => $res->usr_usertype,
							'usr_date_time' => $res->usr_date_time,
							'user_student_is_logged_in' => true
							);
							$this->session->set_userdata($data);				  
							$url_std=base_url()."Student_dashboard";							
							redirect($url_std);
						}	
						 
						//}
					 /*if($provider=='Google')
						{
							
							$fb_id=$user_profile->identifier;
							$name=$user_profile->firstName.' '.$user_profile->lastName;
							$gender=$user_profile->gender;
							$email=$user_profile->email;
							$pwd=rand(0000,9999);
							$uname=$email;
						$this->db->where('usr_sn_id',$fb_id);
						$query = $this->db->get('tbl_users');
						if($query->num_rows()==0)
						{
							$new_member_insert_data1 = array(
							'usr_username' => $fb_id.'google',
							'usr_pwd' => md5($pwd),
							'usr_usertype' => 'student',
							'usr_sn_id' => $fb_id,
							'usr_from'=>'google'
							);
							$insert = $this->db->insert('tbl_users', $new_member_insert_data1);
							$std_name = $this->input->post('stuname');
							$last_id = $this->db->insert_id();
							$new_member_insert_data = array(
							'user_id' => $last_id,				
							'std_email' => $email,			
							'std_mobile	' => '',
							'std_username' =>$fb_id.'google',
							'std_name'=>$name,
							'std_pwd' =>''
							);
							$insert = $this->db->insert('students_tbl', $new_member_insert_data);
							$data= array(
							'user_id_sess' => $last_id,
							'usr_username' => $fb_id.'google',
							'usr_usertype' => 'student',
							'usr_date_time' => date('Y-m-d H:i:s'),
							'user_student_is_logged_in' => true
							);
							$this->session->set_userdata($data);
							$url_std=base_url()."Student_dashboard";							
							redirect($url_std);
						}	
						else
						{
							$res=$query->row();
							$data = array(
							'user_id_sess' => $res->usr_id,
							'usr_username' => $res->usr_username,
							'usr_usertype' => $res->usr_usertype,
							'usr_date_time' => $res->usr_date_time,
							'user_student_is_logged_in' => true
							);
							$this->session->set_userdata($data);
											  
							$url_std=base_url()."Student_dashboard";							
							redirect($url_std);
						}
						 
						}
					if($provider=='Twitter')
						{
							$fb_id=$user_profile->identifier;
							$name=$user_profile->firstName.' '.$user_profile->lastName;
							$gender=$user_profile->gender;
							$email=$user_profile->email;
							$pwd=rand(0000,9999);
							$uname=$email;
						$this->db->where('usr_sn_id',$fb_id);
						$query = $this->db->get('tbl_users');
						if($query->num_rows()==0)
						{
							$new_member_insert_data1 = array(
							'usr_username' => $fb_id.'twitter',
							'usr_pwd' => md5($pwd),
							'usr_usertype' => 'student',
							'usr_sn_id' => $fb_id,
							'usr_from'=>'twitter'
							);
							$insert = $this->db->insert('tbl_users', $new_member_insert_data1);
							$email_1=$email!='' ? $email:'noemailapi';
							
							$std_name = $this->input->post('stuname');
							$last_id = $this->db->insert_id();
							$new_member_insert_data = array(
							'user_id' => $last_id,				
							'std_email' => $email_1,			
							'std_mobile	' => '00000',
							'std_username' =>$fb_id.'twitter',
							'std_name'=>$name,
							'std_pwd' =>''
							);
							$insert = $this->db->insert('students_tbl', $new_member_insert_data);
							$data= array(
							'user_id_sess' => $last_id,
							'usr_username' => $fb_id.'twitter',
							'usr_usertype' => 'student',
							'usr_date_time' => date('Y-m-d H:i:s'),
							'user_student_is_logged_in' => true
							);
							$this->session->set_userdata($data);
							$url_std=base_url()."Student_dashboard";							
							redirect($url_std);
						}	
						else
						{
							$res=$query->row();
							$data = array(
							'user_id_sess' => $res->usr_id,
							'usr_username' => $res->usr_username,
							'usr_usertype' => $res->usr_usertype,
							'usr_date_time' => $res->usr_date_time,
							'user_student_is_logged_in' => true
							);
							$this->session->set_userdata($data);
							
                           $url_std=base_url()."Student_dashboard";							
							redirect($url_std);
						}
						 
						}*/
					 
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				log_message('error', 'controllers.HAuth.login: This provider is not enabled ('.$provider.')');
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
				         if (isset($service))
				         {
				         	log_message('debug', 'controllers.HAuth.login: logging out from service.');
				         	$service->logout();
				         }
				         show_error('User has cancelled the authentication or the provider refused the connection.');
				         break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				         break;
				case 7 : $error = 'User not connected to the provider.';
				         break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.HAuth.login: '.$error);
			show_error('Error authenticating user.');
		}
	}

	public function endpoint()
	{

		log_message('debug', 'controllers.HAuth.endpoint called.');
		log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: '.print_r($_REQUEST, TRUE));

		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
			$_GET = $_REQUEST;
		}

		log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
		require_once APPPATH.'/third_party/hybridauth/index.php';

	}
}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
