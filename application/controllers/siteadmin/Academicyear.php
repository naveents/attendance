<?php 
class Academicyear extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Academicyear_model');
    } 

    /*
     * Listing of academicyear
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('siteadmin/academicyear/index?');
        $config['total_rows'] = $this->Academicyear_model->get_all_academicyear_count();
        $this->pagination->initialize($config);

        $this->data['academicyear'] = $this->Academicyear_model->get_all_academicyear($params);
        
        $this->data['_view'] = 'academicyear/index';
        $this->render('siteadmin/academicyear/index');
    }

    /*
     * Adding a new academicyear
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('start_year','Start Date','required|callback_check_date');
                $this->form_validation->set_rules('end_year','End Date','required|callback_check_date');
		
                if($this->form_validation->run())     
                {   
                    $params = array(
                                        'start_year' => $this->input->post('start_year'),
                                        'end_year' => $this->input->post('end_year'),
                    );
                  

                    $academic_year_id = $this->Academicyear_model->add_academicyear($params);
                    redirect('siteadmin/academicyear/index');
                }
                else
                {            
                    $this->data['_view'] = 'academicyear/add';
                    $this->render('siteadmin/academicyear/add');
                }
    }
    
    function check_date($date) {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
            return true;
        } else {
              $this->form_validation->set_message('check_date', 'Wrong {field} value!');
               return false;
        }
    } 

    /*
     * Editing an academicyear
     */
    function edit($academic_year_id)
    {   
        // check if the academic year exists before trying to edit it
        $this->data['academicyear'] = $this->Academicyear_model->get_academicyear($academic_year_id);
        
        if(isset($this->data['academicyear']['academic_year_id']))
        {
            $this->load->library('form_validation');

		$this->form_validation->set_rules('start_year','Start Date','required|callback_check_date');
                $this->form_validation->set_rules('end_year','End Date','required|callback_check_date');
		
		if($this->form_validation->run())     
                {   
                    $params = array(
                                    'start_year' => $this->input->post('start_year'),
                                    'end_year' => $this->input->post('end_year'),
                    );

                    $this->Academicyear_model->update_academicyear($academic_year_id,$params);            
                    redirect('siteadmin/academicyear/index');
                }
                else
                {
                    $this->data['_view'] = 'academicyear/edit';
                    $this->render('siteadmin/academicyear/edit');
                }
        }
        else
            show_error('The academicyear you are trying to edit does not exist.');
    } 

    /*
     * Deleting academicyear
     */
    function remove($academic_year_id)
    {
        $academicyear = $this->Academicyear_model->get_academicyear($academic_year_id);

        // check if the academicy year exists before trying to delete it
        if(isset($academicyear['academic_year_id']))
        {
            $this->Academicyear_model->delete_academicyear($academic_year_id);
            redirect('siteadmin/academicyear/index');
        }
        else
            show_error('The academicyear you are trying to delete does not exist.');
    }
    
}