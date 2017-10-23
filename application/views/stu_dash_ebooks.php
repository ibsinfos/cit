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
              <li><a href="#">eBooks</a></li>
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
      <div class="col-md-9 col-sm-12 col-xs-12 studashebo">
      		<h4>eBooks</h4><hr /><br />
      		<div class="row">
            	<div class="col-md-8 col-md-offset-2 well col-sm-12 col-xs-12">
                	<div class="row">
					  <form method="post" action="<?php echo base_url(); ?>student_dashboard/search_ebooks" >
                        <div class="col-md-9">
                            <div class="input-group hunper">
                                <select class="form-control hunper" name="course_id">
                                	<option>Select Your Course</option>
									<?php /*$results=$this->Students_model->get_course_list();
									 foreach($results as $row):
									?>
                                    <option value="<?php echo $row->course_id; ?>" ><?php echo $row->course_name; ?></option>
									<?php endforeach;*/ ?>
									<?php foreach($course_drp as $rowr):
									   echo '<option value="'.$rowr->course_id.'" >'.$rowr->course_name.'</option>';
									     endforeach;
									?>
                                                                      
                                </select>                         
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                        	<button class="btn btn-darkred btn-lg hunper" type="submit" >Proceed <i class="fa fa-arrow-circle-right"></i> </button>
                        </div>
						</form>
						<!-- stu_dash_ebooks_view.php -->
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
<?php include 'template/footer.php'?>
