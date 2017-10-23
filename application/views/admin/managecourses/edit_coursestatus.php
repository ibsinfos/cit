<link href="<?php echo base_url(); ?>admin-template/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update course status</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update course status</li>
                     </ol>
                  </div>
                  
</div>
      
<div class="row">
<div class="col-sm-12">
<div class="white-box">

<p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/managecourses/<?php echo $managecourses[0]['std_user_id']; ?>" class="btn btn-success btn-rounded" >Back</a></p>
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
echo form_open_multipart('admin/admin_managecourses/edit_coursestatus/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                               
								
							<div class="form-group">
                                    <label class="col-md-12">Courese Status</label>
                                    <div class="col-md-12">
<select  class="form-control" name="course_status" id="course_status"  >
<option value="registered" <?php  echo $selected=('registered'==$managecourses[0]['co_coursestatus']) ? 'selected':'';  ?> >registered</option>
<option value="ongoing" <?php  echo $selected=('ongoing'==$managecourses[0]['co_coursestatus']) ? 'selected':'';  ?> >ongoing</option>
<option value="completed" <?php  echo $selected=('completed'==$managecourses[0]['co_coursestatus']) ? 'selected':'';  ?> >completed</option>
<option value="cancelled" <?php  echo $selected=('cancelled'==$managecourses[0]['co_coursestatus']) ? 'selected':'';  ?> >cancelled</option>			
</select>
                                       
										
										</div>
                                </div>
								<input type="hidden" name="std_user_id" value="<?php echo $managecourses[0]['std_user_id']; ?>" />	
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
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

	
	
	
     
     