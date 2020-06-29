<?php 
defined('BASEPATH') OR exit('No direct script acess allowed');

class Test extends CI_Controller
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

  //            redirect('test/formlogin');
  //       } 

	}
	 public function index2() {
        $config = array();
        $config["base_url"] = base_url() . "index.php/test";
        $config["total_rows"] = $this->Test_model->get_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 2;

        //
        $config['full_tag_open'] = "<ul class='pagination'>";
$config['full_tag_close'] ="</ul>";
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
$config['next_tag_open'] = "<li>";
$config['next_tagl_close'] = "</li>";
$config['prev_tag_open'] = "<li>";
$config['prev_tagl_close'] = "</li>";
$config['first_tag_open'] = "<li>";
$config['first_tagl_close'] = "</li>";
$config['last_tag_open'] = "<li>";
$config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['userdata'] = $this->Test_model->get_authors($config["per_page"], $page);

         $this->load->view('test\viewlist',$data);
    }
	public function example1() {
        $config = array();
        $config["base_url"] = base_url() . "Test/example1";
        $config["total_rows"] = $this->Test_model->record_count();
        $config["per_page"] = 2;
        //$config["uri_segment"] = 3;
        $config["uri_segment"] = 3;
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["userdata"] = $this->Test_model
        ->fetch_countries($config["per_page"], $page);
         // $data['userdata']= $this->Test_model->
         //     fetch_countries($config["per_page"], $page);
        //$data['userdata']=$this->Test_model->viewlist();
        $data["links"] = $this->pagination->create_links();

         $this->load->view('test\viewlist',$data);
    }
	public function index1()
	{
		$data['userdata']=$this->Test_model->viewlist();
        $this->load->view('test\viewlist',$data);
	}
	public function register()
	{
		$this->load->view('test\regform');
	}
	public function edit($id)
	{
		$data['userdata']=$this->Test_model->editdata($id);
		$this->load->view('test\editform',$data);
	}
	public function delete($id)
	{
		$this->Test_model->delete($id);
redirect('test');	}

    public function add()
	{
		$this->form_validation->set_rules('uname','Name','required');
		$this->form_validation->set_rules('upass','Name','required|md5');
				$this->form_validation->set_rules('img','Image','callback_image_upload');

if($this->form_validation->run()==TRUE)
{
	$inputdata=$this->upload->data();
	$img=base_url().'uploads/'.$inputdata['file_name'];
	$data=array('uname'=>$this->input->post('uname'),
		'upass'=>$this->input->post('upass'),
		'img'=>$img,
		);
	$this->Test_model->adddata($data);
	redirect('test');

}
else
{
	$this->load->view('test\regform');
}

	}
	public function update($id)
	{
	        $config['upload_path']='./uploads/';
			$config['allowed_types']='jpg|jpeg|png';
			$config['max_size']='2048';
			$this->load->library('upload',$config);
			if($this->upload->do_upload('img'))
			{
				$inputdata=$this->upload->data();
	$img=base_url().'uploads/'.$inputdata['file_name'];

			}
			else
			{
				$this->upload->display_errors();
                $img=$this->input->post('hid');
			}
	
	$data=array('uname'=>$this->input->post('uname'),
		'upass'=>$this->input->post('upass'),
		'img'=>$img,
		);
	$this->Test_model->update($data,$id);
	redirect('test');

	}
	public function image_upload()
	{
		if($_FILES['img']['size']!=0)
		{
			$config['upload_path']='./uploads/';
			$config['allowed_types']='jpg|jpeg|png';
			$config['max_size']='2048';
			$this->load->library('upload',$config);
			if($this->upload->do_upload('img'))
			{
				return true;

			}
			else
			{
				$this->form_validation->set_message('image_upload',$this->upload->display_errors());
			return false;

			}

		}
		else
		{
			$this->form_validation->set_message('image_upload',"NO file selected");
			return false;
		}
	}
	public function formlog()
	{
		$this->load->view('test\loginform');
	}
	public function formlogin()
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
		$this->session->unset_userdata('product_id');
		$this->session->sess_destroy();
	
		redirect('test/login');
	}
	
	public function index()
	{
		$config=array();
		$config['base_url']=base_url().'index.php/test';
		$config['per_page']=3;
		$config['total_rows']=$this->Test_model->countalll();
		$config['uri_segment']=2;
		 // $config = array();
   //      $config["base_url"] = base_url() . "index.php/test";
   //      $config["total_rows"] = $this->Test_model->get_count();
   //      $config["per_page"] = 2;
   //      $config["uri_segment"] = 2;

		

		$this->pagination->initialize($config);
		$page=($this->uri->segment(2)) ? $this->uri->segment(2): 0;
				$data['links']=$this->pagination->create_links();
				$data['userdata']=$this->Test_model->pagination($config['per_page'],$page);
				$this->load->view('test\viewlist',$data);

		// $this->pagination->initialize($config);

  //       $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

  //       $data["links"] = $this->pagination->create_links();

  //       $data['userdata'] = $this->Test_model->get_authors($config["per_page"], $page);

  //        $this->load->view('test\viewlist',$data);



	}

}

?>