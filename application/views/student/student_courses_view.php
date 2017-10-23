<?php  //include 'template/dash_header.php'?>
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
              <li><a href="#">Courses</a></li>
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
            <?php include 'template/stdash_menu.php'; ?>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 stdashcour stdash">
      		<h4>Courses View</h4><hr /><br />
            <div class="row">
            	<div class="col-xs-12 col-sm-10 col-md-10 well" style="margin-left:10px;">
                	<div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" placeholder="Search Course"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-lg" type="button"><i class="fa fa-search"></i></button>
                                  </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a href="#" class="btn btn-darkred btn-lg hunper"><i class="fa fa-pencil"></i> Register For New Course</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
						<div class="kf_edu2_tab_des stdashview">
							<div class="col-md-12 col-sm-12">
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="all">
										<!-- 1 Tab START  -->
										<div class="row margin-bottom">
                                            <!-- EDU COURSES WRAP START -->			
                                            <div class="col-md-5 col-sm-6">
                                                <div class="edu2_cur_wrap">
                                                    <figure>
                                                        <img src="<?php echo base_url(); ?>images/cur-wrap-2.jpg" alt="">
                                                    </figure>
                                                    <div class="edu2_cur_des">
                                                        <img src="<?php echo base_url(); ?>images/com_tag.png" class="coursetag" alt=""/>
                                                        <h5><a href="#">HADDOP BIGDATA</a></h5>
                                                        <strong>
                                                            <span>Dec 27, 2015</span>
                                                            <small>Jan 27, 2016</small>                                                        </strong>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <figure>
                                                            <img src="<?php echo base_url(); ?>images/cur_ft.jpg" alt=""/>                                                        </figure>
                                                        <div class="edu2_cur_ftr_strip">
                                                            <h6><span>Tutor :</span> Sara Johnson</h6>                                                            
                                                        </div>                                                                                                               
                                                    </div>     
                                                    <a class="btn btn-primary hunper" href="#">View Certificates</a>
                                                </div>                                                
                                            </div>
                                            <!-- EDU COURSES WRAP END -->
                                            <!-- EDU COURSES WRAP START -->
                                            <div class="col-md-5 col-sm-6">
                                                <div class="edu2_cur_wrap">
                                                    <figure>
                                                        <img src="<?php echo base_url(); ?>images/cur-wrap.jpg" alt="">
                                                    </figure>
                                                    <div class="edu2_cur_des">
                                                        <img src="<?php echo base_url(); ?>images/ongo_tag.png" class="coursetag" alt=""/>
                                                        <h5><a href="#">Android Training</a></h5>
                                                        <strong>
                                                            <span>Dec 27, 2015</span>
                                                            <small>Jan 27, 2016</small>                                                        </strong>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <figure>
                                                            <img src="<?php echo base_url(); ?>images/cur_ft-2.jpg" alt=""/>                                                        </figure>
                                                        <div class="edu2_cur_ftr_strip">
                                                            <h6><span>Tutor :</span> Johny Fisher</h6>
                                                        </div>
                                                    </div>
                                                    <a class="btn btn-primary hunper" href="#">View Certificates</a>
                                                </div>
                                            </div>
                                            <!-- EDU COURSES WRAP END -->
                                            <!-- EDU COURSES WRAP START -->
                                            <div class="col-md-5 col-sm-6">
                                                <div class="edu2_cur_wrap">
                                                    <figure>
                                                        <img src="<?php echo base_url(); ?>images/digitalmarketing.jpg" alt="">
                                                    </figure>
                                                    <div class="edu2_cur_des">
                                                        <img src="<?php echo base_url(); ?>images/hold_tag.png" class="coursetag" alt=""/>
                                                        <h5><a href="#">Digital Marketing</a></h5>
                                                        <strong>
                                                            <span>Dec 27, 2015</span>
                                                            <small>Jan 27, 2016</small>                                                        </strong>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <figure>
                                                            <img src="<?php echo base_url(); ?>images/cur_ft-2.jpg" alt=""/>                                                        </figure>
                                                        <div class="edu2_cur_ftr_strip">
                                                            <h6><span>Tutor :</span> Johny Fisher</h6>
                                                        </div>
                                                    </div>
                                                    <a class="btn btn-primary hunper" href="#">View Certificates</a>
                                                </div>
                                            </div>
                                            <!-- EDU COURSES WRAP END -->
                                            <!-- EDU COURSES WRAP START -->
                                            <div class="col-md-5 col-sm-6">
                                                <div class="edu2_cur_wrap">
                                                    <figure>
                                                        <img src="<?php echo base_url(); ?>images/cur-wrap-3.jpg" alt="">
                                                    </figure>
                                                    <div class="edu2_cur_des">
                                                        <img src="<?php echo base_url(); ?>images/ongo_tag.png" class="coursetag" alt=""/>
                                                        <h5><a href="#">Network Management</a></h5>
                                                        <strong>
                                                            <span>Dec 27, 2015</span>
                                                            <small>Jan 27, 2016</small>                                                        </strong>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                                                    </div>
                                                    <div class="edu2_cur_des_ft">
                                                        <figure>
                                                            <img src="<?php echo base_url(); ?>images/cur_ft-2.jpg" alt=""/>                                                        </figure>
                                                        <div class="edu2_cur_ftr_strip">
                                                            <h6><span>Tutor :</span> Johny Fisher</h6>
                                                        </div>
                                                    </div>
                                                    <a class="btn btn-primary hunper" href="#">View Certificates</a>
                                                </div>
                                            </div>
                                            <!-- EDU COURSES WRAP END -->
                                            
										</div>
                                    </div>
								<!-- 4 Tab END  -->
							</div>
						  </div>
					  </div>
						<!--EDU2 COURSES TAB WRAP END-->
				  </div>
      		<!--<table class="table table-bordered table-striped">
            	<tr class="trbold">
                	<td>Course Pic</td>
                    <td>Tutor Name</td>
                    <td>Course Start Date</td>
                    <td>Course Completed Date</td>
                    <td>Status</td>
                    <td>Edit</td>
                </tr>
                <tr>
                    <td align="center"><img src="images/photoshop.jpg" alt="" /></td>
                    <td>Subbu</td>
                    <td>13-8-2016</td>
                    <td>20-9-2016</td>
                    <td class="text-success">Active</td>
                    <td><a class="btn btn-sm btn-success">Edit</a></td>
                </tr>
                <tr>
                    <td align="center"><img src="images/htmlfive.jpg" alt="" /></td>
                    <td>Srinivas</td>
                    <td>13-8-2016</td>
                    <td>20-9-2016</td>
                    <td class="text-success">Active</td>
                    <td><a class="btn btn-sm btn-success">Edit</a></td>
                </tr>
            </table>-->
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<?php include 'template/footer.php'?>
