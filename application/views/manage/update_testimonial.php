<div class="page-content">
	<div class="row">
		<?php if(isset($sidebar)): ?>
		  <div class="col-md-2">
			<?php echo $sidebar; ?>
		  </div>
		  <?php endif; ?>
		  <div class="col-md-10">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="panel-title">Update Testimonial</div>
					  
						<div class="panel-options">
						  
						</div>
					</div>
					<div class="panel-body">
					<?php if(validation_errors()): ?>
						<div class="alert alert-danger" role="alert">
						  <?php echo validation_errors();  ?>
						</div>
					<?php endif; ?>
						<?php echo form_open_multipart(''); ?>
							<fieldset>
								<div class="form-group">
									<label>Title</label>
									<input class="form-control" name="testimonial_title" placeholder="Testimonial Title" value="<?=$testimonial_data['title']?>" type="text">
								</div>
								<div class="form-group">
									<label>Company</label>
									<input class="form-control" name="t_company" placeholder="Company Name" value="<?=$testimonial_data['company']?>" type="text">
								</div>
								<div class="form-group">
									<label>Designation</label>
									<input class="form-control" name="t_designation" placeholder="Designation" value="<?=$testimonial_data['designation']?>" type="text">
								</div>
								<div class="form-group">
									<label>Content</label>
									<textarea class="form-control" name="testimonial_content" placeholder="Testimonial Content" id="ckeditor_standard" rows="3"><?=$testimonial_data['content']?></textarea>
								</div>
								<div class="form-group">
									<label>Image</label>
									<?php 
										if($testimonial_data['image'] != ''){

											echo "<div class='preview_existing_image'><img class='img-responsive' src=".base_url('uploads/testimonials/'.$testimonial_data['image'])."  /><input type='hidden' value='".$testimonial_data['image']."' name='pro-testimonial-img' /></div><br/>";
											
											echo "<a href='#' onclick='remove_user_file(event,\"".base_url('manage/testimonials/delete_testimonial_image')."\",\"".$testimonial_data['image']."\",\"".$testimonial_data['id']."\")'>Delete existing file and Add new file</a>";
										} 
									?>
									<span id="add_new" <?php if($testimonial_data['image'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file_new_image"  value="" /></span>
								</div>
								<div class="form-group">
									<label>Order</label>
									<input class="form-control" name="testimonial_order" placeholder="Testimonial Order" value="<?=$testimonial_data['order_s']?>" type="text">
								</div>
							</fieldset>
							<div>
								<input type="submit" class="btn btn-primary" value='Submit' />
								<a class="btn btn-default" href='<?=$return_url?>'>Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>  				
		</div>
	</div>
</div>
<script>
function remove_user_file(event,del_url,filename,applicant_id){
	event.preventDefault();
	
	$.post( del_url, { file: filename, id: applicant_id } ).done(function( data ) { 
	
		alert('File Deleted Successfully, You can now upload new file');  
		$(".preview_existing_image").remove(); 
		
		$('#add_new').show(); 
		$(event.target).remove();
		
	});
}
</script>