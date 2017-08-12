<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends Attendance_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
  }
 
  public function index()
  {
      
  }
 
  public function login()
  {
        $this->data['page_title'] = 'Attendance Management System - Login';
        if($this->input->post())
        {
          $this->load->library('form_validation');
          $this->form_validation->set_rules('identity', 'Identity', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
        
          $remember = false;
          if($this->form_validation->run()===TRUE)
          {           
           
              
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                redirect('siteadmin/', 'refresh');
                //echo "logged in ..."; exit;
            }
            else
            {
              $this->session->set_flashdata('message',$this->ion_auth->errors());
              //echo "----".$this->ion_auth->errors(); exit;
              redirect('siteadmin/user/login', 'refresh');
            }
          }
        }
        $this->load->helper('form');
        $this->render('siteadmin/login_view','login_master');

  }
  public function logout()
  {
      $this->ion_auth->logout();
      redirect('siteadmin/user/login', 'refresh');
      
  }
}