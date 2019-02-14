<?php

class Room extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Room_model');
    } 

    /*
     * Listing of rooms
     */
    function index()
    {
        $data['rooms'] = $this->Room_model->get_all_rooms();
        $data['page_title'] = ' Rooms ';
        $data['_view'] = 'room/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new room
     */
    function add()
    {   
        $this->load->library('form_validation');
                $data['page_title'] = ' Add Room ';
        $this->form_validation->set_rules('name','Name','required|max_length[100]');
 
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'name' => $this->input->post('name'),
                'incharge' => $this->input->post('incharge'),
            );
            
            $room_id = $this->Room_model->add_room($params);
            redirect('room/index');
        }
        else
        {            
            $data['_view'] = 'room/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a room
     */
    function edit($id)
    {   
        // check if the room exists before trying to edit it
        $data['room'] = $this->Room_model->get_room($id);
                $data['page_title'] = ' Edit Room ';
        if(isset($data['room']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Name','required|max_length[100]');
 
        
            if($this->form_validation->run())     
            {   
                $params = array(
                    'name' => $this->input->post('name'),
                    'incharge' => $this->input->post('incharge'),
                );

                $this->Room_model->update_room($id,$params);            
                redirect('room/index');
            }
            else
            {
                $data['_view'] = 'room/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The room you are trying to edit does not exist.');
    }
}