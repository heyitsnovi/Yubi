<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Section extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Section_model');
        $this->load->model('Level_model');
        $this->load->model('Faculty_model');
        $this->load->library('enrollment_library');
          $this->load->model('Room_model');
    } 

    /*
     * Listing of sections
     */
    function index()
    {
        $data['sections'] = $this->Section_model->get_all_sections();
        $data['page_title'] = 'Section List';
        $data['_view'] = 'section/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new section
     */
    function add()
    {   
        $this->load->library('form_validation');
        $data['page_title'] = 'Add Section';
        $data['rooms'] = $this->Room_model->get_all_rooms();
        $data['levels'] = $this->Level_model->get_all_levels();
        $data['vacant_teachers'] = $this->Section_model->get_vacant_teachers();
		$this->form_validation->set_rules('name','Name','required|max_length[100]');
		$this->form_validation->set_rules('level','Level','required|integer');
		
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'level' => $this->input->post('level'),
				'adviser' => $this->input->post('adviser'),
				'name' => $this->input->post('name'),
            );
         

            $params_rooms = array(
                    
                    'incharge' => $this->input->post('adviser'),
                );

                $this->Room_model->update_room($this->input->post('room_assinged'),$params_rooms);           

                redirect('room/index');

            $section_id = $this->Section_model->add_section($params);
            redirect('section/index');
        }
        else
        {            
            $data['_view'] = 'section/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a section
     */
    function edit($id)
    {   
        // check if the section exists before trying to edit it
        $data['section'] = $this->Section_model->get_section($id);
        $data['levels'] = $this->Level_model->get_all_levels();
        $data['vacant_teachers'] = $this->Faculty_model->get_all_faculty();
        $data['rooms'] = $this->Room_model->get_all_rooms();
        $data['page_title'] = 'Edit   Section';
        
        if(isset($data['section']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required|max_length[100]');
			$this->form_validation->set_rules('level','Level','required|integer');
			$this->form_validation->set_rules('adviser','Adviser','required|integer');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'level' => $this->input->post('level'),
					'adviser' => $this->input->post('adviser'),
					'name' => $this->input->post('name'),
                );


            $params_rooms = array(
                    
                    'incharge' => $this->input->post('adviser'),
                );

                $this->Room_model->update_room($this->input->post('room_assinged'),$params_rooms);   

                
                $this->Section_model->update_section($id,$params);            
                redirect('section/index');
            }
            else
            {
                $data['_view'] = 'section/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The section you are trying to edit does not exist.');
    }
}