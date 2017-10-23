<?php include 'template/header.php'?>
<style>
.error{color:red; }
</style>
<!--Banner Wrap Start-->
<!--<div class="kf_inr_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Contact Us</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>-->
</div>
<!--Banner Wrap End-->
<!--Content Wrap Start-->
    	<div class="kf_content_wrap" style="padding-top:0px;">
    		<div class="kf_location_wrap1">
				<?php /*?><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47559.09335213224!2d-87.6330465600775!3d41.840283521450324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf1dc3da60817c367!2sChicago+Institute+of+Technology!5e0!3m2!1sen!2sin!4v1477375384282" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe><?php */?>
                <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d190075.2766806911!2d-88.0012104516763!3d41.8944442567883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1eb01d57bfee3956!2sChicago+Institute+of+Technology!5e0!3m2!1sen!2sin!4v1481709139101" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>-->
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2967.046024564331!2d-88.07461568511617!3d41.95634646849387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880fac69b8817909%3A0xaeed3d9b688e9b0f!2s109+Fairfield+Way+%23303%2C+Bloomingdale%2C+IL+60108!5e0!3m2!1sen!2sin!4v1489128818528" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    		</div>
    		<section>
    			<div class="container">
    				<div class="row">
    					<div class="contct_wrap">
    						<form method="post" action="<?php echo base_url(); ?>contact_us" >
		    					<div class="col-md-8 col-sm-12">
		    						<div class="contact_heading">
		    							<h4>Send A Message</h4>
										<p style="color:green;font-weight:bold; " ><?php echo $this->session->flashdata('msg'); ?></p>
										<p style="color:red;font-weight:bold; " ><?php echo $this->session->flashdata('errormsg'); ?></p>
										
		    						</div>
		    						<div class="contact_des">
                                    	<div class="row">
                                        	<div class="col-md-12 col-sm-12 col-xs-12">
                                            	<div class="form-group">
                                                	<div class="input-group">
                                                	<div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                    <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>"  placeholder="Name"/>
													
                                                </div>
												<?php echo form_error('name','<div class="error" >','</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div class="form-group">
                                                	<div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                        <input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" class="form-control" placeholder="Phone/Mobile"/>
														
                                                    </div>
													<?php echo form_error('name','<div class="error" >','</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div class="form-group">
                                                     <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                        <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email Address"/>
														
                                                    </div>
													<?php echo form_error('email','<div class="error" >','</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12 col-sm-12 col-xs-12">
                                            	<div class="form-group">
                                                	<div class="input-group">
                                                	<div class="input-group-addon"><i class="fa fa-tag"></i></div>
                                                    <input type="text" name="subject" value="<?php echo set_value('subject'); ?>" class="form-control" placeholder="Subject"/>
													
                                                </div>
												<?php echo form_error('subject','<div class="error" >','</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12 col-sm-12 col-xs-12">
                                            	<div class="form-group">
                                                	<textarea name="c_message" placeholder="Comments" class="form-control" rows="4"><?php echo set_value('c_message'); ?></textarea>
													
                                                </div>
												<?php echo form_error('c_message','<div class="error" >','</div>'); ?>
                                            </div>
                                        </div>
										
										 <div class="row">
                                        	<div class="col-md-3 col-xs-12">
                                            	<div class="form-group">
                                                	<button type="submit"  name="submit_btn" value="submit" >Submit</button>
                                                </div>
                                            </div>
                                        </div>
										
                                    </div>
		    					</div>

		    					<div class="col-md-4 col-sm-12">
		    						<div class="contact_heading">
		    							<h4>Contact info</h4>
								<?php
								  $sq=$this->db->query("SELECT * FROM `contact_info` WHERE contact_info_id=1");
								  $crow=$sq->row();
								?>
		    						</div>
		    						<ul class="contact_meta plml">
									
										<li><?php echo $crow->address; ?>
										
										</li>
										<li><i class="fa fa-phone"></i><a href="#"><?php echo $crow->phone; ?></a></li>
										<li><i class="fa fa-envelope-o"></i><a href="#"><?php echo $crow->email; ?></a></li>
                                   		<li><i class="fa fa-envelope-o"></i><a href="#"><?php echo $crow->email2; ?></a></li>
									</ul>
									<div class="contact_heading social">
		    							<h4>Follow Us</h4>
		    						</div>
		    						<ul class="cont_socil_meta plml">
										<!--<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>-->
									<li><a href="<?php echo $res_setting->facebook; ?>" ><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php echo $res_setting->twitter; ?>" ><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?php echo $res_setting->google; ?>" ><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="<?php echo $res_setting->linkedin; ?>" ><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="<?php echo $res_setting->youtube; ?>" ><i class="fa fa-youtube"></i></a></li>										
									</ul>
		    					</div>
		    				</form>
	    				</div>
    				</div>
    			</div>
    		</section>
    	</div>
        <!--Content Wrap End-->
<?php include 'template/footer.php'?>
