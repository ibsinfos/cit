<?php include 'template/header.php'?>
<!--Banner Wrap Start-->
<div class="kf_inr_banner padding_more">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Testimonials</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li><a href="<?php echo base_url(); ?>/testimonials">Testimonials</a></li>
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
    			<div class="container testiblock">
<?php
				 $i=1;
				foreach($res_testimonials as $row)
				{
					  if($i%2==0 && $i>0)
					   $img_class='pull-right';
					 else
						 $img_class='pull-left';	
					?>
    				<div class="row">
    					<div class="col-md-12"><img src="<?php echo base_url(); ?>images/testimonial/<?php echo $row->testimonial_image; ?>" alt="" class="<?php echo $img_class; ?>"/>
                        <p>"<?php echo strip_tags($row->testimonial_des); ?>"</p>
<p><strong><?php echo $row->name; ?>, <span><?php echo $row->designation; ?></span></strong></p>
                        </div>                       
    				</div>
					<hr />
<?php $i++;
				}
?>		
                   
    			</div>
    		</section>
    		<!--ABOUT UNIVERSITY END-->
    	</div>
        <!--Content Wrap End-->
<?php include 'template/footer.php'?>
