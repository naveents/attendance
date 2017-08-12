<?php
class Department_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get department by department_id
     */
    function get_department($department_id)
    {
        return $this->db->get_where('department',array('department_id'=>$department_id))->row_array();
    }
    
    /*
     * Get all department count
     */
    function get_all_department_count()
    {
        $this->db->from('department');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all department
     */
    function get_all_department($params = array())
    {
        $this->db->order_by('department_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('department')->result_array();
    }
        
    /*
     * function to add new department
     */
    function add_department($params)
    {
        $this->db->insert('department',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update department
     */
    function update_department($department_id,$params)
    {
        $this->db->where('department_id',$department_id);
        return $this->db->update('department',$params);
    }
    
    /*
     * function to delete department
     */
    function delete_department($department_id)
    {
        return $this->db->delete('department',array('department_id'=>$department_id));
    }
}
