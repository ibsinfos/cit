
<div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Student notifications</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Student notifications</li>
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
<h3 class="box-title m-b-0">Add Student notifications </h3> <br />

<?php
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo validation_errors();
echo form_open_multipart('admin/admin_student_notifications1/add', $attributes);
?>
								
								<div class="form-group">
                                    <label class="col-md-12">Select Courese </label>
                                    <div class="col-md-12">
										<select  class="form-control" name="course_id" onchange="fun_course_cat(this.value)" required >
										<option value="" >Select Courese</option>
										<?php 
										  $query=$this->db->query("SELECT course_id,course_name FROM courses");
										  $results=$query->result();
										  
										   foreach($results as $row)
										   {
											   echo '<option value="'.$row->course_id.'">'.$row->course_name.'</option>';
										   }
										 ?>										    
										</select>
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Select Batch </label>
                                    <div class="col-md-12" id="divcourse_id" >
                                   
										<select  class="form-control" name="batch_id" required >
										 <option value="" >Select Batch</option>
										<?php 
										/*
										  $query=$this->db->query("SELECT course_id,course_name FROM courses");
										  $results=$query->result();
										  
										   foreach($results as $row)
										   {
											   echo '<option value="'.$row->course_id.'">'.$row->course_name.'</option>';
										   }
										   */
										 ?>										    
										</select>
										
										
										
										</div>
                                </div>
                             
							 
							 <div class="form-group">
                                    <label class="col-md-12">Select Student</label>
                                    <div class="col-md-12" id="divstd_id" >
                                   
										
										</div>
                                </div>
								 <!--<div class="col-md-12">
									
                                       <input type="checkbox" name="course_type[]" value="oncampus"> ON CAMPUS
										<input type="checkbox" name="course_type[]" value="online"> ONLINE 
										<input type="checkbox" name="course_type[]" value="oncampus"> ON CAMPUS 
										<input type="checkbox" name="course_type[]" value="online"> ONLINE 
										
										 <input type="checkbox" name="course_type[]" value="oncampus"> ON CAMPUS
										<input type="checkbox" name="course_type[]" value="online"> ONLINE 
										<input type="checkbox" name="course_type[]" value="oncampus"> ON CAMPUS 
										<input type="checkbox" name="course_type[]" value="online"> ONLINE 
										
										 <input type="checkbox" name="course_type[]" value="oncampus"> ON CAMPUS
										<input type="checkbox" name="course_type[]" value="online"> ONLINE 
										<input type="checkbox" name="course_type[]" value="oncampus"> ON CAMPUS 
										
										<input type="checkbox" name="course_type[]" value="online"> ONLINE 
										
										 <input type="checkbox" name="course_type[]" value="oncampus"> ON CAMPUS
										<input type="checkbox" name="course_type[]" value="online"> ONLINE 
										<input type="checkbox" name="course_type[]" value="oncampus"> ON CAMPUS 
										<input type="checkbox" name="course_type[]" value="online"> ONLINE 
										
								</div>-->
								
								 <div class="form-group">
                                    <label class="col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="title" value="<?php echo set_value('title'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"> Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="sn_des" ><?php echo set_value('sn_des'); ?></textarea>
										
										</div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12">Date</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" name="sn_date" value="<?php echo set_value('sn_date'); ?>" >
										
										</div>
                                </div>
								
									
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


<script>
function fun_course_cat(str)
{ 
    if (str.length == 0)
	{ 
        document.getElementById("divcourse_id").innerHTML = "";
        return;
    }
	else{
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("divcourse_id").innerHTML = this.responseText;
				}
				};
				xmlhttp.open("GET", "<?php echo base_url('admin/admin_student_notifications1/get_course_batch'); ?>?q="+str, true);
				xmlhttp.send();
    }
}
function fun_get_student_list(str)
{ 
    if (str.length == 0)
	{ 
        document.getElementById("divstd_id").innerHTML = "";
        return;
    }
	else{
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("divstd_id").innerHTML = this.responseText;
				}
				};
				xmlhttp.open("GET", "<?php echo base_url('admin/admin_student_notifications1/get_course_batch_students'); ?>?q="+str, true);
				xmlhttp.send();
    }
}

</script>
        
	
     