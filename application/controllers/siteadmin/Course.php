<?php 
class Course extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Course_model');
    } 

    /*
     * Listing of course
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('siteadmin/course/index?');
        $config['total_rows'] = $this->Course_model->get_all_course_count();
        $this->pagination->initialize($config);

        $this->data['course'] = $this->Course_model->get_all_course($params);
        
        $this->data['_view'] = 'course/index';
        $this->render('siteadmin/course/index');
    }

    /*
     * Adding a new course
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('course_name','Course Name','required|max_length[150]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'course_name' => $this->input->post('course_name'),
				'course_description' => $this->input->post('course_description'),
            );
            
            $course_id = $this->Course_model->add_course($params);
            redirect('siteadmin/course/index');
        }
        else
        {            
            $this->data['_view'] = 'course/add';
            $this->render('siteadmin/course/add');
        }
    }  

    /*
     * Editing a course
     */
    function edit($course_id)
    {   
        // check if the course exists before trying to edit it
        $this->data['course'] = $this->Course_model->get_course($course_id);
        
        if(isset($this->data['course']['course_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('course_name','Course Name','required|max_length[150]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'course_name' => $this->input->post('course_name'),
					'course_description' => $this->input->post('course_description'),
                );

                $this->Course_model->update_course($course_id,$params);            
                redirect('siteadmin/course/index');
            }
            else
            {
                $this->data['_view'] = 'course/edit';
                $this->render('siteadmin/course/edit');
            }
        }
        else
            show_error('The course you are trying to edit does not exist.');
    } 

    /*
     * Deleting course
     */
    function remove($course_id)
    {
        $course = $this->Course_model->get_course($course_id);

        // check if the course exists before trying to delete it
        if(isset($course['course_id']))
        {
            $this->Course_model->delete_course($course_id);
            redirect('siteadmin/course/index');
        }
        else
            show_error('The course you are trying to delete does not exist.');
    }
    
}