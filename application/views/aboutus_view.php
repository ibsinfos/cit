<?php include 'template/header.php'; ?>
<!--Banner Wrap Start-->
<div class="kf_inr_banner padding_more">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>About Us</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li><a href="<?php echo base_url(); ?>about_us" >About Us</a></li>
            </ul>
          </div>
        </div>
        <!--KF INR BANNER DES Wrap End-->
      </div>
    </div>
  </div>
</div>
</div>
<!--Banner Wrap End-->
<!--Content Wrap Start-->
    	<div class="kf_content_wrap">
    				
    		<!--ABOUT UNIVERSITY START-->
    		<section>
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12">
    						<div class="abt_univ_wrap">
							<div class="kf_edu2_heading1">
									<h5><?php echo $res_about->title; ?></h5>
									<h3><?php echo $res_about->title1; ?></h3>
								</div>
							<!-- HEADING 1 START-->
								
								<!-- HEADING 1 END-->
								<div class="abt_univ_des">
                                <img src="<?php echo base_url(); ?>images/<?php echo $res_about->aboutus_image; ?>" alt="" class="img-responsive pull-right col-md-4 col-sm-12"/>
									
                          <?php echo $res_about->aboutus_des; ?>
                            <!--<hr>
                          <div align="center" class="qk-form">
                          	<h4><?php echo $res_about->title1; ?></h4>
                         	<p  style="text-align:center; " > <?php echo $res_about->title2; ?></p>
                    <a class="btn btn-darkred" data-target="#cs-inquiry" href="#" data-toggle="modal">QUICK INQUIRY</a>
                          </div>-->
								</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</section>
    		<!--ABOUT UNIVERSITY END-->
    	</div>
        <!--Content Wrap End-->
<?php include 'template/footer.php'?>
