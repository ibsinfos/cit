<?php include 'template/header.php'?>
<!--Banner Wrap Start-->
<div class="kf_inr_banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--KF INR BANNER DES Wrap Start-->
        <div class="kf_inr_ban_des">
          <div class="inr_banner_heading">
            <h3>Blog</h3>
          </div>
          <div class="kf_inr_breadcrumb">
            <ul>
              <li><a href="<?php echo base_url(); ?>" >Home</a></li>
              <li><a href="<?php echo base_url(); ?>"  >Blog</a></li>
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
<<!--Content Wrap Start-->
    	<div class="inner-content-holder">
			<div class="container">
				<div class="row">
					<!--EDUCATION BLOG PAGE START-->
					<div class="col-md-8">
						<div class="edu2_blog_page">
    							<!--EDUCATION BLOG PAGE WRAP START-->
							<?php foreach($blog_list1 as $row): ?>	
    						<div class="edu2_blogpg_wrap">
    							<div class="blog_slider_thumb">
									<div id="owl-demo-blog" class="owl-carousel owl-theme">
										<div class="item">
											<figure>
		    									<img src="<?php echo base_url(); ?>images/blog/<?php echo $row->blog_image; ?>" alt="" />
		    								</figure>
										</div>
										
									</div>
									
								</div>

								<div class="edu2_blogpg_des">
									
									<ul>
										<li><i class="fa fa-calendar"></i><?php echo date('d M Y',strtotime($row->blog_date)); ?></li>
										
									</ul>
									<h5><?php echo $row->title; ?></h5>
									<p><?php echo $row->blog_des; ?>
									
								</div>
							</div>
							<!--EDUCATION BLOG PAGE WRAP END-->
              <?php endforeach; ?>
				

						</div>


						<div class="row">
	    					<div class="col-md-12">
								<!--KF_PAGINATION_WRAP START-->
								<div class="kf_edu_pagination_wrap">
									<!--<ul class="pagination">
										<li>
											<a href="#" aria-label="Previous">
											<span aria-hidden="true"><i class="fa fa-angle-left"></i>PREV</span>
											</a>
										</li>
										<li class="active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li>
											<a href="#" aria-label="Next">
											<span aria-hidden="true">Next<i class="fa fa-angle-right"></i></span>
											</a>
										</li>
									</ul>-->
								</div>
								<!--KF_PAGINATION_WRAP END-->
							</div>
	    				</div>

					</div>
					<!--EDUCATION BLOG PAGE END-->

				    <!--KF_EDU_SIDEBAR_WRAP START-->
					<div class="col-md-4">
                        <div class="kf-sidebar">

                            <!--KF_SIDEBAR_SEARCH_WRAP START-->
                            <!--<div class="widget widget-search">
                                <h2>Search Course</h2>
                                <form>
                                    <input type="search" placeholder="Keyword...">
                                </form>
                            </div>-->
                            <!--KF_SIDEBAR_SEARCH_WRAP END-->

                            <!--KF_SIDEBAR_ARCHIVE_WRAP START-->
                            <div class="widget widget-archive ">
                                <h2>Archives</h2>
                                <ul class="sidebar_archive_des">
								<?php foreach($blog_list as $row): ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>blog/details/<?php echo $row->blog_id; ?>" ><i class="fa fa-angle-right"></i><?php echo $row->title; ?></a>
                                    </li>
									<?php endforeach; ?>
                                    
                                </ul>
                            </div>
                            <!--KF_SIDEBAR_ARCHIVE_WRAP END-->


                            <!--KF SIDEBAR RECENT POST WRAP START-->
                            <div class="widget widget-recent-posts">
                                <h2>Recent Posts</h2>
                                <ul class="sidebar_rpost_des">
                                    <!--LIST ITEM START-->
                                     <?php
								      $q=$this->db->query("SELECT * FROM `blog` ORDER BY blog_id DESC LIMIT 0,4");
									  $rec=$q->result();
									  foreach($rec as $row){
									?>								  
                                    <li>
                                        <figure>
                                            <img src="<?php echo base_url(); ?>images/blog/<?php echo $row->blog_image; ?>" height="100" alt="">
											
											
                                            <figcaption><a href="#"><i class="fa fa-search-plus"></i></a></figcaption>
                                        </figure>
                                        <div class="kode-text">
                                            <h6><a href="<?php echo base_url(); ?>blog/details/<?php echo $row->blog_id; ?>"><?php echo $row->title; ?></a></h6>
                                            <span><i class="fa fa-clock-o"></i><?php echo date('d M Y',strtotime($row->blog_date)); ?></span>
                                        </div>
                                    </li>
									  <?php } ?>
                                  
                                
                                 
                                </ul>
                            </div>
                            <!--KF SIDEBAR RECENT POST WRAP END-->

                            
                            <!--KF EDU SIDEBAR COURSES CATEGORieS WRAP END-->

                            <!--KF SIDE BAR COURSES LIST WRAP START WRAP START-->
                            <div class="widget widget-courses-list">
                                <h2>Latest Courses</h2>
                                <ul>
                                   <?php
								$query=$this->db->query("SELECT `batch_id`,`cb_image`,cb_batchname FROM `course_batches` ORDER BY batch_id DESC LIMIT 0,4");
								$res=$query->result();
								 foreach($res as $row)
								        {
								?>
                                    <li>
                                        <figure>
										
										 <?php if(!empty($row->cb_image)){ ?>
                                                        <img src="<?php echo base_url(); ?>images/course/<?php echo $row->cb_image; ?>" alt="">
														<?php }else{ ?>
														<img src="<?php echo base_url(); ?>images/no_img.png" alt="">
														<?php } ?>
                                            <a href="<?php echo base_url(); ?>courses/details/<?php echo $row->batch_id; ?>">View Detail</a>
									
                                        </figure>
                                    </li>
								 <?php } ?>
                                </ul>
                            </div>
                            <!--KF SIDE BAR COURSES LIST WRAP START WRAP END-->

                           

                        </div>
                    </div>
					<!--KF EDU SIDEBAR WRAP END-->

				</div>
			</div>
    	</div>
        <!--Content Wrap End-->
<?php include 'template/footer.php'; ?>