<?php include 'template/header.php';?>
<!--Banner Wrap Start-->
<div class="kf_inr_banner padding_more">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Forgot Password </h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>" >Home</a></li>
              <li><a href="#" >Forgot Password</a></li>
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
			  <p><b>Email Verification code sent to Register Email .</b></p>
			 <br />  <br /> 
			   <div class="details col-md-6">
				<?php echo $this->session->flashdata('msg'); ?>
				<form method="post" action="<?php echo base_url(); ?>forgot_pwd" >
				
				<div class="form-group name">
                <label for="name">Enter email code</label>
				
				<input type="text" name="pwd_code"  id="pwd_code" class="form-control"   />
				
				 </div> 
				  
				
				<div class="input-holder">
				<input class="cs-color csborder-color" type="submit" id="btn_forgetpwd"  value="Send">
				</div>
				
				</form>
                   <br />  <br /> 
    			</div>		

    				</div>
                   
    			</div>
    		</section>
    		<!--ABOUT UNIVERSITY END-->
    	</div>
        <!--Content Wrap End-->
<?php include 'template/footer.php'; ?>
