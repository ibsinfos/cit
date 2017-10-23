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
            <?php include 'template/tutor_menu.php'?>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 studashebo">
      		<h4>Batches View</h4><hr />
      		<div class="edu2_faculty_wrap">
				<div class="row">
				<?php foreach($std_list as $row):
				   
				   $q=$this->db->query("SELECT * FROM `students_tbl` WHERE user_id=".$row->std_user_id."");
				   $st=$q->row();
				?>
                	<div class="col-md-4 col-sm-6 col-xs-12" align="center">
                    	<!-- FACULTY DES START-->
                        <div class="stututor">
                            <div class="bluimgblock"><img src="<?php echo base_url(); ?>images/dummyimg.jpg" alt="" align="center"/></div>
                            <div class="edu2_faculty_des2">
                                <h6><?php echo $st->std_username; ?></h6>
                                <strong><?php echo $st->std_city; ?></strong>
                            </div>
                        </div>
                        <!-- FACULTY DES END-->
                    </div>
					<?php endforeach; ?>
                                       
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
