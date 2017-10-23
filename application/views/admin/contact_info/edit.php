
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update contact_info</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update contact_info</li>
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

echo form_open_multipart('admin/contact_info/update/'.$this->uri->segment(4).'', $attributes);
?>
                                 
	
								<div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="contact_info_des" ><?php echo $contact_info[0]['address']; ?></textarea>
										
										</div>
                                </div>								 
                                
								<div class="form-group">
                                    <label class="col-md-12">Phone </label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="phone" value="<?php echo $contact_info[0]['phone']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Email </label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="email" value="<?php echo $contact_info[0]['email']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Email 2</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="email2" value="<?php echo $contact_info[0]['email2']; ?>" >
										
										</div>
                                </div>
								
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <a href="<?php echo base_url('admin/contact_info'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     