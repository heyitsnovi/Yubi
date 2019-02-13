<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Charge_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get charge by charge_id
     */
    function get_charge($charge_id)
    {
        return $this->db->get_where('charges',array('charge_id'=>$charge_id))->row_array();
    }
        
    function get_all_charges_by_id($level,$sy){
        return $this->db->where('charge_level',$level)->where('charge_sy',$sy)->get('charges')->result();
    }

    /*
     * Get all charges
     */
    function get_all_charges()
    {
        $this->db->order_by('charge_id', 'Asc');
        return $this->db->get('charges')->result_array();
    }
        
    /*
     * function to add new charge
     */
    function add_charge($params)
    {
        $this->db->insert('charges',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update charge
     */
    function update_charge($charge_id,$params)
    {
        $this->db->where('charge_id',$charge_id);
        return $this->db->update('charges',$params);
    }
    
    /*
     * function to delete charge
     */
    function delete_charge($charge_id)
    {
        return $this->db->delete('charges',array('charge_id'=>$charge_id));
    }

    function add_payment($data){

        $sql =  $this->db->insert('payment_log',$data);
        return $this->db->insert_id();
    }

    function get_total_paid($student_id,$schoolyear_id){
 
        return $this->db->select(' SUM(amount_paid) as ttl')
                    ->from('payment_log')
                    ->where('schoolyear_id',$schoolyear_id)
                    ->where('paid_by',$student_id)
                    ->get()->row()->ttl;

    }

    function get_total_schoolyear_payable($level,$sy){

            return $this->db->select(' SUM(charge_amount) as charge_amt')
                    ->from('charges')
                    ->where('charge_level',$level)
                    ->where('charge_sy',$sy)
                    ->get()->row()->charge_amt;

    }

    function get_payment_log($student_id){

        return $this->db->where('paid_by',$student_id)->get('payment_log')->result();
    }
}