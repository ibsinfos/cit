
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update Corporate Training</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update Corporate Training</li>
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
            echo '<strong>Well done!</strong>  Updated Successfully.';
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

echo form_open_multipart('admin/corporate_services/update/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                                
								
								<div class="form-group">
                                    <label class="col-md-12"> Title</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title" value="<?php echo $corporate_services[0]['title']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Meta Title</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="meta_title" value="<?php echo $corporate_services[0]['meta_title']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Meta Description</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="5" name="meta_des" ><?php echo $corporate_services[0]['meta_des']; ?></textarea>
										
										</div>
                                </div>
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Old  Image</label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/<?php echo $corporate_services[0]['corporate_services_image']; ?>" style="width:120px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_corporate_services_image" value="<?php echo $corporate_services[0]['corporate_services_image']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Corporate Image</label>
                                    <div class="col-md-12">
                                        <input type="file" id="" class="form-control" name="corporate_services_image" value="<?php echo set_value('corporate_services_image'); ?>" >
										
										</div>
                                </div>
								
								
								
								<div class="form-group">
                                    <label class="col-md-12"> Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="corporate_services_des" ><?php echo $corporate_services[0]['corporate_services_des']; ?></textarea>
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Last line1</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title1" value="<?php echo $corporate_services[0]['title1']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"> Last line2</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title2" value="<?php echo $corporate_services[0]['title2']; ?>" >
										
										</div>
                                </div>
								
								
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <a href="<?php echo base_url('admin/corporate_services'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     