<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class testc extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','file','form'));
		$this->load->library('form_validation');
		$this->load->model('login_model','login',TRUE);
	}
	
	public function index()
	{
		$this->load->view('location\insertform');
	}

	public function register()
	{
		$this->load->view('test\form');
	}
	public function add()
	{
		$this->form_validation->set_rules('uname','Name','required');
		$this->form_validation->set_rules('upass','Password','required');
		$this->form_validation->set_rules('img','Image','callback_image_upload');


		
		if($this->form_validation->run()==TRUE)
		{
			$inputdata=$this->upload->data();
		$imagepath=base_url().'uploads/'.$inputdata['file_name'];

			$data=array('uname'=>$this->input->post('uname'),
				'upass'=>$this->input->post('upass'),
				'img'=>$imagepath,
				);
			$this->load->model('login_model');
			$this->login_model->adddata($data);
			redirect('testc/view');

		}
		else
		{
			$this->load->view('test\form');
		}

	}
	public function image_upload()
	{
		if($_FILES['img']['size']!=0)
		{
			$config['allowed_types']='jpg|png|jpeg';
			$config['upload_path']='./uploads/';
			$config['max_size']='2048';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('img'))
			{
				$this->form_validation->set_message('image_upload',$this->upload->display_errors());
				return false;

			}
			else
			{
				return true;
			}

		}
		else
		{
			$this->form_validation->set_message('image_upload',"No file selected");
			return false;
		}
	}
	public function view()
	{
		$data['logdata']=$this->login->viewdata();
		$this->load->view('test\list',$data);
	}
	public function edit($id)
	{
		$data['logdata']=$this->login->editdata($id);
		$this->load->view('test\editdata',$data);
	}
	public function update($id)
	{
		$config['allowed_types']='jpg|png|jpeg';
			$config['upload_path']='./uploads/';
			$config['max_size']='2048';
			$this->load->library('upload',$config);
			if($this->upload->do_upload('img'))
			{
			$inputdata=$this->upload->data();
		$imagepath=base_url().'uploads/'.$inputdata['file_name'];
	}
	else
	{
		$this->upload->display_errors();
		$imagepath=$this->input->post('hid');
	}

			$data=array('uname'=>$this->input->post('uname'),
				'upass'=>$this->input->post('upass'),
				'img'=>$imagepath,
				);
			$this->load->model('login_model');
			$this->login_model->updatedata($data,$id);
			redirect('testc/view');

		
	}
	public function delete($id)
	{
		$this->login->deletedata($id);
		$this->load->view('test\list');
	}
}
?>