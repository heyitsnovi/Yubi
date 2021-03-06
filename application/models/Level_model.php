<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Level_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get level by levels_id
     */
    function get_level($levels_id)
    {
        return $this->db->get_where('levels',array('levels_id'=>$levels_id))->row_array();
    }
        
    /*
     * Get all levels
     */
    function get_all_levels()
    {
        $this->db->order_by('levels_id', 'ASC');
        return $this->db->get('levels')->result_array();
    }
        
    /*
     * function to add new level
     */
    function add_level($params)
    {
        $this->db->insert('levels',$params);
        return $this->db->insert_levels_id();
    }
    
    /*
     * function to update level
     */
    function update_level($levels_id,$params)
    {
        $this->db->where('levels_id',$levels_id);
        return $this->db->update('levels',$params);
    }
    
    /*
     * function to delete level
     */
    function delete_level($levels_id)
    {
        return $this->db->delete('levels',array('levels_id'=>$levels_id));
    }
}