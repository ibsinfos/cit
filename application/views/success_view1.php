<?php include 'template/header.php'?>
<!--Content Wrap Start-->
    	<div class="kf_content_wrap">
    				
    		<!--ABOUT UNIVERSITY START-->
    		<section>
    			<div class="container">
                	<div class="row">
                    	<div class="col-md-12">
                        	 <div class="text-center">
                            	<img src="<?php echo base_url(); ?>images/checked.png" alt="" /><br /><br />
                            	<h4>Payment Successful</h4>
                                <p>Your Payment has been processed.The details of this transaction for your reference.</p>
                            </div>
                        </div>
                    </div><br />
    				<div class="row">                                       	
                        <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                                	<div class="panel panel-default">
                                          <div class="panel-heading">
                                            <h3 class="panel-title">Payment Details</h3>
                                          </div>
                                          <div class="panel-body">
                                           	<table class="table table-bordred">
                                            	<tr>
                                                	<td><strong>Transaction Id :</strong></td>
                                                    <td align="right"><?php echo $trans_id ?></td>                                                    
                                                </tr>
                                                <tr>
                                                	<td><strong>Amount Paid :</strong> </td>
                                                    <td align="right">$<?php echo $amount; ?></td>
                                                </tr>
                                                
                                            </table>
                                          </div>
                                        </div>
                                </div>
                    </div>
    			</div>
    		</section>
    		<!--ABOUT UNIVERSITY END-->
    	</div>
        <!--Content Wrap End-->
<?php include 'template/footer.php'?>
