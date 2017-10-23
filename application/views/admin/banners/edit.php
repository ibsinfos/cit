
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update banners</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update banners</li>
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

echo form_open_multipart('admin/banners/update/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                                <div class="form-group">
                                    <label class="col-md-12">Banner Name</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="name" value="<?php echo $banners[0]['name']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Banner Title</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title" value="<?php echo $banners[0]['title']; ?>" >
										
										</div>
                                </div>
								
								
								
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Old Banner Image</label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/banner/<?php echo $banners[0]['banner_image']; ?>" style="width:120px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_banner_image" value="<?php echo $banners[0]['banner_image']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Banner Image</label>
                                    <div class="col-md-12">
                                        <input type="file" id="" class="form-control" name="banner_image" value="<?php echo set_value('banner_image'); ?>" >
										
										</div>
                                </div>
								
								
								
								<div class="form-group">
                                    <label class="col-md-12"> Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="banner_des" ><?php echo $banners[0]['banner_des']; ?></textarea>
										
										</div>
                                </div>
								
								
								
								
						
								
								
								
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <a href="<?php echo base_url('admin/banners'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     