
<link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
<div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Student</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Student </li>
                     </ol>
                  </div>
                  
</div>

      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new content page created';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<h3 class="box-title m-b-0">Add Student </h3> <br />
<?php
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo '<div class="alert alert-error">'.validation_errors().'</div>';
echo form_open_multipart('admin/register_students/add', $attributes);
?>								
							<!--
								
                              <div class="form-group">
                                    <label class="col-md-12">Student Name</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="std_name" value="<?php echo set_value('tutor_name'); ?>" >
										
										</div>
                                </div>-->
								
								<div class="form-group">
                                    <label class="col-md-12">Student Username</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="std_username" value="<?php echo set_value('std_username'); ?>" >
										
										</div>
										<p>&nbsp; &nbsp;  <b>The Username field must contain only alphabets,numbers and underscore Only (No space in username) </b></p>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="std_pwd" value="" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Student Email</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="std_email" value="<?php echo set_value('std_email'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Student Mobile</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="std_mobile" value="<?php echo set_value('std_mobile'); ?>" >
										
										</div>
                                </div>
								
								
								<!--
								
								<div class="form-group">
                                    <label class="col-md-12">Student Image</label>
                                    <div class="col-md-12">
                                        <input type="file"  class="form-control" name="std_image"  >
										
										</div>
                                </div>-->
								
								
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Reset</button>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>



        
	
     