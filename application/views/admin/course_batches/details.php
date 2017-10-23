
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">View course batches</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">View course batches</li>
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
            echo '<strong>Well done!</strong> Content page updated .';
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
                                    <b>Batch Name :</b>
                                    
                                        <?php
							echo $course_batches[0]['cb_batchname']; ?>
										
										
                                </div>

							   
                                <div class="form-group">
                                    <b>Course Name :</b>
                                    
                                        <?php
										 $q=$this->db->query("SELECT * FROM `courses` WHERE course_id=".$course_batches[0]['cb_course_id']."");
				  $res=$q->row();

										echo $res->course_name; ?>
										
										
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12"><b>Courese Country:</b> <?php
                                           	$cb_country_arr=unserialize($course_batches[0]['cb_country']);
                                           		$ci=implode(",",$cb_country_arr);
                                              //echo $ci;exit;												
										  $query=$this->db->query("SELECT `country_id`, `country_name` FROM `countries` WHERE country_id in(".$ci.")  ");
										  $results=$query->result();
										  
										   foreach($results as $row)
										   {
											   //if($course_batches[0]['cb_country']==$row->country_id)
											   echo $row->country_name;
										   }
										 ?>	</label>
                                    <div class="col-md-12">
									
                                       
																			    
										
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12"><b>Courese Type:</b> <?php echo implode(',',unserialize($course_batches[0]['cb_course_type'])); ?> </label>
                                    <div class="col-md-12">						
								
									
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Courese Category : </b><?php 
										  $query=$this->db->query("SELECT cat_id,cat_name FROM course_categories");
										  $results=$query->result();							  
										   foreach($results as $row)
										   {
											   if($course_batches[0]['cb_cat_id']==$row->cat_id)
											   echo $row->cat_name;
										   }
										 ?>		</label>
                                    <div class="col-md-12">
                                   
										
																		    
										
										
										
										</div>
                                </div>

								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12"> <b>Course Image :</b></label>
                                    <div class="col-md-12">
									<?php if($course_batches[0]['cb_image']!="")
					echo '<img  src="'.base_url().'images/course/'.$course_batches['cb_image'].'"  width="200" height="200"  ></td>';
                   else	
					echo '<img  src="'.base_url().'images/course/no_img.png"  width="200" height="200"  >';	
				?>
                                        <input type="hidden" id="" class="form-control" name="old_cb_image" value="<?php echo $course_batches[0]['cb_image']; ?>" >
										
										</div>
                                </div>
								
								
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Name : <?php 
										  $query=$this->db->query("SELECT tutor_id,tutor_name FROM tutors");
										  $results=$query->result();
										  
										   foreach($results as $row)
										   {
											   if($course_batches[0]['cb_tutor_id']==$row->tutor_id)
													echo $row->tutor_name;
										   }
										 ?>	</label>
                                    
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Short Description : 
										</label>
										<?php  echo $course_batches[0]['cb_course_shortdes'];?>
                                    
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course  Description : 	</label>
									<?php  echo $course_batches[0]['cb_course_des'];?>
                                    
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Course Price : </b> <?php echo $course_batches[0]['cb_price']; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Course Hours : </b><?php echo $course_batches[0]['cb_time']; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Course Duration (Days): </b> <?php echo $course_batches[0]['cb_duration']; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Batch Start date: </b> <?php echo $course_batches[0]['cb_start_date']; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Batch End date: </b> <?php echo $course_batches[0]['cb_end_date']; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Course Rating : </b> <?php echo $course_batches[0]['cb_rating']; ?></label> :
                                    <div class="col-md-12">
                                        
										  
										   
										
										
										</div>
                                </div>
								
				<?php /* ?>				
						<div class="input_fields_container">
     <label class="col-md-12"><b>COURSE TOPICS</b></label>
      <div>
	   <?php
			$arr_lesson_name=unserialize($courses[0]['lesson_name']);
			$arr_lesson_time=unserialize($courses[0]['lesson_time']);
	   ?>
	   <b>Lesson Name : </b>
	  <?php echo $arr_lesson_name[0]; ?>
	   <b>Aproximate Time : </b>
	  <?php echo $arr_lesson_time[0]; ?>        
		 <br />
      </div>
 <?php for($i=1;$i<count($arr_lesson_name);$i++){ ?>
	 <div><b>Lesson Name :</b> <?php echo $arr_lesson_name[$i]; ?> <b>Aproximate Time</b> : <?php echo $arr_lesson_time[$i]; ?> <br />
	 </div>
 <?php } ?>  
	</div>
     <br />  <br /> 		
			<?php */ ?>					
								
								
								
											
                                        
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     