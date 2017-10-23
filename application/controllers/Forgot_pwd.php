<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forgot_pwd extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('security');
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('User_model');
		$this->load->library('HybridAuthLib');
    }
	public function index()
	{
		$data['page_title']='Forgot Password';
		$data['description']='Forgot Password';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$this->form_validation->set_rules('pwd_code', 'Email', 'trim|required|xss_clean');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('forgotpwd_view',$data);
        }
        else
        { 
			$pass_code=$this->input->post('pwd_code');
	       if($this->session->userdata('sess_forgot_pwd')==$pass_code)
		   {
			   $this->session->set_userdata('sess_recov_pwd','cit99');
			   $this->session->unset_userdata('sess_forgot_pwd');
			   redirect('forgot_pwd/recovery');
		   }
		   else
		   {
			  $this->session->set_flashdata('msg','<p><b style="color:red;">Please Enter Correct Code</b></p>');
			  $this->load->view('forgotpwd_view',$data);	
		   }
		}
	}
	function recovery()
	{
		if($this->session->userdata('sess_forgot_uid'))
		{			
			$data['page_title']='Forgot Password';
			$data['description']='Forgot Password';
			$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
			$data['res_setting']=$this->User_model->get_account_settings();
			$this->form_validation->set_rules('fpwd', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('fcpwd', 'Confirm Password', 'trim|required|matches[fpwd]|xss_clean');
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('recovery_view',$data);
			}
			else
			{
				$pass=md5($this->input->post('fpwd'));
				$user_id=$this->session->userdata('sess_forgot_uid');
				$this->db->where('usr_id', $user_id);
				if($this->db->update('tbl_users',array('usr_pwd'=>$pass)))
				{	
				  redirect('forgot_pwd/success');
				}else{
					echo 'error';
				}
				
			  
			}			
		}
		else
		{
		  redirect('Home');
		}
	}
	function success()
	{
		
		$data['page_title']='success';
		$data['description']='success';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$this->load->view('forgotpwd_success_view',$data);		
	}	
}