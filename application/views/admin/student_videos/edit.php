
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update student videos</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update student videos</li>
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

echo form_open_multipart('admin/student_videos/update/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                                <div class="form-group">
                                    <label class="col-md-12">Video Title</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="title" value="<?php echo $student_videos[0]['sv_title']; ?>" >
										
										</div>
                                </div>
								
							
								
								<div class="form-group">
                                    <label class="col-md-12">Select Courese </label>
                                    <div class="col-md-12">
                                   
										<select  class="form-control" name="course_id" onchange="fun_course_cat(this.value)" >
										<?php 
										  $query=$this->db->query("SELECT course_id,course_name FROM courses");
										  $results=$query->result();							  
										   foreach($results as $row)
										   {
											   $select_cat=($student_videos[0]['sv_course_id']==$row->course_id ? 'selected':'');
											   echo '<option value="'.$row->course_id.'" '.$select_cat.'   >'.$row->course_name.'</option>';
										   }
										 ?>										    
										</select>
										</div>
                                </div>

								<div class="form-group">
                                    <label class="col-md-12">Select Batch </label>
                                    <div class="col-md-12" id="divcourse_id" >
                                   
										<select  class="form-control" name="batch_id"  >
										<?php 
										  $query=$this->db->query("SELECT batch_id,cb_batchname FROM course_batches WHERE cb_course_id='".$student_videos[0]['sv_course_id']."'");
										  $results=$query->result();							  
										   foreach($results as $row)
										   {
											   $select_cat=($student_videos[0]['sv_batch_id']==$row->batch_id ? 'selected':'');
											   echo '<option value="'.$row->batch_id.'" '.$select_cat.'   >'.$row->cb_batchname.'</option>';
										   }
										 ?>										    
										</select>
										</div>
                                </div>
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Old video Image</label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/video/<?php echo $student_videos[0]['sv_image']; ?>" style="width:120px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_sv_image" value="<?php echo $student_videos[0]['sv_image']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Video Image</label>
                                    <div class="col-md-12">
                                        <input type="file" id="" class="form-control" name="sv_image" value="<?php echo set_value('sv_image'); ?>" >
										
										</div>
                                </div>
							
								
								<div class="form-group">
                                    <label class="col-md-12">Youtube Link</label>
                                    <div class="col-md-12">
                                        <input type="text"  class="form-control"  name="youtube_link" value="<?php echo $student_videos[0]['sv_link']; ?>" >
										
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
				xmlhttp.open("GET", "<?php echo base_url('admin/Admin_student_videos/get_course_batch'); ?>?q="+str, true);
				xmlhttp.send();
    }
}
</script>
	
	
	
     
     