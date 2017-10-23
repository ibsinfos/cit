<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact_us extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('User_model');
		$this->load->library('HybridAuthLib');
    }
	public function index()
	{
		$data['page_title']='Contact Us';
		$data['description']='Contact Us Us';
		$data['providers'] = $this->hybridauthlib->getProviders();
		foreach($data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}
		$data['res_setting']=$this->User_model->get_account_settings();		
		$this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|xss_clean');
		$this->form_validation->set_rules('subject', 'subject', 'trim|required|xss_clean');        
		$this->form_validation->set_rules('c_message', 'Message', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
           $this->load->view('contactus_view',$data); 
        }
        else
        {
			$uname = $this->input->post('name');
            $email = $this->input->post('email');
            $mobile = $this->input->post('mobile');
			$subject = $this->input->post('subject');
			$c_message = $this->input->post('c_message');
			$data_insert=array(
								'name'=>$uname,
								'email'=>$email,
								'mobile'=>$mobile,
								'subject'=>$subject,
								'message'=>$c_message);
			$this->db->insert('contact_form',$data_insert);			
			$to_email =$data['res_setting']->email ;
			$config['protocol'] = 'sendmail';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
			$from_email="info@chicagoinstituteoftechnology.com";
			$subject=$subject;
			$message="			
			<h1>Contact form Details, </h1><br />
			<table>
			<tr>
			<td>
			<p>Name:$uname</p>
			<p>Email:$email</p> 
			<p>Phone/Mobile:$mobile</p>
			<p>Subject:$subject</p>
			<p>Comments:<p>$c_message</p></p>
			</td>
			</tr>
			</table>
			
			<br /> <br />
			
			";
            $this->email->from($from_email,'chicagoinstituteoftechnology');
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send())
            {
                //echo "YES";
				$this->session->set_flashdata('msg','Your Contact Deatils Submitted ');
				//$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
				redirect('contact_us');
				
            }
            else
            {
               // echo "NO";
			   $this->session->set_flashdata('errormsg','There is error  in database,Please Try again ');
			   redirect('contact_us');
            }
			
		}	
			
	}   
	
}