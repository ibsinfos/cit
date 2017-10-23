<?php include 'template/header.php'?>
<!--Banner Wrap Start-->
<div class="kf_inr_banner padding_more">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Privacy Statement</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>" >Home</a></li>
              <li><a href="<?php echo base_url(); ?>/home/privacy_statement" ><?php echo $res_privacy_statement->page_heading; ?></a></li>
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
								<div class="abt_univ_des refnd">
                               		<?php echo $res_privacy_statement->page_des; ?>
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
