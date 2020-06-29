<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model
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
	public function viewdata()
	{
		$list=$this->db->get('login');
		return $list->result();
	}
	public function editdata($id)
	{
		$this->db->where('id',$id);
		$list=$this->db->get('login');
		return $list->result();
	}
	public function updatedata($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('login',$data);
	}
	public function deletedata($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('login');
	}


}

?>