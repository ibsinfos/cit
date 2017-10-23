<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_gallery extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Gallery_model');
		$this->load->helper(['url','html','form']);
		$this->load->database();
		$this->load->library(['form_validation','session']);
		if(!$this->session->userdata('is_logged_in'))
		{
			redirect('admin/login');
		}
	}
	public function index()
	{
		$data = [
			'images'	=> $this->Gallery_model->all()
		];
		$this->load->view('includes/header');  
		$this->load->view('includes/left_sidebar');
		$this->load->view('admin/gallery/list', $data);
		$this->load->view('includes/footer');	
	}
	public function add(){
		$rules = 	[
				        [
				                'field' => 'caption',
				                'label' => 'Caption',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'description',
				                'label' => 'Description',
				                'rules' => 'required'
				        ]
					];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('includes/header');  
			$this->load->view('includes/left_sidebar');
			$this->load->view('admin/gallery/add');
			$this->load->view('includes/footer');
			
			
		}
		else
		{

			/* Start Uploading File */
			$config =	[
							'upload_path'	=> './uploads/',
	            			'allowed_types' => 'gif|jpg|png',
	            			'max_size'      => 20000,
	            			'max_width'     => 1924,
	            			'max_height'    => 2040
            			];

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                    $error = array('error' => $this->upload->display_errors());
					$this->load->view('includes/header');  
					$this->load->view('includes/left_sidebar');
                    $this->load->view('admin/gallery/add', $error);
					$this->load->view('includes/footer');
            }
            else
            {
                    $file = $this->upload->data();
                    $caption=trim($this->input->post('caption'));
					$description=strip_tags(trim($this->input->post('description')));
                    $data = [
                    			'file' 			=> 'uploads/' . $file['file_name'],
                    			'caption'		=> $caption,
                    			'description'	=> $description
                    		];
                    $this->Gallery_model->create($data);
					$this->session->set_flashdata('message','New image has been added..');
					redirect('admin/gallery');
            }
		}
	}

	public function edit($id){
		$rules = 	[
				        [
				                'field' => 'caption',
				                'label' => 'Caption',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'description',
				                'label' => 'Description',
				                'rules' => 'required'
				        ]
					];

		$this->form_validation->set_rules($rules);
		$image = $this->Gallery_model->find($id)->row();

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('includes/header');  
			$this->load->view('includes/left_sidebar');
			$this->load->view('admin/gallery/edit',['image'=>$image]);
			$this->load->view('includes/footer');
		}
		else
		{
			if(isset($_FILES["userfile"]["name"]))
			{
				/* Start Uploading File */
				$config =	[
								'upload_path'	=> './uploads/',
		            			'allowed_types' => 'gif|jpg|png',
		            			'max_size'      => 100,
		            			'max_width'     => 1024,
		            			'max_height'    => 768
	            			];

	            $this->load->library('upload', $config);

	            if ( ! $this->upload->do_upload())
	            {
	                    $error = array('error' => $this->upload->display_errors());
						$this->load->view('includes/header');  
						$this->load->view('includes/left_sidebar');
						$this->load->view('admin/gallery/edit',['image'=>$image,'error'=>$error]);
						$this->load->view('includes/footer');
	            }
	            else
	            {
	                    $file = $this->upload->data();
	                    $data['file'] = 'uploads/' . $file['file_name'];
						unlink($image->file);
	            }
			}
              $caption=trim($this->input->post('caption'));
			 $description=strip_tags(trim($this->input->post('description')));
			$data['caption']=$caption;
			$data['description']=$description;
			
			$this->Gallery_model->update($id,$data);
			$this->session->set_flashdata('message','New image has been updated..');
			redirect('admin/gallery');
		}
	}
	public function delete($id)
	{
		$this->Gallery_model->delete($id);
		$this->session->set_flashdata('message','Image has been deleted..');
		redirect('admin/gallery');
	}
}
