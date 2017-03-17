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
						<div class="panel-title">Add New Visa Service</div>
					  
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
								<div class="form-group col-md-12">
									<label>Visa Service Title</label>
									<input class="form-control" name="service_title" placeholder="Visa Service Title" value="<?=set_value('service_title')?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>For Citizen of</label>
									<select class="form-control" name="for_citizen">
										<?php if(!empty($country_list)): foreach($country_list as $country): ?>
										<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
										<?php endforeach; endif; ?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Living In</label>
									<select class="form-control" name="living_in">
										<?php if(!empty($country_list)): foreach($country_list as $country): ?>
										<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
										<?php endforeach; endif; ?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Travelling to</label>
									<select class="form-control" name="travelling_to">
										<?php if(!empty($country_list)): foreach($country_list as $country): if($country['id']=='221'): ?>
										<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
										<?php endif; endforeach; endif; ?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Visa Type</label>
									<select class="form-control" name="visa_type">
										<?php if(!empty($visa_types)): foreach($visa_types as $visa): ?>
										<option value="<?=$visa['id']?>"><?=$visa['title']?></option>
										<?php endforeach; endif; ?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Visa Validity( in Days )</label>
									<input class="form-control" name="visa_validity" placeholder="Visa Validity(in Days)" value="<?=set_value('visa_validity')?>" type="text">
								</div>
								<div class="form-group col-md-4">
									<label>Visa Maximum Stay ( in Days )</label>
									<input class="form-control" name="visa_max_stay" placeholder="Maximum Stay in Foreign Country" value="<?=set_value('visa_max_stay')?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>Processing Time</label>
									<input class="form-control" name="processing_time" placeholder="Processing Time" value="<?=set_value('visa_max_stay')?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>Service Fee Amount</label>
									<input class="form-control" name="service_fee" placeholder="Service fee" value="<?=set_value('service_fee')?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>Embassy/Visa Fee Amount</label>
									<input class="form-control" name="embassy_fee" placeholder="Embassy/Visa Fee" value="<?=set_value('embassy_fee')?>" type="text">
								</div>
								<div class="form-group col-md-12">
									<label>Introduction Text</label>
									<textarea class="form-control" name="intro_text" placeholder="Introduction Page Content" id="ckeditor_full" rows="3"><?=set_value('intro_text')?></textarea>
								</div>
								<div class="form-group col-md-12">
									<label>Public Visibility</label>
									<select class="form-control" name="is_active">
										<option value="0" <?=set_select('is_active','0')?> >Hidden</option>
										<option value="1" <?=set_select('is_active','1')?> >Visible</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label>Add Visa Specific Questions(Max 20)</label>
									<div class="colbox">
										<div class="field_wrapper">
											<div class="form-group col-md-7">
												<label>Question Title</label>
												<input class="form-control" type="textarea" name="ques_title[]" value=""  />
											</div>
											<div class="form-group col-md-2">
												<label>Help Text</label>
												<input class="form-control" type="text" name="ques_help[]" value=""/>
											</div>
											<div class="form-group col-md-2">
												<label>Compulsory?</label>
												<select class="form-control"  name="quest_opt[]" >
													<option value="0" >No</option>
													<option value="1" >Yes</option>
												</select>
											</div>
											<div class="form-group col-md-1">
											<a href="javascript:void(0);" class="add_button" title="Add Question"><i class=" glyphicon glyphicon-plus-sign big_ico"></i></a>
											</div>
										</div>
									</div>
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