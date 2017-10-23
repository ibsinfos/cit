<div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Courses</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Courses</li>
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
<h3 class="box-title m-b-0">Add Courses </h3> <br />

								<?php
								$attributes = array('class' => 'form-horizontal', 'id' => '');
								echo validation_errors();

								echo form_open_multipart('admin/courses/add', $attributes);
								?>
								
                              <div class="form-group">
                                    <label class="col-md-12">Course Name</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="course_name" value="<?php echo set_value('course_name'); ?>" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Courese Country</label>
                                    <div class="col-md-12">
									
                                        <select  class="form-control" name="course_country" value="<?php echo set_value('course_country'); ?>" >
										<?php 
										  $query=$this->db->query("SELECT `country_id`, `country_name` FROM `countries`");
										  $results=$query->result();
										  
										   foreach($results as $row)
										   {
											   echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
										   }
										 ?>										    
										</select>
										
										</div>
                                </div>
								
								<!-- <div class="form-group">
                                    <label class="col-md-12">Courese Type</label>
                                    <div class="col-md-12">
									 <select  class="form-control" name="course_type" value="<?php echo set_value('course_type'); ?>" >
										   <option value="oncampus" >ON CAMPUS</option>
										   <option value="online" >ONLINE</option>
										   
										</select>
                                       
										
										</div>
                                </div>-->
								
								<div class="form-group">
                                    <label class="col-md-12">Courese Category</label>
                                    <div class="col-md-12">
                                   
										<select  class="form-control" name="cat_id" value="<?php echo set_value('cat_id'); ?>" >
										<?php 
										  $query=$this->db->query("SELECT cat_id,cat_name FROM course_categories");
										  $results=$query->result();
										  
										   foreach($results as $row)
										   {
											   echo '<option value="'.$row->cat_id.'">'.$row->cat_name.'</option>';
										   }
										 ?>										    
										</select>
										
										
										
										</div>
                                </div>
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Image</label>
                                    <div class="col-md-12">
                                        <input type="file"  class="form-control" name="course_image"  >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="course_des" ><?php echo set_value('course_des'); ?></textarea>
										
										</div>
                                </div>
							
                            <?php /* ?> 							
								
								<div class="form-group">
                                    <label class="col-md-12">Course Price</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="course_price" value="<?php echo set_value('course_price'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Hours</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="course_time" value="<?php echo set_value('course_time'); ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Duration (Days)</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="course_duration" value="<?php echo set_value('course_duration'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Rating</label>
                                    <div class="col-md-12">
                                        <select  class="form-control" name="course_rating" value="<?php echo set_value('course_rating'); ?>" >
										   <option value="1" >1 Star</option>
										   <option value="2" >2 Stars</option>
										    <option value="3" >3 Stars</option>
											 <option value="4" >4 Stars</option>
											 <option value="5" >5 Stars</option>
										</select>
										
										</div>
                                </div>
								
								
								
								
<div class="input_fields_container">
     <label class="col-md-12">TOPICS</label>
      <div>
	   Lesson Name
	  <input type="text" name="lesson_name[]" class="form-control"   />
	   Aproximate Time
	  <input type="text" name="lesson_time[]" class="form-control"   />
           <button class="btn btn-sm btn-primary add_more_button">Add More Fields</button>
		 <br />
      </div>
	  
	 <!-- <div>Lesson Name<input type="text" name="product_name[]" class="form-control"> Aproximate Time<input type="text" name="product_name12[]" class="form-control"><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>-->
    </div>
     <br />  <br /> 
					<?php */ ?>			
								
								
								
								                                
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>



 
	
     