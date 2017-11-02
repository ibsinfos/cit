		<!--NEWS LETTERS START-->
		<div class="edu2_ft_topbar_wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="edu2_ft_topbar_des">
							<h5>Subscribe to Our weekly newsletter</h5>
						</div>
					</div>
					<div class="col-md-6">
						<div class="edu2_ft_topbar_des">
						   <?php
						      if(isset($_POST['newsletter_email']))
							  {
								  $nl_email=$_POST['newsletter_email'];
								  $sqlrec=$this->db->query("SELECT * FROM newsletters WHERE email='$nl_email'");
								  if($sqlrec->num_rows()==1)
								  {
									echo "<script>alert('Your Already Subscribed Newsletter!')</script>";
								  }
								  else
								  {	  
									$this->db->query("INSERT INTO `newsletters`( `email`) VALUES ('$nl_email')");
									echo "<script>alert('Newsletter Subscribed Successfully')</script>";
								  }
							  }
						    ?>
							<form method="post" action="" >
								<input type="email" name="newsletter_email" required placeholder="Enter Valid Email Address">
								<button><i class="fa fa-paper-plane"></i>Submit</button>
							</form>
					  </div>
				  </div>
			  </div>
			</div>
		</div>
		<!--NEWS LETTERS END-->
		<!--FOOTER START-->
		<footer>
			<!--EDU2 FOOTER CONTANT WRAP START-->
				<div class="container">
					<div class="row">
						<!--EDU2 FOOTER CONTANT DES START-->
						<div class="col-md-3">
							<div class="widget widget-links">
								<h5>Information</h5>
								<ul>
									<li><a href="<?php echo base_url(); ?>about_us">About us</a></li>
                                                         <!--<li><a href="#">Blog</a></li>-->
									<!--<li><a href="<?php echo base_url(); ?>blog">Blog</a></li>-->
									<!--<li><a href="faqs.php">FAQ</a></li>-->
									<!--<li><a href="<?php echo base_url(); ?>latest_information">Latest Information</a></li>-->
<!--<li><a href="#">Latest Information</a></li>-->
                                    <li><a href="<?php echo base_url(); ?>home/terms_and_conditions">Terms &amp; Conditions</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/refund_policy">Refund Policy</a></li>
                                    <li><a href="<?php echo base_url(); ?>home/privacy_statement">Privacy Statement</a></li>									
								</ul>
							</div>
						</div>
						<!--EDU2 FOOTER CONTANT DES END-->

						<!--EDU2 FOOTER CONTANT DES START-->
						<div class="col-md-2">
							<div class="widget widget-links">
								<h5>Student Help</h5>
								<ul>
									<?php if($this->session->userdata('user_is_logged_in'))
										{ ?>
									<li><a href="<?php echo base_url(); ?>Student_dashboard">My Account</a></li>
									
									<?php }else{ ?>
									
									<li><a  data-target="#cs-login" href="#" data-toggle="modal">My Account</a></li>
									<?php } ?>
									<!--<li><a href="#">My Questions</a></li>-->
                                    <li><a href="<?php echo base_url(); ?>/courses/online">Search Courses</a></li>
									<li><a href="<?php echo base_url(); ?>careers">Careers</a></li>
									<li><a href="<?php echo base_url(); ?>internship">Internship</a></li>
								</ul>
							</div>
					  </div>
						<!--EDU2 FOOTER CONTANT DES END-->

						<!--EDU2 FOOTER CONTANT DES START-->
						<div class="col-md-3">
							<div class="widget">
								<h5>Follow Us</h5>
								<ul class="cont_socil_meta">
                                    <li><a href="<?php echo $res_setting->facebook; ?>" ><i class="fa fa-facebook"></i></a></li>
                                   <!-- <li><a href="<?php /*echo $res_setting->twitter; */?>" ><i class="fa fa-twitter"></i></a></li>-->
                                    <li><a href="<?php echo $res_setting->google; ?>" ><i class="fa fa-google-plus"></i></a></li>
                                  <!--  <li><a href="<?php /*echo $res_setting->linkedin; */?>" ><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="<?php /*echo $res_setting->youtube; */?>" ><i class="fa fa-youtube"></i></a></li>-->
                                </ul>
							</div>
					  </div>
						<!--EDU2 FOOTER CONTANT DES END-->

						<!--EDU2 FOOTER CONTANT DES START-->
						<div class="col-md-4">
							<div class="widget widget-contact">
								<h5>Contact</h5>
								<?php
								  $sq=$this->db->query("SELECT * FROM `contact_info` WHERE contact_info_id=1");
								  $c_ino=$sq->row();
								?>
								<ul>
									<li>
									<?php echo $c_ino->address; ?>									
									</li>
									<li><span><i class="fa fa-phone"></i></span> <a href="#"><?php echo $c_ino->phone; ?> </a></li>
									<li><span><i class="fa fa-envelope"></i> </span> <a href="#"> <?php echo $c_ino->email; ?></a><br />
									<span><i class="fa fa-envelope"></i></span> <a href="#"><?php echo $c_ino->email2; ?></a></li>
								</ul>
							</div>
					  </div>
						<!--EDU2 FOOTER CONTANT DES END-->
				  </div>
				</div>
		</footer>
		<!--FOOTER END-->
		<!--COPYRIGHTS START-->
		<div class="edu2_copyright_wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="edu2_ft_logo_wrap">
							<a href="#"><img src="<?php echo base_url(); ?>images/fot-logo.png" alt="" class="img-responsive"></a>						</div>
					</div>

					<div class="col-md-6">
						<div class="copyright_des">
							<span>&copy; All Rights reserved. chicago institute of technology, <br>Powered By <a href="http://www.digitekitinc.com" target="_blank"><img src="<?php echo base_url(); ?>images/digitek_logo.png" alt="" width="120" height="20"/></a></span>					  </div>
				  </div>

					<div class="col-md-3">
						<ul class="cards_wrap">
							<li><a href="#"><img src="<?php echo base_url(); ?>images/visacard.png" alt=""/></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>images/mastercard.png" alt=""/></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>images/americancard.png" alt=""/></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>images/card.png" alt=""/></a></li>
							<li><a href="#"><img src="<?php echo base_url(); ?>images/descoverycard.png" alt=""/></a></li>
					  </ul>
				  </div>
			  </div>
			</div>
		</div>
		<!--COPYRIGHTS START-->
    </div>  
    <!--KF KODE WRAPPER WRAP END-->
    <script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
	<!--Bootstrap core JavaScript-->
	<!--<script src="js/jquery.js"></script>-->
	<!--<script src="js/bootstrap.min.js"></script>-->
	<!--Bx-Slider JavaScript-->
	<script src="<?php echo base_url(); ?>js/jquery.bxslider.min.js"></script>
	<!--Owl Carousel JavaScript-->
	<script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>
	<!--Pretty Photo JavaScript-->
	<script src="<?php echo base_url(); ?>js/jquery.prettyPhoto.js"></script>
	<!--Full Calender JavaScript-->
	<script src="<?php echo base_url(); ?>js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>js/fullcalendar.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.downCount.js"></script>
	<!--Image Filterable JavaScript-->
	<script src="<?php echo base_url(); ?>js/jquery-filterable.js"></script>
	<!--Accordian JavaScript-->
	<script src="<?php echo base_url(); ?>js/jquery.accordion.js"></script>
	<!--Number Count (Waypoints) JavaScript-->
	<script src="<?php echo base_url(); ?>js/waypoints-min.js"></script>
	<!--v ticker-->
	<script src="<?php echo base_url(); ?>js/jquery.vticker.min.js"></script>
	<!--select menu-->
	<script src="<?php echo base_url(); ?>js/jquery.selectric.min.js"></script>
	<!--Side Menu-->
	<script src="<?php echo base_url(); ?>js/jquery.sidr.min.js"></script>
	<!--Custom JavaScript-->
	<script src="<?php echo base_url(); ?>js/custom.js"></script>
<a href="#" id="backTop"> </a>
</div>
<script>
            
			jQuery(document).ready(function($) {
                'use strict';

                //REVOLUTION SLIDE
                var revapi;
                revapi = jQuery('.tp-banner').revolution(
                        {
                            delay: 5000,
                            startwidth: 1170,
                            startheight: 500,
                            hideThumbs: 10,
                            fullWidth: "on",
                            forceFullWidth: "on",
                            navigationType: "none" // bullet, thumb, none
                        });

   
            });
			$(document).ready( function() {
                $('#backTop').backTop({
                    'position' : 1600,
                    'speed' : 500,
                    //'color' : 'red',
                });
            });
			(function($){
			$(window).on("load",function(){
				$("#content-7").mCustomScrollbar({
					scrollButtons:{enable:true},
					theme:"3d-thick"
				});
			});
		})(jQuery);
        </script>
<script src="<?php echo base_url(); ?>assets/scripts/responsive.menu.js"></script> <!-- Slick Nav js --> 
<script src="<?php echo base_url(); ?>assets/scripts/chosen.select.js"></script> <!-- Chosen js --> 
<script src="<?php echo base_url(); ?>assets/scripts/slick.js"></script> <!-- Slick Slider js --> 
<script src="<?php echo base_url(); ?>assets/scripts/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/jquery.mobile-menu.min.js"></script><!-- Side Menu js -->
<script src="<?php echo base_url(); ?>assets/scripts/functions.js"></script> 
<!--<script src="assets/scripts/counter.js"></script>
-->
<script  src="<?php echo base_url(); ?>assets/scripts/jquery.themepunch.plugins.min.js"></script><!-- revolution slider -->
<script  src="<?php echo base_url(); ?>assets/scripts/jquery.themepunch.revolution.min.js"></script><!-- revolution slider -->
<script src="<?php echo base_url(); ?>assets/scripts/jquery.backTop.min.js"></script>
<script type="text/javascript">
$('#submit').click(function() {
    var form_data = { 
		stuname: $('#cs-studentname').val(),
        username: $('#cs-username').val(),
        email: $('#cs-email').val(),		
        mobile: $('#cs-mobile').val(),
        password: $('#cs-login-password').val(),
		conpassword:$('#cs-confirm-password').val()
    };
    $.ajax({
        url: "<?php echo base_url('home/submit'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg){
            if (msg == 'YES'){
				$('#std_cs-login-form').hide();
				$('#std_modal-footer').hide();
                $('#alert-msg').html('<div class="alert alert-success text-center">Your Account created successfully! </div> <br /> <br /><br />');
			}
            else if (msg == 'NO'){
                $('#alert-msg').html('<div class="alert alert-danger text-center">Error in Account creation! Please try again later.</div>');
			}
            else{
                $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
			}
        }
    });
    return false;
});
</script>
<script type="text/javascript">
$('#btn_signin').click(function() {
    var form_data = {
        username: $('#cs-username-1').val(),        
        password: $('#cs-login-password-1').val(),
		log_page_name: $('#log_page_name').val(),
		page_course_id: $('#page_course_id').val(),
		log_page_url: $('#log_page_url').val(),

    };
	var log_success_page_url=$('#page_course_id').val();
    $.ajax({
        url: "<?php echo base_url('home/user_signin'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg){
			if (msg == 'courses'){
				//$('#std_cs-login-form').hide();
				//$('#std_modal-footer').hide();
                $('#alert-msg-signin').html('<div class="alert alert-success text-center">Logged in successfully! </div> <br /> <br /><br />');
				window.location.href =log_success_page_url;
			}
            else if (msg == 'Student_dashboard'){
				//$('#std_cs-login-form').hide();
				//$('#std_modal-footer').hide();
                $('#alert-msg-signin').html('<div class="alert alert-success text-center">Logged in successfully! </div> <br /> <br /><br />');
				window.location='<?php echo base_url(); ?>Student_dashboard';
			}
			else if (msg == 'Tutor_dashboard'){
				//$('#std_cs-login-form').hide();
				//$('#std_modal-footer').hide();
                $('#alert-msg-signin').html('<div class="alert alert-success text-center">Logged in successfully! </div> <br /> <br /><br />');
				window.location='<?php echo base_url(); ?>Tutor_dashboard';
			}
            else if (msg == 'NO'){
                $('#alert-msg-signin').html('<div class="alert alert-danger text-center">Invalid Username and Password.</div>');
			}
            else{
                $('#alert-msg-signin').html('<div class="alert alert-danger">' + msg + '</div>');
			}
        }
    });
    return false;
});
</script>

<script type="text/javascript">
$('#btn_qinquiry').click(function() {
    var form_data = {
	qi_name: $('#qi-cs-name').val(), 
	qi_page: $('#qi_page_name').val(),        
	qi_email: $('#qi-cs-email').val(),
	qi_phone: $('#qi-cs-phone').val(),        
	qi_message: $('#qi-cs-message').val(),

    };
    $.ajax({
        url: "<?php echo base_url('home/quick_inquiry'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg){
            if (msg == 'YES'){
				$('#std_cs-login-form_quickinquiry').hide();
				//$('#std_modal-footer').hide();
                $('#alert-msg-qinquiry').html('<div class="alert alert-success text-center">Your Quick Inquiry Form Submitted, We Will Contact You Soon !  </div> <br /> <br /><br />');
				//window.location.href ='student_dashboard';
			}
            else if (msg == 'NO'){
                $('#alert-msg-qinquiry').html('<div class="alert alert-danger text-center">There is error sending Qick inquiry ,Please Try again</div>');
			}
            else{
                $('#alert-msg-qinquiry').html('<div class="alert alert-danger">' + msg + '</div>');
			}
        }
    });
    return false;
});
</script>

<script type="text/javascript">
$('#btn_forgetpwd').click(function() {
    var form_data = {
        /*qi_name: $('#qi-cs-name').val(), */       
        forgotpwd_email: $('#forgotpwd-cs-email').val(),
    };
    $.ajax({
        url: "<?php echo base_url('home/forgot_pwd'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg){
            if(msg == 'YES')
			{
				/*$('#std_cs-login-form_forgotpwd').hide();
                $('#alert-msg-forgotpwd').html('<div class="alert alert-success text-center">Your Quick Inquiry Form Submitted, We Will Contact You Soon !  </div> <br /> <br /><br />');*/	
				window.location="<?php echo base_url(); ?>forgot_pwd";
			}
            else if (msg == 'NO')
			{
                $('#alert-msg-forgotpwd').html('<div class="alert alert-danger text-center">Your entered username/email not register with us</div>');
			}
			else if (msg == 'sending email fail')
			{
                $('#alert-msg-forgotpwd').html('<div class="alert alert-danger text-center">Email sending problem, Please Try Again </div>');
			}
            else
			{
                $('#alert-msg-forgotpwd').html('<div class="alert alert-danger">' + msg + '</div>');
			}
        }
    });
    return false;
});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-81469712-2', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>