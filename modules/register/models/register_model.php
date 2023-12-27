<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model{

	

	function __construct()
	{
		parent::__construct();

	}

	public function get_users_details($id)
	{
		$this->db->select('users.*');
		$this->db->where('id',$id);
		$query=$this->db->get('users');
		return $query->result_array();
	}
	
  public function insert_students($data)
	{
		//echo"<pre>";print_r($data);exit();
		$this->db->insert('users',$data);
	}
	 public function login($email,$password)
	{
		//echo"<pre>";print_r($data);exit();
		$this->db->select('users.*');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query=$this->db->get('users');
		return $query->result_array();
	}
}