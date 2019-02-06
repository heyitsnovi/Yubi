<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Enrollment_model');
		$this->load->library(['form_validation']);
		$this->load->model('Faculty_model');
	}
	public function get_section()
	{
		$this->load->model('Student_model');
		echo json_encode($this->Student_model->get_section($this->input->get('yearlevel')));
	}

	public function submit_enrollment(){

		$this->form_validation->set_rules('year_level', 'Year Level', 'trim|required|integer');
		$this->form_validation->set_rules('section', 'Section', 'trim|required|integer');
		$this->form_validation->set_rules('student', 'Student', 'trim|required|integer');

		if($this->form_validation->run()==false){

			echo json_encode(['has_errors'=>'yes','errors'=>validation_errors()]);
		}
		else{
			$data = [
					'student_id'=>$this->input->post('student'),
					'levels_id'=>$this->input->post('year_level'),
					'section'=>$this->input->post('section'),
					'school_year'=>$this->Enrollment_model->get_active_schoolyear(),
					'status'=>1,
					'date'=>date('Y-m-d')
				];
			$status = $this->Enrollment_model->insert_enrollment($data);
			echo json_encode(['has_errors'=>'no','errors'=>'']);
		}
	}

	public function drop_student(){

		echo $this->Enrollment_model->drop_student($this->input->post('_student_id'),date('Y').'-'.date('Y',strtotime('+1 year')	));

	}

	public function show_add_teachersubject_modal(){

			$this->load->model('Student_model');
			$data['levels'] = $this->Student_model->get_level(null);
			$data['section'] = $this->Student_model->get_section(null);
			$data['subjects'] = $this->Enrollment_model->get_vacant_subjects();
			$data['rooms'] = $this->Enrollment_model->get_room_list();
			$data['faculty_id'] = $this->input->post('faculty_id');
			$data['time_intervals'] = create_time_range('7:00', '17:00', '1 hour');
			$this->load->view('faculty/add_subject_ajax',$data);
	}

	public function add_subject_to_techer(){
		
		$this->load->model('Faculty_model');
		$schedule_params = [
				'teacher'=>$this->input->post('faculty'),
				'subject'=>$this->input->post('subject'),
				'room'=>$this->input->post('roomselcted'),
				'level'=>$this->input->post('levelsected'),
				'section'=>$this->input->post('sectionsected'),
				'time'=>$this->input->post('timeselected'),
				'day'=>$this->input->post('days_selected'),
				'schoolyear'=>$this->Enrollment_model->get_active_schoolyear()
			];
		
		$status = $this->Faculty_model->add_faculty_subject($schedule_params);

		if($status =='1'){
			echo json_encode(['success'=>'ok']);
		}

	}

	public function submit_grades(){

		for($i=0; $i<count($_POST['student_id']);$i++){


				if($this->Faculty_model->has_grade_record($this->input->post('student_id')[$i],$this->input->post('_subject_id'))===0){

				$params = [
					'student_id'=>$this->input->post('student_id')[$i],
					'subject_id'=>$this->input->post('_subject_id'),
					'schoolyear_id'=>1,
					'first_grading'=>$this->input->post('first_g')[$i],
					'second_grading'=>$this->input->post('second_g')[$i],
					'third_grading'=>$this->input->post('third_g')[$i],
					'fourth_grading'=>$this->input->post('fourth_g')[$i],
				];

					$this->Faculty_model->submit_grades($params);

				}else{

			$params = [
					'student_id'=>$this->input->post('student_id')[$i],
					'subject_id'=>$this->input->post('_subject_id'),
					'schoolyear_id'=>1,
					'first_grading'=>$this->input->post('first_g')[$i],
					'second_grading'=>$this->input->post('second_g')[$i],
					'third_grading'=>$this->input->post('third_g')[$i],
					'fourth_grading'=>$this->input->post('fourth_g')[$i],
				];

					$this->Faculty_model->update_grades($this->input->post('student_id')[$i],$this->input->post('_subject_id'),$params);
				}

		}
		
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */