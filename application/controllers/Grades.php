<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/third_party/mpdf/mpdf.php';

class Grades extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Faculty_model');
		 $this->load->library('enrollment_library');
         $this->load->model('Subject_model');
	}

	public function index(){
		$data['faculty'] = $this->Faculty_model->get_all_faculty();
		$data['page_title'] = 'Faculty / Staffs List';
        $data['_view'] = 'grades/index';
        $this->load->view('layouts/main',$data);
	}

	 public function subjects($id){
        
        $data['_view'] = 'grades/subjects';
        $data['page_title'] = 'Faculty Subjects';
        $data['faculty_id'] = $id;
        $data['loads'] = $this->Faculty_model->get_faculty_subjects($id);
        $data['teacher_name'] = $this->Faculty_model->get_faculty_name_by_id($id);
        $this->load->view('layouts/main',$data);
    }

    public function subject_code($teacher,$subject_id){

    	$data['page_title'] = 'Faculty Subjects - Inputting Grades';
        $data['subject_info'] = $this->Subject_model->get_subject($subject_id);
    	$data['subject_id'] = $subject_id;
    	$data['grades'] = $this->Faculty_model->get_grades($subject_id);
    	$advisory_section_id = $this->Faculty_model->get_advisory_section_by_teacher($teacher);
    	$data['enrolled_studs'] = $this->Faculty_model->get_student_by_section_id($advisory_section_id);
    	$data['_view'] = 'grades/grading_sheet';
        $this->load->view('layouts/main',$data);

    }

    public function print_grades($teacher,$subject_id){

        $data['page_title'] = 'Faculty Subjects - Inputting Grades';
        $data['subject_info'] = $this->Subject_model->get_subject($subject_id);
        $data['subject_id'] = $subject_id;
        $data['grades'] = $this->Faculty_model->get_grades($subject_id);
        $advisory_section_id = $this->Faculty_model->get_advisory_section_by_teacher($teacher);
        $data['enrolled_studs'] = $this->Faculty_model->get_student_by_section_id($advisory_section_id);
        $data['teacher_name'] = $this->Faculty_model->get_faculty_name_by_id($teacher);
        $pdf = new mPDF('c','A4-L');
        $pdf->writeHTML(template_printgrade($data));
        $pdf->Output();

 
    }

}

/* End of file Grades.php */
/* Location: ./application/controllers/Grades.php */