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
            <h3>Student Dashboard</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>Student_dashboard">Dashboard</a></li>
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
            <?php include 'template/stdash_menu.php'?>
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
<?php 
		   $user_id=$this->session->userdata('user_id_sess');
		    $query=$this->db->query("SELECT * FROM student_notifications1 WHERE FIND_IN_SET($user_id,sg_str)");
			$notifications1=$query->result();
		   foreach($notifications1 as $rown): ?>	
                        <div class="notibox">
						
                        <h6><?php echo $rown->sg_title; ?></h6>
                        <p class="redbrown"><?php echo $rown->sg_date; ?></p>
                      <?php echo $rown->sg_des; ?>
                        </div>	
                        <?php endforeach; ?>
                     
                        <?php foreach($notifications as $rown): ?>	
                        <div class="notibox">
						
                        <h6><?php echo $rown->sn_title; ?></h6>
                        <p class="redbrown"><?php echo $rown->sn_date; ?></p>
                      <?php echo $rown->sn_des; ?>
                        </div>	
                        <?php endforeach; ?>						
                        
                       <?php if($old_n=='no'){ ?>						
                        <a href="<?php echo base_url(); ?>student_dashboard/notifications_old" class="btn btn-primary btn-sm pull-right"><i class="fa fa-eye"></i> View Old Notifications</a>
					   <?php } ?>
						
						<br /><br /><br />
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 qkst" align="center">
                <h4>Quick Statistics</h4><hr /> 
                <p><i class="fa fa-clock-o"></i> Last Login : <?php if($this->session->userdata('usr_date_time')=='') echo 'No Date';else echo $this->session->userdata('usr_date_time'); ?></p>
                <p><i class="fa fa-cube"></i> Active Courses : 0</p>
				<?php if(!empty($res_std->std_image)){ ?>
				<img src="<?php echo base_url(); ?>images/profile/<?php echo $res_std->std_image;  ?>" alt="" class="img-responsive"/>
                
				<?php }else{ ?>
				<img src="<?php echo base_url(); ?>images/dummyimg.jpg" alt="" class="img-responsive"/>
				<?php } ?>
				<figcaption class="text-center"><strong><?php echo $this->session->userdata('usr_username'); ?></strong></figcaption>
                <div align="center"><a href="<?php echo base_url(); ?>student_dashboard/profile" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Change Profile Picture</a></div>
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
<?php include 'template/footer.php'?>
