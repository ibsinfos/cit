<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Gallery</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Gallery</li>
                     </ol>
                  </div>
                  
</div>

      <?php if(validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?=(isset($error)?$error:'')?>
			</div>
		<?php endif; ?>
      
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<h3 class="box-title m-b-0">Add Gallery </h3> <br />

								<?php
								$attributes = array('class' => 'form-horizontal', 'id' => '');
								//echo validation_errors();
								echo form_open_multipart('admin/gallery/add', $attributes);
								?>
								
							
								
                              <div class="form-group">
                                    <label class="col-md-12">Image File</label>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="userfile" />
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Caption</label>
                                    <div class="col-md-12">
                                     <input type="text" class="form-control" name="caption" value="<?php echo set_value('caption'); ?>"  />
										</div>
                                </div>
								
								
							
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12"> Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="description" ><?php echo set_value('testimonial_des'); ?></textarea>
										
										</div>
                                </div>
								
								
								
								

								
								
								
			<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Upload</button>
		  <?php echo anchor('admin/gallery','Cancel',['class'=>'btn btn-inverse waves-effect waves-light']); ?>

		
								                                
								
											
                                       <!-- <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>-->
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>



        
	
     