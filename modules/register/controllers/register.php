<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends MX_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	    $this->load->database();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model("register_model");


	}
public function index(){
	if($this->input->post())
		{

			$input=$this->input->post();
			//echo"<pre>";print_r($input);exit();

			 $this->form_validation->set_rules('email','Email ID','required|valid_email');
			  $this->form_validation->set_rules('password','Password','required');


			if ($this->form_validation->run() == false)

			{
				//echo"<pre>";print_r("hello");exit();
				 $this->form_validation->set_message('rule','error message');
			}
			else
			{
			//	$input=$this->input->post();
				$password=md5($input['password']);
				$email=$input['email'];
				$data=$this->register_model->login($email,$password);
				//echo"<pre>";print_r($data);exit();
				if(isset($data) && !empty($data))
			{
				if($data[0]['user_id']==1){
				$id=$data[0]['id'];
				//echo"<pre>";print_r($id);exit();
				$sessiondata = $this->encrypt->encode($id);

				$this->session->set_userdata('admin_user_info', $sessiondata);
				$this->session->userdata('admin_user_info');

				$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
				$cur_time = $date->format('Y-m-d H:i:s');
				redirect($this->config->item('base_url').'admin/dashboard');
			//	echo"<pre>";print_r("submitted");exit();
			}
				elseif ($data[0]['user_id']==2){
				$id=$data[0]['id'];
				//echo"<pre>";print_r($id);exit();
				$sessiondata = $this->encrypt->encode($id);

				$this->session->set_userdata('student_user_info', $sessiondata);
				$this->session->userdata('student_user_info');

				$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
				$cur_time = $date->format('Y-m-d H:i:s');
				redirect($this->config->item('base_url').'students/dashboard');
			//	echo"<pre>";print_r("submitted");exit();
			}
			}
			else{
			redirect($this->config->item('base_url'));

			}

			}


		}

		$this->load->view('login_view');

	}

public function student_register()
	{
	//	echo"<pre>";print_r("hello");exit();
		if($this->input->post())
		{

			$input=$this->input->post();
			//echo"<pre>";print_r($input);exit();
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('reg_no','Register Number','required');
			 $this->form_validation->set_rules('email','Email ID','required|valid_email');
			  $this->form_validation->set_rules('password','Password','required');
			   $this->form_validation->set_rules('dob','Dob','required');
			  $this->form_validation->set_rules('degree','Degree','required');
			$this->form_validation->set_rules('dept_id','Department','required');




			if ($this->form_validation->run() == false)

			{
				//echo"<pre>";print_r("hello");exit();
				 $this->form_validation->set_message('rule','error message');
			}
			else
			{
			//	$input=$this->input->post();
				$passwrd=md5($input['password']);
				//echo"<pre>";print_r($passwrd);exit();
				//echo"<pre>";print_r($input);exit();
				$insert=array('user_id'=> '2', 'dept_id'=>$input['dept_id'], 'name'=>$input['name'],'email'=>$input['email'],
				                       'password'=>$passwrd,'reg_no'=>$input['reg_no'],
															 'dob'=>$input['dob'], 'degree'=>$input['degree'], 'certificate_no'=>"");
														// echo"<pre>";print_r($insert);exit();
				$this->register_model->insert_students($insert);
				//redirect($this->config->item('base_url').'partners/index');
				echo"<pre>";print_r("submitted");exit();
			}


		}
$this->load->view('register_view');
	}

}
