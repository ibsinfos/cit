
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">View register students</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">View register students</li>
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

echo form_open_multipart('admin/register_students/update/'.$this->uri->segment(4).'', $attributes);
?>
<p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/register_students" class="btn btn-success btn-rounded" > Back</a></p>
    <div class="form-group">
        <label class="col-md-12">    <b>Name :</b> <?php  echo ucwords($register_students[0]['std_name']); ?></label>




    </div>
                                <div class="form-group">
                                <label class="col-md-12">    <b>User Name :</b> <?php  echo $register_students[0]['std_username']; ?></label>
                                    
                                        
										
										
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><b> Email :</b> <?php echo $register_students[0]['std_email']; ?></label>
                                    <div class="col-md-12">
                                        
										
										</div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-12"><b> Mobile : </b>  <?php echo $register_students[0]['std_mobile']; ?></label>
                                    <div class="col-md-12">
                                       
										
										</div>
                                </div>
								
								
										
                                        
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     