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
              <li><a href="<?php echo base_url(); ?>/Student_dashboard">Dashboard</a></li>
              <li><a href="#">Upload Your Answer Sheet</a></li>
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
            <?php include 'template/stdash_menu.php'; ?>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 dashcontentpad">
      <div class="row">
			<div class="col-md-9 col-sm-9">
            <h4>Upload Your Quiz</h4>
			<?php echo $this->session->flashdata('message') ?>
            </div>
            <div class="col-md-3 col-sm-3">
            <div class="edu2_serc_des">
            <a class="hvr-wobble-vertical btn btn-primary btn-md pull-right" href="<?php echo base_url(); ?>student_dashboard/quiz" style="border-radius:0px;"><i class="fa fa-angle-left"></i> Back</a>
        </div>
            </div>
        </div>
        <hr style="margin-top:0px;"/>
            <div class="blog_pg_form">
			
				<?php if(validation_errors() || isset($error)) : ?>
				<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?php if(!empty($error)) print_r($error); ?>
				</div>
				<?php endif; ?>
                <form method="post" action="<?php echo base_url(); ?>Student_dashboard/quiz_upload_answer_sheet/<?php echo $this->uri->segment(3); ?>" enctype="multipart/form-data" >
                    <div class="row">   
                       <?php /* ?> 
						<div class="col-md-12 col-sm-12"  style="display:block;">
                         
                             <select  class="form-control" name="course_id" id="course_id" onchange="fun_course_cat(this.value)" required >
                                	<option>Select Your Course</option>
									<?php
									$course_drp=$this->Tutors_model->get_course_list();
									foreach($course_drp as $row):
									echo '<option value="'.$row->course_id.'" >'.$row->course_name.'</option>';
									endforeach;
								  ?>
                                                                     
                                </select>   
                        </div>
						
						
						<div class="col-md-12 col-sm-12"  style="display:block;" >
                        
                             <div id="divcourse_id" >
							 <select  class="form-control"  name="batch_id" id="batch_id" required >
                                	<option value="" >Select Your Batch</option>                                                                   
                                </select>  
							</div>							
                        </div><?php */ ?>

      					
                        <!--<div class="col-md-12 col-sm-12" style="display:block;">
                         <p><strong>Quiz Name</strong></p>
                            <input type="text" placeholder="Name" name="quiz_name" required >
                        </div>-->                                           
                        <div class="col-md-12 col-sm-12" style="display:block;">
                         <p><strong>Upload Answer File(File Type Should Only PDF,doc,docx AND Max Size: 2MB) </strong></p>
                            <input type="file" name="quiz_file" id="quiz_file" required    >
							<input type="hidden"  name="quiz_name" value="1" />
							<input type="hidden"  name="qz_id" value="<?php echo $quiz_dt->qz_id; ?>" >
							<input type="hidden"  name="qz_course_id" value="<?php echo $quiz_dt->qz_course_id; ?>" >
							<input type="hidden"  name="qz_batch_id" value="<?php echo $quiz_dt->qz_batch_id; ?>" >
							
                        </div>
                    </div>
					<br /> 
                    <button>Submit</button>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->

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
