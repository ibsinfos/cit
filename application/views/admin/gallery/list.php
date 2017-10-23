<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <!-- .page title -->
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Gallery</h4>
                  </div>
                  <!-- /.page title -->
                  <!-- .breadcrumb -->
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">                   
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Gallery</li>
                     </ol>
                  </div>
                  <!-- /.breadcrumb -->
               </div>
      
<?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'added')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> Created Successfully';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
	  
	  
<div class="row">
<div class="col-sm-12">
 <div class="white-box">
 <!--<h3 class="box-title m-b-0">Gallery </h3> <br />
 <p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/gallery/add" class="btn btn-success btn-rounded" > Add New</a></p>-->
                         <?php if($images->num_rows() > 0) : ?>
			
			<?php if($this->session->flashdata('message')) : ?>
				<div class="alert alert-success" role="alert" align="center">
					<?=$this->session->flashdata('message')?>
				</div>
			<?php endif; ?>

			<div align="center"><?=anchor('admin/gallery/add','Add a new image',['class'=>'btn btn-primary'])?></div>
			<hr />	
			<div class="row">
				<?php foreach($images->result() as $img) : ?>
				<div class="col-md-3">
					<div class="thumbnail">
						<?=img($img->file)?>
						<div class="caption">
							<h3><?=$img->caption?></h3>
							<?php $des=html_entity_decode($img->description); ?>
							<p><?=substr(strip_tags($des), 0,100)?>...</p>
							<p>
								<?=anchor('admin/gallery/edit/'.$img->id,'Edit',['class'=>'btn btn-warning', 'role'=>'button'])?>
								<?=anchor('admin/gallery/delete/'.$img->id,'Delete',['class'=>'btn btn-danger', 'role'=>'button','onclick'=>'return confirm(\'Are you sure?\')'])?>
							</p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div align="center">We don't have any image yet, go ahead and <?=anchor('admin/gallery/add','add a new one',['class'=>'btn btn-primary'])?>.</div>
		<?php endif; ?>   
                        </div>
                    </div>
					
 </div>
	
	
	

	
	
	