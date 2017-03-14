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
						<div class="panel-title">Add New Static Page</div>
					  
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
									<label>Parent Page</label>
									<select class="form-control" name="page_parent">
										<option value="0" selected >None</option>
										<?php if(!empty($p_pages)): foreach($p_pages as $page): ?>
										<option value="<?=$page['id']?>"><?=$page['title']?></option>
										<?php endforeach; endif; ?>
									</select>
								</div>
								<div class="form-group">
									<label>Title</label>
									<input class="form-control" name="page_title" placeholder="Page Title" value="<?=set_value('page_title')?>" type="text">
								</div>
								<div class="form-group">
									<label>Meta Tags</label>
									<textarea class="form-control" name="page_tags" placeholder="Meta tags" rows="3"><?=set_value('page_tags')?></textarea>
								</div>
								<div class="form-group">
									<label>Meta Description</label>
									<textarea class="form-control" name="page_description" placeholder="Meta Description" rows="3"><?=set_value('page_description')?></textarea>
								</div>
								<div class="form-group">
									<label>Content</label>
									<textarea class="form-control" name="page_content" placeholder="Page Content" id="ckeditor_standard" rows="3"><?=set_value('page_content')?></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">Upload Images</label>
										<input type="file" name="page_images[]" multiple=true class="file-loading" id="input-id">
										<p class="help-block">
											You can upload multiple images upto 5 images.(jpg,png and gif only)
										</p>
								</div>
								<div class="form-group">
									<label>Public Visibility</label>
									<select class="form-control" name="page_visibility">
										<option value="0" <?=set_select('page_visibility','0')?> >Hidden</option>
										<option value="1" <?=set_select('page_visibility','1')?> >Visible</option>
									</select>
								</div>
							</fieldset>
							<div>
								<input type="hidden" value="<?=$file_upload_url?>" id="admin_file_upload_url" />
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