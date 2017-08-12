<?php
class Batch_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get batch by batch_id
     */
    function get_batch($batch_id)
    {
        return $this->db->get_where('batch',array('batch_id'=>$batch_id))->row_array();
    }
    
    /*
     * Get all batch count
     */
    function get_all_batch_count()
    {
        $this->db->from('batch');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all batch
     */
    function get_all_batch($params = array())
    {
        $this->db->order_by('batch_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('batch')->result_array();
    }
        
    /*
     * function to add new batch
     */
    function add_batch($params)
    {
        $this->db->insert('batch',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update batch
     */
    function update_batch($batch_id,$params)
    {
        $this->db->where('batch_id',$batch_id);
        return $this->db->update('batch',$params);
    }
    
    /*
     * function to delete batch
     */
    function delete_batch($batch_id)
    {
        return $this->db->delete('batch',array('batch_id'=>$batch_id));
    }
}
