<link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update Home Page Course</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update Home Page Course</li>
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

echo form_open_multipart('admin/homecourse/update/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                                
								
								<div class="form-group">
                                    <label class="col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title" value="<?php echo $homecourse[0]['title']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Name</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="tname" value="<?php echo $homecourse[0]['tname']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Start Date</label>
                                    <div class="col-md-12">
                                        <input type="text" id="datepicker-autoclose"  class="form-control complex-colorpicker" name="cdate" value="<?php echo $homecourse[0]['cdate']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Description</label>
                                    <div class="col-md-12">
                                         <input type="text" required class="form-control" name="des" value="<?php echo $homecourse[0]['des']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Link</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="clink" value="<?php echo $homecourse[0]['clink']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Old Course Backgroung Image</label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/<?php echo $homecourse[0]['bg_image']; ?>" style="width:400px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_bg_image" value="<?php echo $homecourse[0]['bg_image']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course background Image (1920X511)</label>
                                    <div class="col-md-12">
                                        <input type="file"  class="form-control" name="bg_image" value="<?php echo set_value('bg_image'); ?>" >
										
										</div>
                                </div>
								
								
						
								
								
								<div class="form-group">
                                    <label class="col-md-12">Old Course Image</label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/<?php echo $homecourse[0]['h_image']; ?>" style="width:120px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_h_image" value="<?php echo $homecourse[0]['h_image']; ?>" >
										
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
										  <option value="yes" <?php if($homecourse[0]['cdisplay']=='yes') echo 'selected'; ?> >Yes</option>
										  <option value="no" <?php if($homecourse[0]['cdisplay']=='no') echo 'selected'; ?> >No</option>
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


	
	
	
     
     