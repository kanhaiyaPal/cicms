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
						<div class="panel-title">Edit Visa Service</div>
					  
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
								<div class="form-group col-md-12">
									<label>Visa Service Title</label>
									<input class="form-control" name="service_title" placeholder="Visa Service Title" value="<?=$service_data['service_title']?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>For Citizen of</label>
									<select class="form-control" name="for_citizen">
										<?php if(!empty($country_list)): foreach($country_list as $country): ?>
										<option value="<?=$country['id']?>" <?php if($service_data['for_citizen'] == $country['id']){ echo "selected"; }?>><?=$country['country_name']?></option>
										<?php endforeach; endif; ?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Travelling to</label>
									<select class="form-control" name="travelling_to">
										<?php if(!empty($country_list)): foreach($country_list as $country): ?>
										<option value="<?=$country['id']?>" <?php if($service_data['travelling_to'] == $country['id']){ echo "selected"; }?>><?=$country['country_name']?></option>
										<?php endforeach; endif; ?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Living In</label>
									<select class="form-control" name="living_in">
										<?php if(!empty($country_list)): foreach($country_list as $country): ?>
										<option value="<?=$country['id']?>" <?php if($service_data['living_in'] == $country['id']){ echo "selected"; }?>><?=$country['country_name']?></option>
										<?php endforeach; endif; ?>
									</select>
								</div>
								
								<div class="form-group col-md-4">
									<label>Visa Type</label>
									<select class="form-control" name="visa_type">
										<?php if(!empty($visa_types)): foreach($visa_types as $visa): ?>
										<option value="<?=$visa['id']?>" <?php if($service_data['visa_type'] == $visa['id']){ echo "selected"; }?>><?=$visa['title']?></option>
										<?php endforeach; endif; ?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label>Visa Validity( in Days )</label>
									<input class="form-control" name="visa_validity" placeholder="Visa Validity(in Days)" value="<?=$service_data['visa_validity']?>" type="text">
								</div>
								<div class="form-group col-md-4">
									<label>Visa Maximum Stay ( in Days )</label>
									<input class="form-control" name="visa_max_stay" placeholder="Maximum Stay in Foreign Country" value="<?=$service_data['visa_max_stay']?>" type="text">
								</div>
								<?php $processing_parts = explode('|-|',$service_data['processing_time']); 
								 $service_fee_parts = explode('|-|',$service_data['service_fee']); 
								 $embassy_fee_parts = explode('|-|',$service_data['embassy_fee']); ?>
								<div class="form-group col-md-3">
									<label><h4>Regular Visa Service</h4></label>
								</div>
								<div class="form-group col-md-9"><hr/><br/></div>
								<div class="form-group col-md-4">
									<label>Processing Time</label>
									<input class="form-control" name="processing_time_rg" placeholder="Processing Time" value="<?=$processing_parts[0]?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>Service Fee Amount</label>
									<input class="form-control" name="service_fee_rg" placeholder="Service fee" value="<?=$service_fee_parts[0]?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>Embassy/Visa Fee Amount</label>
									<input class="form-control" name="embassy_fee_rg" placeholder="Embassy/Visa Fee" value="<?=$embassy_fee_parts[0]?>" type="text">
								</div>
								<div class="form-group col-md-3">
									<label><h4>Premium Visa Service</h4></label>
								</div>
								<div class="form-group col-md-9"><hr/><br/></div>
								<div class="form-group col-md-4">
									<label>Processing Time</label>
									<input class="form-control" name="processing_time_prem" placeholder="Processing Time" value="<?=$processing_parts[1]?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>Service Fee Amount</label>
									<input class="form-control" name="service_fee_prem" placeholder="Service fee" value="<?=$service_fee_parts[1]?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>Embassy/Visa Fee Amount</label>
									<input class="form-control" name="embassy_fee_prem" placeholder="Embassy/Visa Fee" value="<?=$embassy_fee_parts[1]?>" type="text">
								</div>
								<div class="form-group col-md-3">
									<label><h4>Express Visa Service</h4></label>
								</div>
								<div class="form-group col-md-9"><hr/><br/></div>
								<div class="form-group col-md-4">
									<label>Processing Time</label>
									<input class="form-control" name="processing_time_ex" placeholder="Processing Time" value="<?=$processing_parts[2]?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>Service Fee Amount</label>
									<input class="form-control" name="service_fee_ex" placeholder="Service fee" value="<?=$service_fee_parts[2]?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									<label>Embassy/Visa Fee Amount</label>
									<input class="form-control" name="embassy_fee_ex" placeholder="Embassy/Visa Fee" value="<?=$embassy_fee_parts[2]?>" type="text">
								</div>
								<?php /*?>
								<div class="form-group col-md-4">
									<label>Meet & Greet Combo Available</label>
									<select class="form-control" name="meet_greet_combo" onchange="if(this.value =='1'){ $('#ex_ser_fe').show(); }else{ $('#ex_ser_fe').hide(); }">
										<option value="0" <?php if($service_data['extended_service_fee']== ''){ echo "selected"; } ?> >No</option>
										<option value="1" <?php if($service_data['extended_service_fee']!= ''){ echo "selected"; } ?> >Yes</option>
									</select>
								</div>
								<?php */?>
								
								<div class="form-group col-md-4" id="ex_ser_fe" <?php if($service_data['extended_service_fee']== ''){ echo 'style="display:none"'; } ?>>
									<label>Extended Service Fee Amount</label>
									<input class="form-control" name="extended_service_fee" placeholder="Extended Service Fee" value="<?=$service_data['extended_service_fee']?>" type="text">
								</div>
								
								<div class="form-group col-md-4">
									&nbsp;
								</div>
								<?php $text_parts = explode('|-|',$service_data['intro_content']); ?>
								<div class="form-group col-md-12">
									<label>Overview Text</label>
									<textarea class="form-control" name="overview_text" placeholder="Overview Page Content"  rows="3"><?=$text_parts[2]?></textarea>
								</div>
								<div class="form-group col-md-12">
									<label>Introduction Text</label>
									<textarea class="form-control" name="intro_text" placeholder="Introduction Page Content" id="ckeditor_full" rows="3"><?=$text_parts[0]?></textarea>
								</div>
								<div class="form-group col-md-12">
									<label>Detail Text</label>
									<textarea class="form-control" name="detail_text" placeholder="Detail Content" id="ckeditor_full_twice" rows="3"><?=$text_parts[1]?></textarea>
								</div>
								<div class="form-group col-md-12">
									<label>Public Visibility</label>
									<select class="form-control" name="is_active">
										<option value="0" <?php if($service_data['is_active']=='0'){echo "selected";} ?> >Hidden</option>
										<option value="1" <?php if($service_data['is_active']=='1'){echo "selected";} ?> >Visible</option>
									</select>
								</div>
								<!--<div class="form-group col-md-12">
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
											<?php  foreach($service_data_questions as $question): ?>
												<span>
													<div class="form-group col-md-7">
														<label>Question Title</label>
														<input class="form-control" type="textarea" name="ques_title[]" value="<?=$question['question_title']?>"  />
													</div>
													<div class="form-group col-md-2">
														<label>Help Text</label>
														<input class="form-control" type="text" name="ques_help[]" value="<?=$question['help_text']?>"/>
													</div>
													<div class="form-group col-md-2">
														<label>Compulsory?</label>
														<select class="form-control"  name="quest_opt[]" >
															<option value="0" <?php if($question['required']== '0'){echo "selected";} ?>>No</option>
															<option value="1" <?php if($question['required']== '1'){echo "selected";} ?>>Yes</option>
														</select>
													</div>
													<div class="form-group col-md-1">
													<a href="javascript:void(0);" class="remove_button" title="Add Question"><i class=" glyphicon glyphicon-minus-sign big_ico"></i></a>
													</div>
												</span>
											<?php endforeach; ?>
										</div>
									</div>
								</div>-->
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