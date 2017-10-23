
 <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Change Password</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Change Password</li>
                     </ol>
                  </div>
                  
</div>
      
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong></strong> New Password  updated successuflly.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
<?php
//form data
$attributes = array('class' => 'form-horizontal', 'id' => '');
//form validation
//echo validation_errors();
echo form_open_multipart('admin/changepassword/update/'.$this->uri->segment(4).'', $attributes);
?>
<style>
.error{color:red; }
</style> 
                                <div class="form-group">
                                    <label class="col-md-12">Current Password </label>
                                    <div class="col-md-12">
                                        <input type="password"  class="form-control" name="current_pwd"  >
									<?php echo form_error('current_pwd', '<div class="error">', '</div>'); ?>
									<div class="error"><?php echo $this->session->flashdata('current_pwd_error'); ?></div>
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">New Password </label>
                                    <div class="col-md-12">
                                        <input type="password"  class="form-control" name="new_pwd"  >
										<?php echo form_error('new_pwd', '<div class="error">', '</div>'); ?>
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Re-enter New Password </label>
                                    <div class="col-md-12">
                                        <input type="password"  class="form-control" name="new_cpwd"  >
										 <?php echo form_error('new_cpwd', '<div class="error">', '</div>'); ?>
										</div>
                                </div>
										
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     