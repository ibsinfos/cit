<?php include 'template/header.php';?>
<!--Banner Wrap Start-->
<div class="kf_inr_banner padding_more">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Password Recovery</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>" >Home</a></li>
              <li><a href="#" >Password Recovery</a></li>
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
	<form method="post" action="<?php echo base_url(); ?>Forgot_pwd/recovery" >
          <div class="details col-md-6">            
              <div class="form-group name">
                <label for="name">Password</label>
                <input id="name" type="password" name="fpwd"  class="form-control" >
				<?php echo form_error('fpwd','<div class="error" >','</div>'); ?>
              </div>          
              <div class="form-group name">
                <label for="name">Confirm Password</label>
                <input id="name" type="password" name="fcpwd"  class="form-control" >
				<?php echo form_error('fcpwd','<div class="error" >','</div>'); ?>
              </div> 
            <div class="form-group name"><br />
                <button type="submit" class="btn btn-primary col-md-6">Update</button>
              </div>
          </div>
          
		  </form>

    				</div>
                   
    			</div>
    		</section>
    		<!--ABOUT UNIVERSITY END-->
    	</div>
        <!--Content Wrap End-->
<?php include 'template/footer.php'; ?>
