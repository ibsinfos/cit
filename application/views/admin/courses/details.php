
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">View course</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">View course</li>
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

echo form_open_multipart('admin/courses/update/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                                <div class="form-group">
                                    <b>Course Name :</b>
                                    
                                        <?php  echo $courses[0]['course_name']; ?>
										
										
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12"><b>Courese Tags:</b> 
									<?php  echo $courses[0]['course_tags'];?></label>
                                    <div class="col-md-12">
									
                                       
																			    
										
										
										</div>
                                </div>
								
								<!-- <div class="form-group">
                                    <label class="col-md-12"><b>Courese Type:</b> <?php echo $courses[0]['course_type']; ?> </label>
                                    <div class="col-md-12">						
								
									
										</div>
                                </div>-->
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Courese Category : </b><?php 
										  $query=$this->db->query("SELECT cat_id,cat_name FROM course_categories");
										  $results=$query->result();							  
										   foreach($results as $row)
										   {
											   if($courses[0]['cat_id']==$row->cat_id)
											   echo $row->cat_name;
										   }
										 ?>		</label>
                                    <div class="col-md-12">
                                   
										
																		    
										
										
										
										</div>
                                </div>

								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12"> <b>Course Image :</b></label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/course/<?php echo $courses[0]['course_image']; ?>" style="width:120px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_course_image" value="<?php echo $courses[0]['course_image']; ?>" >
										
										</div>
                                </div>
								
								
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Course Description : </b></label>
                                    <div class="col-md-12">
                                      <p>  <?php echo $courses[0]['course_des']; ?></p>
										
										</div>
                                </div>
								
								
							<?php /* ?>	
								<div class="form-group">
                                    <label class="col-md-12"><b>Course Price : </b> <?php echo $courses[0]['course_price']; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Course Hours : </b><?php echo $courses[0]['course_time']; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Course Duration (Days): </b> <?php echo $courses[0]['course_duration']; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Course Rating : </b> <?php echo $courses[0]['course_rating']; ?></label> :
                                    <div class="col-md-12">
                                        
										  
										   
										
										
										</div>
                                </div>
								
								
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


	
	
	
     
     