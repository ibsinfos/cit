<?php include 'template/header.php'?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56c181ad5fffede2" async="async"></script>
<!--Banner Wrap Start-->
<div class="kf_inr_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Courses Details</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li><a href="#">Courses Details</a></li>
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
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <!-- COURSES DETAIL WRAP START -->
          <div class="kf_courses_detail_wrap">
            <div class="courses_detail_heading">
			    <p style="color:green;"><?php echo $this->session->flashdata('msg'); ?></p>
              <h4><?php echo $courses_details->course_name; ?></h4>
            </div>
            <ul class="course_detail_meta" style="padding:0px;">
              <li><i class="fa fa-clock-o"></i>Course Duration : <?php echo $courses_details->cb_time; ?> Hours</li>
			  <li><li><i class="fa fa-calendar"></i>Course Start  <?php echo date('M d',strtotime($courses_details->cb_start_date)); ?>,&nbsp; <?php echo date('Y',strtotime($courses_details->cb_start_date)); ?></li>
              <li>Course End <?php echo date('M d',strtotime($courses_details->cb_end_date)); ?>,&nbsp; <?php echo date('Y',strtotime($courses_details->cb_end_date)); ?>
			  </li>
            </ul>
             <!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_native_toolbox"></div>
            <?php /* ?>   
            <div class="course_detail_thumbnail">
             <!-- <figure> -->
			 <!-- <img src="<?php echo base_url(); ?>images/course/<?php echo $courses_details->cb_image; ?>" style="width:64%;" alt=""/>-->
              <!--</figure>-->
            </div><?php */ ?>
            <!-- COURSES DETAIL TABS WRAP START -->           
            <div class="kf_courses_tabs">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#coursedetails" aria-controls="coursedetails" role="tab" data-toggle="tab">Course Details</a></li>
                <li role="presentation"><a href="#coursestructure" aria-controls="coursestructure" role="tab" data-toggle="tab">Course Highlights</a></li>                
                <!--<li role="presentation"><a href="#placements" aria-controls="placements" role="tab" data-toggle="tab">Placements</a></li>-->
                <li role="presentation"><a href="#entryrequirment" aria-controls="entryrequirment" role="tab" data-toggle="tab">Send Enquiry</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="coursedetails">
                  <!-- COURSES DETAIL DES START -->
                  <div class="kf_courses_detail_des">
                    <div class="course_heading">
                      <h3>Course Details</h3>
                    </div>
					  <?php if($courses_details->cb_course_curr){ ?>
					<p><a  class="btn-3" target="_blank" href="<?php echo base_url(); ?>images/course/<?php echo $courses_details->cb_course_curr; ?>" >Download Course curriculum </a></p>
					<?php }else{ ?>
					<!--<p><a  href="#" class="btn-3" >No Download Course Curriculum </a></p>-->
					<?php } ?>
                    <?php echo $courses_details->cb_course_des; ?>
					
                  </div>
                  <!-- COURSES DETAIL DES END -->
                  <!-- STUDY TABLE WRAP END -->
                </div>
                <div role="tabpanel" class="tab-pane" id="coursestructure">
                  <!-- COURSES DETAIL DES START -->
                  <!--<div class="kf_courses_detail_des">
                    <div class="course_heading">
                      <h3>Course Highlights</h3>
                    </div>
                    <p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquet per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra erat sed fermentum feugiat velit mauris egestas quam ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
                    <p>Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra erat sed fermentum velit mauris egestas quam ut aliquam massa nisl quis neque. Suspendisse in orci enim.Etiam pharetra erat sed fermentum feugiat velit mauris egestas quam ut aliquam massa nisl quis neque</p>
                  </div>-->
                  <!-- COURSES DETAIL DES END -->
                  <!-- STUDY TABLE WRAP START -->
                  <div class="study_table_wrap">
                    <h6>Topics</h6>
                    <!--  TABLE  START -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Lesson</th>
                          <th>Aproximate Time</th>
                        </tr>
                      </thead>
                      <tbody>
					 
<?php
			$arr_lesson_name=unserialize($courses_details->lesson_name);
			$arr_lesson_time=unserialize($courses_details->lesson_time);
?>
<?php for($i=0;$i<count($arr_lesson_name);$i++){ ?>

<tr>
<td><?php echo $arr_lesson_name[$i]; ?></td>
<td><?php echo $arr_lesson_time[$i]; ?></td>
</tr>
 <?php } ?> 
                      </tbody>
                    </table>
                    <!--  TABLE  END -->
                  </div>
                  <!-- STUDY TABLE WRAP END -->
                </div>
                <div role="tabpanel" class="tab-pane" id="entryrequirment">
                  <!-- COURSES DETAIL DES START -->
                  <div class="kf_courses_detail_des">
                    <div class="course_heading">
                      <h3>Send Enquiry</h3>
                    </div>                  
                  </div>
                  <!-- COURSES DETAIL DES END -->
                  <!-- STUDY TABLE WRAP START -->
                  <div class="study_table_wrap1">
                   <div>
                   	<form method="post" action="<?php echo base_url(); ?>courses/course_inquiry/<?php echo $this->uri->segment(3); ?>" >
                                    <div class="contact_des">
                                        <div class="inputs_des des_2">
                                            <input type="text" name="cd_name" required placeholder="Name"><i class="fa fa-user"></i>
                                        </div>
    
                                        <div class="inputs_des des_2">
                                            <input type="text" name="cd_email" required placeholder="E-mail">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                        <div class="inputs_des des_2">
                                            <input type="text" name="cd_phone" required placeholder="Phone">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="inputs_des des_3">
                                            <textarea name="cd_des" required ></textarea>
                                            <i class="fa fa-comments-o"></i>
                                        </div>
                                        <div class="inputs_des des_2">
                                            <button type="submit">Send</button>
                                        </div>
                                    </div>
                           </form>
                   </div>
                   
                  </div>
                  <!-- STUDY TABLE WRAP END -->
                </div>
              </div>
            </div><br />
            <div class="row">            	
                <div class="col-md-10 col-sm-8">
                	   <!-- Go to www.addthis.com/dashboard to customize your tools -->
						<!--<div class="addthis_native_toolbox"></div>-->
                </div>
                <div class="col-md-2 col-sm-4 bookmark"><a id="bookmarkme" href="#" rel="sidebar" title="bookmark this page" class="apply"><i class="fa fa-bookmark"></i> Bookmark</a></div>
            </div>           
            <!-- COURSES DETAIL TABS WRAP END -->
          </div>
          <!-- COURSES DETAIL WRAP END -->
        </div>
        <!--KF_EDU_SIDEBAR_WRAP START-->
        <div class="col-md-4">
          <div class="kf-sidebar">
            <!--KF_SIDEBAR_SEARCH_WRAP START-->
            <div class="sidebar_register_wrap"> 
<?php
if(!$this->session->userdata('user_student_is_logged_in'))
{
	echo '<a class="apply" data-target="#cs-login" href="#" data-toggle="modal">Apply Now</a>';
}
else
{
	echo '<a class="apply"  href="'.base_url().'courses/payment_gateway/'.$courses_details->batch_id.'" >Apply Now</a>';
}
?>
			
              <ul class="sidebar_register_des" style="border-bottom:1px solid #e0e0e0; padding-bottom:20px; margin-bottom:10px;">
                <li>Price : 
<?php if(!$this->session->userdata('cit_country')){ ?>
<span class="green">$<?php echo $courses_details->cb_price; ?></span>
<?php }else if(ucfirst($this->session->userdata('cit_country'))=='India'){ ?>
<span class="green">Rs.<?php echo $courses_details->cb_price_rs; ?></span>
<?php }else{ ?>
<span class="green">$<?php echo $courses_details->cb_price; ?></span>
<?php } ?>
</li>
                <li>Total Approximate Hours : <?php echo $courses_details->cb_time; ?></li>
                <li>Total Duration : <?php echo $courses_details->cb_duration; ?> Days</li> 
               <li>Course Type: <?php
			   $arr_coursetype=unserialize($courses_details->cb_course_type); 
			   if(!empty($arr_coursetype))
			   { 
		           if(count($arr_coursetype)==2)
				   {  
		             for($i=0;$i<count($arr_coursetype);$i++)
				    {
					  if($arr_coursetype[$i]=='online')
                        echo 'Online, ' ;
                       					
				    }
                for($i=0;$i<count($arr_coursetype);$i++)
				    {
					  if($arr_coursetype[$i]=='oncampus')
                        echo 'On Campus ' ;
                       					
				    }
				   }
			       else
				    {
						if($arr_coursetype[0]=='online')
                          echo 'Online ' ;
					     if($arr_coursetype[0]=='oncampus')
                        echo 'On Campus' ;
					   
				    }				   
			      
			   } ?></li>				
                <li>Category : <?php echo $courses_details->cat_name; ?></li>
				<?php /* ?>
                <li> <span>Rating :</span>
                  <div class="rating">
				<?php if($courses_details->cb_rating==5){ ?>  
				<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
				<?php } ?>
				<?php if($courses_details->cb_rating==4){ ?>  
				<span>☆</span><span>☆</span><span>☆</span><span>☆</span>
				<?php } ?>
				<?php if($courses_details->cb_rating==3){ ?>  
				<span>☆</span><span>☆</span><span>☆</span>
				<?php } ?>
				<?php if($courses_details->cb_rating==2){ ?>  
				<span>☆</span><span>☆</span>
				<?php } ?>
				<?php if($courses_details->cb_rating==1){ ?>  
				<span>☆</span>
				<?php } ?>
				  
				  </div>
                 </li>
				  <?php */ ?>
              </ul>  
<?php  
$day_tt=json_decode($courses_details->cb_day_table);
?>			  
              <h5 style="padding-bottom:10px;">Course Timings</h5>
              <table class="table table-bordered ctimings"> 
       <?php if(in_array('Sunday',$day_tt->batch_days)){ ?>              
                <tr>
                  <td>Sun</td>
                  <td><?php echo $day_tt->day_time_open1; ?> – <?php echo $day_tt->day_time_close1; ?></td>
                </tr>
	   <?php } ?>
	    <?php if(in_array('Monday',$day_tt->batch_days)){ ?>              
                <tr>
                  <td>Mon</td>
                  <td><?php echo $day_tt->day_time_open2; ?> – <?php echo $day_tt->day_time_close2; ?></td>
                </tr>
	   <?php } ?>
	    <?php if(in_array('Tuesday',$day_tt->batch_days)){ ?>              
                <tr>
                  <td>Tue</td>
                  <td><?php echo $day_tt->day_time_open3; ?> – <?php echo $day_tt->day_time_close3; ?></td>
                </tr>
	   <?php } ?>
               
	<?php if(in_array('Wednesday',$day_tt->batch_days)){ ?>              
                <tr>
                  <td>Wed</td>
                  <td><?php echo $day_tt->day_time_open4; ?> – <?php echo $day_tt->day_time_close4; ?></td>
                </tr>
	   <?php } ?>
         <?php if(in_array('Thursday',$day_tt->batch_days)){ ?>              
                <tr>
                  <td>Thu</td>
                  <td><?php echo $day_tt->day_time_open5; ?> – <?php echo $day_tt->day_time_close5; ?></td>
                </tr>
	   <?php } ?>
                 <?php if(in_array('Friday',$day_tt->batch_days)){ ?>              
                <tr>
                  <td>Fri</td>
                  <td><?php echo $day_tt->day_time_open6; ?> – <?php echo $day_tt->day_time_close6; ?></td>
                </tr>
	   <?php } ?>
           <?php if(in_array('Saturday',$day_tt->batch_days)){ ?>              
                <tr>
                  <td>Sat</td>
                  <td><?php echo $day_tt->day_time_open7; ?> – <?php echo $day_tt->day_time_close7; ?></td>
                </tr>
	   <?php } ?>
                
         </table>
            </div>
            <!--KF_SIDEBAR_SEARCH_WRAP END-->
            <!--KF_SIDEBAR_ARCHIVE_WRAP START-->
            <?php /*?><div class="widget teacher_outer_wrap">
              <h2>Tutor</h2>
			   <?php $tt_img=$courses_details->tutor_image!='' ? $courses_details->tutor_image:'no_tutor.jpg'; ?>
              <div class="teacher_wrap">
                <figure><img src="<?php echo base_url(); ?>images/tutor/<?php echo $tt_img; ?>" alt=""/></figure>
                <div class="teacher_des">
                  <h4><?php echo $courses_details->tutor_name; ?></h4>
                  <!--<small>English</small>--> 
				  </div>
                <p><?php echo $courses_details->tutor_des; ?></p>
                <ul class="teacher_meta">
                </ul>
              </div>
            </div><?php */?>
            <!--KF_SIDEBAR_ARCHIVE_WRAP END-->           
            <!--KF SIDEBAR RECENT POST WRAP START-->
            <div class="widget widget-recent-posts">
              <h2>Other Courses</h2>
<?php foreach($latest_courses as $rowlc){					
$lc_img=$rowlc->cb_image!='' ? $rowlc->cb_image:'no_img.png';
?>			  
 <div class="edu2_cur_wrap couseser">
  <div class="edu2_cur_des">
    <h5><a href="<?php echo base_url(); ?>courses/details/<?php echo $rowlc->batch_id; ?>" ><?php echo $rowlc->course_name; ?></a></h5>
    <strong> <span> <?php echo date('M d',strtotime($rowlc->cb_start_date)); ?>,&nbsp; <?php echo date('Y',strtotime($rowlc->cb_start_date)); ?> <?php echo date('M d',strtotime($rowlc->cb_end_date)); ?>,&nbsp; <?php echo date('Y',strtotime($rowlc->cb_end_date)); ?> </span> </strong>
    <div class="cretype">
	
<?php
$arr_couurse_type=unserialize($rowlc->cb_course_type);
if(!empty($arr_couurse_type))
{ 
 for($i=0;$i<count($arr_couurse_type);$i++)
 {																	 
	if($arr_couurse_type[$i]=='oncampus')
		{  
?>
<b class="label-success">ON CAMPUS</b>
   <?php }
 }   
   ?>
<?php
   for($i=0;$i<count($arr_couurse_type);$i++)
	 {
		if($arr_couurse_type[$i]=='online')
			{  ?>																   
	<b class="label-info">ONLINE</b> 
	<?php 	} 
		 } 
}		 
?>
	</div>
  </div>
  <div class="edu2_cur_des_ft">
    <div class="edu2_cur_ftr_strip">
	<span>
	<?php if(!$this->session->userdata('cit_country')){ ?>
$<?php echo $rowlc->cb_price; ?>
<?php }else if(ucfirst($this->session->userdata('cit_country'))=='India'){ ?>
Rs.<?php echo $rowlc->cb_price_rs; ?>
<?php }else{ ?>
$<?php echo $rowlc->cb_price; ?>
<?php } ?></span> </div>
  </div>
</div>
<?php } ?>
              <?php /*?><ul class="sidebar_rpost_des">
				<?php foreach($latest_courses as $rowlc){
					
					 $lc_img=$rowlc->cb_image!='' ? $rowlc->cb_image:'no_img.png';
					?>
                <li>
				   
                  <figure> <img src="<?php echo base_url(); ?>images/course/<?php echo $lc_img; ?>" width="100" height="80" alt="">
                    <figcaption><a href="#"><i class="fa fa-search-plus"></i></a></figcaption>
                  </figure>
                  <div class="kode-text">
                    <h6><a href="<?php echo base_url(); ?>courses/details/<?php echo $rowlc->batch_id; ?>"><?php echo $rowlc->course_name; ?></a></h6>
                    <h6><a href="#">Time : <?php echo $rowlc->cb_time; ?> Hours</a></h6>
                    <span><a href="<?php echo base_url(); ?>courses/details/<?php echo $rowlc->batch_id; ?>"><i class="fa fa-angle-double-right"></i> Read More</a></span> </div>
                </li>
				<?php } ?>
              </ul><?php */?>
            </div>
            <!--KF SIDEBAR RECENT POST WRAP END-->
            <!--KF EDU SIDEBAR COURSES CATEGORieS WRAP START-->
            <!--<div class="widget widget-categories">
              <h2>categories</h2>
              <ul>
                <li><a href=""><i class="fa fa-caret-right"></i>Business &amp; Economics</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>Politics &amp; History</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>Medical Sciences &amp; Health</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>Fine Arts</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>Tourism &amp; Culture</a></li>
                <li><a href=""><i class="fa fa-caret-right"></i>Sports</a></li>
              </ul>
            </div>-->
            <!--KF EDU SIDEBAR COURSES CATEGORieS WRAP END-->
            <!--KF SIDE BAR COURSES LIST WRAP START WRAP START-->
            <!--<div class="widget widget-courses-list">
              <h2>Latest Courses</h2>
              <ul>
                <li>
                  <figure> <img src="images/courseslist1.jpg" alt=""/> <a href="#">View Detail</a> </figure>
                </li>
                <li>
                  <figure> <img src="images/courseslist2.jpg" alt=""/> <a href="#">View Detail</a> </figure>
                </li>
                <li>
                  <figure> <img src="images/courseslist3.jpg" alt=""/> <a href="#">View Detail</a> </figure>
                </li>
                <li>
                  <figure> <img src="images/courseslist4.jpg" alt=""/> <a href="#">View Detail</a> </figure>
                </li>
                <li>
                  <figure> <img src="images/courseslist5.jpg" alt=""/> <a href="#">View Detail</a> </figure>
                </li>
                <li>
                  <figure> <img src="images/courseslist6.jpg" alt=""/> <a href="#">View Detail</a> </figure>
                </li>
              </ul>
            </div>-->
            <!--KF SIDE BAR COURSES LIST WRAP START WRAP END-->           
          </div>
        </div>
        <!--KF EDU SIDEBAR WRAP END-->
      </div>
    </div>
  </section>
</div>
<!--Content Wrap End-->
<!--<script src="js/bootstrap.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function() {
  $("#bookmarkme").click(function() {
    if (window.sidebar) { // Mozilla Firefox Bookmark
      window.sidebar.addPanel(location.href,document.title,"");
    } else if(window.external) { // IE Favorite
      window.external.AddFavorite(location.href,document.title); }
    else if(window.opera && window.print) { // Opera Hotlist
      this.title=document.title;
      return true;
    }
  });
});
</script>
<?php include 'template/footer.php'?>
