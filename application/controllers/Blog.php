<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller
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
		$data['page_title']='Blog';
		$data['description']='Blog';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['blog_list']=$this->User_model->get_blog_list();
		$this->load->view('blog_view',$data);	
	}
	public function details($news_id)
	{
		$data['page_title']='Latest News ';
		$data['description']='Latest News';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();
		$data['blog_list']=$this->User_model->get_blog_list();
		$data['blog_list1']=$this->User_model->get_blog_deatils($news_id);
		$this->load->view('blog_view_dt',$data);
	}
	
}