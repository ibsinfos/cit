 <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Account Settings</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Account Settings</li>
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
            echo '<strong>Well done!</strong>  page updated successuflly.';
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
echo validation_errors();

echo form_open_multipart('admin/account_settings/update/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                                <div class="form-group">
                                    <label class="col-md-12">Website Title</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="title" value="<?php echo $account_settings[0]['title']; ?>" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="email" value="<?php echo $account_settings[0]['email']; ?>" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Mobile</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="mobile" value="<?php echo $account_settings[0]['mobile']; ?>" >
										
										</div>
                                </div>

<div class="form-group">
                                    <label class="col-md-12">Google Plus</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="google" value="<?php echo $account_settings[0]['google']; ?>" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Facebook</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="facebook" value="<?php echo $account_settings[0]['facebook']; ?>" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Twitter</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="twitter" value="<?php echo $account_settings[0]['twitter']; ?>" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">linkedin</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="linkedin" value="<?php echo $account_settings[0]['linkedin']; ?>" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">youtube</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="youtube" value="<?php echo $account_settings[0]['youtube']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Home Page Enable Faculty Members</label>
                                    <div class="col-md-12">
                                        <select  class="form-control" name="faculty"  >
										
										 <option value="yes" <?php if($account_settings[0]['faculty']=='yes') echo 'selected'; ?> >Yes</option>
										 <option value="no" <?php if($account_settings[0]['faculty']=='no') echo 'selected'; ?> >NO</option>
										</select>
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Home Page Enable Gallery</label>
                                    <div class="col-md-12">
                                        <select  class="form-control" name="gallery"  >
										
										 <option value="yes" <?php if($account_settings[0]['gallery']=='yes') echo 'selected'; ?> >Yes</option>
										 <option value="no" <?php if($account_settings[0]['gallery']=='no') echo 'selected'; ?> >NO</option>
										</select>
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Home Page Enable Latest News & Events</label>
                                    <div class="col-md-12">
                                        <select  class="form-control" name="news"  >
										
										 <option value="yes" <?php if($account_settings[0]['news']=='yes') echo 'selected'; ?> >Yes</option>
										 <option value="no" <?php if($account_settings[0]['news']=='no') echo 'selected'; ?> >NO</option>
										</select>
										
										</div>
                                </div>
								
								
								
								
								 
								
								
								
								
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <a href="<?php echo base_url('admin/dashboard'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     