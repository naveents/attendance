<?php
class Academicyear_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get academicyear by academic_year_id
     */
    function get_academicyear($academic_year_id)
    {
        return $this->db->get_where('academicyear',array('academic_year_id'=>$academic_year_id))->row_array();
    }
    
    /*
     * Get all academicyear count
     */
    function get_all_academicyear_count()
    {
        $this->db->from('academicyear');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all academicyear
     */
    function get_all_academicyear($params = array())
    {
        $this->db->order_by('academic_year_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('academicyear')->result_array();
    }
        
    /*
     * function to add new academicyear
     */
    function add_academicyear($params)
    {
        $this->db->insert('academicyear',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update academicyear
     */
    function update_academicyear($academic_year_id,$params)
    {
        $this->db->where('academic_year_id',$academic_year_id);
        return $this->db->update('academicyear',$params);
    }
    
    /*
     * function to delete academicyear
     */
    function delete_academicyear($academic_year_id)
    {
        return $this->db->delete('academicyear',array('academic_year_id'=>$academic_year_id));
    }
}
