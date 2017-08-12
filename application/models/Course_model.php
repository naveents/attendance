<?php
class Course_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get course by course_id
     */
    function get_course($course_id)
    {
        return $this->db->get_where('course',array('course_id'=>$course_id))->row_array();
    }
    
    /*
     * Get all course count
     */
    function get_all_course_count()
    {
        $this->db->from('course');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all course
     */
    function get_all_course($params = array())
    {
        $this->db->order_by('course_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('course')->result_array();
    }
        
    /*
     * function to add new course
     */
    function add_course($params)
    {
        $this->db->insert('course',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update course
     */
    function update_course($course_id,$params)
    {
        $this->db->where('course_id',$course_id);
        return $this->db->update('course',$params);
    }
    
    /*
     * function to delete course
     */
    function delete_course($course_id)
    {
        return $this->db->delete('course',array('course_id'=>$course_id));
    }
}
