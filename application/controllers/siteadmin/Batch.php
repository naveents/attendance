<?php 
class Batch extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Course_model');
        $this->load->model('Batch_model');
        $this->load->model('Academicyear_model');
    } 

    /*
     * Listing of batch
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('siteadmin/batch/index?');
        $config['total_rows'] = $this->Batch_model->get_all_batch_count();
        $this->pagination->initialize($config);

        $this->data['batch'] = $this->Batch_model->get_all_batch($params);
        
        $this->data['_view'] = 'batch/index';
        $this->render('siteadmin/batch/index');
    }

    /*
     * Adding a new batch
     */
    function add()
    {   
        
        $this->data['course']       = $this->Course_model->get_all_course();
        $this->data['academicyear'] = $this->Academicyear_model->get_all_academicyear();
        
        $this->load->library('form_validation');

	$this->form_validation->set_rules('course_id','Course','required');
        $this->form_validation->set_rules('academic_year_id','Academic Year','required');
        $this->form_validation->set_rules('batch_name','Batch Name','required|max_length[125]');
        
		
	if($this->form_validation->run())     
        {   
            $params = array(
				'course_id' => $this->input->post('course_id'),
				'academic_year_id' => $this->input->post('academic_year_id'),
                                'batch_name' => $this->input->post('batch_name')
            );
            
            $batch_id = $this->Batch_model->add_batch($params);
            redirect('siteadmin/batch/index');
        }
        else
        {            
            $this->data['_view'] = 'batch/add';
            $this->render('siteadmin/batch/add');
        }
    }  

    /*
     * Editing a batch
     */
    function edit($batch_id)
    {   
        // check if the batch exists before trying to edit it
        $this->data['batch'] = $this->Batch_model->get_batch($batch_id);
        
        if(isset($this->data['batch']['batch_id']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('course_id','Course','required');
            $this->form_validation->set_rules('academic_year_id','Academic Year','required');
            $this->form_validation->set_rules('batch_name','Batch Name','required|max_length[125]');
		
	    if($this->form_validation->run())     
            {   
                $params = array(
				'course_id' => $this->input->post('course_id'),
				'academic_year_id' => $this->input->post('academic_year_id'),
                                'batch_name' => $this->input->post('batch_name')
                );
                $this->Batch_model->update_batch($batch_id,$params);            
                redirect('siteadmin/batch/index');
            }
            else
            {
                $this->data['course']       = $this->Course_model->get_all_course();
                $this->data['academicyear'] = $this->Academicyear_model->get_all_academicyear();
                $this->data['_view'] = 'batch/edit';
                $this->render('siteadmin/batch/edit');
            }
        }
        else
            show_error('The batch you are trying to edit does not exist.');
    } 

    /*
     * Deleting batch
     */
    function remove($batch_id)
    {
        $batch = $this->Batch_model->get_batch($batch_id);

        // check if the batch exists before trying to delete it
        if(isset($batch['batch_id']))
        {
            $this->Batch_model->delete_batch($batch_id);
            redirect('siteadmin/batch/index');
        }
        else
            show_error('The batch you are trying to delete does not exist.');
    }
    
}