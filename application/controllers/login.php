<?php 
defined('BASEPATH') OR exit('No direct script acess allowed');

class login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Test_model');
		$this->load->helper(array('url','file','form'));
		$this->load->library(array('pagination','form_validation','session'));

		//$this->load->library('form_validation');
		//$this->load->library("pagination");
		// if ($this->session->userdata('ADMIN_NAME') == FALSE) {

  //            redirect('login');
  //      } 
   }
   public function formlog()
	{
		$this->load->view('test\loginform');
	}
	public function index()
	{
		// if ($this->session->userdata('ADMIN_NAME') == FALSE) {

  //            redirect('admin/login');
  //       } 
		$this->form_validation->set_rules('uname','Name','required');
		$this->form_validation->set_rules('upass','Pass','required|md5');
				if($this->form_validation->run()==TRUE)
				{
					if($this->Test_model->check_login()===TRUE){
				redirect('test');
			        }
			        else
			        {
			        	$data['error_message']	=	'Invalid username and password';
			        	$this->load->view('test\loginform',$data);
			        }
				}
else{
		$this->load->view('test\loginform');
	}

	}
	function logout()
	{	
		$this->session->unset_userdata('ADMIN_NAME');
		$this->session->sess_destroy();
	
		redirect('login');
	}

public function log()
{
	$this->form_validation->set_rules('uname','Name','required');
		$this->form_validation->set_rules('upass','Pass','required|md5');
		if($this->form_validation->run()==TRUE)
		{
			if($this->Test_model->check()===TRUE)
			{
				redirect('test');
			}
			else
			{
				$data['error_message']="Invalid credentials";
				$this->load->view('test\loginform',$data);


			}

		}
		else
		{
			$this->load->view('test\loginform');
		}

}
public function logout1()
{
	$this->unset_userdata('ADM');
	$this->sess_destroy();
	redirect('login/log');
}






	}
	?>
