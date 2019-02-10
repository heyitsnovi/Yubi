<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Enrollment_library
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->model('Enrollment_model');
        $this->ci->load->model('Faculty_model');
        $this->ci->load->model('Student_model');
        $this->ci->load->model('Charge_model');
        
	}

	public function is_student_enrolled($school_year,$student_id){

		return $this->ci->Enrollment_model->is_student_enrolled($school_year,$student_id);

	}
	
	public function get_subject_info_by_id($id,$column){
		return $this->ci->Faculty_model->get_subject_detail_by_id($id,$column);
	}

	public function get_room_info_by_id($id,$column){
		return $this->ci->Faculty_model->get_room_detail_by_id($id,$column);
	}

	public function get_level_info_by_id($id,$column){
		return $this->ci->Faculty_model->get_level_detail_by_id($id,$column);
	}

	public function get_section_info_by_id($id,$column){
		return $this->ci->Faculty_model->get_section_detail_by_id($id,$column);
	}

	public function get_faculty_name_by_id($faculty_id)	{
		return $this->ci->Faculty_model->get_faculty_name_by_id($faculty_id);
	}

	public function get_student_complete_name($student_id){
		return $this->ci->Student_model->get_student_fullname($student_id);
	}

	public function get_school_year_by_id($sy_id){

		return $this->ci->Enrollment_model->get_school_year($sy_id);
	}

	public function get_active_schoolyear_by_id(){
		return $this->ci->Enrollment_model->get_active_schoolyear_by_id();
	}

	public function get_student_current_section($student_id){

		return $this->ci->Enrollment_model->get_student_current_section($student_id);
	}

	public function get_total_schoolyear_payable($level_id,$school_year){
		return $this->ci->Charge_model->get_total_schoolyear_payable($level_id,$school_year);
	}

	public function get_percentage($val,$total){

		$a = $val;
 		$b = $total;
 		$c = $a/$b;
 		$d = $c*100;
      return $d;

	}

	public function get_percentage_value($val,$total) {

		 $a = $val/100;
		 $b = $a*$total;
		 return $b;
 }

 public function get_all_payment($student_id,$school_year){
 	return $this->ci->Charge_model->get_total_paid($student_id,$school_year);
 }
 
}

/* End of file Enrollment_library.php */
/* Location: ./application/libraries/Enrollment_library.php */
