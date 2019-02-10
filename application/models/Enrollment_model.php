<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enrollment_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}	

	public function insert_enrollment($data){

		return $this->db->insert('enrollment',$data);
	}

	public function get_enrollment_records($student_id){

		return $this->db->join('levels as le', 'le.levels_id = enrollment.student_id')
					->join('sections as se', 'se.id = enrollment.section')
					->where('enrollment.student_id',(int)$student_id)
				  	->get('enrollment')
				  	->result_array();
	
	}

	public function is_student_enrolled($school_year,$student_id){

		return  $this->db
				->where('student_id',$student_id)
				->where('school_year',$school_year)->get('enrollment')->result();
	}

	public function drop_student($student_id,$school_year){

			return $this->db->where('student_id',$student_id)
						->where('school_year',$school_year)
						->update('enrollment',['status'=>2]);
	}

	public function fetch_all_subjects(){
		return $this->db->get('subjects')->result();
	}

	public function get_vacant_subjects(){

		return $this->db->query('SELECT * FROM subjects subj WHERE NOT EXISTS ( SELECT * FROM schedules sched WHERE sched.subject = subj.id )')
			->result();
	}

	public function get_room_list(){

		return $this->db->get('rooms')->result();
	}

	public function get_active_schoolyear(){
		$status = 1;
		return $this->db->where('schoolyear_status',$status)->get('school_year')->row()->schoolyear_value;
	}

	public function get_school_year($sy){
		return $this->db->where('schoolyear_id',$sy)->get('school_year')->row()->schoolyear_value;	
	}


	public function get_active_schoolyear_by_id(){
		$status = 1;
		return $this->db->where('schoolyear_status',$status)->get('school_year')->row()->schoolyear_id;
	}

	public function get_student_grade_in($student,$sy){
		if( $this->db->where('student_id',$student)->where('school_year',$sy)->get('enrollment')->row()!==NULL){
		return $this->db->where('student_id',$student)->where('school_year',$sy)->get('enrollment')->row()->levels_id;
		}else{
			return ;
		}
	}

	public function get_student_current_section($student_id){

		return $this->db->where('student_id',$student_id)->get('enrollment')->result();
	}

}

/* End of file Enrollment_model.php */
/* Location: ./application/models/Enrollment_model.php */