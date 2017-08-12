<div class="container">
<section class="content-header">
      <h1>
        Course
        <small>List courses</small>
      </h1>     
</section>
<section class="content">
<div class="row">        
            <div class="col-md-6 col-md-offset-3">
                    
            <div class="box box-grey">
               
                <div class="box-body">                    
                 
                    <div class="row">
                     <div class="col-md-4 col-md-push-8 text-right">
                            <a href="<?php echo site_url("siteadmin/course/add");?>" class="btn bg-maroon btn-flat" style="margin-bottom:5px;">Add New Course</a>                        
                     </div>
                    </div>
                    
                    
                    <ul class="todo-list">                       
                        <?php foreach($course as $c){ ?>
                        <li>
                            <span class="text"><?php echo $c['course_name']; ?></span>
                              
                            <div class="tools">
                                <a href="<?php echo site_url('siteadmin/course/edit/'.$c['course_id']); ?>"><i class="fa fa-edit"></i></a> | 
                                <a href="<?php echo site_url('siteadmin/course/remove/'.$c['course_id']); ?>"><i class="fa fa-trash-o"></i></a>
                            </div>
                            <p class="muted"><?php echo $c['course_description']; ?></p>     
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