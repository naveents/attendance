<div class="container">
    <div class="col-md-12">
        
        <div class="row">           
          
            <div class="col-md-4 col-md-offset-4">
                <div class="main-panel__table-cell">
                    <div class="login-box-body">
                            <h1 class="main-panel__heading">Sign in 
                            <small class="main-panel__subheading">
								Enter your details below.
			    </small>
                            </h1>
                            <?php if($this->session->flashdata('message')): ?>
                                        <div class="alert alert-danger"><?php echo $this->session->flashdata('message');?></div>
                            <?php endif;?>
                            <form action="" method="post">
                              <div class="form-group has-feedback">
                                  <input type="email" class="form-control" id="identity" name="identity" placeholder="Email">
                                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <div class="row">
                                <!-- /.col -->
                                <div class="col-xs-12 text-center">
                                  <button type="submit" class="btn form__button">Sign In</button>
                                </div>
                                <!-- /.col -->
                              </div>
                            </form>

                          </div>
                          <!-- /.login-box-body -->
                </div>
            </div>
            
        </div>
        
    </div>
</div>