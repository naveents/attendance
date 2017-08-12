<?php 
class Semester extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Semester_model');
    } 

    /*
     * Listing of semester
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('siteadmin/semester/index?');
        $config['total_rows'] = $this->Semester_model->get_all_semester_count();
        $this->pagination->initialize($config);

        $this->data['semester'] = $this->Semester_model->get_all_semester($params);
        
        $this->data['_view'] = 'semester/index';
        $this->render('siteadmin/semester/index');
    }

    /*
     * Adding a new semester
     */
    function add()
    {   
        $this->load->library('form_validation');

	$this->form_validation->set_rules('semester_name','Semester Name','required|max_length[125]');
		
	if($this->form_validation->run())     
        {   
            $params = array(
				'semester_name' => $this->input->post('semester_name')
				
            );
            
            $semester_id = $this->Semester_model->add_semester($params);
            redirect('siteadmin/semester/index');
        }
        else
        {            
            $this->data['_view'] = 'semester/add';
            $this->render('siteadmin/semester/add');
        }
    }  

    /*
     * Editing a semester
     */
    function edit($semester_id)
    {   
        // check if the semester exists before trying to edit it
        $this->data['semester'] = $this->Semester_model->get_semester($semester_id);
        
        if(isset($this->data['semester']['semester_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('semester_name','Semester Name','required|max_length[125]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
			'semester_name' => $this->input->post('semester_name')					
                );

                $this->Semester_model->update_semester($semester_id,$params);            
                redirect('siteadmin/semester/index');
            }
            else
            {
                $this->data['_view'] = 'semester/edit';
                $this->render('siteadmin/semester/edit');
            }
        }
        else
            show_error('The semester you are trying to edit does not exist.');
    } 

    /*
     * Deleting semester
     */
    function remove($semester_id)
    {
        $semester = $this->Semester_model->get_semester($semester_id);

        // check if the semester exists before trying to delete it
        if(isset($semester['semester_id']))
        {
            $this->Semester_model->delete_semester($semester_id);
            redirect('siteadmin/semester/index');
        }
        else
            show_error('The semester you are trying to delete does not exist.');
    }
    
}