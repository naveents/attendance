<div class="container">
<section class="content-header">
      <h1>
        Academic Batch
        <small>New Batch</small>
      </h1>     
</section>
<section class="content">
<div class="row">        
            <div class="col-md-6 col-md-offset-3">
                    
            <div class="box box-grey">
                <div class="box-body">
                <?php
                       $attributes = array('class' => 'form', 'id' => 'batchform');
                        echo form_open('siteadmin/batch/add',$attributes); ?>
                        <div class="form-group">
                                <label class="control-label"><span class="text-danger">*</span>Course : </label>
                                <select name="course_id" id="course_id" class="form-control">
                                    <option value="">-- Choose Course --</option>
                                    <?php foreach($course as $c){ ?>
                                    <option value="<?php echo $c["course_id"];?>"><?php echo $c["course_name"];?></option>
                                    <?php } ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('course_id');?></span>
                        </div>
                        <div class="form-group">
                                <label class="control-label"><span class="text-danger">*</span>Academic Year : </label>
                                <select name="academic_year_id" id="academic_year_id" class="form-control">
                                    <option value="">-- Choose Academic Year --</option>
                                    <?php foreach($academicyear as $a){ ?>
                                    <option value="<?php echo $a["academic_year_id"];?>"><?php echo date('d/m/Y',strtotime($a["start_year"]))." - ".date('d/m/Y',strtotime($a["end_year"]));?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('academic_year_id');?></span>
                        </div> 
                    
                        <div class="form-group">
                                <label><span class="text-danger">*</span>Batch Name : </label>
                                <input class="form-control" type="text" id="batch_name" name="batch_name" value="<?php echo $this->input->post('batch_name'); ?>" />
                                <span class="text-danger"><?php echo form_error('batch_name');?></span>
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
<link href="<?php echo base_url().'webassets/admin/css/select2.min.css';?>" rel="stylesheet">
<script src="<?php echo base_url().'webassets/admin/js/select2.full.min.js';?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#course_id" ).select2();       
    });
</script>   