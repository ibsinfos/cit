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
              <li><a href="#">Dashboard</a></li>
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
      		<h4>Quiz /Exam</h4><hr />
      		<div class="edu2_faculty_wrap">
			<?php foreach($quiz_final as $row): ?>
				<div class="row">
                	<div class="col-md-4 col-sm-6 col-xs-12" align="center">
                    	<!-- FACULTY DES START-->
                        <div class="stututor">
                            <div class="bluimgblock"><img src="<?php echo base_url(); ?>images/dummyimg.jpg" alt="" align="center"/></div>
                            <div class="edu2_faculty_des2">
                                <h6><?php echo $row->std_username; ?></h6>
                                <strong><?php echo $row->std_city; ?></strong>
                            </div>
                        </div>
                        <!-- FACULTY DES END-->
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-12">
                    	<h4>Written Date : <?php echo $row->ex_date; ?></h4><br>
                        <a href="<?php echo base_url(); ?>quiz/<?php echo $row->ex_file; ?>" class="btn btn-primary"><i class="fa fa-download"></i> Download Answer Sheet</a><br><br>
                        <h6>Exam Total Marks : (100)</h6><br>                        
                        <a href="<?php echo base_url(); ?>Tutor_dashboard/marksgain_exam_marks/<?php echo $row->ex_id; ?>" class="btn btn-primary">Marksgain</a>
                        <a href="<?php echo base_url(); ?>Tutor_dashboard/update_exam_marks/<?php echo $row->ex_id; ?>" class="btn btn-success">Update</a>
                    </div>          
                </div>	<hr>
				<?php endforeach; ?>
               		
		    </div>
          
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<?php include 'template/footer.php'; ?>
