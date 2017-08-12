<div class="container">
<section class="content-header">
      <h1>
        Semester
        <small>New Semester</small>
      </h1>     
</section>
<section class="content">
<div class="row">        
            <div class="col-md-6 col-md-offset-3">
                    
            <div class="box box-grey">
                <div class="box-body">
                <?php
                       $attributes = array('class' => 'form', 'id' => 'semesterform');
                        echo form_open('siteadmin/semester/add',$attributes); ?>
                        <div class="form-group">
                                <label><span class="text-danger">*</span>Semester Name : </label>
                                <input class="form-control" type="text" id="semester_name" name="semester_name" value="<?php echo $this->input->post('semester_name'); ?>" />
                                <span class="text-danger"><?php echo form_error('semester_name');?></span>
                        </div>                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn bg-maroon btn-flat" type="submit">Save</button>
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