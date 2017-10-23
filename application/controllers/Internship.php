<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Internship extends CI_Controller
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
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['res_internship']=$this->User_model->get_content_internship(1);
		$data['page_title']=$data['res_internship']->meta_title;
		$data['meta_des']=$data['res_internship']->meta_des;
		$this->load->view('internship_view',$data);
	}
	
}