<?php
class Semester_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get semester by semester_id
     */
    function get_semester($semester_id)
    {
        return $this->db->get_where('semester',array('semester_id'=>$semester_id))->row_array();
    }
    
    /*
     * Get all semester count
     */
    function get_all_semester_count()
    {
        $this->db->from('semester');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all semester
     */
    function get_all_semester($params = array())
    {
        $this->db->order_by('semester_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('semester')->result_array();
    }
        
    /*
     * function to add new semester
     */
    function add_semester($params)
    {
        $this->db->insert('semester',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update semester
     */
    function update_semester($semester_id,$params)
    {
        $this->db->where('semester_id',$semester_id);
        return $this->db->update('semester',$params);
    }
    
    /*
     * function to delete semester
     */
    function delete_semester($semester_id)
    {
        return $this->db->delete('semester',array('semester_id'=>$semester_id));
    }
}
