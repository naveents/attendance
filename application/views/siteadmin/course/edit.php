<div class="container">
<section class="content-header">
      <h1>
        Course
        <small>Edit Course</small>
      </h1>     
</section>
<section class="content">
<div class="row">        
            <div class="col-md-6 col-md-offset-3">
                    
            <div class="box box-grey">
                <div class="box-body">
                <?php
                       $attributes = array('class' => 'form', 'id' => 'courseform');
                        echo form_open('siteadmin/course/edit/'.$course['course_id'],$attributes); ?>
                        <div class="form-group">
                                <label><span class="text-danger">*</span>Course Name : </label>
                                <input class="form-control" type="text" id="course_name" name="course_name" value="<?php echo ($this->input->post('course_name') ? $this->input->post('course_name') : $course['course_name']); ?>" />
                                <span class="text-danger"><?php echo form_error('course_name');?></span>
                        </div>
                        <div class="form-group">
                                <label>Course Description : </label>
                                <textarea class="form-control" id="course_description" name="course_description"><?php echo ($this->input->post('course_description') ? $this->input->post('course_description') : $course['course_description']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn bg-maroon btn-flat" type="submit">Update</button>
                                </div>
                            </div>   
                        </div>                        

                <?php echo form_close(); ?>
                </div>
            </div>
            </div>
</div> 
</section>
</div>