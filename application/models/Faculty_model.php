<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Faculty_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get faculty by id
     */
    function get_faculty($id)
    {
        return $this->db->get_where('faculty',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all faculty
     */
    function get_all_faculty()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get('faculty')->result_array();
    }
        
    /*
     * function to add new faculty
     */
    function add_faculty($params)
    {
        $this->db->insert('faculty',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update faculty
     */
    function update_faculty($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('faculty',$params);
    }
    
    /*
     * function to delete faculty
     */
    function delete_faculty($id)
    {
        return $this->db->delete('faculty',array('id'=>$id));
    }

    function get_faculty_subjects($id){
        return $this->db->where('teacher',$id)->get('schedules')->result_array();
    }

    function get_subject_detail_by_id($subject_id,$detail){

        return $this->db->where('id',$subject_id)->get('subjects')->row()->$detail;
    }

    function get_room_detail_by_id($room_id,$detail){

        return $this->db->where('id',$room_id)->get('rooms')->row()->$detail;
    }

    function get_level_detail_by_id($level_id,$detail){
        if($this->db->where('levels_id',$level_id)->get('levels')->row()!==NULL){
        return $this->db->where('levels_id',$level_id)->get('levels')->row()->$detail;
        }else{
            return ;
        }
    }

    function get_section_detail_by_id($section_id,$detail){

        return $this->db->where('id',$section_id)->get('sections')->row()->$detail;   
    }

    function add_faculty_subject($data){
        return $this->db->insert('schedules',$data);
    }

    function get_faculty_name_by_id($faculty_id){

        if(isset($this->db->where('id',$faculty_id)->get('faculty')->row()->first_name)){
            return $this->db->where('id',$faculty_id)->get('faculty')->row();
        }else{
            return '';
        }
    }

    function get_student_by_section_id($section_id){
        return $this->db->where('section',$section_id)->get('enrollment')->result();
    }

    function get_advisory_section_by_teacher($teacher_id){

        return $this->db->where('adviser',$teacher_id)->get('sections')->row()->id;
    }

    function submit_grades($data){

        return $this->db->insert('grades',$data);
    }

    function update_grades($student_id,$subject_id,$new_data){

        $sql= $this->db->where('student_id',$student_id)->where('subject_id',$subject_id)->update('grades',$new_data);

    }

    function has_grade_record($student_id,$subject_id){

        return $this->db->where('student_id',$student_id)->where('subject_id',$subject_id)->from('grades')->count_all_results();
    }

    function get_grades($subject_id){
        return $this->db->where('subject_id',$subject_id)->get('grades')->result();
    }   

    function get_faculty_id_by_email($faculty_email){
        return $this->db->where('email',$faculty_email)->get('faculty')->row()->id;
    }
}