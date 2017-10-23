 <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <!-- .page title -->
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Question answers</h4>
                  </div>
                  <!-- /.page title -->
                  <!-- .breadcrumb -->
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">                   
          <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Question answers</li>
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
            echo '<strong></strong>Updated Successfully ';
          echo '</div>';          
        }
      }
      ?>
	  
	  
<div class="row">
<div class="col-sm-12">
 <div class="white-box">
 <h3 class="box-title m-b-0">Question answers</h3> <br />
 <!--<p class="text-muted m-b-20"> <a href="<?php echo base_url(); ?>admin/group_discussion/add" class="btn btn-success btn-rounded" > Add New</a></p>-->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
										    <th>S.No</th>
											<th>Username</th>
                                            <th>Question Name</th>
											<th>Question Answer</th>
                                            <th>Date</th>
											<th>Status</th>	
											<!--<th>Vew details</th>-->   											
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
               <?php
			   $i=1;
              foreach($question_answer as $row)
              {
				  $qs=$this->db->query("SELECT * FROM questions WHERE questions.question_id=".$row['as_question_id']."");				  
				  $qsrec=$qs->row();
				  
				  $us=$this->db->query("SELECT * FROM tbl_users WHERE usr_id=".$row['as_userid']."");				  
				  $rec=$us->row();
				  
				  
				  if($row['as_status']==0)
				   $status1="<b style='color:red;'>Pending</b>";
			      else if($row['as_status']==1)
					  $status1="<b style='color:green;'>Approved</b>";
				  else
					  $status1="<b style='color:green;'>Reject</b>";
				  
					echo '<tr>';
					echo '<td>'.$i++.'</td>';
					echo '<td>'.$rec->usr_username.'</td>';
					echo '<td>'.$qsrec->qs_title.'</td>';
					echo '<td>'.$row['as_des'].'</td>';	
                    echo '<td>'.$row['as_date'].'</td>';	
					echo '<td>'.$status1.'</td>';
				//echo '<td><a href="'.site_url("admin").'/question_answer/details/'.$row['as_id'].'" data-toggle="tooltip" data-original-title="Vew"> View </a></td>';						
					echo '<td class="text-nowrap"> ';
					?>
					<div class="btn-group">
                     <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button">Dropdown <span class="caret"></span></button>
                       <ul role="menu" class="dropdown-menu">
                        <li><a href="<?php echo site_url("admin");?>/admin_question_answer/update/<?php echo $row['as_id']; ?>">Accept</a></li>
                         <li><a href="<?php echo site_url("admin");?>/admin_question_answer/reject/<?php echo $row['as_id']; ?>">Reject</a></li>
                       
                       <li><a onclick="return getConfirmation();" href="<?php echo site_url("admin");?>/admin_question_answer/delete/<?php echo $row['as_id']; ?>">Delete</a></li>
                     </ul>
                    </div>
				  <?php 
				  /*if($row['as_status']==0)
					echo '<a href="'.site_url("admin").'/admin_question_answer/update/'.$row['as_id'].'" data-toggle="tooltip" data-original-title="Click here for Approve"> <i class="fa fa-pencil text-inverse m-r-10"></i>'.$status.'</a> ';
					
                   echo ' <br /> <a href="'.site_url("admin").'/admin_question_answer/delete/'.$row['as_id'].'" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>';*/
                          				   
					echo '</td>';
					echo '</tr>';
              }
              ?> 
                  <!--<a href="'.site_url("admin").'/group_discussion/delete/'.$row['question_id'].'" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>-->
				   
                    </tbody>
                </table>
				<br /> <br /> <br />  <br />
				
			 <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>	
         </div>
                        </div>
                    </div>
					
 </div>
	
	
	

	
	
	