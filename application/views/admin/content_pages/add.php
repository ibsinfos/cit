<div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Content Page</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Content Page</li>
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

								<?php
								//form data
								$attributes = array('class' => 'form-horizontal', 'id' => '');

								//form validation
								echo validation_errors();

								echo form_open('admin/content_pages/add', $attributes);
								?>
                                        
                                  <div class="form-group">
                                    <label class="col-md-12">Page  Name</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="name" value="<?php echo set_value('name'); ?>" >
										
										</div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-12">Page  Heading</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="page_heading" value="<?php echo set_value('page_heading'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Page  Description</label>
                                    <div class="col-md-12">
										<textarea id="mymce" name="page_des"  ><?php echo set_value('page_desc'); ?></textarea>
										</div>
                                </div>
								
								
								                                
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>



 
	
     