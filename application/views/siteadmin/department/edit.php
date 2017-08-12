<div class="container">
<section class="content-header">
      <h1>
        Department
        <small>Edit Department</small>
      </h1>     
</section>
<section class="content">
<div class="row">        
            <div class="col-md-6 col-md-offset-3">
                    
            <div class="box box-grey">
                <div class="box-body">
                <?php
                       $attributes = array('class' => 'form', 'id' => 'departmentform');
                        echo form_open('siteadmin/department/edit/'.$department['department_id'],$attributes); ?>
                        <div class="form-group">
                                <label><span class="text-danger">*</span>Department Name : </label>
                                <input class="form-control" type="text" id="department_name" name="department_name" value="<?php echo ($this->input->post('department_name') ? $this->input->post('department_name') : $department['department_name']); ?>" />
                                <span class="text-danger"><?php echo form_error('department_name');?></span>
                        </div>
                        <div class="form-group">
                                <label>Department Code : </label>
                                <input class="form-control" type="text" id="department_code" name="department_code" value="<?php echo ($this->input->post('department_code') ? $this->input->post('department_code') : $department['department_code']); ?>" />
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