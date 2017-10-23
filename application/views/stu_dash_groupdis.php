<?php include 'template/dash_header.php'?>
<link href="<?php echo base_url(); ?>css/sidemenu.css" type="text/css" rel="stylesheet"/>
<!--Banner Wrap Start-->
<div class="kf_inr_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Student Dashboard</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>Student_dashboard">Dashboard</a></li>
              <li><a href="#">Group Discussion</a></li>
            </ul>
          </div>
        </div>
        <!--KF INR BANNER DES Wrap End-->
      </div>
    </div>
  </div>
</div>
<!--Banner Wrap End-->
<!--Content Wrap Start-->
<div class="kf_content_wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="side-menu">
          <!-- Main Menu -->
          <div class="side-menu-container">
            <?php include 'template/stdash_menu.php'?>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 studashebo">
      		<h4>Group Discussion</h4><hr /><br />
			<p style="color:red; " ><?php echo $this->session->flashdata('msg_st'); ?></p>
      		<div class="row">
            	<div class="col-md-8 col-md-offset-2 well col-sm-9 col-xs-12">
                	<div class="row">
					<form method="post" action="<?php echo base_url(); ?>student_dashboard/group_discussion_view" >
                        <div class="col-md-9">
                            <div class="input-group hunper">
                                <select class="form-control hunper" name="course_id" id="course_id" onchange="fun_course_cat(this.value)" required >
                                	<option value="" >Select Your Course</option>
									<?php
									/*$course_drp=$this->Students_model->get_course_list();
									foreach($course_drp as $row):
									echo '<option value="'.$row->course_id.'" >'.$row->course_name.'</option>';
									endforeach;*/
								  ?>
								  <?php foreach($course_drp as $rowr):
									   echo '<option value="'.$rowr->course_id.'" >'.$rowr->course_name.'</option>';
									     endforeach;
									?>
                                                                      
                                </select>                         
                            </div>
							
                        </div>
						<br /> <br /> <br />
						
						 <div class="col-md-9">
                            <div class="input-group hunper" id="divcourse_id" >
                                <select class="form-control hunper" name="batch_id" id="batch_id" required >
                                	<option value="" >Select Your Batch</option>
                                                                     
                                </select>                         
                            </div>
							
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                        	<button class="btn btn-darkred btn-lg hunper" type="submit" ><i class="fa fa-arrow-circle-right "></i> GO</button>
                        </div>
						</form>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End

<br />
-->
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
				xmlhttp.open("GET", "<?php echo base_url('Student_dashboard/get_course_batch'); ?>?q="+str, true);
				xmlhttp.send();
    }
}
</script>
<?php include 'template/footer.php'?>
