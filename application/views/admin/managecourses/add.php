<link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Assign Courses</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Assign Courses</li>
                     </ol>
                  </div>
                  
</div>

      <?php
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'added')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> Created Successfully';
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
<p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/managecourses/<?php echo $this->input->get('id'); ?>" class="btn btn-success btn-rounded" >Back</a></p>
<h3 class="box-title m-b-0">Assign  Courses </h3> <br />

 

<?php
								$attributes = array('class' => 'form-horizontal', 'id' => '');
								echo validation_errors();
								echo form_open_multipart('admin/managecourses/add', $attributes);
?>
							
								
								 <div class="form-group">
                                    <label class="col-md-12">Course Country</label>
                                    <div class="col-md-12">
									
                                        <select  class="form-control" id="course_country" name="course_country" value="<?php echo set_value('course_country'); ?>" >
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
                                    <label class="col-md-12">Course Type</label>
                                    <div class="col-md-12">
									 <select  class="form-control" name="course_type" id="course_type"  >
										   <option value="oncampus" >ON CAMPUS</option>
										   <option value="online" >ONLINE</option>		   
										</select>
                                       
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Courses</label>
                                    <div class="col-md-12">                                  
										<select  class="form-control" name="course_id" onchange="fun_course_cat(this.value)" >
										<option value="" >Select Course</option>
										<?php 
										  $query=$this->db->query("SELECT course_id,course_name FROM courses");
										  $results=$query->result();										  
										   foreach($results as $rowc)
										   {
											   echo '<option value="'.$rowc->course_id.'">'.$rowc->course_name.'</option>';
										   }
										 ?>									    
										</select>
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Course Batch</label>
                                    <div class="col-md-12" id="divcourse_id" >                                  
										<select  class="form-control" name="batch_id" onchange="fun_course_cat1(this.value)" >
										<?php 
										/*
										  $query=$this->db->query("SELECT batch_id,cb_batchname FROM course_batches");
										  $results=$query->result();										  
										   foreach($results as $rowb)
										   {
											   echo '<option value="'.$rowb->batch_id.'">'.$rowb->cb_batchname.'</option>';
										   }*/
										 ?>									    
										</select>
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course Amount</label>
                                    <div class="col-md-12">
                                        <input type="text" required class="form-control" id="course_amount" name="course_amount" value="<?php echo set_value('course_amount'); ?>" >
										
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Course expired date</label>
                                    <div class="col-md-12">
                                        <input type="text"  id="exp_date"  class="form-control complex-colorpicker" name="exp_date" value="" >
										
										</div>
                                </div>
								
						<input type="hidden" name="std_id" value="<?php echo $this->input->get('id'); ?>" />
								
							
                            		
								
								
								
								                                
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <!--<button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>-->
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>

<script>
function fun_course_cat(str)
{ 
    var cotype=document.getElementById("course_type").value;
	var countryid=document.getElementById("course_country").value;
	
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
				xmlhttp.open("GET", "<?php echo base_url('admin/admin_managecourses/get_course_batch'); ?>?q="+str+"&ctype="+cotype+"&cid="+countryid, true);
				xmlhttp.send();
    }
}
function fun_course_cat1(str)
{ 
    
    if (str.length == 0)
	{ 
        document.getElementById("course_amount").value = '';
		document.getElementById("exp_date").value ='';
        return;
    }
	else{
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				      var bstring=this.responseText;  
				     var strArray = bstring.split(",");
					document.getElementById("course_amount").value = strArray[0];
					document.getElementById("exp_date").value =strArray[1];
				}
				};
				xmlhttp.open("GET", "<?php echo base_url('admin/admin_managecourses/get_course_batch1'); ?>?q="+str, true);
				xmlhttp.send();
    }
}
</script>

 
	
     