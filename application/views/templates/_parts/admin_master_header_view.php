<?php defined('BASEPATH') OR exit('No direct script access allowed'); //echo $controller." - ".$current; ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $page_title;?></title>
<link href="<?php echo base_url().'webassets/admin/css/bootstrap.min.css';?>" rel="stylesheet">
<link href="<?php echo base_url().'webassets/admin/css/dashboard.css';?>" rel="stylesheet">
<link href="<?php echo base_url().'webassets/admin/css/adminlte.css';?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php echo $before_head;?>
</head>
<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
    <!-- header -->
 <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
            <a href="<?php echo site_url("siteadmin/dashboard");?>" class="navbar-brand"><b>Attendance <font color='#3bd200'>Management </font> </b>System</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown <?php echo ($controller == "department")?'active':'';?>">
                <a href="#" lass="dropdown-toggle" data-toggle="dropdown">Department <span class="caret"></span></a>
                 <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url("siteadmin/department");?>">Departments</a></li>                       
                 </ul>
            </li>   
            <li class="dropdown <?php echo ($controller == "staff")?'active':'';?>">
                <a href="#" lass="dropdown-toggle" data-toggle="dropdown">Staff <span class="caret"></span></a>
                 <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url("siteadmin/staff/viewall");?>">Manage Staffs</a></li>                       
                 </ul>
            </li>                      
            <li class="dropdown <?php echo ($controller == "student")?'active':'';?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url("siteadmin/student/viewall");?>">Manage Students</a></li>                       
              </ul>
            </li>
            <li class="dropdown <?php echo ($controller == "attendance")?'active':'';?>">
                <a href="#" lass="dropdown-toggle" data-toggle="dropdown">Attendance <span class="caret"></span></a>
                 <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url("siteadmin/aboutadmin");?>">Manage Attendance</a></li>                       
                 </ul>
            </li>
            
          </ul>         
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">             
                <span class="hidden-xs">Administrator</span>
              </a>
              <ul class="dropdown-menu">            
              
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                   <a href="<?php echo site_url('siteadmin/user/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
    <!-- /Header -->
   <div class="content-wrapper">