<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Faculty extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Faculty_model');
        $this->load->library('enrollment_library');
    } 

    /*
     * Listing of faculty
     */
    function index()
    {
        $data['faculty'] = $this->Faculty_model->get_all_faculty();
        $data['page_title'] = 'Faculty / Staffs List';
        $data['_view'] = 'faculty/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new faculty
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('first_name','First Name','required|max_length[100]');
		$this->form_validation->set_rules('middle_name','Middle Name','max_length[100]');
		$this->form_validation->set_rules('last_name','Last Name','required|max_length[100]');
		$this->form_validation->set_rules('birthdate','Birthdate','required');
		$this->form_validation->set_rules('address','Address','required|max_length[100]');
		$this->form_validation->set_rules('civil_status','Civil Status','required|max_length[100]');
		$this->form_validation->set_rules('citizenship','Citizenship','required|max_length[100]');
		$this->form_validation->set_rules('gender','Gender','required|max_length[100]');
		$this->form_validation->set_rules('email','Email','required|max_length[100]|valid_email');
		$this->form_validation->set_rules('contact','Contact','required|max_length[100]');
		$this->form_validation->set_rules('role','Role','required|max_length[100]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'civil_status' => $this->input->post('civil_status'),
				'role' => $this->input->post('role'),
				'first_name' => $this->input->post('first_name'),
				'middle_name' => $this->input->post('middle_name'),
				'last_name' => $this->input->post('last_name'),
				'birthdate' => $this->input->post('birthdate'),
				'address' => $this->input->post('address'),
				'citizenship' => $this->input->post('citizenship'),
				'gender' => $this->input->post('gender'),
				'email' => $this->input->post('email'),
				'contact' => $this->input->post('contact'),
				'profile' => $this->input->post('profile'),
            );
            
            $faculty_id = $this->Faculty_model->add_faculty($params);
            redirect('faculty/index');
        }
        else
        {            
            $data['_view'] = 'faculty/add';
            $data['page_title'] = 'Faculty / Staffs List - Add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a faculty
     */
    function edit($id)
    {   
        // check if the faculty exists before trying to edit it
        $data['faculty'] = $this->Faculty_model->get_faculty($id);
        $data['page_title'] = 'Faculty / Staffs List - Edit';
        if(isset($data['faculty']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('first_name','First Name','required|max_length[100]');
			$this->form_validation->set_rules('middle_name','Middle Name','max_length[100]');
			$this->form_validation->set_rules('last_name','Last Name','required|max_length[100]');
			$this->form_validation->set_rules('birthdate','Birthdate','required');
			$this->form_validation->set_rules('address','Address','required|max_length[100]');
			$this->form_validation->set_rules('civil_status','Civil Status','required|max_length[100]');
			$this->form_validation->set_rules('citizenship','Citizenship','required|max_length[100]');
			$this->form_validation->set_rules('gender','Gender','required|max_length[100]');
			$this->form_validation->set_rules('email','Email','required|max_length[100]|valid_email');
			$this->form_validation->set_rules('contact','Contact','required|max_length[100]');
			$this->form_validation->set_rules('role','Role','required|max_length[100]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'civil_status' => $this->input->post('civil_status'),
					'role' => $this->input->post('role'),
					'first_name' => $this->input->post('first_name'),
					'middle_name' => $this->input->post('middle_name'),
					'last_name' => $this->input->post('last_name'),
					'birthdate' => $this->input->post('birthdate'),
					'address' => $this->input->post('address'),
					'citizenship' => $this->input->post('citizenship'),
					'gender' => $this->input->post('gender'),
					'email' => $this->input->post('email'),
					'contact' => $this->input->post('contact'),
					'profile' => $this->input->post('profile'),
                );

                $this->Faculty_model->update_faculty($id,$params);            
                redirect('faculty/index');
            }
            else
            {
                $data['_view'] = 'faculty/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The faculty you are trying to edit does not exist.');
    }


    function subjects($id){
        
        $data['_view'] = 'faculty/subjects';
        $data['page_title'] = 'Faculty Subjects';
        $data['faculty_id'] = $id;
        $data['loads'] = $this->Faculty_model->get_faculty_subjects($id);
        $this->load->view('layouts/main',$data);
    }
}