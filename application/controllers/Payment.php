<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Student_model');
		$this->load->model('Enrollment_model');
		$this->load->model('Charge_model');
		$this->load->library(['enrollment_library','ion_auth']);
	}

	public function index(){
		
		$data['students'] = $this->Student_model->get_all_students([]);
        $data['_view'] = 'payment/index';
        $data['page_title'] = 'Payment Records';
        $this->load->view('layouts/main',$data);
	}

	public function view($student_id){

		$grade_in = $this->Enrollment_model->get_student_grade_in($student_id,$this->enrollment_library->get_school_year_by_id($this->enrollment_library->get_active_schoolyear_by_id()));
		 
        $data['_view'] = 'payment/view';
        $data['page_title'] = 'Student Payment Records';
        $data['student_id'] = $student_id;
        if($grade_in!==NULL){
        $data['student_grade_in'] = $this->Enrollment_model->get_student_grade_in($student_id,$this->enrollment_library->get_school_year_by_id($this->enrollment_library->get_active_schoolyear_by_id()));
    	}else{
    		$data['student_grade_in'] = 0;
    	}
        $data['statement']  = $this->Charge_model->get_all_charges_by_id($data['student_grade_in'],$this->enrollment_library->get_active_schoolyear_by_id());
        $this->load->view('layouts/main',$data);
	}
}

/* End of file Payment.php */
/* Location: ./application/controllers/Payment.php */