<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends Admin_Controller
{

  function __construct()
  {
    parent::__construct();    
    $this->load->library('form_validation');   
  }

  public function index()
  {
    $this->render('siteadmin/dashboard_view');
  }  
}
