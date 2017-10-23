 
 <footer class="footer text-center"> 2016 &copy; www.chicagoinstituteoftechnology.com 
 </footer>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>admin-template/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
        <!--slimscroll JavaScript -->
        <script src="<?php echo base_url(); ?>admin-template/js/jquery.slimscroll.js"></script>
		<?php /* ?>
        <!--Wave Effects -->
        <script src="<?php echo base_url(); ?>admin-template/js/waves.js"></script>
        <!-- Flot Charts JavaScript -->
        <script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <!-- google maps api -->
        <script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/vectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- Sparkline charts -->
        <script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!-- EASY PIE CHART JS -->
        <script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/jquery.easy-pie-chart/easy-pie-chart.init.js"></script>
        <!-- Custom Theme JavaScript -->
		 <?php */ ?>
        <script src="<?php echo base_url(); ?>admin-template/js/custom.min.js"></script>
        <!--<script src="<?php echo base_url(); ?>admin-template/js/dashboard2.js"></script>-->
		
<script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/tinymce/tinymce.min.js"></script>
   <script>
        $(document).ready(function () {
            if ($("#mymce").length > 0) {
                tinymce.init({
                    selector: "textarea#mymce"
                    , theme: "modern"
                    , height: 300
                    , plugins: [
   "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker"
   , "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking"
   , "save table contextmenu directionality emoticons template paste textcolor"
   ]
                    , toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons"
                , });
            }
        });
    </script>
		
        <!--Style Switcher -->
        <script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
	<script>
    $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div>Lesson Name<input type="text" name="lesson_name[]" class="form-control"   /> Aproximate Time<input type="text" name="lesson_time[]" class="form-control"  ><br /> <a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>	

<script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script>
            jQuery(document).ready(function () {
                
                $('.selectpicker').selectpicker({
					toggleActive: true
				});
               
               
            });
        </script>
<script src="<?php echo base_url(); ?>admin-template/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script>
    $('.complex-colorpicker').datepicker({
            autoclose: true
            , todayHighlight: true
        });
  </script>
<script type="text/javascript">
function getConfirmation(){
   var retVal = confirm("Are U sure you want delete ?");
   if( retVal == true ){
	  return true;
   }
   else{
	  return false;
   }
}
</script>
 
</body>


</html>