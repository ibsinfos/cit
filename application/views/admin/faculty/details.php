
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">View live projects</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">View live projects</li>
                     </ol>
                  </div>
                  
</div>
      
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<?php
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> Content page updated .';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
<?php
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo validation_errors();

echo form_open_multipart('admin/live_projects/update/'.$this->uri->segment(4).'', $attributes);
?>
                               
								
								<div class="form-group">
                                    <label class="col-md-12"><b>Title :</b> <?php echo $live_projects[0]['title']; ?></label>
                                    <div class="col-md-12">
                                        
										
										</div>
                                </div>
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12">Live project Image</label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/<?php echo $live_projects[0]['live_project_image']; ?>" style="width:120px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_live_project_image" value="<?php echo $live_projects[0]['live_project_image']; ?>" >
										
										</div>
                                </div>
								
		
								
								<div class="form-group">
                                    <label class="col-md-12"> Description</label>
                                    <div class="col-md-12">
                                      <p>  <?php echo $live_projects[0]['live_project_des']; ?></p>
										
										</div>
                                </div>
								
										
                                        
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     