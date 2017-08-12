<div class="container">
<section class="content-header">
      <h1>
        Academic Year
        <small>Edit Year</small>
      </h1>     
</section>
<section class="content">
<div class="row">        
            <div class="col-md-6 col-md-offset-3">
                    
            <div class="box box-grey">
                <div class="box-body">
                <?php
                       $attributes = array('class' => 'form', 'id' => 'academicyearform');
                        echo form_open('siteadmin/academicyear/edit/'.$academicyear['academic_year_id'],$attributes); ?>
                        <div class="form-group">
                                <label class="control-label"><span class="text-danger">*</span>Start Year : </label>
                                <div id="startdatepicker" class="input-group date">
                                    <input class="form-control" type="text" id="start_year" name="start_year" value="<?php echo ($this->input->post('start_year') ? $this->input->post('start_year') : $academicyear['start_year']); ?>" />
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>                                                                                           
                                </div>
                                <span class="text-danger"><?php echo form_error('start_year');?></span>
                        </div>
                        <div class="form-group">
                                <label class="control-label">End Year : </label>
                                <div id="enddatepicker" class="input-group date">
                                    <input class="form-control" type="text" id="end_year" name="end_year" value="<?php echo ($this->input->post('end_year') ? $this->input->post('end_year') : $academicyear['end_year']); ?>" />
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>   
                                </div>
                                <span class="text-danger"><?php echo form_error('end_year');?></span>   
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
<link href="<?php echo base_url().'webassets/admin/css/datepicker.css';?>" rel="stylesheet">
<script src="<?php echo base_url().'webassets/admin/js/datetimepicker/bootstrap-datepicker.js';?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
            //date picker
           $('#startdatepicker').datepicker({
                 format: 'yyyy-mm-dd',
                  autoclose: true
           });
           $('#enddatepicker').datepicker({
                 format: 'yyyy-mm-dd',
                  autoclose: true
           });
           //end date picker
       
    });
</script>    