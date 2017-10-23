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
                        <div class="notibox">
                        <h6>Notification Title</h6>
                        <p class="redbrown">14-08-16</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
                        </div>					                         
                        <div class="notibox">
                        <h6>Notification Title</h6>
                        <p class="redbrown">14-08-16</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
                        </div>	
                        <div class="notibox">
                        <h6>Notification Title</h6>
                        <p class="redbrown">14-08-16</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
                        </div>	
                        <div class="notibox">
                        <h6>Notification Title</h6>
                        <p class="redbrown">14-08-16</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
                        </div>	
                        <a href="#" class="btn btn-primary btn-sm pull-right"><i class="fa fa-eye"></i> View Old Notifications</a><br /><br /><br />
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 qkst">
                <h4>Quick Statistics</h4><hr />
                <div align="center">
                <img src="images/dummyimg.jpg" alt="" class="img-responsive" width="150" height="100px"/><figcaption class="text-center"><strong>Subbu, CEO</strong></figcaption>
                </div>
                <div align="center"><a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Change Profile Picture</a></div><br /> 
                <p><i class="fa fa-clock-o"></i> Last Login : 12-8-2016, 07:48PM</p>
                <p><span>Registred Students</span> : 20</p>
                <p><span>Ongoing Batches</span> : 5</p>
                <p><span>Completed Batches</span> : 10</p>
                <p><span>Batches On Hold</span> : 2</p>                
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
