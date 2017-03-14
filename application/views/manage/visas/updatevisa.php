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
						<div class="panel-title">Update Visa Type</div>
					  
						<div class="panel-options">
						  
						</div>
					</div>
					<div class="panel-body">
					<?php if(!empty(validation_errors())): ?>
						<div class="alert alert-danger" role="alert">
						  <?php echo validation_errors();  ?>
						</div>
					<?php endif; ?>
						<?php echo form_open(''); ?>
							<fieldset>
								<div class="form-group">
									<label>Title</label>
									<input class="form-control" name="visa_title" placeholder="Visa Title" value="<?=$visa_data['title']?>" type="text">
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