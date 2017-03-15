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
					<?php if(!empty(validation_errors())): ?>
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
									<label>Content</label>
									<textarea class="form-control" name="testimonial_content" placeholder="Testimonial Content" id="ckeditor_standard" rows="3"><?=$testimonial_data['content']?></textarea>
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