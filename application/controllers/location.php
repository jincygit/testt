<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->helper('url','form');
		$this->load->helper(array('form','url'));
	    $this->load->model('location_model','location');
$this->load->library(array('form_validation'));
	}
	public function index()
	{//indexone255
		$this->load->view('location\insertform');
	}
	public function testvalidate()
	{
		$this->load->view('location\regform');
	}
	public function insertdata()
	{
		// $this->load->library('form_validation');
  //       $this->load->helper(array('form', 'url'));

		$this->form_validation->set_rules('b_name','b_name','required|integer');
		$this->form_validation->set_rules('author','author','required');

		if($this->form_validation->run() == TRUE)
		{
		$data= array('b_name'=>$this->input->post('b_name'),
			         'author'=>$this->input->post('author'),
			         'created_date'=>date('Y-m-d'),
			);
		$this->load->model('location_model');
		$this->location_model->adddata($data);
		redirect('location/viewlist');
	}
	else
	{
		$this->load->view('location\insertform');
	}
	}
	public function insertdatavalidate()
	{
 // $this->load->library('form_validation');
 //        $this->load->helper(array('form', 'url'));
      	
   
    	//$this->load->library(array('form_validation'));

	 $this->form_validation->set_rules('name','Name','required'); 
		$this->form_validation->set_rules('email','Email','required');

	   if ($this->form_validation->run() == FALSE) 
		{
//echo " not validated";	
		$this->load->view('location\regform');

        } 
		else 
		{
$data= array('b_name'=>$this->input->post('name'),
			         'author'=>$this->input->post('email'),
			         'created_date'=>date('Y-m-d'),
			);
		$this->load->model('location_model');
		$this->location_model->adddata($data);
		redirect('location/viewlist');		}
	}
	public function loaddata()
	{
 
		
$data= array('b_name'=>$this->input->post('name'),
			         'author'=>$this->input->post('email'),
			         'created_date'=>date('Y-m-d'),
			);
		$this->load->model('location_model');
		$this->location_model->adddata($data);
		//redirect('location/viewlist');		}
	}
	public function viewlist()
	{
				$this->load->model('location_model');
		$data['list']=$this->location_model->viewall();
		$this->load->view('location\listtable',$data);

	}
	public function live()
	{
				$this->load->model('location_model');
		$data=$this->location_model->liveview();
		//$this->load->view('location\livelist',$data);
		echo json_encode($data);

	}

	public function edit($id)
	{
		$this->load->model('location_model');
		$data['editlist']=$this->location_model->editthis($id);
		$this->load->view('location/updateform',$data);
	}
	public function updatedata($id)
	{
		$data= array('b_name'=>$this->input->post('b_name'),
			         'author'=>$this->input->post('author'),
			         'updated_date'=>date('Y-m-d'),
			);

		$this->load->model('location_model');
		$this->location_model->updatethis($data,$id);
		redirect('location/viewlist');

	}
	public function deletedata($id)
	{
		$this->load->model('location_model');
		$data['editlist']=$this->location_model->deletethis($id);
		redirect('location/viewlist');
	}
}
