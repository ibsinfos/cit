<link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update Cart Page</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update Cart Page </li>
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

echo form_open_multipart('admin/admin_cartcms/update/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                                
								
								<div class="form-group">
                                    <label class="col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title1" value="<?php echo $cartcms[0]['title1']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Title2</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title2" value="<?php echo $cartcms[0]['title2']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Title3</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title3" value="<?php echo $cartcms[0]['title3']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Title4</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title4" value="<?php echo $cartcms[0]['title4']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Title5</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title5" value="<?php echo $cartcms[0]['title5']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Title6</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title6" value="<?php echo $cartcms[0]['title6']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Title7</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title7" value="<?php echo $cartcms[0]['title7']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Title8</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title8" value="<?php echo $cartcms[0]['title8']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Title9</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title9" value="<?php echo $cartcms[0]['title9']; ?>" >
										
										</div>
                                </div>
								
											
               <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
              <a href="<?php echo base_url('admin/dashboard'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
			  
               <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     