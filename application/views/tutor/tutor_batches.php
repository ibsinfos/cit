<?php include 'template/dash_header.php'?>
<link href="<?php echo base_url(); ?>css/sidemenu.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.mCustomScrollbar.css">
<!--Banner Wrap Start-->
<div class="kf_inr_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Tutor Dashboard</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>tutor_dashboard">Dashboard</a></li>
              <li><a href="#">Batches</a></li>
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
            <?php include 'template/tutor_menu.php'; ?>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 studashebo">
      		<h4>Batches</h4><hr /><br />
      		<div class="row" style="min-height:500px;">
            	<div class="col-md-8 col-md-offset-2 well col-sm-12 col-xs-12">
                	<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
							<form method="post"  action="<?php echo base_url(); ?>tutor_dashboard/search_batch_students"   >
                            <div class="input-group hunper">
                                <select class="form-control hunper" name="course_id" id="course_id" onchange="fun_course_cat(this.value)"  >
                                	<option value="" >Select Course</option>
								  <?php
									$course_drp=$this->Tutors_model->get_course_list();
									foreach($course_drp as $row):
									echo '<option value="'.$row->course_id.'" >'.$row->course_name.'</option>';
									endforeach;
								  ?>                                  
                                </select>                         
                            </div><br />
                            <div class="input-group hunper">
                                <select class="form-control hunper" name="type" >
                                	<option value='' >Select Batch Type</option>
                                    <option value='completed' >Completed</option>
                                    <option value='ongoing'>Ongoing</option>
                                    <option value='hold' >Hold</option>                                     
                                </select>                         
                            </div>
                            <br />
							
					<div class="input-group hunper"  id="divcourse_id"  >
                          <select class="form-control hunper" name="batch_id" id="batch_id" required >
                              <option value="" >Select Your Batch</option>
                                                                     
                          </select>                         
                            
                        </div>
						<?php /* ?>
                            <div class="input-group hunper">
                                <select class="form-control hunper" name="batch_id">
                                	<option value="" >Select Batch</option>
                                    <?php
									$course_drp=$this->Tutors_model->get_course_batch_list();
									foreach($course_drp as $row):
									echo '<option value="'.$row->batch_id.'" >'.$row->cb_batchname.'</option>';
									endforeach;
								  ?>                      
                                </select>                         
                            </div><?php */ ?>
                             <br />
                            <div class="input-group hunper">
                                  <button class="btn btn-darkred btn-lg pull-right" type="submit" >GO <i class="fa fa-chevron-right"></i> </button>                  
                            </div>
					</form>
                        </div>                        
                    </div>
                </div>
            </div>
          
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<script>
		(function($){
			$(window).on("load",function(){
				$("#content-7").mCustomScrollbar({
					scrollButtons:{enable:true},
					theme:"3d-thick"
				});
			});
		})(jQuery);
	</script>
	<script >
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
				xmlhttp.open("GET", "<?php echo base_url('tutor_dashboard/get_course_batch'); ?>?q="+str, true);
				xmlhttp.send();
    }
}
</script>
<?php include 'template/footer.php'; ?>
