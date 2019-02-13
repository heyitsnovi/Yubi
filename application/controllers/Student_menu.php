<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Student_menu extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['Student_model','Enrollment_model','Charge_model']);
		$this->load->library('enrollment_library');
		 if (!$this->ion_auth->in_group(['student']))
        {
            redirect('auth/login', 'refresh');
        }

	}

   public function student_view_grade(){

   	    $user = $this->ion_auth->user()->row();
        $data['student_id'] = $this->Student_model->get_student_id_from_table_students_by_email($user->email);
        $data['enrollment_logs'] = $this->Enrollment_model->get_enrollment_records($data['student_id']);
        $data['_view'] = 'student_menu/index';
        $data['page_title'] = 'Student Grades';
        $data['enrollment_status_current'] = $this->enrollment_library->is_student_enrolled($this->Enrollment_model->get_active_schoolyear(),$data['student_id']); 
        $this->load->view('layouts/main',$data);

    }

      public function grade($adviser_id,$school_year,$student_id){

        $data['student_grade'] = $this->Student_model->get_student_grade($student_id,$adviser_id,$school_year);
        $data['page_title'] = 'Viewing Student Grades';
        $data['_view'] = 'student_menu/view_student_grades';


        if(isset($data['student_grade'][0])){
        $this->load->view('layouts/main',$data);
    	}else{
    		$this->session->set_flashdata('message', 'Enrollment Info Not Found');
    		redirect(base_url('student_menu/student_view_grade'),'refresh');
    	}
    	}
    	

    	public function student_payment(){
    		 
    		 $user = $this->ion_auth->user()->row();
        	 $data['student_id'] = $this->Student_model->get_student_id_from_table_students_by_email($user->email);
        	 $data['payment_history'] = $this->Charge_model->get_payment_log($data['student_id']);

		        $grade_in = $this->Enrollment_model->get_student_grade_in($data['student_id'],$this->enrollment_library->get_school_year_by_id($this->enrollment_library->get_active_schoolyear_by_id()));
				 
		        $data['_view'] = 'student_menu/payments';
		        $data['page_title'] = 'Student Payment Records';
		        
		        if($grade_in!==NULL){
		        $data['student_grade_in'] = $this->Enrollment_model->get_student_grade_in($data['student_id'],$this->enrollment_library->get_school_year_by_id($this->enrollment_library->get_active_schoolyear_by_id()));
		    	}else{
		    		$data['student_grade_in'] = 0;
		    	}
		        $data['statement']  = $this->Charge_model->get_all_charges_by_id($data['student_grade_in'],$this->enrollment_library->get_active_schoolyear_by_id());
		        $this->load->view('layouts/main',$data);


    	}


}

/* End of file Student_menu.php */
/* Location: ./application/controllers/Student_menu.php */