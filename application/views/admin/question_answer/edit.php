
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update course</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update course</li>
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

echo form_open_multipart('admin/courses/update/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                                <div class="form-group">
                                    <label class="col-md-12">Course Name</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="course_name" value="<?php echo $courses[0]['course_name']; ?>" >
										
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
											   $select_country=($courses[0]['course_name']==$row->country_id ? 'selected':'');
											   echo '<option value="'.$row->country_id.'"  '.$select_country.'   >'.$row->country_name.'</option>';
										   }
										 ?>										    
										</select>
										
										</div>
                                </div>
								
								<!-- <div class="form-group">
                                    <label class="col-md-12">Courese Type</label>
                                    <div class="col-md-12">
						<select  class="form-control" name="course_type" value="<?php echo set_value('course_type'); ?>" >
								<option value="oncampus" <?php if($courses[0]['course_type']=='oncampus') echo 'selected'; ?>   >ON CAMPUS</option>
								<option value="online"  <?php if($courses[0]['course_type']=='online') echo 'selected'; ?> >ONLINE</option>
										   
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
											   $select_cat=($courses[0]['cat_id']==$row->cat_id ? 'selected':'');
											   echo '<option value="'.$row->cat_id.'" '.$select_cat.'   >'.$row->cat_name.'</option>';
										   }
										 ?>										    
										</select>
										
										
										
										</div>
                                </div>

								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Old course Image</label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/course/<?php echo $courses[0]['course_image']; ?>" style="width:120px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_course_image" value="<?php echo $courses[0]['course_image']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Image</label>
                                    <div class="col-md-12">
                                        <input type="file" id="" class="form-control" name="course_image" value="<?php echo set_value('course_image'); ?>" >
										
										</div>
                                </div>
							
								
								<div class="form-group">
                                    <label class="col-md-12">Course Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="course_des" ><?php echo $courses[0]['course_des']; ?></textarea>
										
										</div>
                                </div>
								<?php /* ?>
								<div class="form-group">
                                    <label class="col-md-12">Course Price</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="course_price" value="<?php echo $courses[0]['course_price']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Hours</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="course_time" value="<?php echo $courses[0]['course_time']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Duration (Days)</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="course_duration" value="<?php echo $courses[0]['course_duration']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Rating</label>
                                    <div class="col-md-12">
                                        <select  class="form-control" name="course_rating" >
										   <option value="1" <?php if($courses[0]['course_rating']==1) echo 'selected';  ?>   >1 Star</option>
										   <option value="2" <?php if($courses[0]['course_rating']==2) echo 'selected';  ?> >2 Stars</option>
										    <option value="3" <?php if($courses[0]['course_rating']==3) echo 'selected';  ?> >3 Stars</option>
											 <option value="4" <?php if($courses[0]['course_rating']==4) echo 'selected';  ?> >4 Stars</option>
											 <option value="5" <?php if($courses[0]['course_rating']==5) echo 'selected';  ?> >5 Stars</option>
										</select>
										
										</div>
                                </div>
								
								
						<div class="input_fields_container">
     <label class="col-md-12">TOPICS</label>
      <div>
	   <?php
			$arr_lesson_name=unserialize($courses[0]['lesson_name']);
			$arr_lesson_time=unserialize($courses[0]['lesson_time']);
	   ?>  
	   Lesson Name
	  <input type="text" name="lesson_name[]" class="form-control" value="<?php echo $arr_lesson_name[0]; ?>"   />
	   Aproximate Time
	  <input type="text" name="lesson_time[]" class="form-control" value="<?php echo $arr_lesson_time[0]; ?>"   />
           <button class="btn btn-sm btn-primary add_more_button">Add More Fields</button>
		 <br />
      </div>
 <?php for($i=1;$i<count($arr_lesson_name);$i++){ ?>
	 <div>Lesson Name<input type="text" name="lesson_name[]" value="<?php echo $arr_lesson_name[$i]; ?>" class="form-control"> Aproximate Time<input type="text" name="lesson_time[]" value="<?php echo $arr_lesson_time[$i]; ?>" class="form-control"><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>
 <?php } ?>  
	</div>
     <br />  <br /> 		
								
					<?php */ ?>			
								
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     