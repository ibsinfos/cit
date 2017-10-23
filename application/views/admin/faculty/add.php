
<div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">faculty</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">faculty</li>
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
<h3 class="box-title m-b-0">Add faculty </h3> <br />

								<?php
								$attributes = array('class' => 'form-horizontal', 'id' => '');
								echo validation_errors();
								echo form_open_multipart('admin/faculty/add', $attributes);
								?>
								
							
								
                             
								
								 <div class="form-group">
                                    <label class="col-md-12">faculty Name</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title" value="<?php echo set_value('title'); ?>" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Designation</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="designation" value="<?php echo set_value('designation'); ?>" >
										
										</div>
                                </div>
							
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">faculty Image</label>
                                    <div class="col-md-12">
                                        <input type="file"  class="form-control" name="faculty_image"  >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12"> Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="faculty_des" ><?php echo set_value('faculty_des'); ?></textarea>
										
										</div>
                                </div>
								
								
								
								

								
								
								
								
								                                
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                       <a href="<?php echo base_url('admin/faculty'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>



        
	
     