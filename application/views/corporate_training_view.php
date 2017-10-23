<?php include 'template/header.php'; ?>
<!--Banner Wrap Start-->
<div class="kf_inr_banner padding_more">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Corporate Training</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li><a href="<?php echo base_url(); ?>" >Corporate Training</a></li>
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
								<div class="abt_univ_des">
                                <img src="images/<?php echo $res_corporate->corporate_services_image; ?>" alt="" class="img-responsive pull-left col-md-4 col-sm-12"/>
									
                           <?php echo $res_corporate->corporate_services_des; ?>
                            <hr>
                          <div align="center" class="qk-form">
                          	<h4><?php echo $res_corporate->title1; ?></h4>
                         	<p  style="text-align:center; " > <?php echo $res_corporate->title2; ?></p>
                    <a class="btn btn-darkred" data-target="#cs-inquiry" href="#" data-toggle="modal">QUICK INQUIRY</a>
                          </div>
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
