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
					<div class="panel-title"><?=$title?></div>
					<div class="panel-options">
					<button class="btn btn-primary" onclick="document.getElementById('visastpp').submit()"><span class="glyphicon glyphicon-floppy-disk"></span> Save Settings </button>
					</div>
				</div>
				<div class="panel-body">
				<?php if($this->session->flashdata('setting_updated')): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('setting_updated');  ?>
				</div>
				<?php endif; ?>
				<?php if(validation_errors()): ?>
					<div class="alert alert-danger" role="alert">
					  <?php echo validation_errors();  ?>
					</div>
				<?php endif; ?>
					<div id="rootwizard">
						<div class="navbar">
						  <div class="navbar-inner">
							<div class="container">
								<ul class="nav nav-pills">
									<li class="active"><a href="#tab1" data-toggle="pill">Step 1</a></li>
									<li><a href="#tab2" data-toggle="pill">Step 2</a></li>
									<li><a href="#tab3" data-toggle="tab">Step 3</a></li>
									<li><a href="#tab4" data-toggle="tab">Step 4</a></li>
									<li><a href="#tab5" data-toggle="tab">Step 5</a></li>
								</ul>
							</div>
						  </div>
						</div>
						<?php echo form_open_multipart('',array("class" =>"form-horizontal","id"=>"visastpp")); ?>
						 <div class="tab-content"> 
							<div class="tab-pane active" id="tab1">
								  <div class="form-group">
									<label class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
									  <?php if($step_1_image != ''): ?>
									  <img class="img-responsive" src="<?php echo base_url('uploads/admin/'.$step_1_image); ?>" />
									  <input type="hidden" name="old_step_1_image" value="<?=$step_1_image?>"/>
									  <?php endif; ?>
									  <input type="file" name="step_1_image" >
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" name="step_1_title" placeholder="Title of Step" value="<?=$step_1_title?>" />
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Content</label>
									<div class="col-sm-10">
									  <textarea class="form-control" name="step_1_content" placeholder="Content"  rows="3" ><?=$step_1_content?></textarea>
									</div>
								  </div>
							</div>
							<div class="tab-pane " id="tab2">
								  <div class="form-group">
									<label class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
									  <?php if($step_2_image != ''): ?>
									  <img class="img-responsive" src="<?php echo base_url('uploads/admin/'.$step_2_image); ?>" />
									  <input type="hidden" name="old_step_2_image" value="<?=$step_2_image?>"/>
									  <?php endif; ?>
									  <input type="file" name="step_2_image" >
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" name="step_2_title" placeholder="Title of Step" value="<?=$step_2_title?>" />
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Content</label>
									<div class="col-sm-10">
									  <textarea class="form-control" name="step_2_content" placeholder="Content"  rows="3" ><?=$step_2_content?></textarea>
									</div>
								  </div>
							</div>
							<div class="tab-pane " id="tab3">
								  <div class="form-group">
									<label class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
									  <?php if($step_3_image  != ''): ?>
									  <img class="img-responsive" src="<?php echo base_url('uploads/admin/'.$step_3_image); ?>" />
									  <input type="hidden" name="old_step_3_image" value="<?=$step_3_image?>"/>
									  <?php endif; ?>
									  <input type="file" name="step_3_image" >
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" name="step_3_title" placeholder="Title of Step" value="<?=$step_3_title?>" />
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Content</label>
									<div class="col-sm-10">
									  <textarea class="form-control" name="step_3_content" placeholder="Content"  rows="3" ><?=$step_3_content?></textarea>
									</div>
								  </div>
							</div>
							<div class="tab-pane " id="tab4">
								  <div class="form-group">
									<label class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
									  <?php if($step_4_image != ''): ?>
									  <img class="img-responsive" src="<?php echo base_url('uploads/admin/'.$step_4_image); ?>" />
									  <input type="hidden" name="old_step_4_image" value="<?=$step_4_image?>"/>
									  <?php endif; ?>
									  <input type="file" name="step_4_image" >
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" name="step_4_title" placeholder="Title of Step" value="<?=$step_4_title?>" />
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Content</label>
									<div class="col-sm-10">
									  <textarea class="form-control" name="step_4_content" placeholder="Content"  rows="3" ><?=$step_4_content?></textarea>
									</div>
								  </div>
							</div>
							<div class="tab-pane " id="tab5">
								  <div class="form-group">
									<label class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
									  <?php if($step_5_image != ''): ?>
									  <img class="img-responsive" src="<?php echo base_url('uploads/admin/'.$step_5_image); ?>" />
									  <input type="hidden" name="old_step_5_image" value="<?=$step_5_image?>"/>
									  <?php endif; ?>
									  <input type="file" name="step_5_image" >
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" name="step_5_title" placeholder="Title of Step" value="<?=$step_5_title?>" />
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Content</label>
									<div class="col-sm-10">
									  <textarea class="form-control" name="step_5_content" placeholder="Content"  rows="3" ><?=$step_5_content?></textarea>
									</div>
								  </div>
							</div>
						  </div>
						</form>							
					</div>
  				</div>
  			</div> 
		</div>
		</div>
    </div>