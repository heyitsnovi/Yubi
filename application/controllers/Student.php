<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

define('RECORDS_PER_PAGE','5');    
 
class Student extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Student_model','Enrollment_model']);
        $this->load->helper(['url']);
        $this->load->library(['pagination','form_validation','ion_auth','enrollment_library']);
    } 

    /*
     * Listing of students
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;


        $data['students'] = $this->Student_model->get_all_students([]);
        
        $data['_view'] = 'student/index';
        $data['page_title'] = 'Student List';
        $this->load->view('layouts/main',$data);

    }

    /*
     * Adding a new student
     */
    function add()
    {   



		$this->form_validation->set_rules('gender','Gender','required|max_length[100]');
		$this->form_validation->set_rules('password','Password','required|max_length[100]');
		$this->form_validation->set_rules('first_name','First Name','required|max_length[100]');
		$this->form_validation->set_rules('middle_name','Middle Name','required|max_length[100]');
		$this->form_validation->set_rules('last_name','Last Name','required|max_length[100]');
		$this->form_validation->set_rules('birthdate','Birthdate','required');
		$this->form_validation->set_rules('birthplace','Birthplace','required|max_length[100]');
		$this->form_validation->set_rules('citizenship','Citizenship','required|max_length[100]');
		$this->form_validation->set_rules('religion','Religion','required|max_length[100]');
		$this->form_validation->set_rules('contact','Contact','required|max_length[100]');
		$this->form_validation->set_rules('email','Email','required|max_length[100]|valid_email');
		$this->form_validation->set_rules('address','Address','required|max_length[100]');
        $this->form_validation->set_rules('fathername','Father','required|max_length[100]');
        $this->form_validation->set_rules('fatherswork','Father Occupation','required|max_length[100]');
        $this->form_validation->set_rules('mothersname','Mother','required|max_length[100]');
        $this->form_validation->set_rules('motherswork','Mother Occupation','required|max_length[100]');
        $this->form_validation->set_rules('guardianname','Guardian','required|max_length[100]');
        $this->form_validation->set_rules('guardiancontact','Guardian Contact','required|max_length[100]');
        $this->form_validation->set_rules('guardianaddress','Guardian Address','required|max_length[100]');
        
		if($this->form_validation->run())     
        {   
            $params = array(
				'gender' => $this->input->post('gender'),
				'password' => $this->input->post('password'),
				'first_name' => $this->input->post('first_name'),
				'middle_name' => $this->input->post('middle_name'),
				'last_name' => $this->input->post('last_name'),
				'birthdate' => $this->input->post('birthdate'),
				'birthplace' => $this->input->post('birthplace'),
				'citizenship' => $this->input->post('citizenship'),
				'religion' => $this->input->post('religion'),
				'contact' => $this->input->post('contact'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address')
            );
            

            $student_id = $this->Student_model->add_student($params);

            $guardian_info  = [
                'student_id'=>$student_id,
                'father'=>$this->input->post('fathername'),
                'father_occupation'=>$this->input->post('fatherswork'),
                'mother'=>$this->input->post('mothersname'),
                'mother_occupation'=>$this->input->post('motherswork'),
                'guardian'=>$this->input->post('guardianname'),
                'guardian_contact'=>$this->input->post('guardiancontact'),
                'g_address'=>$this->input->post('guardianaddress'),

            ];

            $guardian_id = $this->Student_model->insert_additional_info($guardian_info);
            redirect('student/index');
        }
        else
        {            
            $data['_view'] = 'student/add';
            $data['page_title'] = 'Add New Student';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a student
     */
    function edit($id)
    {   
        // check if the student exists before trying to edit it
        $data['student'] = $this->Student_model->get_student($id);
        $data['guardian'] = $this->Student_model->get_guardian($id);
        $data['page_title'] = 'Editing Student Info';
        
        if(isset($data['student']['id']))
        {

        $this->form_validation->set_rules('gender','Gender','required|max_length[100]');
        $this->form_validation->set_rules('first_name','First Name','required|max_length[100]');
        $this->form_validation->set_rules('middle_name','Middle Name','required|max_length[100]');
        $this->form_validation->set_rules('last_name','Last Name','required|max_length[100]');
        $this->form_validation->set_rules('birthdate','Birthdate','required');
        $this->form_validation->set_rules('birthplace','Birthplace','required|max_length[100]');
        $this->form_validation->set_rules('citizenship','Citizenship','required|max_length[100]');
        $this->form_validation->set_rules('religion','Religion','required|max_length[100]');
        $this->form_validation->set_rules('contact','Contact','required|max_length[100]');
        $this->form_validation->set_rules('email','Email','required|max_length[100]|valid_email');
        $this->form_validation->set_rules('address','Address','required|max_length[100]');
        $this->form_validation->set_rules('fathername','Father','required|max_length[100]');
        $this->form_validation->set_rules('fatherswork','Father Occupation','required|max_length[100]');
        $this->form_validation->set_rules('mothersname','Mother','required|max_length[100]');
        $this->form_validation->set_rules('motherswork','Mother Occupation','required|max_length[100]');
        $this->form_validation->set_rules('guardianname','Guardian','required|max_length[100]');
        $this->form_validation->set_rules('guardiancontact','Guardian Contact','required|max_length[100]');
        $this->form_validation->set_rules('guardianaddress','Guardian Address','required|max_length[100]');
        
			
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'gender' => $this->input->post('gender'),
					'password' => $this->input->post('password')!=='' ? password_hash($_POST['password'],PASSWORD_BCRYPT) : $_POST['hashpw'] ,
					'first_name' => $this->input->post('first_name'),
					'middle_name' => $this->input->post('middle_name'),
					'last_name' => $this->input->post('last_name'),
					'birthdate' => $this->input->post('birthdate'),
					'birthplace' => $this->input->post('birthplace'),
					'citizenship' => $this->input->post('citizenship'),
					'religion' => $this->input->post('religion'),
					'contact' => $this->input->post('contact'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'profile' => $this->input->post('profile'),
                );

                 $guardian_info  = [
                'student_id'=>$id,
                'father'=>$this->input->post('fathername'),
                'father_occupation'=>$this->input->post('fatherswork'),
                'mother'=>$this->input->post('mothersname'),
                'mother_occupation'=>$this->input->post('motherswork'),
                'guardian'=>$this->input->post('guardianname'),
                'guardian_contact'=>$this->input->post('guardiancontact'),
                'g_address'=>$this->input->post('guardianaddress'),

                ];

                $this->Student_model->update_student($id,$params);     
                $this->Student_model->update_guardian_info($guardian_info,$id);
                redirect('student/index');
            }
            else
            {
                $data['_view'] = 'student/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The student you are trying to edit does not exist.');
    } 

    function view($id)
    {
        

        $data['enrollment_status_current'] = $this->enrollment_library->is_student_enrolled(date('Y'),$id);
        $data['student'] =   $this->Student_model->get_student($id);
        $data['guardian'] =  $this->Student_model->get_guardian($id);
        $data['page_title'] = 'Viewing Student Info';
        $data['_view'] = 'student/view';
        $data['enrollment_logs'] = $this->Enrollment_model->get_enrollment_records($id);
        $data['year_levels'] = $this->Student_model->get_level(null);   

        if($data['student']!==null){

            $this->load->view('layouts/main',$data);

        }else{
            redirect(base_url('student'),'refresh');
        }   

    }

    function show_enroll_ajax_dialog(){

        $data['year_levels'] = $this->Student_model->get_level(null);  
        $data['student_id'] = $this->input->get('student_id');
        $this->load->view('student/enroll-ajax-dialog',$data);
    }
    
}