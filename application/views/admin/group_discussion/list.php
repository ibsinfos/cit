 <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <!-- .page title -->
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Group discussion</h4>
                  </div>
                  <!-- /.page title -->
                  <!-- .breadcrumb -->
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">                   
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Group discussion</li>
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
            echo 'Updated Successfully';
          echo '</div>';          
        }
      }
      ?>
	  
	  
<div class="row">
<div class="col-sm-12">
 <div class="white-box">
 <h3 class="box-title m-b-0">Group discussion </h3> <br />
 <!--<p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/group_discussion/add" class="btn btn-success btn-rounded" > Add New</a></p>-->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
										    <th>S.No</th>
											<th>Username</th> 
                                            <th>Question </th>
											<th>Description</th>
                                            <th>Date</th>											
											<!--<th>Vew details</th>-->
											<th>Status</th>	
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
               <?php
			   $i=1;
              foreach($group_discussion as $row)
              {
				  $sql=$this->db->query("SELECT * FROM `tbl_users` WHERE `usr_id`=".$row['qs_userid']."");
				  $rec_user=$sql->row();
				  
				  if($row['qs_status']==0)
				   $status1="<b style='color:red; '>Pending</b>";
			      else if($row['qs_status']==1)
					  $status1="<b style='color:green; '>Approved</b>";
				  else
					  $status1="<b style='color:orange; '>Reject</b>";
				  
					echo '<tr>';
					echo '<td>'.$i++.'</td>';
					echo '<td>'.$rec_user->usr_username.'</td>';
					
					echo '<td>'.$row['qs_title'].'</td>';
					echo '<td>'.$row['qs_des'].'</td>';
					echo '<td>'.$row['qs_date'].'</td>';
					/*echo '<td><a href="'.site_url("admin").'/group_discussion/details/'.$row['question_id'].'" data-toggle="tooltip" data-original-title="Vew"> View </a> <br /> <br />
					  <a href="'.site_url("admin").'/admin_question_answer/index/'.$row['question_id'].'" data-toggle="tooltip" data-original-title="Answers">Answers </a>
					</td>';	*/
					echo '<td>'.$status1.'</td>';
					echo '<td class="text-nowrap"> ';
					?>
					<div class="btn-group m-r-10">
                     <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button">Dropdown <span class="caret"></span></button>
                       <ul role="menu" class="dropdown-menu">
                        <li><a href="<?php echo site_url("admin");?>/group_discussion/update/<?php echo $row['question_id']; ?>">Accept</a></li>
                         <li><a href="<?php echo site_url("admin");?>/admin_group_discussion/reject/<?php echo $row['question_id']; ?>">Reject</a></li>
                        <li><a href="<?php echo site_url("admin");?>/admin_question_answer/index/<?php echo $row['question_id']; ?>">View Answers</a></li>
                       <li><a onclick="return getConfirmation();" href="<?php echo site_url("admin");?>/group_discussion/delete/<?php echo $row['question_id']; ?>">Delete</a></li>
                         </ul>
                    </div>
					<?php /*if($row['qs_status']==0)
				   echo '<a href="'.site_url("admin").'/group_discussion/update/'.$row['question_id'].'" data-toggle="tooltip" data-original-title="Click Here For Approve"> <i class="fa fa-pencil text-inverse m-r-10"></i>'.$status.' </a> <br />';
			   
                   echo '<a href="'.site_url("admin").'/group_discussion/delete/'.$row['question_id'].'" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>';*/?>					   
				<?php 
				echo '</td>';
					echo '</tr>';
              }
              ?> 
             
				   
                    </tbody>
                </table>
				
				<br /> <br /> <br />  <br />
				
			 <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>	
         </div>
                        </div>
                    </div>
					
 </div>
	
	
	

	
	
	