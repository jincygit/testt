<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class plan_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
       $this->load->database();
	}
	function add_item($data_array=array())
	{
		$this->db->insert('plan_table',$data_array);
		return $this->db->insert_id();
	}
	function search_list($key)
	{
        $this->db->like('plan_name',$key);
        $this->db->like('p_id',$key);
        $this->db->like('plan_id',$key);
        $this->db->like('plan_description',$key);
        $this->db->like('plan_description1',$key);
         $this->db->like('plan_description2',$key);
        $this->db->like('plan_amount ',$key);

		$plan=$this->db->get('plan_table');
		return $plan->result();
	}
	
	function view_list()
	{
	    $plan=$this->db->get('plan_table');
		return $plan->result();
	}
	function user_list()
	{
	    $user=$this->db->get('user_address_book');
		return $user->result();
	}
	function plan_subscribed()
	{
	    $plan_s=$this->db->get('plan_subscribed');
		return $plan_s->result();
	}
	function product_list()
	{
	    $product=$this->db->get('product_table');
		return $product->result();
	}
	function address_list()
	{
	    $address=$this->db->get('user_address_book');
		return $address->result();
	}
	function view_more($id)
	{
		$this->db->where('plan_id',$id);
	    $a=$this->db->get('plan_table');
		return $a->result();
	}
	function subscribed_users($id)
	{
		$this->db->where('plandet_id',$id);
	    $a=$this->db->get('plan_subscribed');
		return $a->result();
	}

	function update_product($id)
	{
	    
		$this->db->where('plan_id',$id);
		$plan=$this->db->get('plan_table');
		return $plan->result();
	}
	function updateit_product($sc_id,$datas)
	{
		//$da=array();
		// $data = array('plan_name'=> $inputdata['plan_name'],
		//               'p_id'=> $inputdata['p_id'],   
		// 			  'plan_description'=> $inputdata['plan_description'], 
		// 			  'plan_description1'=> $inputdata['plan_description1'], 
		// 			  'plan_description2'=> $inputdata['plan_description2'], 
		// 			  'plan_amount'=> $inputdata['plan_amount'], 
		// 			  					  );
		
	
		$this->db->where('plan_id',$sc_id);
		$this->db->update('plan_table',$datas);
	
	}
	function delete_item($id)
	{
		$this->db->where('plan_id',$id);
		$this->db->delete('plan_table');
	}
	function delete_subscription($id)
	{
		$this->db->where('plandet_id',$id);
	   $this->db->delete('plan_subscribed');
	}
}
?>
		