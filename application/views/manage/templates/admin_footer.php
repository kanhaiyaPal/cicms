	<footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2017 <a href='#'>Website</a>
            </div>
            
         </div>
     </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	
	<?php if(isset($pages_script)&& ($pages_script == 'show')){ ?>
	
	<link href="<?php echo base_url(); ?>assets/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
	<script src="<?php echo base_url(); ?>assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/tables.js"></script>
	
	<?php } ?>
	
	<?php if(isset($editor_on)&& ($editor_on == 'show')){ ?>
	
	<script src="<?php echo base_url(); ?>assets/vendors/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/ckeditor/adapters/jquery.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/editors.js"></script>
	
	<?php } ?>
	
	<?php  if(isset($multiple_image_select)&& ($multiple_image_select == 'show')){ ?>
	
	<link href="<?php echo base_url(); ?>assets/vendors/multi_up/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/vendors/multi_up/themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
	<script src="<?php echo base_url(); ?>assets/vendors/multi_up/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/multi_up/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/multi_up/themes/explorer/theme.js" type="text/javascript"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/multi_up.js"></script>
	<?php } ?>
	
	<?php  if(isset($multiple_image_select_up)&& ($multiple_image_select_up == 'show')){ ?>
	
	<link href="<?php echo base_url(); ?>assets/vendors/multi_up/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/vendors/multi_up/themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
	<script src="<?php echo base_url(); ?>assets/vendors/multi_up/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/multi_up/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/multi_up/themes/explorer/theme.js" type="text/javascript"></script>
	
	<script>
	$(document).ready(function() {
	$("#input-id").fileinput({	minFileCount: 1,
								maxFileCount: 5,
								showUpload:false,
								allowedFileExtensions: ["jpg", "JPG", "jpeg", "JPEG","png","PNG","gif","GIF"],
								initialPreviewAsData: true, // identify if you are sending preview data only and not the markup
								overwriteInitial:false,
								validateInitialCount:true,
								deleteUrl: '<?=base_url('uploads/admin_delete')?>',
								initialPreview: [
								<?php 
								if(isset($page_media)&&(count($page_media)>0)): 
								foreach($page_media as $media1):
								?>
								"<?php echo base_url('/uploads/pages/').$media1['media_name']; ?>",
								<?php endforeach; endif; ?>
								],
								initialPreviewConfig: [
									
								<?php 
								if(isset($page_media)&&(count($page_media)>0)): 
								foreach($page_media as $media2):
								?>
								{caption: "<?=$media2['media_name']?>", key: '<?=$media2['id']?>'},
								<?php endforeach; endif; ?>
								],
							});
	} );
	</script>
	<?php } ?>
	<?php  if(isset($dynamic_field_gen)&& ($dynamic_field_gen == 'show')){ ?>
	<script src="<?php echo base_url(); ?>assets/js/dync_field.js" type="text/javascript"></script>
	<?php } ?>
	</body>
</html>