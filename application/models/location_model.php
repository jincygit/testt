<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class location_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	    $this->load->database();
	}
	public function adddata($data)
	{
		$this->db->insert('books',$data);
	}
	public function viewall()
	{
		$list=$this->db->get('books');
		return $list->result();

	}
	public function liveview()
	{
		$this->db->order_by('book_id',DESC);
		$list=$this->db->get('books');
		return $list->result_array();

	}
	public function editthis($id)
	{
		$this->db->where('book_id',$id);
		$edit=$this->db->get('books');
		return $edit->result();

	}
	public function updatethis($data,$id)
	{
		$this->db->where('book_id',$id);
		$this->db->update('books',$data);
	}
	public function deletethis($id)
	{
		$this->db->where('book_id',$id);
		$this->db->delete('books');
	}
}
