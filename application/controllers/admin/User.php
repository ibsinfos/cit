<?php
class User extends CI_Controller
{
    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function index()
	{
		if($this->session->userdata('is_logged_in')){
			redirect('admin/dashboard');
        }else{
        	$this->load->view('admin/login');	
        }
	}
	function dashboard()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->model('admin/Users_model');
			$this->load->view('includes/template'); 
		}
		else
		{
			redirect('admin/login');
		}		
	}
    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }	

    /**
    * check the username and the password with the database
    * @return void
    */
	function validate_credentials()
	{	

		$this->load->model('admin/Users_model');

		$user_name =$this->security->xss_clean($this->input->post('user_name'));
		$password =$this->security->xss_clean($this->__encrip_password($this->input->post('password')));
		
		$is_valid = $this->Users_model->validate($user_name, $password);		
		if($is_valid)
		{
			$data = array(
				'user_name' => $user_name,
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('admin/dashboard');
		}
		else
		{			
			$data['message_error'] = TRUE;
			$this->load->view('admin/login', $data);	
		}
	}	

    /**
    * The method just loads the signup view
    * @return void
    */
	function signup()
	{
		$this->load->view('admin/signup_form');	
	}
    /**
    * Create new user and store it in the database
    * @return void
    */	
	function create_member()
	{
		$this->load->library('form_validation');		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/signup_form');
		}
		
		else
		{			
			$this->load->model('admin/Users_model');
			
			if($query = $this->Users_model->create_member())
			{
				$this->load->view('admin/signup_successful');			
			}
			else
			{
				$this->load->view('admin/signup_form');			
			}
		}
		
	}	
	/**
    * Destroy the session, and logout the user.
    * @return void
    */		
	function logout()
	{
		/*$this->session->sess_destroy();
		$this->session->set_userdata($data);*/
		$this->session->unset_userdata('is_logged_in');
		$this->session->unset_userdata('user_name');
		redirect('admin');
	}
function backup_db()
{
	date_default_timezone_set('Asia/Calcutta');
	// Load the DB utility class 
	$this->load->dbutil(); 
	$prefs = array( 'format' => 'zip', // gzip, zip, txt 
	'filename' => 'backup_'.date('d_m_Y_H_i_s').'.sql', 
						  // File name - NEEDED ONLY WITH ZIP FILES 
	'add_drop' => TRUE,
						 // Whether to add DROP TABLE statements to backup file
	'add_insert'=> TRUE,
						// Whether to add INSERT data to backup file 
	'newline' => "\n"
					   // Newline character used in backup file 
	); 
	// Backup your entire database and assign it to a variable 
	$backup =$this->dbutil->backup($prefs); 
	// Load the file helper and write the file to your server 
	$this->load->helper('file'); 
	write_file('/path/to/'.'dbbackup_'.date('d_m_Y_H_i_s').'.zip', $backup); 
	// Load the download helper and send the file to your desktop 
	$this->load->helper('download'); 
	force_download('dbbackup_'.date('d_m_Y_H_i_s').'.zip', $backup);
}

}