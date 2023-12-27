<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{



	function __construct()
	{
		parent::__construct();

	}

	public function get_user_detatils_by_id($id)
	{
		$this->db->select('users.*');
		$this->db->where('id',$id);
		$query=$this->db->get('users');
		return $query->result_array();
	}

  public function insert_subject($data)
	{
		//echo"<pre>";print_r($data);exit();
		$this->db->insert('subject',$data);
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
	public function get_student_list()
	{
		$this->db->select('users.*');
		$this->db->where('user_id',2);
		$query=$this->db->get('users');
		return $query->result_array();
	}
	public function get_student_list_by_id($id)
	{
		$this->db->select('users.*');
		$this->db->where('user_id',2);
		$this->db->where('id',$id);
		$query=$this->db->get('users');
		return $query->result_array();
	}
	public function get_ug_subject_list($id, $sem)
	{

		$this->db->select('subject.*');
		$this->db->where('dept_id',$id);
			$this->db->where('sem',$sem);
		$this->db->where('status',1);
		$query=$this->db->get('subject');
//		echo"<pre>";print_r($query);exit();
		return $query->result_array();
	}
	public function get_pg_subject_list($id,$sem)
	{
		$this->db->select('subject.*');
		$this->db->where('dept_id',$id);
		$this->db->where('sem',$sem);
		$this->db->where('status',2);
		$query=$this->db->get('subject');
		return $query->result_array();
	}
	public function insert_student_marks($data)
	{
		//echo"<pre>";print_r($data);exit();
		$this->db->insert('student_marks',$data);
	}
	function update_certificate_num($data,$id)
	{
		$this->db->where('users.id', $id);
		if ($this->db->update('users', $data))
		{
			return true;
		}
		return false;
	}

	public function get_marksheet_download_list()
	{
		$this->db->select('users.*');
		$this->db->where('user_id',2);
		$this->db->where('df',2);
		$query=$this->db->get('users');
		return $query->result_array();
	}
}
