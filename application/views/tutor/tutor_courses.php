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
            <h3>Tutor Dashboard</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>/tutor_dashboard">Dashboard</a></li>
              <li><a href="#">Courses</a></li>
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
      		<h4>Courses</h4><hr /><br />
      		<div class="row bookformat">
			<?php foreach($course_list as $row): ?>
            	<div class="col-md-4 col-sm-6 col-xs-12" align="center">
                	<div class="sing_ebook">
                    	<!--<a href="#"><img src="<?php echo base_url(); ?>images/course/<?php echo $row->course_image; ?>" alt="" class="img-responsive"/></a>-->
                        <div class="ebblue"><strong><?php echo $row->course_name; ?></strong></div> 
                        <div class="tutebgrey">
                        	<span>Completed Batches </span>: <?php echo $this->Tutors_model->get_tutor_course_completed($row->course_id); ?><br />
							<span>On going </span>: <?php echo $this->Tutors_model->get_tutor_course_ongoing($row->course_id); ?><br />
                            <!--<span>Hold </span>: 0-->
                        </div>
                        <div class="ebblue"><strong>Total Students :</strong> <?php echo $this->Tutors_model->get_total_students_course($row->course_id); ?> </div>                        
                    </div>
                </div>
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
