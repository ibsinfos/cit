 <link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update course batches</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update course batches</li>
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
            echo ' Updated Successfully.';
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

echo form_open_multipart('admin/course_batches/update/'.$this->uri->segment(4).'', $attributes);
?>
                                      
                                <div class="form-group">
                                    <label class="col-md-12">Batch Name</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="batchname" value="<?php echo $course_batches[0]['cb_batchname']; ?>" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Course Country</label>
                                    <div class="col-md-12">
									
                                      
										<?php 
										 $cb_country_arr=unserialize($course_batches[0]['cb_country']);
										  $query=$this->db->query("SELECT `country_id`, `country_name` FROM `countries`");
										  $results=$query->result();
										  
										     
										   foreach($results as $row)
										   {
											   
											   $select_country=(in_array($row->country_id,$cb_country_arr) ? 'checked':'');
											   echo '<input type="checkbox" name="course_country[]"  value="'.$row->country_id.'"  '.$select_country.'   > '.$row->country_name.'<br />';
										   }
										 ?>										    
									
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Course Type</label>
                                    <div class="col-md-12">
									<?php 
										 $course_type_arr=unserialize($course_batches[0]['cb_course_type']);
										 ?>
						<?php /* ?><select  class="form-control" name="course_type" value="<?php echo set_value('course_type'); ?>" >
								<option value="oncampus" <?php if($course_batches[0]['cb_course_type']=='oncampus') echo 'selected'; ?>   >ON CAMPUS</option>
								<option value="online"  <?php if($course_batches[0]['cb_course_type']=='online') echo 'selected'; ?> >ONLINE</option>
										   
								</select><?php */ ?>
                                       
										 <input type="checkbox" name="course_type[]"    value="oncampus" <?php echo (in_array('oncampus',$course_type_arr) ? 'checked':''); ?>    > ON CAMPUS <br />
										<input type="checkbox" name="course_type[]" value="online" <?php echo (in_array('online',$course_type_arr) ? 'checked':''); ?>     > ONLINE <br />
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Category</label>
                                    <div class="col-md-12">
                                   
										<select  class="form-control" name="cat_id" value="<?php echo set_value('cat_id'); ?>" >
										<?php 
										  $query=$this->db->query("SELECT cat_id,cat_name FROM course_categories");
										  $results=$query->result();							  
										   foreach($results as $row)
										   {
											   $select_cat=($course_batches[0]['cb_cat_id']==$row->cat_id ? 'selected':'');
											   echo '<option value="'.$row->cat_id.'" '.$select_cat.'   >'.$row->cat_name.'</option>';
										   }
										 ?>										    
										</select>
										
										
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Courses </label>
                                    <div class="col-md-12">
                                   
										<select  class="form-control" name="course_id" value="<?php echo set_value('course_id'); ?>" >
										<?php 
										  $query=$this->db->query("SELECT course_id,course_name FROM courses");
										  $results=$query->result();
										  
										   foreach($results as $row)
										   {
											   $select_course=($course_batches[0]['cb_course_id']==$row->course_id ? 'selected':'');
											   echo '<option value="'.$row->course_id.'"  '.$select_course.' >'.$row->course_name.'</option>';
										   }
										 ?>										    
										</select>
										
										
										
										</div>
                                </div>

								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Old course Image (width: 750; Height: 450, Max Size:2MB Only )</label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/course/<?php echo $course_batches[0]['cb_image']; ?>" style="width:120px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_cb_image" value="<?php echo $course_batches[0]['cb_image']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Image (width: 750; Height: 450, Max Size:2MB Only )</label>
                                    <div class="col-md-12">
                                        <input type="file" id="" class="form-control" name="cb_image" value="<?php echo set_value('cb_image'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Select Tutor </label>
                                    <div class="col-md-12">
                                   
										<select  class="form-control" name="tutor_id" value="<?php echo set_value('tutor_id'); ?>" >
										<?php 
										  $query=$this->db->query("SELECT tutor_id,tutor_name FROM tutors");
										  $results=$query->result();
										  
										   foreach($results as $row)
										   {
											   $select_tutor=($course_batches[0]['cb_tutor_id']==$row->tutor_id ? 'selected':'');
											   echo '<option value="'.$row->tutor_id.'"  '.$select_tutor.'  >'.$row->tutor_name.'</option>';
										   }
										 ?>										    
										</select>
										
										
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Short Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="cb_course_shortdes" ><?php echo $course_batches[0]['cb_course_shortdes']; ?></textarea>
										
										</div>
                                </div>
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="cb_course_des" ><?php echo $course_batches[0]['cb_course_des']; ?></textarea>
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">course curriculum pdf ( Max Size:2MB Only )</label>
                                    <div class="col-md-12">
									  <?php if($course_batches[0]['cb_course_curr']){ ?>
									   <a target="_blank" href="<?php echo base_url(); ?>images/course/<?php echo $course_batches[0]['cb_course_curr']; ?>"     >View Pdf</a>
									  <?php }else{ ?>
									           No Pdf 
										<?php  
											}
									  ?>
                                        <input type="hidden" id="" class="form-control" name="old_cb_curr" value="<?php echo $course_batches[0]['cb_course_curr']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Upload  Course curriculum pdf (Max Size:2MB Only )</label>
                                    <div class="col-md-12">
                                        <input type="file" id="" class="form-control" name="cb_course_curr" value="<?php echo set_value('cb_course_curr'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Price (Dollar)</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="course_price" value="<?php echo $course_batches[0]['cb_price']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Price (Rupee))</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="course_price_rs" value="<?php echo $course_batches[0]['cb_price_rs']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Hours</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="course_time" value="<?php echo $course_batches[0]['cb_time']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Duration (Days)</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control" name="course_duration" value="<?php echo $course_batches[0]['cb_duration']; ?>" >
										
										</div>
                                </div>
								
								<?php /* ?>
								<div class="form-group">
                                    <label class="col-md-12">Batch Week Days</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="cb_week_days" value="<?php echo $course_batches[0]['cb_week_days']; ?>" >
										
										</div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-12">Batch Day Timing</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="cb_day_time" value="<?php echo $course_batches[0]['cb_day_time']; ?>" >
										
										</div>
                                </div>
								 <?php */ ?>
								
								
								
								<?php 
 $time_from_arr=array('12:00am','12:05am','12:10am','12:15am','12:20am','12:25am','12:30am','12:35am','12:40am','12:45am','12:50am','12:55am',
 '1:00am','1:05am','1:10am','1:15am','1:20am','1:25am','1:30am','1:35am','1:40am','1:45am','1:50am','1:55am',
 '2:00am','2:05am','2:10am','2:15am','2:20am','2:25am','2:30am','2:35am','2:40am','2:45am','2:50am','2:55am',
 '3:00am','3:05am','3:10am','3:15am','3:20am','3:25am','3:30am','3:35am','3:40am','3:45am','3:50am','3:55am',
 '4:00am','4:05am','4:10am','4:15am','4:20am','4:25am','4:30am','4:35am','4:40am','4:45am','4:50am','4:55am',
 '5:00am','5:05am','5:10am','5:15am','5:20am','5:25am','5:30am','5:35am','5:40am','5:45am','5:50am','5:55am',
 '6:00am','6:05am','6:10am','6:15am','6:20am','6:25am','6:30am','6:35am','6:40am','6:45am','6:50am','6:55am',
 '7:00am','7:05am','7:10am','7:15am','7:20am','7:25am','7:30am','7:35am','7:40am','7:45am','7:50am','7:55am',
 '8:00am','8:05am','8:10am','8:15am','8:20am','8:25am','8:30am','8:35am','8:40am','8:45am','8:50am','8:55am',
 '9:00am','9:05am','9:10am','9:15am','9:20am','9:25am','9:30am','9:35am','9:40am','9:45am','9:50am','9:55am',
 '10:00am','10:05am','10:10am','10:15am','10:20am','10:25am','10:30am','10:35am','10:40am','10:45am','10:50am','10:55am',
 '11:00am','11:05am','11:10am','11:15am','11:20am','11:25am','11:30am','11:35am','11:40am','11:45am','11:50am','11:55am',
 '12:00pm','12:05pm','12:10pm','12:15pm','12:20pm','12:25pm','12:30pm','12:35pm','12:40pm','12:45pm','12:50am','12:55pm',
 '1:00pm','1:05pm','1:10pm','1:15pm','1:20pm','1:25pm','1:30pm','1:35pm','1:40pm','1:45pm','1:50am','1:55pm',
 '2:00pm','2:05pm','2:10pm','2:15pm','2:20pm','2:25pm','2:30pm','2:35pm','2:40pm','2:45pm','2:50am','2:55pm',
 '3:00pm','3:05pm','3:10pm','3:15pm','3:20pm','3:25pm','3:30pm','3:35pm','3:40pm','3:45pm','3:50am','3:55pm',
 '4:00pm','4:05pm','4:10pm','4:15pm','4:20pm','4:25pm','4:30pm','4:35pm','4:40pm','4:45pm','4:50am','4:55pm',
 '5:00pm','5:05pm','5:10pm','5:15pm','5:20pm','5:25pm','5:30pm','5:35pm','5:40pm','5:45pm','5:50am','5:55pm',
 '6:00pm','6:05pm','6:10pm','6:15pm','6:20pm','6:25pm','6:30pm','6:35pm','6:40pm','6:45pm','6:50am','6:55pm',
 '7:00pm','7:05pm','7:10pm','7:15pm','7:20pm','7:25pm','7:30pm','7:35pm','7:40pm','7:45pm','7:50am','7:55pm',
 '8:00pm','8:05pm','8:10pm','8:15pm','8:20pm','8:25pm','8:30pm','8:35pm','8:40pm','8:45pm','8:50am','8:55pm',
 '9:00pm','9:05pm','9:10pm','9:15pm','9:20pm','9:25pm','9:30pm','9:35pm','9:40pm','9:45pm','9:50am','9:55pm',
 '10:00pm','10:05pm','10:10pm','10:15pm','10:20pm','10:25pm','10:30pm','10:35pm','10:40pm','10:45pm','10:50am','10:55pm',
 '11:00pm','11:05pm','11:10pm','11:15pm','11:20pm','11:25pm','11:30pm','11:35pm','11:40pm','11:45pm','11:50am','11:55pm'
 );
 
 $time_to_arr=array('12:00am','12:05am','12:10am','12:15am','12:20am','12:25am','12:30am','12:35am','12:40am','12:45am','12:50am','12:55am',
 '1:00am','1:05am','1:10am','1:15am','1:20am','1:25am','1:30am','1:35am','1:40am','1:45am','1:50am','1:55am',
 '2:00am','2:05am','2:10am','2:15am','2:20am','2:25am','2:30am','2:35am','2:40am','2:45am','2:50am','2:55am',
 '3:00am','3:05am','3:10am','3:15am','3:20am','3:25am','3:30am','3:35am','3:40am','3:45am','3:50am','3:55am',
 '4:00am','4:05am','4:10am','4:15am','4:20am','4:25am','4:30am','4:35am','4:40am','4:45am','4:50am','4:55am',
 '5:00am','5:05am','5:10am','5:15am','5:20am','5:25am','5:30am','5:35am','5:40am','5:45am','5:50am','5:55am',
 '6:00am','6:05am','6:10am','6:15am','6:20am','6:25am','6:30am','6:35am','6:40am','6:45am','6:50am','6:55am',
 '7:00am','7:05am','7:10am','7:15am','7:20am','7:25am','7:30am','7:35am','7:40am','7:45am','7:50am','7:55am',
 '8:00am','8:05am','8:10am','8:15am','8:20am','8:25am','8:30am','8:35am','8:40am','8:45am','8:50am','8:55am',
 '9:00am','9:05am','9:10am','9:15am','9:20am','9:25am','9:30am','9:35am','9:40am','9:45am','9:50am','9:55am',
 '10:00am','10:05am','10:10am','10:15am','10:20am','10:25am','10:30am','10:35am','10:40am','10:45am','10:50am','10:55am',
 '11:00am','11:05am','11:10am','11:15am','11:20am','11:25am','11:30am','11:35am','11:40am','11:45am','11:50am','11:55am',
 '12:00pm','12:05pm','12:10pm','12:15pm','12:20pm','12:25pm','12:30pm','12:35pm','12:40pm','12:45pm','12:50am','12:55pm',
 '1:00pm','1:05pm','1:10pm','1:15pm','1:20pm','1:25pm','1:30pm','1:35pm','1:40pm','1:45pm','1:50am','1:55pm',
 '2:00pm','2:05pm','2:10pm','2:15pm','2:20pm','2:25pm','2:30pm','2:35pm','2:40pm','2:45pm','2:50am','2:55pm',
 '3:00pm','3:05pm','3:10pm','3:15pm','3:20pm','3:25pm','3:30pm','3:35pm','3:40pm','3:45pm','3:50am','3:55pm',
 '4:00pm','4:05pm','4:10pm','4:15pm','4:20pm','4:25pm','4:30pm','4:35pm','4:40pm','4:45pm','4:50am','4:55pm',
 '5:00pm','5:05pm','5:10pm','5:15pm','5:20pm','5:25pm','5:30pm','5:35pm','5:40pm','5:45pm','5:50am','5:55pm',
 '6:00pm','6:05pm','6:10pm','6:15pm','6:20pm','6:25pm','6:30pm','6:35pm','6:40pm','6:45pm','6:50am','6:55pm',
 '7:00pm','7:05pm','7:10pm','7:15pm','7:20pm','7:25pm','7:30pm','7:35pm','7:40pm','7:45pm','7:50am','7:55pm',
 '8:00pm','8:05pm','8:10pm','8:15pm','8:20pm','8:25pm','8:30pm','8:35pm','8:40pm','8:45pm','8:50am','8:55pm',
 '9:00pm','9:05pm','9:10pm','9:15pm','9:20pm','9:25pm','9:30pm','9:35pm','9:40pm','9:45pm','9:50am','9:55pm',
 '10:00pm','10:05pm','10:10pm','10:15pm','10:20pm','10:25pm','10:30pm','10:35pm','10:40pm','10:45pm','10:50am','10:55pm',
 '11:00pm','11:05pm','11:10pm','11:15pm','11:20pm','11:25pm','11:30pm','11:35pm','11:40pm','11:45pm','11:50am','11:55pm'
 );
 
 $time_from_arr_c=count($time_from_arr);
 $day_tt=json_decode($course_batches[0]['cb_day_table']);
 //print_r($day_tt->batch_days); exit;
 
 ?>
								
								<div class="form-group" >
                                     <div class="col-md-4 b-r-0">
                                    <strong> Day</strong> <br />
                                        
                                        <input type="checkbox" name="batch_day[]"  <?php echo in_array('Sunday',$day_tt->batch_days) ? 'checked':'';  ?>  value="Sunday"   >
                                        Sunday 
                                        
                                     </div>
                                     <div class="col-md-4 b-r-0">
                                     <strong>Opening Hours </strong>
                                    <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_open1" >
								<?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_from_arr[$i]==$day_tt->day_time_open1) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                     <div class="col-md-4">
                                     <strong> Closing Hours </strong>
                                        <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_close1" >
									<?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_from_arr[$i]==$day_tt->day_time_close1) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
									
                                  
                                    </select>
                                     </div>
                                     </div>
									 
                                    <div class="col-md-4 b-r-0">
                                       
                                        <input type="checkbox" name="batch_day[]" <?php echo in_array('Monday',$day_tt->batch_days) ? 'checked':'';  ?> value="Monday">
                                        Monday 
                                        
                                     </div>
                                     <div class="col-md-4 b-r-0">
                                    <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_open2" >
                                  <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_open2) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_close2"  >
                                   <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_close2) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
									 
									 
                                    <div class="col-md-4 b-r-0">
                                      
                                        <input type="checkbox" name="batch_day[]"  <?php echo in_array('Tuesday',$day_tt->batch_days) ? 'checked':'';  ?> value="Tuesday" />
                                        Tuesday 
                                        
                                     </div>
                                     <div class="col-md-4 b-r-0">
                                    <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_open3" >
                                   <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_open3) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_close3">
                                   <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_close3) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                         

										 <div class="col-md-4 b-r-0">
                                       
                                        <input type="checkbox" name="batch_day[]" <?php echo in_array('Wednesday',$day_tt->batch_days) ? 'checked':'';  ?> value="Wednesday">
                                        Wednesday 
                                        
                                     </div>
                                     <div class="col-md-4 b-r-0">
                                    <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_open4" >
                                   <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_open4) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_close4">
                                   <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_close4) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                          <div class="col-md-4 b-r-0">
                                        
                                        <input type="checkbox" name="batch_day[]" <?php echo in_array('Thursday',$day_tt->batch_days) ? 'checked':'';  ?> value="Thursday">
                                        Thursday 
                                       
                                     </div>
                                     <div class="col-md-4 b-r-0">
                                    <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_open5" >
                                  <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_open5) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_close5">
                                   <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_close5) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                            <div class="col-md-4 b-r-0">
                                      
                                        <input type="checkbox" name="batch_day[]" <?php echo in_array('Friday',$day_tt->batch_days) ? 'checked':'';  ?> value="Friday"  >
                                        Friday 
                                        
                                     </div>
                                     <div class="col-md-4 b-r-0">
                                    <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_open6">
                                   <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_open6) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_close6">
                                   <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_close6) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                            <div class="col-md-4 b-r-0">
                                      
                                        <input type="checkbox" name="batch_day[]" <?php echo in_array('Saturday',$day_tt->batch_days) ? 'checked':'';  ?> value="Saturday">
                                        Saturday 
                                        
                                     </div>
                                     <div class="col-md-4 b-r-0">
                                    <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_open7">
                                   <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_open7) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>
                                     <div class="col-md-4">
                                        <div class="custom_select"> 
                                    <select  class="form-control" name="day_time_close7">
                                   <?php for($i=0;$i<$time_from_arr_c;$i++) {?>	
                                   <option value="<?php echo $time_from_arr[$i]; ?>" <?php if($time_to_arr[$i]==$day_tt->day_time_close7) echo 'selected'; ?>  ><?php echo $time_from_arr[$i]; ?></option>
								<?php } ?>
                                    </select>
                                     </div>
                                     </div>

                                   </div>
								
								
								
								
								
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Batch Start Date</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control complex-colorpicker" name="start_date" value="<?php echo date('m/d/Y',strtotime($course_batches[0]['cb_start_date'])); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Batch End Date</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control complex-colorpicker" name="end_date" value="<?php echo date('m/d/Y',strtotime($course_batches[0]['cb_end_date'])); ?>" >
										
										</div>
                                </div>
								
								
								<?php /* ?>
								<div class="form-group">
                                    <label class="col-md-12">Course Rating</label>
                                    <div class="col-md-12">
                                        <select  class="form-control" name="course_rating" >
										   <option value="1" <?php if($course_batches[0]['cb_rating']==1) echo 'selected';  ?>   >1 Star</option>
										   <option value="2" <?php if($course_batches[0]['cb_rating']==2) echo 'selected';  ?> >2 Stars</option>
										    <option value="3" <?php if($course_batches[0]['cb_rating']==3) echo 'selected';  ?> >3 Stars</option>
											 <option value="4" <?php if($course_batches[0]['cb_rating']==4) echo 'selected';  ?> >4 Stars</option>
											 <option value="5" <?php if($course_batches[0]['cb_rating']==5) echo 'selected';  ?> >5 Stars</option>
										</select>
										
										</div>
                                </div><?php */ ?>
								
								
						<div class="input_fields_container">
     <label class="col-md-12">TOPICS</label>
      <div>
	   <?php
			$arr_lesson_name=unserialize($course_batches[0]['lesson_name']);
			$arr_lesson_time=unserialize($course_batches[0]['lesson_time']);
	   ?>  
	   Lesson Name
	  <input type="text" name="lesson_name[]" class="form-control" value="<?php echo $arr_lesson_name[0]; ?>"   />
	   Aproximate Time
	  <input type="text" name="lesson_time[]" class="form-control" value="<?php echo $arr_lesson_time[0]; ?>"   />
          
		 <br />
      </div>
 <?php for($i=1;$i<count($arr_lesson_name);$i++){ ?>
	 <div>Lesson Name<input type="text" name="lesson_name[]" value="<?php echo $arr_lesson_name[$i]; ?>" class="form-control"> Aproximate Time<input type="text" name="lesson_time[]" value="<?php echo $arr_lesson_time[$i]; ?>" class="form-control"><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>
 <?php } ?>  
	</div>
	<div><p><button class="btn btn-sm btn-primary add_more_button">Add More Fields</button></p></div>
     <br /> 	
								
								
								
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <a href="<?php echo base_url(); ?>admin/course_batches" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     