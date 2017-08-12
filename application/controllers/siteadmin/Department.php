<?php 
class Department extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Department_model');
    } 

    /*
     * Listing of department
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('siteadmin/department/index?');
        $config['total_rows'] = $this->Department_model->get_all_department_count();
        $this->pagination->initialize($config);

        $this->data['department'] = $this->Department_model->get_all_department($params);
        
        $this->data['_view'] = 'department/index';
        $this->render('siteadmin/department/index');
    }

    /*
     * Adding a new department
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('department_name','Department Name','required|max_length[125]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'department_name' => $this->input->post('department_name'),
				'department_code' => $this->input->post('department_code'),
            );
            
            $department_id = $this->Department_model->add_department($params);
            redirect('siteadmin/department/index');
        }
        else
        {            
            $this->data['_view'] = 'department/add';
            $this->render('siteadmin/department/add');
        }
    }  

    /*
     * Editing a department
     */
    function edit($department_id)
    {   
        // check if the department exists before trying to edit it
        $this->data['department'] = $this->Department_model->get_department($department_id);
        
        if(isset($this->data['department']['department_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('department_name','Department Name','required|max_length[125]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'department_name' => $this->input->post('department_name'),
					'department_code' => $this->input->post('department_code'),
                );

                $this->Department_model->update_department($department_id,$params);            
                redirect('siteadmin/department/index');
            }
            else
            {
                $this->data['_view'] = 'department/edit';
                $this->render('siteadmin/department/edit');
            }
        }
        else
            show_error('The department you are trying to edit does not exist.');
    } 

    /*
     * Deleting department
     */
    function remove($department_id)
    {
        $department = $this->Department_model->get_department($department_id);

        // check if the department exists before trying to delete it
        if(isset($department['department_id']))
        {
            $this->Department_model->delete_department($department_id);
            redirect('siteadmin/department/index');
        }
        else
            show_error('The department you are trying to delete does not exist.');
    }
    
}