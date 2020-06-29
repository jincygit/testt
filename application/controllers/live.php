<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class live extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	    $this->load->model('live_model');
$this->load->library(array('form_validation'));
	}
	// public function index()
	// {
	// 	$this->load->view('location\insertform');
	// }
	function index()
 {
  $this->load->view('location\live_table');
 }

 function load_data()
 {
  $data = $this->live_model->load_data();
  echo json_encode($data);
 }

  function insert()
 {
  $data = array(
   'first_name' => $this->input->post('first_name'),
   'last_name'  => $this->input->post('last_name'),
   'age'   => $this->input->post('age')
  );

  $this->live_model->insert($data);
 }

 function update()
 {
  $data = array(
   $this->input->post('table_column') => $this->input->post('value')
  );

  $this->live_model->update($data, $this->input->post('id'));
 }

 function delete()
 {
  $this->live_model->delete($this->input->post('id'));
 }
 
	
// 	public function loaddata()
// 	{
 
		
// $data= array('b_name'=>$this->input->post('name'),
// 			         'author'=>$this->input->post('email'),
// 			         'created_date'=>date('Y-m-d'),
// 			);
// 		$this->load->model('location_model');
// 		$this->location_model->adddata($data);
// 		//redirect('location/viewlist');		}
// 	}
	
}
