<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller
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
		//$data['news_list']=$this->User_model->get_news_list();
		$data['news_dt']=$this->User_model->get_news_deatils($news_id);
		$this->load->view('news_view',$data);
	}
	
}