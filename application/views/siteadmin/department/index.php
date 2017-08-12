<div class="container">
<section class="content-header">
      <h1>
        Department
        <small>List departments</small>
      </h1>     
</section>
<section class="content">
<div class="row">        
            <div class="col-md-6 col-md-offset-3">
                    
            <div class="box box-grey">
               
                <div class="box-body">                    
                 
                    <div class="row">
                     <div class="col-md-4 col-md-push-8 text-right">
                            <a href="<?php echo site_url("siteadmin/department/add");?>" class="btn bg-maroon btn-flat" style="margin-bottom:5px;">Add New Department</a>                        
                     </div>
                    </div>
                    
                    
                    <ul class="todo-list">                       
                        <?php foreach($department as $c){ ?>
                        <li>
                            <span class="text"><?php echo $c['department_name']; ?></span>
                              
                            <div class="tools">
                                <a href="<?php echo site_url('siteadmin/department/edit/'.$c['department_id']); ?>"><i class="fa fa-edit"></i></a> | 
                                <a href="<?php echo site_url('siteadmin/department/remove/'.$c['department_id']); ?>"><i class="fa fa-trash-o"></i></a>
                            </div>
                            <p class="muted"><?php echo $c['department_code']; ?></p>     
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="col-md-12">
                        <?php echo $this->pagination->create_links(); ?>    
                    </div>
                </div>
            </div>
            </div>
</div> 
</section>
</div>