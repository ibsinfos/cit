<?php include 'template/dash_header.php'?>
<link href="<?php echo base_url(); ?>css/sidemenu.css" type="text/css" rel="stylesheet"/>
<!--Banner Wrap Start-->
<div class="kf_inr_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Student Dashboard</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Question &amp; Answers</a></li>
            </ul>
          </div>
        </div>
        <!--KF INR BANNER DES Wrap End-->
      </div>
    </div>
  </div>
</div>
<!--Banner Wrap End-->
<!--Content Wrap Start-->
<div class="kf_content_wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="side-menu">
          <!-- Main Menu -->
          <div class="side-menu-container">
            <?php include 'template/stdash_menu.php'?>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="section-comment">
        <div class="row">
			<div class="col-md-9 col-sm-9">
                <div class="blog-detl_heading">
				<?php if($this->input->get('mt')==1) echo "<b style='color:green'>Posted Successfully ,Admin will approval</b>"; ?>
                <h5><?php echo $ques->qs_title; ?> ?</h5>
              </div>
            </div>
            <div class="col-md-3 col-sm-3">
            <div class="edu2_serc_des">
            <a class="hvr-wobble-vertical btn btn-primary btn-md pull-right" href="<?php echo base_url(); ?>student_dashboard/group_discussion_view1/<?php echo $this->session->userdata('gd_course_id'); ?>/<?php echo $this->session->userdata('gd_batch_id'); ?>"><i class="fa fa-angle-left"></i> Back</a>
        </div>
            </div>
        </div>
          <hr style="margin-top:0px;"/>
          <!-- COMMENT LIST START-->
          <ul class="coment_list">
		 <?php
       
		  foreach($answer_all as $row):
		  
		     if($row->as_usertype=='student')
			 {	 
			$qs=$this->db->query("SELECT * FROM `students_tbl` WHERE user_id='".$row->as_userid."'");
			$stdrow=$qs->row();
		  ?>
            <li>
              <!-- COMMENT WRAP START-->
              <div class="comment_wrap">
              <div class="col-md-2">
                <figure><img src="<?php echo base_url(); ?>images/dummyimg.jpg" width="100"  alt=""/></figure>
              </div>  
              <div class="col-md-10">
                <div class="comment_des">
                  <div class="comment_des_hed"> <cite><a href="#"><?php echo $stdrow->std_username; ?></a><span><?php echo $row->as_date; ?></span></cite></div>
                  <p><?php echo $row->as_des; ?></p>
                </div>
              </div>
              </div>
              <!-- COMMENT WRAP END-->
            </li>
			 <?php
			 }
			 else
			 { 
		 ?>
			<?php
			
			$qs1=$this->db->query("SELECT * FROM `tutors` WHERE user_id='".$row->as_userid."'");
			$stdrow=$qs1->row();
			
		  ?>
            <li>
              <!-- COMMENT WRAP START-->
              <div class="comment_wrap">
              <div class="col-md-2">
                <figure><img src="<?php echo base_url(); ?>images/dummyimg.jpg" width="100"  alt=""/></figure>
              </div>  
              <div class="col-md-10">
                <div class="comment_des">
                  <div class="comment_des_hed"> <cite><a href="#"><?php if(!empty($stdrow->tutor_username)) echo $stdrow->tutor_username; ?></a><span><?php echo $row->as_date; ?></span></cite></div>
                  <p><?php echo $row->as_des; ?></p>
                </div>
              </div>
              </div>
              <!-- COMMENT WRAP END-->
            </li>
			 <?php } ?>
		<?php endforeach; ?>
		
		
	
    
            
          </ul>
          <!-- COMMENT LIST END-->
          <!-- BLOG PG FORM START-->
	    						<div class="blog_pg_form">
	    							<div class="blog-detl_heading">
	    								<h5>Give Answer</h5>
							
	    							</div>
	    							<form method="post" action="<?php echo base_url(); ?>Student_dashboard/gd_answer_post/<?php echo $this->uri->segment(3); ?>" >
	    								<div class="row">	    									
	    									<div class="col-md-12">
	    										<textarea placeholder="Type Here" required  name="qs_des" ></textarea>
	    									</div>
	    								</div>
	    								<button>Send Answer</button>
	    							</form>
	    						</div>
	    						<!-- BLOG PG FORM END-->
        </div>
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<?php include 'template/footer.php'; ?>
