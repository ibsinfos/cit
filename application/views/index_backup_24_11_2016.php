<?php //include 'template/header.php'; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.mCustomScrollbar.css">
    <div class="tp-wrapper no-bottom-margin">
            <!-- .tp-banner-container start -->
            <div class="tp-banner-container">
                <div class="tp-banner">
                    <ul>
                        <!-- slide 2 start -->
						<?php foreach($res_banners as $banners){ ?>
                        <li data-transition="fade" data-slotamount="15" data-masterspeed="1500">
                            <!-- main image -->
                            <img src="<?php echo base_url(); ?>images/banner/<?php echo $banners->banner_image; ?>" alt="slidebg3" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat" />

                            <!-- layer 1 -->
                            <div class="tp-caption background lft"
                                 data-x="70"
                                 data-y="140"
                                 data-speed="600"
                                 data-start="1000"
                                 data-easing="Back.easeOut"
                                 data-endspeed="300"><?php echo $banners->title; ?>                            
								 </div>
                            
                            <div class="tp-caption background paragraph lfb"
                                 data-x="70"
                                 data-y="220"
                                 data-speed="600"
                                 data-start="2000"
                                 data-easing="Back.easeOut"
                                 data-endspeed="500"><?php echo strip_tags($banners->banner_des); ?>
								 </div>
                        </li>
						<?php } ?>
                        
                    </ul>
                </div><!-- .tp-banner end -->
            </div><!-- .tp-banner end -->
        </div>
	<!-- Banner End --> 
	<!-- Main Start -->
	<div class="kf_content_wrap">
			<!--COURSE OUTER WRAP START-->
			<div class="kf_course_outerwrap">
				<div class="container">

					<div class="row">

						<div class="col-md-8">
							<div class="row">
								<!--COURSE CATEGORIES WRAP START-->
								<div class="kf_cur_catg_wrap">
									<!--COURSE CATEGORIES WRAP HEADING START-->
									<div class="col-md-12">
										<div class="kf_edu2_heading1">
											<h3><?php echo $res_homeimages->title; ?></h3>
										</div>
									</div>
									<!--COURSE CATEGORIES WRAP HEADING END-->
                                     
									 <?php echo $res_homeimages->homeimage_des; ?>
									<!--COURSE CATEGORIES DES START-->
									<?php /*foreach($res_homecat as $rowc){ ?>
									<div class="col-md-6">
										<div class="kf_cur_catg_des color-1">
											<span><i class="<?php echo $rowc->cat_fa; ?>"></i></span>
											<div class="kf_cur_catg_capstion">
												<h5><?php echo $rowc->name; ?></h5>
												<p><?php echo $rowc->cat_des; ?></p>
											</div>
										</div>
									</div>
									<?php }*/ ?>	
									
									<!--COURSE CATEGORIES DES END-->
								</div>
								<!--COURSE CATEGORIES WRAP END-->
							</div>
						</div>

						<div class="col-md-4">
							<!-- EDU2 SEARCH WRAP START -->
							<div class="kf_edu2_search_wrap">
								<div class="kf_edu2_heading1">
									<h3>Course Inquiry</h3>
									<p style="color:green;"><?php echo $this->session->flashdata('msg'); ?></p>
									<p style="color:red;font-weight:bold; "><?php echo $this->session->flashdata('errormsg'); ?></p>
								</div>
								<!-- FORM START -->
								<style>
								 .error{color:red;}
								</style>
								<form method="post" action="<?php echo base_url(); ?>home/course_inquiry" >
									<div class="edu2_serc_des">
										<input type="text" name="ci_name" value="<?php echo set_value('ci_name'); ?>" placeholder="Name">
										<?php echo form_error('ci_name','<div class="error" >','</div>'); ?>
									</div>
									<div class="edu2_serc_des">
										<input type="text" name="ci_email" value="<?php echo set_value('ci_email'); ?>" placeholder="Email">
										<?php echo form_error('ci_email','<div class="error" >','</div>'); ?>
									</div>
                                    <div class="edu2_serc_des">
										<input type="text" name="ci_mobile" value="<?php echo set_value('ci_mobile'); ?>" placeholder="Mobile">
										<?php echo form_error('ci_mobile','<div class="error" >','</div>'); ?>
									</div>

									<!-- EDU2 DROP DOWN DES START -->
									<div class="edu2_serc_des">
										<select name="ci_cat" >
                                            <option value="">Course Interested</option>
                                            <option value="Business Courses" <?php if($ci_cat=='Business Courses') echo 'selected'; ?> >Business Courses</option>
                                            <option value="Technology Courses" <?php if($ci_cat=='Technology Courses') echo 'selected'; ?> >Technology Courses</option>
                                            <option value="Creative Courses" <?php if($ci_cat=='Creative Courses') echo 'selected'; ?> >Creative Courses</option>
                                            <option value="Online Marketing Courses" <?php if($ci_cat=='Online Marketing Courses') echo 'selected'; ?> >Online Marketing Courses</option>
                                            <option value="Network Courses" <?php if($ci_cat=='Network Courses') echo 'selected'; ?> >Network Courses</option>
                                            <option value="Fast Track Courses" <?php if($ci_cat=='Fast Track Courses') echo 'selected'; ?> >Fast Track Courses</option>
                                        </select>
										<?php echo form_error('ci_cat','<div class="error" >','</div>'); ?>
									</div>
									<!-- EDU2 DROP DOWN DES END -->
									<div class="edu2_serc_des">
										<textarea rows="5" name="ci_des" class="form-control"><?php
										
											echo $c_message;
										
											//echo form_error('ci_des','<div class="error" >','</div>');
										
									?></textarea>
					
									</div>
                                    <div class="row">
									  <?php 
									     $ci_rand=(mt_rand(1,9));
										$ci_rand2=(mt_rand(1,9));
										$ci_rd_sm=$ci_rand+$ci_rand2;
										$this->session->set_userdata('ci_captcha',$ci_rd_sm);
									   ?>
                                    	<div class="col-md-4 col-sm-4 cthnumber"><?php echo $ci_rand; ?>+<?php echo $ci_rand2; ?> =</div>
                                        <div class="col-md-8 col-sm-8"> 
                                            <div class="edu2_serc_des">
                                                <input type="text" name="ci_captcha" value="" placeholder="Enter Value">
												<?php echo form_error('ci_captcha','<div class="error" >','</div>'); ?>
                                            </div>
                                    	</div>
                                    </div>
									<button>SUBMIT</button>
								</form>
								<!-- FORM END -->
						  </div>
							<!-- EDU2 SEARCH WRAP END -->
					  </div>
				  </div>
				</div>
			</div>
			<!--COURSE OUTER WRAP END-->
			<!--KF INTRO WRAP START-->
			<?php /* ?>
			<section class="kf_edu2_intro_wrap">
				<div class="kf_intro_des_wrap">
					<!-- HEADING 2 START-->
					<div class="col-md-12 stdash">
						<div class="kf_edu2_heading2">
							<h3><?php echo $res_homeimages->title; ?></h3>
						</div>
					</div>
					
					<div id="content-7" class="content">
                    <?php echo $res_homeimages->homeimage_des; ?>
                    </div>

			  </div>
			</section>
			<?php */ ?>
			<!--KF INTRO WRAP END-->

			<!--KF COURSES CATEGORIES WRAP START-->
			<?php /* ?>
			<section class="padtwenty">
				<div class="container">
					<div class="row">
						<!-- HEADING 1 START-->
						<div class="col-md-4">
							<div class="kf_edu2_heading1">
								<h3>Our Courses</h3>
							</div>
						</div>
						<!-- HEADING 1 END-->

						<!--EDU2 COURSES TAB WRAP START-->
						<div class="col-md-8">
							<div class="kf_edu2_tab_wrap">
								<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All</a></li>
									<?php 
									  $cat_sql=$this->db->query("SELECT course_id,course_name FROM courses");
									  $res_cat=$cat_sql->result();
									  foreach($res_cat as $rowcat):
									 ?>
									<li role="presentation"><a href="#<?php echo $rowcat-> ?>" aria-controls="accounting" role="tab" data-toggle="tab">JAVA</a></li>
									<?php endforeach; ?>
									
									
								</ul>
							</div>
					  </div>
						<div class="kf_edu2_tab_des">
							<div class="col-md-12">
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="all">
										<!-- 1 Tab START  -->
										<div class="row margin-bottom">
                                            <!-- EDU COURSES WRAP START -->	
											<?php
												$sql_lt=$this->db->query("SELECT
												* FROM
												course_batches,courses,tutors,course_categories,countries 
												WHERE

												course_batches.cb_course_id=courses.course_id
												AND
												course_batches.cb_tutor_id=tutors.tutor_id
												AND
												course_batches.cb_cat_id=course_categories.cat_id
												AND
												course_batches.cb_country=countries.country_id 
												AND
												(course_batches.cb_course_type='oncampus' OR course_batches.cb_course_type='online')
												ORDER BY course_batches.batch_id DESC
												LIMIT 0,4");
												$rec_courses=$sql_lt->result();
											foreach($rec_courses as $row){ ?>
                                            <div class="col-md-3">
                                                <div class="edu2_cur_wrap">
                                                    <figure>
													<?php if(!empty($row->cb_image)){ ?>
                                                        <img src="<?php echo base_url(); ?>images/course/<?php echo $row->cb_image; ?>" alt="">
														<?php }else{ ?>
														<img src="<?php echo base_url(); ?>images/no_img.png" alt="">
														<?php } ?>
                                                        
                                                        <figcaption><a href="<?php echo base_url(); ?>courses/details/<?php echo $row->batch_id; ?>">See More</a></figcaption>
                                                    </figure>
                                                    <div class="edu2_cur_des">
                                                        <span>$<?php echo $row->cb_price; ?></span>
                                                        <h5><a href="<?php echo base_url(); ?>courses/details/<?php echo $row->batch_id; ?>"><?php echo $row->course_name; ?></a></h5>
                                                        <strong>
                                                            <span>
															<?php echo date('M d',strtotime($row->cb_start_date)); ?>,&nbsp; <?php echo date('Y',strtotime($row->cb_start_date)); ?>
															</span>
                                                            <small>
															<?php echo date('M d',strtotime($row->cb_end_date)); ?>,&nbsp; <?php echo date('Y',strtotime($row->cb_end_date)); ?>
															</small>                                                           </strong>
                                                       
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <figure>
                                                            <img src="<?php echo base_url(); ?>images/tutor/<?php echo $row->tutor_image; ?>" alt=""/>                                                        </figure>
                                                        <div class="edu2_cur_ftr_strip">
                                                            <h6><?php echo $row->tutor_name; ?></h6>
                                                            <div class="rating">
                                                                                                                          
																</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<?php } ?>	
                                           
                                           
                                            <!-- EDU COURSES WRAP END -->
										</div>
                                      
									</div>
									<div role="tabpanel" class="tab-pane fade" id="java">
										<!-- 2 Tab START  -->
										<div class="row margin-bottom">
                                            <!-- EDU COURSES WRAP START -->			
                                            <?php
												$sql_lt1=$this->db->query("SELECT
												* FROM
												course_batches,courses,tutors,course_categories,countries 
												WHERE
												course_batches.cb_course_id=courses.course_id
												AND
												course_batches.cb_tutor_id=tutors.tutor_id
												AND
												course_batches.cb_cat_id=course_categories.cat_id
												AND
												course_batches.cb_country=countries.country_id
												AND
												(course_batches.cb_course_id='6' OR course_batches.cb_course_id='7')
												AND
												(course_batches.cb_course_type='oncampus' OR course_batches.cb_course_type='online')
												ORDER BY course_batches.batch_id DESC
												LIMIT 0,4");
												$rec_courses2=$sql_lt1->result();
											foreach($rec_courses2 as $row){ ?>
                                            <div class="col-md-3">
                                                <div class="edu2_cur_wrap">
                                                    <figure>
													<?php if(!empty($row->cb_image)){ ?>
                                                        <img src="<?php echo base_url(); ?>images/course/<?php echo $row->cb_image; ?>" alt="">
														<?php }else{ ?>
														<img src="<?php echo base_url(); ?>images/no_img.png" alt="">
														<?php } ?>
                                                       
                                                        <figcaption><a href="<?php echo base_url(); ?>courses/details/<?php echo $row->batch_id; ?>">See More</a></figcaption>
                                                    </figure>
                                                    <div class="edu2_cur_des">
                                                        <span>$<?php echo $row->cb_price; ?></span>
                                                        <h5><a href="<?php echo base_url(); ?>courses/details/<?php echo $row->batch_id; ?>"><?php echo $row->course_name; ?></a></h5>
                                                        <strong>
                                                           <span>
															<?php echo date('M d',strtotime($row->cb_start_date)); ?>,&nbsp; <?php echo date('Y',strtotime($row->cb_start_date)); ?>
															</span>
                                                            <small>
															<?php echo date('M d',strtotime($row->cb_end_date)); ?>,&nbsp; <?php echo date('Y',strtotime($row->cb_end_date)); ?>
															</small>                                                           </strong>
                                                        
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <figure>
                                                            <img src="<?php echo base_url(); ?>images/tutor/<?php echo $row->tutor_image; ?>" alt=""/>                                                        </figure>
                                                        <div class="edu2_cur_ftr_strip">
                                                            <h6><?php echo $row->tutor_name; ?></h6>
                                                            <div class="rating">
															

																
																</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<?php } ?>	
                                            <!-- EDU COURSES WRAP END -->
                                            <!-- EDU COURSES WRAP START -->
                                            
                                            <!-- EDU COURSES WRAP END -->
                                            <!-- EDU COURSES WRAP START -->
                                           
                                            <!-- EDU COURSES WRAP END -->
										</div>
                                  
									</div>

									<div role="tabpanel" class="tab-pane fade" id="testing">
										<!-- 2 Tab START  -->
										<div class="row margin-bottom">
                                            <!-- EDU COURSES WRAP START -->
                                            
                                            <!-- EDU COURSES WRAP END -->
                                            <!-- EDU COURSES WRAP START -->			
                                            
                                            <!-- EDU COURSES WRAP END -->
                                            <!-- EDU COURSES WRAP START -->
                                        <?php
										$sql_lt2=$this->db->query("SELECT
										* FROM
										course_batches,courses,tutors,course_categories,countries 
										WHERE
										course_batches.cb_course_id=courses.course_id
										AND
										course_batches.cb_tutor_id=tutors.tutor_id
										AND
										course_batches.cb_cat_id=course_categories.cat_id
										AND
										course_batches.cb_country=countries.country_id
										AND
										(course_batches.cb_course_id='10' OR course_batches.cb_course_id='9' OR course_batches.cb_course_id='8')
										AND
										(course_batches.cb_course_type='oncampus' OR course_batches.cb_course_type='online')
										ORDER BY course_batches.batch_id DESC
										LIMIT 0,4");
												$rec_courses3=$sql_lt2->result();
										foreach($rec_courses3 as $row){ ?>
                                            <div class="col-md-3">
                                                <div class="edu2_cur_wrap">
                                                    <figure>
													<?php if(!empty($row->cb_image)){ ?>
                                                        <img src="<?php echo base_url(); ?>images/course/<?php echo $row->cb_image; ?>" alt="">
														<?php }else{ ?>
														<img src="<?php echo base_url(); ?>images/no_img.png" alt="">
														<?php } ?>
                                                        
                                                        <figcaption><a href="<?php echo base_url(); ?>courses/details/<?php echo $row->batch_id; ?>">See More</a></figcaption>
                                                    </figure>
                                                    <div class="edu2_cur_des">
                                                        <span>$<?php echo $row->cb_price; ?></span>
                                                        <h5><a href="<?php echo base_url(); ?>courses/details/<?php echo $row->batch_id; ?>"><?php echo $row->course_name; ?></a></h5>
                                                        <strong>
                                                            <span>
															<?php echo date('M d',strtotime($row->cb_start_date)); ?>,&nbsp; <?php echo date('Y',strtotime($row->cb_start_date)); ?>
															</span>
                                                            <small>
															<?php echo date('M d',strtotime($row->cb_end_date)); ?>,&nbsp; <?php echo date('Y',strtotime($row->cb_end_date)); ?>
															</small>                                                           </strong>
                                                        
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <figure>
                                                            <img src="<?php echo base_url(); ?>images/tutor/<?php echo $row->tutor_image; ?>" alt=""/>                                                        </figure>
                                                        <div class="edu2_cur_ftr_strip">
                                                            <h6><?php echo $row->tutor_name; ?></h6>
                                                            <div class="rating">
															
																</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<?php } ?>	
                                            <!-- EDU COURSES WRAP END -->
										</div>
                                      
									</div>
									<!-- 4 Tab END  -->
								</div>
                                  <div class="view-all">
                                        	<a class="btn-3" href="<?php echo base_url(); ?>courses/oncampus">View All Courses</a>                                        </div>
						  </div>
					  </div>
						<!--EDU2 COURSES TAB WRAP END-->
				  </div>
				</div>
			</section>
			<?php */ ?>
			<!--KF COURSES CATEGORIES WRAP END-->

			<!--COUNTER SECTION START-->
			<section class="edu2_counter_wrap">
				<div class="container">
					<!--EDU2 COUNTER DES START-->
					<div class="edu2_counter_des">
						<span><i class="icon-group2"></i></span>
						<h3 class="counter">94,532</h3>
						<h5>FOREIGN FOLLOWERS</h5>
					</div>
					<!--EDU2 COUNTER DES END-->
					<!--EDU2 COUNTER DES START-->
					<div class="edu2_counter_des">
						<span><i class="icon-book236"></i></span>
						<h3 class="counter">11,223</h3>
						<h5>CLASSES COMPLETE</h5>
					</div>
					<!--EDU2 COUNTER DES END-->
					<!--EDU2 COUNTER DES START-->
					<div class="edu2_counter_des">
						<span><i class="icon-win5"></i></span>
						<h3 class="counter">282,673</h3>
						<h5>STUDENTS ENROLLED</h5>
					</div>
					<!--EDU2 COUNTER DES END-->
					<!--EDU2 COUNTER DES START-->
					<div class="edu2_counter_des">
						<span><i class=" icon-user255"></i></span>
						<h3 class="counter">370</h3>
						<h5>CERTIFIED TEACHERS</h5>
					</div>
					<!--EDU2 COUNTER DES END-->
				</div>
			</section>
			<!--COUNTER SECTION END-->

			<!-- FACULTY WRAP START-->
			<section>
				<div class="container">
					<div class="row">
						<!-- HEADING 1 START-->
						<div class="col-md-12">
							<div class="kf_edu2_heading1">
								<h3>Faculty members</h3>
							</div>
						</div>
						<!-- HEADING 1 END-->

						<!-- FACULTY SLIDER WRAP START-->
						<div class="edu2_faculty_wrap">
							<div id="owl-demo-8" class="owl-carousel owl-theme">
								
								<?php foreach($res_faculty as $rowf){ ?>
								<div class="item">
									<!-- FACULTY DES START-->
									<div class="edu2_faculty_des">
										<figure><img src="<?php echo base_url(); ?>images/<?php echo $rowf->faculty_image; ?>" alt=""/>
											<figcaption>
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
												<a href="#"><i class="fa fa-linkedin"></i></a>
												<a href="#"><i class="fa fa-google-plus"></i></a>											</figcaption>
										</figure>
										<div class="edu2_faculty_des2">
											<h6><a href="#"><?php echo $rowf->title; ?></a></h6>
											<strong><?php echo $rowf->designation; ?></strong>
											<?php echo $rowf->faculty_des; ?>
										</div>
									</div>
									<!-- FACULTY DES END-->
								</div>
								<?php } ?>
								
							</div>
					  </div>
						<!-- FACULTY SLIDER WRAP END-->
				  </div>
				</div>
			</section>
			<!-- FACULTY WRAP START-->

			<!-- LATEST NEWS AND EVENT WRAP START-->
			<section class="edu2_new_wrap">
				<div class="container">
					<!-- HEADING 2 START-->
					<div class="col-md-12">
						<div class="kf_edu2_heading2">
							<h3>Latest News &amp; Events</h3>
						</div>
					</div>
					<!-- HEADING 2 END-->
					<div class="row">
						<!-- EDU2 NEW DES START-->
						<?php foreach($news_home as $newsh){ ?>
						<div class="col-md-6">
							<div class="edu2_new_des">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="edu2_event_des">
											<h4><?php echo date('M',strtotime($newsh->news_date)); ?></h4>
											<p><?php echo $newsh->title; ?></p>
											<ul class="post-option">
 												<li>By<a href="#">Admin</a></li>
 												<li><?php echo date('d/m/Y',strtotime($newsh->news_date)); ?>
												</li>
 												<!--<li><a href="#">21 Comments</a></li>-->
											</ul>
											<a href="<?php echo base_url(); ?>news/details/<?php echo $newsh->news_id; ?>" class="readmore">read more<i class="fa fa-long-arrow-right"></i></a>
											<span><?php echo date('d',strtotime($newsh->news_date)); ?></span>										</div>
									</div>
									<div class="col-md-6 col-sm-6 thumb">
										<figure><img src="<?php echo base_url(); ?>images/news/<?php echo $newsh->news_image; ?>" alt=""/>
											<figcaption><a href="<?php echo base_url(); ?>news/details/<?php echo $newsh->news_id; ?>"   ><i class="fa fa-plus"></i></a></figcaption>
										</figure>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<!-- EDU2 NEW DES END-->

					


					
				  </div>
			  </div>
			</section>
			<!-- LATEST NEWS AND EVENT WRAP END-->


			<!--TRAINING WRAP START-->
			<?php 
			$sql_c=$this->db->query("SELECT * FROM `homecourse` WHERE `homecourse_id`=1");
			 $rec_f=$sql_c->row();
			  if($rec_f->cdisplay=='yes')
			  {
				date_default_timezone_set('Asia/kolkata');  
                $f_datetime=date('Y-m-d',strtotime($rec_f->cdate));
				$expirationDate = strtotime($f_datetime);
				$toDay = strtotime(date('Y-m-d H:i:s'));
				$difference = abs($toDay - $expirationDate);
				$days = floor($difference / 86400);
				$hours = floor(($difference - $days * 86400) / 3600);
				$minutes = floor(($difference - $days * 86400 - $hours * 3600) / 60);
				$seconds = floor($difference - $days * 86400 - $hours * 3600 - $minutes * 60);				
			 ?>
			
			<section class="edu2_tarining_bg">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="kf_edu2_training_des">
								<figure>
									<img src="<?php echo base_url(); ?>images/<?php echo $rec_f->h_image; ?>" alt=""/>								</figure>
							</div>
						</div>

						<div class="col-md-8">
							<div class="edu2_training_wrap">
								<h2><?php echo $rec_f->title; ?></h2>
								<h3><?php echo $rec_f->tname; ?></h3>
								<!--COUNTDOWN START-->
								<ul class="countdown">
									<li>
										<span class="days"><?php echo $days; ?></span>
										<p class="days_ref">days</p>
									</li>
									<li>
										<span class="hours"><?php echo $hours; ?></span>
										<p class="hours_ref">hours</p>
									</li>
									<li>
										<span class="minutes"><?php echo $minutes; ?></span>
										<p class="minutes_ref">minutes</p>
									</li>
									<li>
										<span class="seconds last"><?php echo $seconds; ?></span>
										<p class="seconds_ref">seconds</p>
									</li>
								</ul>
								<!--COUNTDOWN END-->
								<strong><?php echo $rec_f->des; ?></strong>
								<a href="<?php echo $rec_f->clink; ?>"  class="btn-1">REGISTER NOW</a>						  </div>
					  </div>
				  </div>
				</div>
			</section>
			  <?php } ?>
			<!--TRAINING WRAP END-->
<!--GALLERY SECTION START-->
			<section class="kode-gallery-section">
				<!-- HEADING 2 START-->
                <div class="col-md-12">
                    <div class="kf_edu2_heading2">
                        <h3>Our Gallery</h3>
                    </div>
                </div>
                <!-- HEADING 2 END-->
                <!-- EDU2 GALLERY WRAP START-->
                <div class="edu2_gallery_wrap gallery">
                   
                    <!-- EDU2 GALLERY DES START-->
                    <div class="gallery3">
                    <?php
					foreach($res_gallery as $gal){
						?>
                        <div class="filterable-item all 2 1 9 col-md-3 col-sm-4 col-xs-12 no_padding">
                            <div class="edu2_gallery_des">
                                <figure>
                                    <img alt="" src="<?php echo base_url(); ?><?php echo $gal->file; ?>">
                                    <figcaption>
                                        <a href="<?php echo $gal->file; ?>" rel="prettyPhoto[gallery1]"><i class="fa fa-eye"></i></a>
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <h5><?php echo $gal->caption; ?></h5>
                                        <p><?php echo strip_tags($gal->description); ?></p>
                                    </figcaption>
                                </figure>
                            </div>	
                        </div>
						<?php } ?>
                        
                  </div>
                    
                <!-- EDU2 GALLERY WRAP END-->
              </div>
                <div class="loadmore">
						<a href="#" class="btn-3">View More</a>			  </div>
		  </section>
			<!--GALLERY SECTION END-->

			<!--OUR TESTEMONIAL WRAP START-->
			<section>
				<div class="container">
					<div class="row">
						<!-- HEADING 2 START-->
						<div class="col-md-12">
							<div class="kf_edu2_heading2">
								<h3>Our Testimonials</h3>
							</div>
						</div>
						<!-- HEADING 2 END-->
						<!-- TESTEMONIAL SLIDER WRAP START-->
						<div class="edu2_testemonial_slider_wrap">
							<div id="owl-demo-9">
							<?php foreach($res_testimonials as $testm){ ?>
								<div class="item">
									<!-- TESTEMONIAL SLIDER WRAP START-->
									<div class="edu_testemonial_wrap">
										<figure><img src="<?php echo base_url(); ?>images/testimonial/<?php echo $testm->testimonial_image; ?>" alt=""/></figure>
										<div class="kode-text">
										  <p>"<?php echo strip_tags($testm->testimonial_des); ?>"</p>
											<a href="#"><?php echo $testm->name; ?><span>- <?php echo $testm->designation; ?></span></a>									  </div>
								  </div>
									<!-- TESTEMONIAL SLIDER WRAP END-->
								</div>
							<?php } ?>
								
									
                                
							</div>
					  </div>
						<!-- TESTEMONIAL SLIDER WRAP END-->
				  </div>
				</div><br />
                <div class="loadmore">
						<!--<a href="testimonials.php" class="btn-3">View More</a>-->	
			<a href="<?php echo base_url(); ?>testimonials" class="btn-3">View More</a>							
						</div>
			</section>
			<!--OUR TESTEMONIAL WRAP END-->
		</div>

		<!--EDU2 FOOTER WRAP START-->
<?php //include 'template/footer.php'?>