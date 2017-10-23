<?php include 'template/header.php'?>
<!--Content Wrap Start-->
    	<div class="kf_content_wrap">
    				
    		<!--ABOUT UNIVERSITY START-->
    		<section>
    			<div class="container">
    				<div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                        	<div class="panel panel-default">
							<?php
							  $qq=$this->db->query("SELECT * FROM `cartcms` WHERE `cartcms_id`=1");
							  $cart_cms=$qq->row();
							?>
                              <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $cart_cms->title1; ?></h3>
                              </div>
                              <div class="panel-body">
                                <?php echo $cart_cms->title2; ?>
                                <ul class="payspelist">
                                    <li><?php echo $cart_cms->title3; ?></li>
                                    <li><?php echo $cart_cms->title4; ?></li>
                                    <li><?php echo $cart_cms->title5; ?></li>
                                    <li><?php echo $cart_cms->title6; ?></li>
                                    <li><?php echo $cart_cms->title7; ?></li>
                                </ul> 
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $cart_cms->title8; ?></h3>
                              </div>
                              <div class="panel-body" align="center">
                                	<span class="usflag"><?php echo $cart_cms->title9; ?></span>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                        	<div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title">Order Summary </h3>
                              </div>
                              <div class="panel-body ttp">
                                	<div class="row">
                                    	<div class="col-md-9 col-sm-8 col-xs-12 cpdetails">
                                        	<!--<span class="pull-left tpimg"><img src="<?php echo base_url(); ?>images/course/<?php echo $courses_details->cb_image; ?>" alt="" width="110" height="82"/></span>-->
                                        	<h5><?php echo $courses_details->course_name; ?> </h5>
                                            <p>Class Starts on <?php echo date('M d',strtotime($courses_details->cb_start_date)); ?></p>
                                            <!--<p>  <?php //echo $courses_details->cb_week_days; ?> <?php //echo $courses_details->cb_day_time; ?>(IST) </p>-->
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12 tprice">
                                            <span>Price :</span>
										<?php if(!$this->session->userdata('cit_country')){ ?>
										$<?php echo $courses_details->cb_price; ?><br />
										<?php }else if(ucfirst($this->session->userdata('cit_country'))=='India'){ ?>
										Rs.<?php echo $courses_details->cb_price_rs; ?><br />
										<?php }else{ ?>
										$<?php echo $courses_details->cb_price; ?><br />
										<?php } ?>				
                                            <!--<span>Discount  (0 %) :</span><b>-$0.00</b><br />--><hr />
                                            <span>Net price :</span><?php if(!$this->session->userdata('cit_country')){ ?>
										$<?php echo $courses_details->cb_price; ?>
										<?php }else if(ucfirst($this->session->userdata('cit_country'))=='India'){ ?>
										Rs.<?php echo $courses_details->cb_price_rs; ?>
										<?php }else{ ?>
										$<?php echo $courses_details->cb_price; ?>
										<?php } ?>
                                        </div>
                                    </div><hr />
                                    <div class="row">
                                    	<div class="col-md-6 col-sm-6 col-xs-6 text-success">Total Saving:  $0.00</div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">Service Tax/SBT (15 %) : $0.00</div>
                                    </div><hr/>
                                    <div class="row">
                                    	<div class="col-md-12 col-sm-12 col-xs-12 text-right">
											<strong>Total : <?php if(!$this->session->userdata('cit_country')){ ?>
										$<?php echo $courses_details->cb_price; ?>
										<?php }else if(ucfirst($this->session->userdata('cit_country'))=='India'){ ?>
										Rs.<?php echo $courses_details->cb_price_rs; ?>
										<?php }else{ ?>
										$<?php echo $courses_details->cb_price; ?>
										<?php } ?></strong>
                                        </div>
                                    </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title">Credit card / Debit card</h3>
                              </div>
                              <div class="panel-body secur">
                              		<div class="row">
                                    	<div class="col-md-8 col-sm-6 col-xs-12">
                                        	<ul class="cards_wrap">
                                            <li><a href="#"><img src="<?php echo base_url(); ?>images/visacard.png" alt=""/></a></li>
                                            <li><a href="#"><img src="<?php echo base_url(); ?>images/mastercard.png" alt=""/></a></li>
                                            <li><a href="#"><img src="<?php echo base_url(); ?>images/americancard.png" alt=""/></a></li>
                                            <li><a href="#"><img src="<?php echo base_url(); ?>images/card.png" alt=""/></a></li>
                                            <li><a href="#"><img src="<?php echo base_url(); ?>images/descoverycard.png" alt=""/></a></li>
                                            <li><a href="#"><img src="<?php echo base_url(); ?>images/netbanking.png" alt=""/></a></li>
                                          </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
										<form method="post" action="<?php echo base_url(); ?>courses/secure_payment_gateway" id="payfrm" name="payfrm" >
										    <input name="x_amount" value="<?php echo $courses_details->cb_price; ?>" type="hidden"  />
											 <input name="secure_btn" value="<?php echo mt_rand(); ?>" type="hidden"  />
											
												<!--<i class="fa fa-lock"></i><input type="submit" value="Pay Securely" class="apply"  />-->
                                        	<a href="#" onclick="document.getElementById('payfrm').submit();" class="apply"><i class="fa fa-lock"></i> Pay Securely</a>
										</form>
                                        </div>
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
