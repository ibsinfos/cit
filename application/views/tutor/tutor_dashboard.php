<?php include 'template/dash_header.php'; ?>
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
              <li><a href="#">My Account</a></li>
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
      <div class="col-md-9 col-sm-12 col-xs-12">
      		<div class="row">
            	<div class="col-md-8 stdash">
                	<h4>Welcome <?php echo $this->session->userdata('usr_username'); ?></h4><hr />                
                    <div id="content-7" class="content">                        
                        <h5>Notifications</h5><br /> 
						<?php foreach($notifications as $rown): ?>	
                        <div class="notibox">
						
                        <h6><?php echo $rown->tn_title; ?></h6>
                        <p class="redbrown"><?php echo $rown->tn_date; ?></p>
                      <?php echo $rown->tn_des; ?>
                        </div>	
                        <?php endforeach; ?>						
                        
                       <?php if($old_n=='no'){ ?>						
                        <a href="<?php echo base_url(); ?>tutor_dashboard/notifications_old" class="btn btn-primary btn-sm pull-right"><i class="fa fa-eye"></i> View Old Notifications</a>
					   <?php } ?>
						<br /><br /><br />
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 qkst">
                <h4>Quick Statistics</h4><hr />
                <div align="center">
               <?php if(!empty($res_std->tutor_image)){ ?>
				<img src="<?php echo base_url(); ?>images/tutor/<?php echo $res_std->tutor_image;  ?>" alt="" class="img-responsive"/>
                
				<?php }else{ ?>
				<img src="<?php echo base_url(); ?>images/dummyimg.jpg" alt="" class="img-responsive"/>
				<?php } ?>
				<figcaption class="text-center"><strong><?php echo $this->session->userdata('usr_username'); ?></strong></figcaption>
                </div>
                <div align="center"><a href="<?php echo base_url(); ?>tutor_dashboard/profile" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Change Profile Picture</a></div><br /> 
                <p><i class="fa fa-clock-o"></i> Last Login : <?php if($this->session->userdata('usr_date_time')=='') echo 'No Date';else echo $this->session->userdata('usr_date_time'); ?></p>
                <p><span>Registred Students</span> : <?php echo $this->Tutors_model->get_total_students_all(); ?></p>
                <p><span>Ongoing Batches</span> : <?php echo $this->Tutors_model->get_total_ongoing_batches(); ?></p>
                <p><span>Completed Batches</span> : <?php echo $this->Tutors_model->get_total_complated_batches(); ?></p>
                <!--<p><span>Batches On Hold</span> : 2</p>-->                
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
<?php include 'template/footer.php';?>
