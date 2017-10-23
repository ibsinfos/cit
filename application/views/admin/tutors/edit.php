<link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update tutors</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update tutors</li>
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

echo form_open_multipart('admin/tutors/update/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                                <div class="form-group">
                                    <label class="col-md-12">Tutor Name</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="tutor_name" value="<?php echo $tutors[0]['tutor_name']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Email</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="tutor_email" value="<?php echo $tutors[0]['tutor_email']; ?>" >
										
										</div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-12">Tutor Mobile</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="tutor_mobile" value="<?php echo $tutors[0]['tutor_mobile']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Username</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="tutor_username" readonly value="<?php echo $tutors[0]['tutor_username']; ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                            <label class="col-md-12">Select Courses </label>
                            <div class="col-md-12">	
							<select class="form-control selectpicker" name="tutor_course_id[]" id="tutor_course_id" multiple data-style="form-control">							
							<?php 
							    $arr_t_c=unserialize($tutors[0]['tutor_courses_id']);
							$query=$this->db->query("SELECT course_id,course_name FROM courses");
							$results=$query->result();
										  
										   foreach($results as $row)
										   {
											  if (in_array($row->course_id, $arr_t_c))
												$selected='selected';
												else
													$selected='';
											   echo '<option value="'.$row->course_id.'"  '.$selected.'>'.$row->course_name.'</option>';
										   }
							?> 
                          </select>
							</div>
                                </div>	
 
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Old Tutor Image</label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/tutor/<?php echo $tutors[0]['tutor_image']; ?>" style="width:120px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_tutor_image" value="<?php echo $tutors[0]['tutor_image']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Tutors Image</label>
                                    <div class="col-md-12">
                                        <input type="file" id="" class="form-control" name="tutor_image" value="<?php echo set_value('tutor_image'); ?>" >
										
										</div>
                                </div>
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Tutor Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="tutor_des" ><?php echo $tutors[0]['tutor_des']; ?></textarea>
										
										</div>
                                </div>
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Rating</label>
                                    <div class="col-md-12">
                                        <select  class="form-control" name="tutor_rating" >
										   <option value="1" <?php if($tutors[0]['tutor_rating']==1) echo 'selected';  ?>   >1 Star</option>
										   <option value="2" <?php if($tutors[0]['tutor_rating']==2) echo 'selected';  ?> >2 Stars</option>
										    <option value="3" <?php if($tutors[0]['tutor_rating']==3) echo 'selected';  ?> >3 Stars</option>
											 <option value="4" <?php if($tutors[0]['tutor_rating']==4) echo 'selected';  ?> >4 Stars</option>
											 <option value="5" <?php if($tutors[0]['tutor_rating']==5) echo 'selected';  ?> >5 Stars</option>
										</select>
										
										</div>
                                </div>
								
							
                               <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a href="<?php echo base_url('admin/tutors'); ?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     