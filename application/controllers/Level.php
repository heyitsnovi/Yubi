<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Level extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Level_model');
    } 

    /*
     * Listing of levels
     */
    function index()
    {
        $data['levels'] = $this->Level_model->get_all_levels();
        $data['page_title'] = 'Levels';
        $data['_view'] = 'level/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new level
     */
    function add()
    {   
        $this->load->library('form_validation');
        $data['page_title'] = 'Add New Level';
		$this->form_validation->set_rules('name','Name','required|max_length[100]');
		$this->form_validation->set_rules('description','Description','required|max_length[100]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
            );
            
            $level_id = $this->Level_model->add_level($params);
            redirect('level/index');
        }
        else
        {            
            $data['_view'] = 'level/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a level
     */
    function edit($id)
    {   
        // check if the level exists before trying to edit it
        $data['level'] = $this->Level_model->get_level($id);
        $data['page_title'] = 'Edit Level';
        if(isset($data['level']['levels_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required|max_length[100]');
			$this->form_validation->set_rules('description','Description','required|max_length[100]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
                );

                $this->Level_model->update_level($id,$params);            
                redirect('level/index');
            }
            else
            {
                $data['_view'] = 'level/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The level you are trying to edit does not exist.');
    }
}