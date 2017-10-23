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
              <li><a href="#">eBooks</a></li>
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
      <div class="col-md-9 col-sm-12 col-xs-12 studashebo">
      		<h4>eBooks</h4><hr /><br />
            <div class="row">
            	<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                            <!--<div class="input-group">
                                <input type="text" class="form-control input-lg" placeholder="Search eBooks"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-lg" type="button"><i class="fa fa-search"></i></button>
                                  </span>
                            </div>-->
                        </div>
            </div><br />
      		<div class="row bookformat">
			<?php if(empty($ebooks)) echo "<p style='color:red;font-weight:bold; '>NO Results Found</p>"; ?>
			 <?php foreach($ebooks as $row): ?>
            	<div class="col-md-4 col-sm-6">
                	<div class="sing_ebook">
                    	<a href="<?php echo base_url(); ?>student_dashboard/pdfbook_view/<?php echo $row->se_id; ?>"><img src="<?php echo base_url(); ?>images/ebooks/<?php echo $row->se_image; ?>" alt="" class="img-responsive"/></a>
                        <div class="ebgrey">
                        	<span>Book Title </span>: <?php echo $row->se_title; ?><br />
							<span>Pages </span>: <?php echo $row->se_page_no; ?>                            
                        </div>
                        <div class="ebblue"><strong>Author :</strong> <?php echo $row->se_author; ?></div>                        
                    </div>
                </div>
				<?php endforeach; ?>
                
            </div>
      </div>
    </div>
  </div>
</div>
<!--ABOUT UNIVERSITY END-->
</div>
<!--Content Wrap End-->
<?php include 'template/footer.php'?>
