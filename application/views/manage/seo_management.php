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
					<div class="panel-title">SEO Management for reserved pages</div>
					<div class="panel-options">
						<div class="dync_div_cont">
							<button class="btn btn-primary" onclick="document.getElementById('seosett').submit ()"><span class="glyphicon glyphicon-floppy-disk"></span> Save Settings </button>
						</div>
					</div>
				</div>
				<div class="panel-body">
				<?php if(!empty($this->session->flashdata('setting_updated'))): ?>
					<div class="alert alert-success" role="alert">
					  <?php echo $this->session->flashdata('setting_updated');  ?>
					</div>
				<?php endif; ?>
				<?php if(!empty(validation_errors())): ?>
					<div class="alert alert-danger" role="alert">
					  <?php echo validation_errors();  ?>
					</div>
				<?php endif; ?>

					<?php echo form_open('',array("class" =>"form-horizontal","id"=>"seosett")); ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">Select Page</label>
							<div class="col-sm-10">
							  <select class="form-control" id="seo_page_selector" name="selected_seo_page" >
								<option value="0">Select page to continue</option>
								<?php foreach($data_pages as $page): ?>
								<option value="<?=$page['page_title']?>"><?=ucfirst($page['page_title'])?></option>
								<?php endforeach; ?>
							  </select>
							</div>
						</div>
						<div class="dync_div_cont">
						  <div class="form-group">
							<label class="col-sm-2 control-label">Meta Title</label>
							<div class="col-sm-10">
							  <textarea class="form-control" name="page_meta_title" placeholder="Meta Title"  rows="3" ></textarea>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Meta Description</label>
							<div class="col-sm-10">
							  <textarea class="form-control"  name="page_meta_description" placeholder="Meta Description"  rows="3"></textarea>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Meta Keywords</label>
							<div class="col-sm-10">
							  <textarea class="form-control" name="page_meta_keywords" placeholder="Meta Keywords"  rows="3" ></textarea>
							</div>
						  </div>
						</div>
					</form>
  				</div>
  			</div> 
		</div>
	</div>
</div>