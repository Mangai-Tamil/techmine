<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MX_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	    $this->load->database();
		$this->load->library('form_validation');
		$this->load->model("register/register_model");
		$this->load->model("admin/admin_model");
	$this->load->library('encrypt');

	}
public function dashboard(){
	$user_det= $this->session->userdata('admin_user_info');
	$id=$this->encrypt->decode($user_det);
	//echo"<pre>";print_r($this->config->item('base_url'));exit();
	$data['user_details']=$this->admin_model->get_user_detatils_by_id($id);
	//echo"<pre>";print_r($data['user_details']);exit();
	if($data['user_details'][0]['user_id']==1){
    $data['student_details']=$this->admin_model->get_student_list();
	$this->load->view('admin/dashboard',$data);
	}
	else{
		redirect($this->config->item('base_url'));
	}
}
public function get_marksheet_downloaded_list(){
	$user_det= $this->session->userdata('admin_user_info');
	$id=$this->encrypt->decode($user_det);
	//echo"<pre>";print_r($this->config->item('base_url'));exit();
	$data['user_details']=$this->admin_model->get_user_detatils_by_id($id);

	if($data['user_details'][0]['user_id']==1){
    $data['student_details']=$this->admin_model->get_marksheet_download_list();
	//	echo"<pre>";print_r($data['student_details']);exit();
	$this->load->view('admin/get_downloaded_list_view',$data);
	}
	else{
		redirect($this->config->item('base_url'));
	}
}
public function add_subject()
	{
		$user_det= $this->session->userdata('admin_user_info');
	$id=$this->encrypt->decode($user_det);
	//echo"<pre>";print_r($this->config->item('base_url'));exit();
	$data['user_details']=$this->admin_model->get_user_detatils_by_id($id);
		if($data['user_details'][0]['user_id']==1){
		if($this->input->post())
		{

			$input=$this->input->post();
			//echo"<pre>";print_r($input);exit();
			$this->form_validation->set_rules('sub_code','Subject Code','required');
			$this->form_validation->set_rules('subject','Subject','required');
			 $this->form_validation->set_rules('credit','Credit','required');
			  $this->form_validation->set_rules('sem','Semester','required');
			$this->form_validation->set_rules('dept_id','Department','required');




			if ($this->form_validation->run() == false)

			{
				//echo"<pre>";print_r("hello");exit();
				 $this->form_validation->set_message('rule','error message');
			}
			else
			{

				//echo"<pre>";print_r($input);exit();
				$insert=array('dept_id'=>$input['dept_id'], 'sem'=>$input['sem'],'sub_code'=>$input['sub_code'],
				                       'subject'=>$input['subject'],'credit'=>$input['credit']);
														// echo"<pre>";print_r($insert);exit();
				$this->admin_model->insert_subject($insert);
				redirect($this->config->item('base_url').'admin/add_subject');
			//	echo"<pre>";print_r("submitted");exit();
			}


		}
$this->load->view('add_subject_view');
}
	else{
		redirect($this->config->item('base_url'));
	}
	}

	public function add_student_marks()
	{
		$semid = $this->uri->segment(3);
		$student_id = $this->uri->segment(4);
		//$student_id=$url_vl;
		$user_det= $this->session->userdata('admin_user_info');
	    $id=$this->encrypt->decode($user_det);
	   // echo"<pre>";print_r($semid);exit();
	    $data['user_details']=$this->admin_model->get_user_detatils_by_id($id);
			if($data['user_details'][0]['user_id']==1){
	    $data['student_details']=$this->admin_model->get_student_list_by_id($student_id);
			$deptid=$data['student_details'][0]['dept_id'];
			if(($data['student_details'][0]['degree']=="B.Sc") || ($data['student_details'][0]['degree']=="B.A")){
			 $data['subject_details']=$this->admin_model->get_ug_subject_list($deptid, $semid);
		//	 echo"<pre>";print_r($data['subject_details']);exit();
		 }
		 else{
			  $data['subject_details']=$this->admin_model->get_pg_subject_list($deptid, $semid);
		 }
	   $data['subjectcount']= count($data['subject_details']);
//echo"<pre>";print_r($subjectcount);exit();

		if($this->input->post())
		{
			$input=$this->input->post();
//echo"<pre>";print_r($input);exit();
			for ($i = 1; $i <= $data['subjectcount']; $i++)
			{

				$insert=array('student_id'=>	$student_id, 'sub_id'=>$input['sub_id_'.$i],'dept_id'=>$data['student_details'][0]['dept_id'],
															 'int_mark'=>$input['int_mark_'.$i],'ext_mark'=>$input['ext_mark_'.$i],
															 'total_mark'=>$input['int_mark_'.$i]+$input['ext_mark_'.$i]);


																//	echo"<pre>";print_r($insert['total_mark']);
												 				$this->admin_model->insert_student_marks($insert);

			}
		//	echo"<pre>";print_r($insert);exit();
			// $cert_num = '50'.mt_rand(10000, 99999);
			// $update_status= array('certificate_no'=>$cert_num);
			// //echo"<pre>";print_r($update_status);exit();
			// $this->admin_model->update_certificate_num($update_status, $student_id);

			redirect($this->config->item('base_url').'admin/dashboard');
			//	echo"<pre>";print_r("submitted");exit();



		}
$this->load->view('add_marks_view', $data);
}
	else{
		redirect($this->config->item('base_url'));
	}
	}
public function select_sem($url_vl){
		$student_id=$url_vl;
		$user_det= $this->session->userdata('admin_user_info');
		$id=$this->encrypt->decode($user_det);
		//echo"<pre>";print_r($this->config->item('base_url'));exit();
		$data['user_details']=$this->admin_model->get_user_detatils_by_id($id);
		//echo"<pre>";print_r($data['user_details']);exit();
		if($data['user_details'][0]['user_id']==1){
			if($this->input->post())
			{
				$input=$this->input->post();


				redirect($this->config->item('base_url').'admin/add_student_marks/'.$input['sem'].'/'.$student_id);
				//	echo"<pre>";print_r("submitted");exit();
      }
			else {
				$this->load->view('select_sem_view');
			}
		}
		else{
			redirect($this->config->item('base_url'));
		}
	}
	public function logout()
	{
		$user_det = $this->session->userdata('admin_user_info');
		$this->session->sess_destroy();
		redirect($this->config->item('base_url'));
	}
}
