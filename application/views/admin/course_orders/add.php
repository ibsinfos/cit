
<link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
<div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Tutors</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Tutors</li>
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
<h3 class="box-title m-b-0">Add tutors </h3> <br />

								<?php
								$attributes = array('class' => 'form-horizontal', 'id' => '');
								echo validation_errors();
								echo form_open_multipart('admin/tutors/add', $attributes);
								?>
								
							
								
                              <div class="form-group">
                                    <label class="col-md-12">Tutor Name</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="tutor_name" value="<?php echo set_value('tutor_name'); ?>" >
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Tutor email</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="tutor_email" value="<?php echo set_value('tutor_email'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Mobile</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="tutor_mobile" value="<?php echo set_value('tutor_mobile'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Username</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="tutor_username" value="<?php echo set_value('tutor_username'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Password</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="tutor_pwd" value="<?php echo set_value('tutor_pwd'); ?>" >
										
										</div>
                                </div>
								
								 <!--<div class="form-group">
                                    <label class="col-md-12">tutor Country</label>
                                    <div class="col-md-12">
									
                                        <select  class="form-control" name="tutor_country" value="<?php echo set_value('tutor_country'); ?>" >
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
								
								 <div class="form-group">
                                    <label class="col-md-12">Courese Type</label>
                                    <div class="col-md-12">
									 <select  class="form-control" name="course_type" value="<?php echo set_value('course_type'); ?>" >
										   <option value="oncampus" >ON CAMPUS</option>
										   <option value="online" >ONLINE</option>
										   
										</select>
                                       
										
										</div>
                                </div>
								
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
                                </div>-->
								
						<div class="form-group">
                            <label class="col-md-12">Select Courses </label>
                            <div class="col-md-12">	
							<select class="form-control selectpicker" name="tutor_course_id[]" id="tutor_course_id" multiple data-style="form-control">							
							<?php 
							$query=$this->db->query("SELECT course_id,course_name FROM courses");
							$results=$query->result();
										  
										   foreach($results as $row)
										   {
											   echo '<option value="'.$row->course_id.'"  >'.$row->course_name.'</option>';
										   }
							?> 
                          </select>
							</div>
                                </div>	
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Image</label>
                                    <div class="col-md-12">
                                        <input type="file"  class="form-control" name="tutor_image"  >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="tutor_des" ><?php echo set_value('tutor_des'); ?></textarea>
										
										</div>
                                </div>
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Rating</label>
                                    <div class="col-md-12">
                                        <select  class="form-control" name="tutor_rating" value="<?php echo set_value('tutor_rating'); ?>" >
										   <option value="1" >1 Star</option>
										   <option value="2" >2 Stars</option>
										    <option value="3" >3 Stars</option>
											 <option value="4" >4 Stars</option>
											 <option value="5" >5 Stars</option>
										</select>
										
										</div>
                                </div>
								
								
								

								
								
								
								
								                                
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>



        
	
     