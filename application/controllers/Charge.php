<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Charge extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Charge_model');
        $this->load->model('Level_model');
        $this->load->library(['enrollment_library','ion_auth']);
    } 

    /*
     * Listing of charges
     */
    function index()
    {
        $data['charges'] = $this->Charge_model->get_all_charges();
        $data['page_title'] = 'Charges';
        $data['_view'] = 'charge/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new charge
     */
    function add()
    {   
        $this->load->library('form_validation');
        $data['page_title'] = 'Add New Charge';
        $data['levels'] = $this->Level_model->get_all_levels();
		$this->form_validation->set_rules('charge_name','Charge Name','required|max_length[100]');
		$this->form_validation->set_rules('charge_level','Charge Level','integer|required');
		$this->form_validation->set_rules('charge_amount', 'Charge Amout', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
		$this->form_validation->set_rules('charge_sy','Charge Sy','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'charge_name' => $this->input->post('charge_name'),
				'charge_level' => $this->input->post('charge_level'),
				'charge_amount' => $this->input->post('charge_amount'),
				'charge_sy' => $this->enrollment_library->get_active_schoolyear_by_id(),
            );
            
            $charge_id = $this->Charge_model->add_charge($params);
            redirect('charge/index');
        }
        else
        {            
            $data['_view'] = 'charge/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a charge
     */
    function edit($charge_id)
    {   
        // check if the charge exists before trying to edit it
        $data['charge'] = $this->Charge_model->get_charge($charge_id);
         $data['levels'] = $this->Level_model->get_all_levels();
        $data['page_title'] = 'Edit Charge Info';
        if(isset($data['charge']['charge_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('charge_name','Charge Name','required|max_length[100]');
			$this->form_validation->set_rules('charge_level','Charge Level','integer');
			$this->form_validation->set_rules('charge_amount', 'Charge Amout', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('charge_sy','Charge Sy','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'charge_name' => $this->input->post('charge_name'),
					'charge_level' => $this->input->post('charge_level'),
					'charge_amount' => $this->input->post('charge_amount'),
					'charge_sy' => $this->enrollment_library->get_active_schoolyear_by_id(),
                );

                $this->Charge_model->update_charge($charge_id,$params);            
                redirect('charge/index');
            }
            else
            {
                $data['_view'] = 'charge/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The charge you are trying to edit does not exist.');
    }
}