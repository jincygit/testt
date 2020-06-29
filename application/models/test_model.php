<?php 
defined('BASEPATH') OR exit('No direct script acess allowed');

class Test_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	 public function adddata($data)
	 {
	 	$this->db->insert('login',$data);
	 }
	 public function viewlist()
	 {
	 	$userdata=$this->db->get('login');
	 	return $userdata->result();

	 }
	  public function get_count() {
        return $this->db->count_all('login');
    }

    public function get_authors($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('login');

        return $query->result();
    }
     public function countalll()
	 {
	 	return $this->db->count_all('login');
	 }
	 public function pagination($limit,$start)
	 {
	 	$this->db->limit($limit,$start);
	 	$q=$this->db->get('login');
	 	return $q->result();
	 }

	 public function record_count() {
        return $this->db->count_all("login");
    }

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("login");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	 public function editdata($id)
	 {
	 	$this->db->where('id',$id);
	 	$userdata=$this->db->get('login');
	 	return $userdata->result();

	 }
	 public function update($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	$userdata=$this->db->update('login',$data);

	 }
	 public function check()
	 {
	 	$user=$this->input->post('uname');
	 	$upass=$this->input->post('upass');
	 	$return=FALSE;
	 	$this->db->where(array('uname'=>$user,'upass'=>$upass));
	 	$q=$this->db->get('login')->result();
	 	if(count($q)==1)
	 	{
	 		$return= TRUE;
	 	}
	 	return $return;

	 }
	 public function delete($id)
	 {
	 	$this->db->where('id',$id);
	 	$this->db->delete('login');

	 }
	 	 public function check_login()
	 {

	 $username	=	$this->input->post('uname');
		$password	=	$this->input->post('upass');
		$return	=	FALSE;		
		
		$result	=	$this->db->where(array('uname'=>$username,'upass'=>$password))->get('login')->result();
		
		if(count($result)==1){				
			$this->session->set_userdata('ADMIN_NAME',$result[0]->uname);					
			$return	=	TRUE;
		}
		
		return $return;		
	}



}
?>