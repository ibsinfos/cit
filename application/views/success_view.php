<?php include 'template/header.php';
 ?>
<!--Banner Wrap Start-->
<div class="kf_inr_banner padding_more">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Payment</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>" >Home</a></li>
              <li><a href="#" >Courses Payment</a></li>
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
    					<div class="col-md-7">
    						<div class="abt_univ_wrap">
								<!-- HEADING 1 START-->
								<div class="kf_edu2_heading1">
								  
									<h5>
									
									
									</h5>
									
								</div>
								<!-- HEADING 1 END-->

								<div class="abt_univ_des">
									<?php //echo $res_about->aboutus_des; ?>
									
									  <?php
									  //print_r($payment_data); exit;
							 if(!empty($payment_data))
							 {
								     if($payment_data['x_response_code']==1)
									 {
											 echo "<h5 style='color:green; font-weight:bold; '>Transaction has been approved.</h5>";
										   ?>
										<p><?php //echo $payment_data['x_response_reason_text']; ?></p>
										<p><b>Transaction Id :</b> <?php echo $payment_data['x_trans_id']; ?></p>
										<p><b>Amount :</b> <?php echo $payment_data['x_amount']; ?></p>	
										<p><?php echo $payment_data['exact_ctr']; ?></p>
									<?php
									 }
									 else if($payment_data['x_response_code']==2)
									 {
										echo "<p style='color:red; font-weight:bold; '>Transaction has been declined</P>";
 
									 }
								    else
									{
										echo "<p style='color:red; font-weight:bold; '>An error occurred while processing the transaction</P>";
									}
							 }
							 else{
								 echo "<p style='color:red; font-weight:bold; '>Invalid Request <br /></P><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
							 }		
								  ?>
								  	
								</div>
    						</div>
    					</div>

    					

    				</div>
                    <div class="row">
                    	<div class="col-md-12">
                        	<?php //echo $res_about->aboutus_des1; ?>

                        </div>
                    </div>
    			</div>
    		</section>
    		<!--ABOUT UNIVERSITY END-->
    	</div>
        <!--Content Wrap End-->
<?php include 'template/footer.php'; ?>
