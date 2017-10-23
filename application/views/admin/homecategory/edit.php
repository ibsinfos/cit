
 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update homecategory</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update homecategory</li>
                     </ol>
                  </div>
                  
</div>
      
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong>  Updated Successfully.';
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
//form data
$attributes = array('class' => 'form-horizontal', 'id' => '');

//form validation
echo validation_errors();

echo form_open_multipart('admin/homecategory/update/'.$this->uri->segment(4).'', $attributes);
?>
                                        
                                <div class="form-group">
                                    <label class="col-md-12">Title</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" name="name" value="<?php echo $homecategory[0]['name']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">i con Class</label>
                                    <div class="col-md-12">
                                        <input type="text" id="" class="form-control" readonly  name="cat_fa" value="<?php echo $homecategory[0]['cat_fa']; ?>" >
										
										</div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12">Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="cat_des" ><?php echo $homecategory[0]['cat_des']; ?></textarea>
										
										</div>
                                </div>
								
								
								
								
						
								
								
								
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     