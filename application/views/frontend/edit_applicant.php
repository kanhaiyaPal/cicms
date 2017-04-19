<div class="inner-banner">
  <div class="container">
    <h2>
      <?=$title?>
    </h2>
  </div>
</div>
<div class="container">
  <h1><?=$title?><span></span></h1>
  <form name="edit_appl_form" action="<?=base_url('frontend/visas_front/edit_applicant')?>" enctype="multipart/form-data" method="post" class="form-inline">
	<div class="row">
		<div class="col-md-12">
			  <fieldset>
			  <legend>Travel information</legend>
			 <div class="form-group col-md-6">
				<div class="input-group">
					<input style="margin:0" type="text" name="input-arrival-date" class="form-control datepicker_ar" id="arrival_date_uae" placeholder="Arrival Date to UAE" value="<?=$applicant_data['arrival_date']?>">
					<label class="input-group-addon btn" for="arrival_date_uae">
				     <i class="fa fa-calendar"></i>
				    </label>
				</div>
			  </div>
			  <div class="form-group col-md-6">
				<div class="input-group">
					<input style="margin:0" type="text" name="input-departure-date" class="form-control datepicker_dep" id="departure_date_uae" placeholder="Departure Date from UAE" value="<?=$applicant_data['departure_date']?>">
				    <label class="input-group-addon btn" for="departure_date_uae">
				     <i class="fa fa-calendar"></i>
				    </label>
				</div>
			  </div>
			 </fieldset>
			 <br/>
			 <fieldset>
			  <legend>Contact Details</legend>
			 <div class="form-group col-md-6">
				  <label>Present Address</label>
                  <textarea class="form-control" name="text-current-address" placeholder="Present Address" rows="3"><?=$applicant_data['present_address']?></textarea>
				  <div class="row">
				  <div class="col-md-6">
					<select name="input-current-country">
					 <option value="0" >Country</option>
					  <?php if(!empty($country_list)): foreach($country_list as $country): ?>
					  <option value="<?=$country['id']?>" <?php if($applicant_data['applicant_living_in'] == $country['id']){ echo "selected"; }?>><?=$country['country_name']?></option>
					  <?php endforeach; endif; ?>
					</select>
				  </div>
				  <div class="col-md-6"><input type="text" class="form-control" name="input-current-city" value="<?=$applicant_data['city']?>" /></div>
				  <div class="col-md-6"><input type="text" class="form-control" name="input-current-mobile" value="<?=$applicant_data['mobile']?>" /></div>
				  <div class="col-md-6"><input type="text" class="form-control" name="input-email" value="<?=$applicant_data['email_id']?>" /></div>
				  </div>
			 </div>
			 <div class="form-group col-md-6">
				<label>Address in UAE</label>
                  <textarea class="form-control" name="text-hotel-address" placeholder="Present Address" rows="3"><?=$applicant_data['uae_hotel_address']?></textarea>
				  <div class="row">
				  <div class="col-md-6">
					<select name="select-emirates">
						<option value="0">Emirates</option>
						<option value="Abu-Dhabi" <?php if($applicant_data['emirates'] == 'Abu-Dhabi'){ echo "selected";} ?>>Abu Dhabi</option>
						<option value="Ajman" <?php if($applicant_data['emirates'] == 'Ajman'){ echo "selected";} ?>>Ajman</option>
						<option value="Al-Fujerah" <?php if($applicant_data['emirates'] == 'Al-Fujerah'){ echo "selected";} ?>>Al Fujerah</option>
						<option value="Dubai" <?php if($applicant_data['emirates'] == 'Dubai'){ echo "selected";} ?>>Dubai</option>
						<option value="Ras-Al-Khaimah" <?php if($applicant_data['emirates'] == 'Ras-Al-Khaimah'){ echo "selected";} ?>>Ras Al Khaimah</option>
						<option value="Sharjah" <?php if($applicant_data['emirates'] == 'Sharjah'){ echo "selected";} ?>>Sharjah</option>
						<option value="Umm-Al-Quwain" <?php if($applicant_data['emirates'] == 'Umm-Al-Quwain'){ echo "selected";} ?>>Umm Al Quwain</option>
					</select>
				  </div>
				  <div class="col-md-6"><input type="text" class="form-control" name="input-current-phone" value="<?=$applicant_data['uae_phone']?>" /></div>
				  <div class="col-md-12">&nbsp;</div>
				  <div class="col-md-12">&nbsp;</div>
				  </div>
			 </div>
			 <div class="col-md-12"><label>Emergency Contact</label></div>
			 <div class="form-group col-md-6">
			 	<input class="form-control" type="text" name="input-emergency-person" value="<?=$applicant_data['emergency_name']?>" />				
			 </div>
			 <div class="form-group col-md-6">
				<input class="form-control" type="text" name="input-emergency-number" value="<?=$applicant_data['emergency_phone']?>" />				
			 </div>
			 </fieldset>
			 <br/>
			 <fieldset>
				<legend>Applicant Personal Details</legend>
				<div class="form-group col-md-12">
					<div class="row">
						<div class="col-md-3"><input type="text" name="input-applicant-firstname" class="form-control" value="<?=$applicant_data['applicant_firstname']?>" /></div>
						<div class="col-md-3"><input type="text" name="input-applicant-lastname" class="form-control" value="<?=$applicant_data['applicant_lastname']?>" /></div>
						<div class="col-md-3">
							<select name="select-applicant-gender">
							<option value="0">Gender</option>
							<option value="male" <?php if($applicant_data['applicant_gender'] == 'male'){ echo "selected";} ?>>Male</option>
							<option value="female" <?php if($applicant_data['applicant_gender'] == 'female'){ echo "selected";} ?>>Female</option>
							<option value="transgender" <?php if($applicant_data['applicant_gender'] == 'transgender'){ echo "selected";} ?>>Transgender</option>
							</select>
						</div>
						<div class="col-md-3">
							<input type="text" name="input-applicant-dob" class="form-control  datepicker_dob" placeholder="DOB" value="<?=$applicant_data['applicant_dob']?>">
						</div>
						<div class="col-md-3">
							<input type="text" name="input-applicant-birthplace" class="form-control" value="<?=$applicant_data['applicant_birthplace']?>" />
						</div>
						<div class="col-md-3">
							<select name="select-applicant-birthcountry">
							 <option value="0" >Birth Country</option>
							  <?php if(!empty($country_list)): foreach($country_list as $country): ?>
							  <option value="<?=$country['id']?>" <?php if($applicant_data['applicant_birthcountry'] == $country['id']){ echo "selected"; }?>><?=$country['country_name']?></option>
							  <?php endforeach; endif; ?>
							</select>
						</div>
						<div class="col-md-3">
							<select name="select-applicant-religion">
							  <option value="0">Relegion</option>
							  <option value="BAHAI" <?php if($applicant_data['applicant_religion'] == 'BAHAI'){ echo "selected";} ?>> BAHAI</option>
							  <option value="BUDDHISM" <?php if($applicant_data['applicant_religion'] == 'BUDDHISM'){ echo "selected";} ?>> BUDDHISM</option>
							  <option value="CHRISTIAN" <?php if($applicant_data['applicant_religion'] == 'CHRISTIAN'){ echo "selected";} ?>> CHRISTIAN</option>
							  <option value="HINDU" <?php if($applicant_data['applicant_religion'] == 'HINDU'){ echo "selected";} ?>> HINDU</option>
							  <option value="ISLAM" <?php if($applicant_data['applicant_religion'] == 'ISLAM'){ echo "selected";} ?>> ISLAM</option>
							  <option value="JAINISM" <?php if($applicant_data['applicant_religion'] == 'JAINISM'){ echo "selected";} ?>> JAINISM</option>
							  <option value="JUDAISM" <?php if($applicant_data['applicant_religion'] == 'JUDAISM'){ echo "selected";} ?>> JUDAISM</option>
							  <option value="OTHERS" <?php if($applicant_data['applicant_religion'] == 'OTHERS'){ echo "selected";} ?>> OTHERS</option>
							  <option value="PARSI" <?php if($applicant_data['applicant_religion'] == 'PARSI'){ echo "selected";} ?>> PARSI</option>
							  <option value="SIKH" <?php if($applicant_data['applicant_religion'] == 'SIKH'){ echo "selected";} ?>> SIKH</option>
							  <option value="ZOROASTRIAN" <?php if($applicant_data['applicant_religion'] == 'ZOROASTRIAN'){ echo "selected";} ?>> ZOROASTRIAN</option>
							</select>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="input-applicant-profession" value="<?=$applicant_data['applicant_profession']?>" />
						</div>
						<div class="col-md-12"><label>Family Details</label></div>
						<div class="col-md-6">
							<input type="text" class="form-control" name="input-applicant-fathername" value="<?=$applicant_data['applicant_fathername']?>" />
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" name="input-applicant-mothername" value="<?=$applicant_data['applicant_mothername']?>" />
						</div>
						<div class="col-md-2"><label>Applicant Marital Status</label></div>
						<div class="col-md-6">
							<label><input type="radio" name="input-applicant-maritalstatus" value="single" <?php if($applicant_data['applicant_marital'] == 'single'){ echo "checked";} ?> /> Single</label>
							<label><input type="radio" name="input-applicant-maritalstatus" value="married" <?php if($applicant_data['applicant_marital'] == 'married'){ echo "checked";} ?> /> Married</label>
						</div>
						<div class="col-md-4">&nbsp;</div>
						<div class="col-md-12"><label>Passport Details</label></div>
						<div class="col-md-3"><input type="text" class="form-control" name="input-applicant-passportnumber" value="<?=$applicant_data['applicant_passport_number']?>" /></div>
						<div class="col-md-3"><input type="text" class="form-control" name="input-applicant-placeofissue" value="<?=$applicant_data['applicant_passport_placeofissue']?>" /></div>
						<div class="col-md-3">
							<select name="select-appplicant-pissuecountry">
							 <option value="0" >Issuing Country</option>
							  <?php if(!empty($country_list)): foreach($country_list as $country): ?>
							  <option value="<?=$country['id']?>" <?php if($applicant_data['applicant_passport_issuingcountry'] == $country['id']){ echo "selected"; }?>><?=$country['country_name']?></option>
							  <?php endforeach; endif; ?>
							</select>
						</div>
						<div class="col-md-3">&nbsp;</div><div class="col-md-3">&nbsp;</div>
						<div class="col-md-3"><input type="text" class="form-control datepicker_dob" placeholder="Issuing Date" name="input-applicant-issuedate" value="<?=$applicant_data['applicant_passport_issuedate']?>"></div>
						<div class="col-md-3"><input type="text" class="form-control datepicker" placeholder="Expiry Date" name="input-applicant-expiry" value="<?=$applicant_data['applicant_passport_expiry']?>"></div>
						<div class="col-md-12">&nbsp;</div>
						<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
								  <legend>Upload Documents</legend>
								</div>
								<div class="col-md-6">
								  <div class="form-group">
									<label class="control-label">Coloured Passport Photo</label>
									<?php 
										if($applicant_files['coloured_passport'] != ''){
											$ext = pathinfo($applicant_files['coloured_passport'], PATHINFO_EXTENSION);
											if(($ext == 'jpg')||($ext == 'JPG')||($ext == 'png')||($ext == 'PNG')||($ext == 'gif')||($ext == 'GIF'))
											{ 
												echo "<div class='preview_existing_image_coloured_passport'><img class='img-responsive' src=".base_url('uploads/visas/user_docs/'.$applicant_files['coloured_passport'])."  /><input type='hidden' value='".$applicant_files['coloured_passport']."' name='pro-file-applicant-passport' /></div><br/>";
											}
											if(($ext == 'pdf')||($ext == 'PDF')||($ext == 'doc')||($ext == 'docx'))
											{
												echo "<div class='preview_existing_file_coloured_passport'><a href=".base_url('uploads/visas/user_docs/'.$applicant_files['coloured_passport'])."><img class='img-responsive' src=".base_url('assets/images/icon-form.png')."  /><input type='hidden' value='".$applicant_files['coloured_passport']."' name='pro-file-applicant-passport' /></a></div><br/>";
											}
											
											if(($applicant_files['coloured_passport_reject'] != '0')&&($applicant_files['coloured_passport_reject'] != '1')){
												echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['coloured_passport']."\",\"".$applicant_data['id']."\",\"coloured_passport\")'>Delete existing file and Add new file</a>";
											}
										} 
									?>
									<span id="add_new_coloured_passport" <?php if($applicant_files['coloured_passport'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file-applicant-passport"  value="" /></span>
									
									<?php if($applicant_files['coloured_passport_reject'] == '0'){ ?> 
									<div class="alert alert-warning"> <i class="glyphicon glyphicon-exclamation-sign" ></i> Document under review </div>
									<?php }elseif($applicant_files['coloured_passport_reject'] == '1'){ ?> 
									<div class="alert alert-success"> <i class="glyphicon glyphicon-ok-sign" ></i>Document Approved</div>
									<?php }else{ ?>
									<div class="alert alert-danger"> <i class="glyphicon glyphicon-remove-sign"></i> Your uploaded document has been Rejected. Reason: <br/> <strong><?=$applicant_files['coloured_passport_reject']?></strong></div>	
									<?php } ?>
								  </div>
								  <div class="form-group">
									<label class="control-label">Return Ticket Scanned Copy</label>
									<?php 
										if($applicant_files['return_ticket'] != ''){
											$ext = pathinfo($applicant_files['return_ticket'], PATHINFO_EXTENSION);
											if(($ext == 'jpg')||($ext == 'JPG')||($ext == 'png')||($ext == 'PNG')||($ext == 'gif')||($ext == 'GIF'))
											{ 
												echo "<div class='preview_existing_image_return_ticket'><img class='img-responsive' src=".base_url('uploads/visas/user_docs/'.$applicant_files['return_ticket'])."  /><input type='hidden' value='".$applicant_files['return_ticket']."' name='pro-file-applicant-returnticket' /></div><br/>";
											}
											if(($ext == 'pdf')||($ext == 'PDF')||($ext == 'doc')||($ext == 'docx'))
											{
												echo "<div class='preview_existing_file_return_ticket'><a href=".base_url('uploads/visas/user_docs/'.$applicant_files['return_ticket'])."><img class='img-responsive' src=".base_url('assets/images/icon-form.png')."  /><input type='hidden' value='".$applicant_files['return_ticket']."' name='pro-file-applicant-returnticket' /></a></div><br/>";
											}
											
											if(($applicant_files['return_ticket_reject'] != '0')&&($applicant_files['return_ticket_reject'] != '1')){
												echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['return_ticket']."\",\"".$applicant_data['id']."\",\"return_ticket\")'>Delete existing file and Add new file</a>";
											}
										} 
									?>
									<span id="add_new_return_ticket" <?php if($applicant_files['return_ticket'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up " name="file-applicant-returnticket" value="" /></span>
									
									<?php if($applicant_files['return_ticket_reject'] == '0'){ ?> 
									<div class="alert alert-warning"> <i class="glyphicon glyphicon-exclamation-sign" ></i> Document under review </div>
									<?php }elseif($applicant_files['return_ticket_reject'] == '1'){ ?> 
									<div class="alert alert-success"> <i class="glyphicon glyphicon-ok-sign" ></i>Document Approved</div>
									<?php }else{ ?>
									<div class="alert alert-danger"> <i class="glyphicon glyphicon-remove-sign"></i> Your uploaded document has been Rejected. Reason: <br/> <strong><?=$applicant_files['return_ticket_reject']?></strong></div>	
									<?php } ?>
								  </div>
								  <div class="form-group">
									<label class="control-label">Employee ID</label>
									<?php 
										if($applicant_files['employee_id'] != ''){
											$ext = pathinfo($applicant_files['employee_id'], PATHINFO_EXTENSION);
											if(($ext == 'jpg')||($ext == 'JPG')||($ext == 'png')||($ext == 'PNG')||($ext == 'gif')||($ext == 'GIF'))
											{ 
												echo "<div class='preview_existing_image_employee_id'><img class='img-responsive' src=".base_url('uploads/visas/user_docs/'.$applicant_files['employee_id'])."  /><input type='hidden' value='".$applicant_files['return_ticket']."' name='pro-file-applicant-empid' /></div><br/>";
											}
											if(($ext == 'pdf')||($ext == 'PDF')||($ext == 'doc')||($ext == 'docx'))
											{
												echo "<div class='preview_existing_file_employee_id'><a href=".base_url('uploads/visas/user_docs/'.$applicant_files['employee_id'])."><img class='img-responsive' src=".base_url('assets/images/icon-form.png')."  /><input type='hidden' value='".$applicant_files['return_ticket']."' name='pro-file-applicant-empid' /></a></div><br/>";
											}
											
											if(($applicant_files['employee_id_reject'] != '0')&&($applicant_files['employee_id_reject'] != '1')){
												echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['employee_id']."\",\"".$applicant_data['id']."\",\"employee_id\")'>Delete existing file and Add new file</a>";
											}
										} 
									?>
									<span id="add_new_employee_id" <?php if($applicant_files['employee_id'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file-applicant-empid" value="" /></span>
									
									<?php if($applicant_files['employee_id_reject'] == '0'){ ?> 
									<div class="alert alert-warning"> <i class="glyphicon glyphicon-exclamation-sign" ></i> Document under review </div>
									<?php }elseif($applicant_files['employee_id_reject'] == '1'){ ?> 
									<div class="alert alert-success"> <i class="glyphicon glyphicon-ok-sign" ></i> Document Approved</div>
									<?php }else{ ?>
									<div class="alert alert-danger"> <i class="glyphicon glyphicon-remove-sign"></i> Your uploaded document has been Rejected. Reason: <br/> <strong><?=$applicant_files['employee_id_reject']?></strong></div>	
									<?php } ?>
								  </div>
								</div>
								<div class="col-md-6">
								  <div class="form-group">
									<label class="control-label">Residence Proof</label>
									<?php 
										if($applicant_files['residence_proof'] != ''){
											$ext = pathinfo($applicant_files['residence_proof'], PATHINFO_EXTENSION);
											if(($ext == 'jpg')||($ext == 'JPG')||($ext == 'png')||($ext == 'PNG')||($ext == 'gif')||($ext == 'GIF'))
											{ 
												echo "<div class='preview_existing_image_residence_proof'><img class='img-responsive' src=".base_url('uploads/visas/user_docs/'.$applicant_files['residence_proof'])."  /><input type='hidden' value='".$applicant_files['residence_proof']."' name='pro-file-applicant-residence' /></div><br/>";
											}
											if(($ext == 'pdf')||($ext == 'PDF')||($ext == 'doc')||($ext == 'docx'))
											{
												echo "<div class='preview_existing_file_residence_proof'><a href=".base_url('uploads/visas/user_docs/'.$applicant_files['residence_proof'])."><img class='img-responsive' src=".base_url('assets/images/icon-form.png')."  /></a><input type='hidden' value='".$applicant_files['residence_proof']."' name='pro-file-applicant-residence' /></div><br/>";
											}
											if(($applicant_files['residence_proof_reject'] != '0')&&($applicant_files['residence_proof_reject'] != '1')){
												echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['residence_proof']."\",\"".$applicant_data['id']."\",\"residence_proof\")'>Delete existing file and Add new file</a>";
											}
										} 
									?>
									<span id="add_new_residence_proof" <?php if($applicant_files['residence_proof'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file-applicant-residence" value="" /></span>
									
									<?php if($applicant_files['residence_proof_reject'] == '0'){ ?> 
									<div class="alert alert-warning"> <i class="glyphicon glyphicon-exclamation-sign" ></i> Document under review </div>
									<?php }elseif($applicant_files['residence_proof_reject'] == '1'){ ?> 
									<div class="alert alert-success"> <i class="glyphicon glyphicon-ok-sign" ></i>Document Approved</div>
									<?php }else{ ?>
									<div class="alert alert-danger"> <i class="glyphicon glyphicon-remove-sign"></i> Your uploaded document has been Rejected. Reason: <br/> <strong><?=$applicant_files['residence_proof_reject']?></strong></div>	
									<?php } ?>
								  </div>
								  <div class="form-group">
									<label class="control-label">Hotel Reservation Copy</label>
									<?php 
										if($applicant_files['hotel_reservation'] != ''){
											$ext = pathinfo($applicant_files['hotel_reservation'], PATHINFO_EXTENSION);
											if(($ext == 'jpg')||($ext == 'JPG')||($ext == 'png')||($ext == 'PNG')||($ext == 'gif')||($ext == 'GIF'))
											{ 
												echo "<div class='preview_existing_image_hotel_reservation'><img class='img-responsive' src=".base_url('uploads/visas/user_docs/'.$applicant_files['hotel_reservation'])."  /><input type='hidden' value='".$applicant_files['hotel_reservation']."' name='pro-file-applicant-reservation' /></div><br/>";
											}
											if(($ext == 'pdf')||($ext == 'PDF')||($ext == 'doc')||($ext == 'docx'))
											{
												echo "<div class='preview_existing_file_hotel_reservation'><a href=".base_url('uploads/visas/user_docs/'.$applicant_files['hotel_reservation'])."><img class='img-responsive' src=".base_url('assets/images/icon-form.png')."  /></a><input type='hidden' value='".$applicant_files['hotel_reservation']."' name='pro-file-applicant-reservation' /></div><br/>";
											}
											if(($applicant_files['hotel_reservation_reject'] != '0')&&($applicant_files['hotel_reservation_reject'] != '1')){
												echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['hotel_reservation']."\",\"".$applicant_data['id']."\",\"hotel_reservation\")'>Delete existing file and Add new file</a>";
											}
										} 
									?>
									<span id="add_new_hotel_reservation" <?php if($applicant_files['hotel_reservation'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file-applicant-reservation" value="" /></span>
									
									<?php if($applicant_files['hotel_reservation_reject'] == '0'){ ?> 
									<div class="alert alert-warning"> <i class="glyphicon glyphicon-exclamation-sign" ></i> Document under review </div>
									<?php }elseif($applicant_files['hotel_reservation_reject'] == '1'){ ?> 
									<div class="alert alert-success"> <i class="glyphicon glyphicon-ok-sign" ></i>Document Approved</div>
									<?php }else{ ?>
									<div class="alert alert-danger"> <i class="glyphicon glyphicon-remove-sign"></i> Your uploaded document has been Rejected. Reason: <br/> <strong><?=$applicant_files['hotel_reservation_reject']?></strong></div>	
									<?php } ?>
								  </div>
								  <div class="form-group">
									<label class="control-label">Misc Documents</label>
									<?php 
										if($applicant_files['misc_documents'] != ''){
											$ext = pathinfo($applicant_files['misc_documents'], PATHINFO_EXTENSION);
											if(($ext == 'jpg')||($ext == 'JPG')||($ext == 'png')||($ext == 'PNG')||($ext == 'gif')||($ext == 'GIF'))
											{ 
												echo "<div class='preview_existing_image_misc_documents'><img class='img-responsive' src=".base_url('uploads/visas/user_docs/'.$applicant_files['misc_documents'])."  /><input type='hidden' value='".$applicant_files['misc_documents']."' name='pro-file-applicant-miscellanious' /></div><br/>";
											}
											if(($ext == 'pdf')||($ext == 'PDF')||($ext == 'doc')||($ext == 'docx'))
											{
												echo "<div class='preview_existing_file_misc_documents'><a href=".base_url('uploads/visas/user_docs/'.$applicant_files['misc_documents'])."><img class='img-responsive' src=".base_url('assets/images/icon-form.png')." /></a><input type='hidden' value='".$applicant_files['misc_documents']."' name='pro-file-applicant-miscellanious' /></div><br/>";
											}
											
											if(($applicant_files['misc_documents_reject'] != '0')&&($applicant_files['misc_documents_reject'] != '1')){
												echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['misc_documents']."\",\"".$applicant_data['id']."\",\"misc_documents\")'>Delete existing file and Add new file</a>";
											}
										} 
									?>
									<span id="add_new_misc_documents" <?php if($applicant_files['misc_documents'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file-applicant-miscellanious" value="" /></span>
									
									<?php if($applicant_files['misc_documents_reject'] == '0'){ ?> 
									<div class="alert alert-warning"> <i class="glyphicon glyphicon-exclamation-sign" ></i> Document under review </div>
									<?php }elseif($applicant_files['misc_documents_reject'] == '1'){ ?> 
									<div class="alert alert-success"> <i class="glyphicon glyphicon-ok-sign" ></i>Document Approved</div>
									<?php }else{ ?>
									<div class="alert alert-danger"> <i class="glyphicon glyphicon-remove-sign"></i> Your uploaded document has been Rejected. Reason: <br/> <strong><?=$applicant_files['misc_documents_reject']?></strong></div>	
									<?php } ?>
								  </div>
								</div>
							  </div>
						</div>
					  </div>	
					</div>
				</div>
			 </fieldset>
			 <?php if(isset($co_applicants)): ?>
			 <div class="col-md-12">&nbsp;</div>
			 <fieldset>
				<legend>Co-applicants</legend>
				<table class="table table-hover">
					<thead>
					  <tr>
						<th>S.no</th>
						<th>Applicant Name</th>
						<th>Passport Number</th>
						<th>DOB</th>
						<th>Actions</th>
					  </tr>
					 </thead>
					 <tbody>
						<?php if(count($co_applicants)>0): ?>
						<?php $counter =1; foreach($co_applicants as $application): ?>
						<tr>
							<td><?=$counter?></td>
							<td><?=$application['applicant_firstname']?> <?=$application['applicant_lastname']?></td>
							<td><?=$application['applicant_passport_number']?></td>
							<td><?=$application['applicant_dob']?></td>
							<td>
								<a href="<?=base_url('frontend/pages/edit_main_applicant/'.$application['id'])?>" title="Edit this application"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
								<a href="<?=base_url('frontend/visas_front/delete_user_application_front/'.$application['id'])?>" title="Delete this application"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
							</td>
						</tr>
						<?php $counter++; endforeach; ?>
						<?php else: ?>
						<tr><td colspan="5" align="center"> <strong>No applications to display</strong> </td></tr>
						<?php endif; ?>
					 </tbody>
				</table>
			 </fieldset>
			 <?php endif; ?>
			 <div class="row">
				<div class="col-md-4">&nbsp;</div>
				 <div class="col-md-4" align="center">
				 <input type="hidden" name="citizen_of" value="<?=$applicant_data['applicant_citizen_of']?>" />
				 <input type="hidden" name="living_in" value="<?=$applicant_data['applicant_living_in']?>" />
				 <input type="hidden" name="travelling_to" value="<?=$applicant_data['applicant_travelling_to']?>" />
				 <input type="hidden" name="service_selected" value="<?=$applicant_data['selected_service']?>" />
				 <input type="hidden" name="application_fee" value="<?=$applicant_data['payable_fee']?>" />
				 <input type="hidden" name="application_id" value="<?=$applicant_data['id']?>" />
				 <input type="submit" name="edit_applicant_data_bt" value="Save" class="btn btn-primary" />
				 <input type="button" value="Back" onclick="location.href='<?=$back_url?>'" class="btn btn-default" />
				 </div>
				 <div class="col-md-4">&nbsp;</div>
			 </div>
		</div>
	</div>
  </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/edit_front_app.js"></script>
<?php if(isset($application_st) && ($application_st != 'submitted')): ?>
<script src="<?php echo base_url(); ?>assets/js/edit_app_disable_form.js"></script>
<?php endif; ?>