<?php include 'template/header.php'?>
<!--Banner Wrap Start-->
<div class="kf_inr_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>On Campus Courses</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li><a href="<?php echo base_url(); ?>courses/oncampus">On Campus Courses</a></li>
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
<!--search bar start-->
<div class="kf_content_wrap overflow_visible">
<div class="search_bar_outer_wrap">
  <div class="container">
    <?php /*?><div class="inr_pg_search_wrap">
      <form method="post" action="<?php echo base_url(); ?>courses/search_oncampus" >
        <div class="search_bar_des">          
          <select id="basic" name="course_cat"   >
		  <option value="" >Select Course Category</option>
		  <?php foreach($course_cat_list as $rowcat)
				{
			  ?>
			  <option value="<?php echo $rowcat->cat_id; ?>"><?php echo $rowcat->cat_name; ?></option>
		  <?php
				}
		  ?>
          </select>
          <input type="search" name="course_title"    placeholder="Search Course Title"/>
		  <input type="hidden" name="course_type" value="oncampus"    />
        </div>
        <button type="submit" name="course_search_btn" value="1" >Search Now</button>
      </form>
    </div><?php */?>
  </div>
</div>
<!--search bar end-->
<section class="padtwenty">
				<div class="container">
					<div class="row">
						<div class="kf_edu2_tab_des">
							<div class="col-md-12">
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="all">
										<!-- 1 Tab START  -->
										<div class="row margin-bottom">
                                            <!-- EDU COURSES WRAP START -->	
                             <?php
							    $i=0;
							 foreach($rec_courses as $row){
									  if($i/4==1 && $i>0)
									  {										 
										  echo '</div></div></div></div>';
										  echo '<div class="col-md-12"> <div class="tab-content"><div role="tabpanel" class="tab-pane fade in active" id="all"><div class="row margin-bottom">';										  
									  }
								?>											
                                            <div class="col-md-3">
                                                <div class="edu2_cur_wrap couseser">
                                                   <!-- <figure>
                                                         <?php if(!empty($row->cb_image)){ ?>
                                                        <img src="<?php echo base_url(); ?>images/course/<?php echo $row->cb_image; ?>" alt="">
														<?php }else{ ?>
														<img src="<?php echo base_url(); ?>images/no_img.png" alt="">
														<?php } ?>
                                                        <figcaption><a href="<?php echo base_url(); ?>courses/details/<?php echo $row->batch_id; ?>">See More</a></figcaption>
                                                    </figure>-->
                                                    <div class="edu2_cur_des">
												
                                                        <h5><a href="<?php echo base_url(); ?>courses/details/<?php echo $row->batch_id; ?>"><?php echo $row->course_name; ?></a></h5>
                                                        <strong>
                                                            <span>
															<?php echo date('M d',strtotime($row->cb_start_date)); ?>,&nbsp; <?php echo date('Y',strtotime($row->cb_start_date)); ?>
															</span>
                                                            <small>
															<?php echo date('M d',strtotime($row->cb_end_date)); ?>,&nbsp; <?php echo date('Y',strtotime($row->cb_end_date)); ?>
															</small>
															</strong>
                                                             <div class="cretype">
															 <?php
															   $arr_couurse_type=unserialize($row->cb_course_type);
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
                                                       <?php /*echo $row->cb_course_shortdes;*/ ?>
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <?php /*?><figure>
														<?php $tt_img=$row->tutor_image!='' ? $row->tutor_image:'no_tutor.jpg'; ?>
                                                            <img src="<?php echo base_url(); ?>images/tutor/<?php echo $tt_img; ?>" alt=""/>                                                        </figure><?php */?>
                                                        <div class="edu2_cur_ftr_strip">
                                                        <?php if(!$this->session->userdata('cit_country')){ ?>
												<span>$<?php echo $row->cb_price; ?></span>
												<?php }else if(ucfirst($this->session->userdata('cit_country'))=='India'){ ?>
												<span>Rs.<?php echo $row->cb_price_rs; ?></span>
												<?php }else{ ?>
												<span>$<?php echo $row->cb_price; ?></span>
												<?php } ?>
                                                            <?php /*?><h6><?php echo $row->tutor_name; ?></h6><?php */?>
															<?php /* ?>
                                                            <div class="rating">
                                                             <?php if($row->cb_rating==5){ ?>  
															   <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
															 <?php } ?>
															 <?php if($row->cb_rating==4){ ?>  
															   <span>☆</span><span>☆</span><span>☆</span><span>☆</span>
															 <?php } ?>
															 <?php if($row->cb_rating==3){ ?>  
															   <span>☆</span><span>☆</span><span>☆</span>
															 <?php } ?>
															 <?php if($row->cb_rating==2){ ?>  
															  <span>☆</span><span>☆</span>
															 <?php } ?>
															 <?php if($row->cb_rating==1){ ?>  
															   <span>☆</span>
															 <?php } ?>
															   </div>
															   <?php */ ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
							 <?php $i++;
							 } ?>
                            
               
                                            <!-- EDU COURSES WRAP END -->
										</div>
										
								<div class="col-md-12">
        <!--KF_PAGINATION_WRAP START-->
        <div class="kf_edu_pagination_wrap">
          <ul class="pagination">
            <?php echo $this->pagination->create_links(); ?>
          </ul>
        </div>
        <!--KF_PAGINATION_WRAP END-->
      </div>  
                                    </div>
								<!-- 4 Tab END  -->
							</div>
						  </div>
						  
						  <?php /* ?>
                          <div class="col-md-12">
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="all">
										<!-- 1 Tab START  -->
										<div class="row margin-bottom">
                                            <!-- EDU COURSES WRAP START -->			
                                            <div class="col-md-4">
                                                <div class="edu2_cur_wrap">
                                                    <figure>
                                                        <img src="<?php echo base_url(); ?>images/manualtesting.jpg" alt="">
                                                        <figcaption><a href="<?php echo base_url(); ?>courses/details">See More</a></figcaption>
                                                    </figure>
                                                    <div class="edu2_cur_des">
                                                        <span>$20</span>
                                                        <h5><a href="<?php echo base_url(); ?>courses/details">Manual Testing</a></h5>
                                                        <strong>
                                                            <span>Aug 27, 2016</span>
                                                            <small>Dec 27, 2016</small>                                                        </strong>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <figure>
                                                            <img src="<?php echo base_url(); ?>images/cur_ft.jpg" alt=""/>                                                        </figure>
                                                        <div class="edu2_cur_ftr_strip">
                                                            <h6>Sara Johnson</h6>
                                                            <div class="rating">
                                                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- EDU COURSES WRAP END -->
                                            <!-- EDU COURSES WRAP START -->
                                            <div class="col-md-4">
                                                <div class="edu2_cur_wrap">
                                                    <figure>
                                                        <img src="<?php echo base_url(); ?>images/qtp.jpg" alt="">
                                                        <figcaption><a href="<?php echo base_url(); ?>courses/details">See More</a></figcaption>
                                                    </figure>
                                                    <div class="edu2_cur_des">
                                                        <span>$20</span>
                                                        <h5><a href="<?php echo base_url(); ?>courses/details">Quick Test Professional </a></h5>
                                                        <strong>
                                                            <span>Aug 27, 2016</span>
                                                            <small>Dec 27, 2016</small>                                                        </strong>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <figure>
                                                            <img src="<?php echo base_url(); ?>images/cur_ft-3.jpg" alt=""/>                                                        </figure>
                                                        <div class="edu2_cur_ftr_strip">
                                                            <h6>Peter Parker</h6>
                                                            <div class="rating">
                                                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- EDU COURSES WRAP END -->
                                            <!-- EDU COURSES WRAP START -->
                                            <div class="col-md-4">
                                                <div class="edu2_cur_wrap">
                                                    <figure>
                                                        <img src="<?php echo base_url(); ?>images/seliniumtesting.jpg" alt="">
                                                        <figcaption><a href="<?php echo base_url(); ?>courses/details">See More</a></figcaption>
                                                    </figure>
                                                    <div class="edu2_cur_des">
                                                        <span>$20</span>
                                                        <h5><a href="<?php echo base_url(); ?>courses/details">Selenium Testing</a></h5>
                                                        <strong>
                                                            <span>Aug 27, 2016</span>
                                                            <small>Dec 27, 2016</small>                                                        </strong>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <figure>
                                                            <img src="<?php echo base_url(); ?>images/cur_ft-2.jpg" alt=""/>                                                        </figure>
                                                        <div class="edu2_cur_ftr_strip">
                                                            <h6>Johny Fisher</h6>
                                                            <div class="rating">
                                                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- EDU COURSES WRAP END -->
										</div>
                                        <div class="col-md-12">
        <!--KF_PAGINATION_WRAP START-->
        <div class="kf_edu_pagination_wrap">
          <ul class="pagination">
            <li> <a href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fa fa-angle-left"></i>PREV</span> </a> </li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li> <a href="#" aria-label="Next"> <span aria-hidden="true">Next<i class="fa fa-angle-right"></i></span> </a> </li>
          </ul>
        </div>
        <!--KF_PAGINATION_WRAP END-->
      </div>
									</div>
									<!-- 4 Tab END  -->
								</div>
						  </div>
						  <?php */ ?>
					  </div>
						<!--EDU2 COURSES TAB WRAP END-->
				  </div>
				</div>
			</section>
<!--Content Wrap End-->
<!--<script src="js/bootstrap.min.js"></script>-->
<?php include 'template/footer.php'?>