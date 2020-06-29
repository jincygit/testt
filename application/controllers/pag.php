<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pag extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('file','url','form'));
		$this->load->library(array('form_validation','pagination'));
		$this->load->model('Test_model');

	}
	public function index()
	{
		$config=array();
		$config['base_url']=base_url().'index.php/pag';
		$config['total_rows']=$this->Test_model->countalll();
		$config['per_page']=2;
		$config['uri_segment']=2;

		$this->pagination->initialize($config);
		$page=($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['links'] =$this->pagination->create_links();
		$data['userdata'] =$this->Test_model->pagination($config['per_page'],$page);
		$this->load->view('test\viewlist',$data);

	}

}
?>