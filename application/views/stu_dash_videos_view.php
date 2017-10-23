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
              <li><a href="#">Video Tutorial</a></li>
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
      <div class="col-md-9 col-sm-12 col-xs-12 studashebo">
      		<!-- EDU2 DROP DOWN DES START -->
            <div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12">
            <h4>Videos View</h4>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="edu2_serc_des">
            <select>
            	<option value="1">Filter By Tutorial</option>
                <option value="1">HTML Tutorial</option>
                <option value="9">CSS Tutorial</option>
                <option value="2">Javascript Tutorial</option>
                <option value="3">Angular Js Tutorial</option>
                <option value="6">Jquery Tutorial</option>
            </select>
        </div>
            </div>
		</div><hr style="margin-top:0px;"/>
        <div class="row">
            	<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" placeholder="Search Videos"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-lg" type="button"><i class="fa fa-search"></i></button>
                                  </span>
                            </div>
                        </div>
            </div><br />                                  
                                    
      		<div class="gallery">
                   
                    <!-- EDU2 GALLERY DES START-->
                    <div class="gallery3">
                    
                        <div class="row">
						<?php foreach($videos as $row): ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                        	<div class="sing_ebook">
                    	<div class="edu2_gallery_des">                            
                                <figure>
                                    <img alt="" src="<?php echo base_url(); ?>images/video/<?php echo $row->sv_image; ?>"  >
                                    <figcaption>
                                        <a href="<?php echo $row->sv_link; ?>" rel="prettyPhoto[gallery1]"><i class="fa fa-youtube-play"></i></a>
                                    </figcaption>
                                </figure>
                            </div>                       
                        <div class="ebvideobl"><strong><?php echo $row->sv_title; ?></strong></div>                        
                    </div>                       
                            	
                        </div>
					<?php endforeach; ?>
                       
                        </div>
                  </div>
                    
                <!-- EDU2 GALLERY WRAP END-->
              </div>
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<?php include 'template/footer.php'?>
