<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Students extends MX_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	  $this->load->database();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model("register/register_model");
		$this->load->model("admin/admin_model");
		$this->load->model("students/students_model");
    $this->load->model("admin/admin_model");
}
		public function dashboard(){
			$user_det= $this->session->userdata('student_user_info');
			$id=$this->encrypt->decode($user_det);
			//	echo"<pre>";print_r($this->config->item('base_url'));exit();
			$data['user_details']=$this->admin_model->get_user_detatils_by_id($id);
			//echo"<pre>";print_r($data['user_details']);
			if(($data['user_details'][0]['degree']=="B.Sc") || ($data['user_details'][0]['degree']=="B.A")){
				$data['subject_details']=$this->admin_model->get_ug_subject_list($data['user_details'][0]['dept_id']);
			}
			else{
				$data['subject_details']=$this->admin_model->get_pg_subject_list($data['user_details'][0]['dept_id']);
			}
			$data['subjectcount']= count($data['subject_details']);
			if($data['user_details'][0]['user_id']==2)
			{
				if($this->input->post())
				{
					$input=$this->input->post();
					$userdata=$this->students_model->check_student($input['reg_no'],$input['dob']);
					//	echo"<pre>";print_r($data);exit();
					if(isset($userdata) && !empty($userdata))
					{
						$data['marksheet_details']=$this->students_model->get_marksheet_details($id);
						$t_gpa=0;
						$t_creditsum=0;
						foreach($data['marksheet_details'] as $val){
							$gpa=(($val['total_mark']/10)* $val['credit']);
							$credit_sum=$val['credit'];
							$t_creditsum=$t_creditsum+$credit_sum;
							$t_gpa=$t_gpa+$gpa;

						}
						$data['cgpa']=round(($t_gpa/$t_creditsum),2);
					//	echo"<pre>";print_r($cgpa);exit();
						$this->load->view('students/marksheet_view',$data);

						return;
					}
					else
					{
						$this->load->view('students/dashboard',$data);
					}
				}
				$this->load->view('students/dashboard',$data);
			}
			else{
				redirect($this->config->item('base_url'));
			}
	}
		public function logout()
		{
			$user_det = $this->session->userdata('student_user_info');
			$this->session->sess_destroy();
			redirect($this->config->item('base_url'));
		}
		public function mark_sheet_pdf_export()
		{

			$user_det= $this->session->userdata('student_user_info');
			$sessionid= $this->encrypt->decode($user_det);
		//echo"<pre>";print_r($id);exit();
		$data['user_details']=$this->admin_model->get_user_detatils_by_id($sessionid);
			if($data['user_details'][0]['user_id']==2)
			{
				if($data['user_details'][0]['df']==1)
				{
					$data['marksheet_details']=$this->students_model->get_marksheet_details($sessionid);
					//echo"<pre>";print_r($data['task_details']);exit();

					/* Task List pdf export */
					$this->load->library('m_pdf');

					$html =$this->load->view('students/marksheet_pdf_view',$data,true);
					$pdffilename="marksheet.pdf";

					$this->m_pdf->pdf->AddPage('','', '', '', '',
					10, // margin_left
					10, // margin right
					20, // margin top
					20, // margin bottom
					5, // margin header
					10); // margin footer

					$this->m_pdf->pdf->WriteHTML($html);
					$this->m_pdf->pdf->Output($pdffilename,"I");

					$update_status= array('df'=>2);
					//echo"<pre>";print_r($update_status);exit();
					$this->admin_model->update_certificate_num($update_status, $sessionid);
				}
				else{
					$this->session->set_flashdata('msg', "Already you are downloaded. One time download only allowed.");
					redirect($this->uri->uri_string());
				}


		}
		else
		{
			$this->session->sess_destroy();
			redirect($this->config->item('base_url'));
		}
		}

}
