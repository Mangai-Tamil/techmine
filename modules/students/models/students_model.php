<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_model extends CI_Model{



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

  public function get_marksheet_details($id)
	{
    $this->db->select('student_marks.*');
    $this->db->select('subject.*');
		$this->db->where('student_marks.student_id',$id);
		$this->db->join('subject','subject.id='.'student_marks.sub_id','left');
		$query=$this->db->get('student_marks');
		return $query->result_array();
	}
	 public function check_student($reg_no,$dob)
	{
		//echo"<pre>";print_r($data);exit();
		$this->db->select('users.*');
		$this->db->where('reg_no',$reg_no);
		$this->db->where('dob',$dob);
		$query=$this->db->get('users');
		return $query->result_array();
	}
}
