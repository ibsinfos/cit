
<div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Home Page Course</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Home Page Course</li>
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
<h3 class="box-title m-b-0">Add Home Course </h3> <br />

								<?php
								$attributes = array('class' => 'form-horizontal', 'id' => '');
								echo validation_errors();
								echo form_open_multipart('admin/homecourse/add', $attributes);
								?>
								
							
								
                            <div class="form-group">
                                    <label class="col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Name</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="tname"  >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Start Date</label>
                                    <div class="col-md-12">
                                        <input type="text" id="datepicker-autoclose"  class="form-control complex-colorpicker" name="cdate"  >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Description</label>
                                    <div class="col-md-12">
                                         <input type="text" required class="form-control" name="des"  >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Link</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="clink"  >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course background Image (1920X511)</label>
                                    <div class="col-md-12">
                                        <input type="file"  class="form-control" name="bg_image" value="<?php echo set_value('bg_image'); ?>" >
										
										</div>
                                </div>
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Image (253X503)</label>
                                    <div class="col-md-12">
                                        <input type="file"  class="form-control" name="h_image" value="<?php echo set_value('h_image'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Enable</label>
                                    <div class="col-md-12">
                                        <select  class="form-control" name="cdisplay"  >
										  <option value="yes" <?php //if($homecourse[0]['cdisplay']=='yes') echo 'selected'; ?> >Yes</option>
										  <option value="no" <?php //if($homecourse[0]['cdisplay']=='no') echo 'selected'; ?> >No</option>
										</select>
										
										</div>
                                </div>
								
								

											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
										<a href="<?php echo base_url('admin/homecourse'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                        <!--<button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>-->
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>



        
	
     