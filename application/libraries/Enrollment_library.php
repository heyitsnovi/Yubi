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
}

/* End of file Enrollment_library.php */
/* Location: ./application/libraries/Enrollment_library.php */