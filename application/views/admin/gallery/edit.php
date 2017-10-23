<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->input->post()){
	$caption 		= set_value('caption');
	$description 	= set_value('description');
} else {
	$caption 		= $image->caption;
	$description 	= $image->description;
}
?>

 <div id="page-wrapper" >
            <div class="container-fluid">
               <div class="row bg-title">
                 
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Update Gallery</h4>
                  </div>
                 
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Update Gallery</li>
                     </ol>
                  </div>
                  
</div>
      
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<?php if(validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?=(isset($error)?$error:'')?>
			</div>
		<?php endif; ?>
<?php
//form data
$attributes = array('class' => 'form-horizontal', 'id' => '');

//form validation
echo validation_errors();

echo form_open_multipart('admin/gallery/edit/'.$image->id, $attributes);
?>
                                        
                                <div class="form-group">
                                    <label class="col-md-12">Image File</label>
									 <div class="row" style="margin-bottom:5px"><div class="col-xs-12 col-sm-6 col-md-3"><?=img(['src'=>$image->file,'width'=>'100%'])?></div></div>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control" name="userfile">
										</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12">Caption</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="caption" value="<?=$caption?>">
										
										</div>
                                </div>
								
								
								<!--<div class="form-group">
                                    <label class="col-md-12">Old testimonial Image</label>
                                    <div class="col-md-12">
									   <img src="<?php echo base_url(); ?>images/testimonial/<?php echo $testimonials[0]['testimonial_image']; ?>" style="width:120px; height:150px;"    >
                                        <input type="hidden" id="" class="form-control" name="old_testimonial_image" value="<?php echo $testimonials[0]['testimonial_image']; ?>" >
										
										</div>
                                </div>-->
								
								
								
								
								<div class="form-group">
                                    <label class="col-md-12"> Description</label>
                                    <div class="col-md-12">
                                        <textarea  class="form-control" id="mymce" name="description" ><?=$description?></textarea>
										
										</div>
                                </div>
								
								
											
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
										 <?=anchor('admin/gallery','Cancel',['class'=>'btn btn-inverse waves-effect waves-light'])?>
                                   <?php echo form_close(); ?>

 </div>
</div>
</div>


	
	
	
     
     