<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_Controller extends CI_Controller
{

  protected $data = array();
    
  function __construct()
  {
    parent::__construct();
    $this->data['page_title'] = "Attendance Management System";
    $this->data['before_head'] = '';
    $this->data['before_body'] ='';
    $this->data['controller'] = $this->router->fetch_class();
    $this->data['current']    = $this->router->fetch_method();
  }
  
  protected function render($the_view = NULL, $template = 'master') {
      
    if($template == 'json' || $this->input->is_ajax_request())
    {
      header('Content-Type: application/json');
      echo json_encode($this->data);
    }
    else
    {
      $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);
      $this->load->view('templates/'.$template.'_view', $this->data);
    }
      
  }
}

class Admin_Controller extends Attendance_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_in())
    {
      //redirect them to the login page
      redirect('siteadmin/user/login', 'refresh');
    }
    $this->data['page_title']      = "Attendance Management System - Administration";
    $this->data['controller']      = $this->router->fetch_class();
    $this->data['current']         = $this->router->fetch_method();
    $this->data['segment_name']    = $this->uri->segment(4, 0);  
   
  } 
  
  protected function render($the_view = NULL, $template = 'admin_master')
  {
    parent::render($the_view, $template);
  }
 
  
}