<link href="<?php echo base_url(); ?>assets/css/applicationform.css" media="all" rel="stylesheet" type="text/css"/>
<div class="inner-banner">
  <div class="container">
    <h2>
      <?=$title?>
    </h2>
  </div>
</div>
<div class="container">
<span class="fee">Total Fees: $<?=$top_total_value?></span>
  <h1>
    <?=$selected_visa_ser['service_title']?> Days Visa 
    <span></span></h1>
  <div class="bhoechie-tab-container">
    <div>
      <div class="bhoechie-tab-menu">
        <div class="list-group"> <a href="#" class="list-group-item active text-center" id="step_1">
          <!--<h4 class="glyphicon glyphicon-plane">-->
          </h4>
          Travelling Information </a> <a href="#" class="list-group-item text-center" id="step_2">
          <!--<h4 class="glyphicon glyphicon-road">-->
          </h4>
          Contact Details </a> <a href="#" class="list-group-item text-center" id="step_3">
          <!--<h4 class="glyphicon glyphicon-home">-->
          </h4>
          Applicant Information </a>
          <div class="clear"></div>
        </div>
      </div>
	  <form name="application_form_vsa" action="<?=base_url('frontend/visas_front/submit_data')?>" enctype="multipart/form-data" method="post">
      <div class="bhoechie-tab">
        <!-- flight section -->
        <div class="bhoechie-tab-content active">
         <fieldset>
          <div class="row">
            <div class="col-md-12">&nbsp;</div>
            <div class="form-group col-md-6">
              <div class="input-group" >
                <input style="margin:0" type="text" name="input-arrival-date" class="form-control datepicker_ar" placeholder="Arrival Date" value="<?=$master_data['arrival_date']?>" >
				<label class="input-group-addon btn" for="input-arrival-date">
				   <i class="fa fa-calendar input-arrival-date"></i>
				</label>  
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="input-group" >
                <input style="margin:0" type="text" name="input-departure-date" class="form-control datepicker_dep" placeholder="Deaparture Date" value="<?=$master_data['departure_date']?>">
				<label class="input-group-addon btn" for="input-departure-date">
				   <i class="fa fa-calendar input-departure-date"></i>
				</label>  
              </div>
            </div>
            <div class="col-md-12">
              <hr />
            </div>
            <div class="form-group col-md-3">
              <input type="button" class="btn btn-primary" onClick="$('#step_2').click();" value="Continue">
            </div>
          </div>
          </fieldset>
          </div>
          <!-- train section -->
          <div class="bhoechie-tab-content">
            <fieldset>
            <div class="row">
              <div class="col-md-12">
                <legend>Present Address</legend>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" name="text-current-address" placeholder="Present Address" rows="3"><?=$master_data['present_address']?></textarea>
                </div>
                <div class="form-group">
                  <input type="text" disabled class="form-control" name="input-current-country" placeholder="Country" value="<?php if(!empty($country_list)): foreach($country_list as $country):  if($master_data['applicant_living_in']==$country['id']){ echo $country['country_name']; } endforeach; endif; ?>" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="input-current-city" placeholder="City" value="<?=$master_data['city']?>" />
                </div>
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">
                    <?php if(!empty($country_list)): foreach($country_list as $country):  if($master_data['applicant_living_in']==$country['id']){ echo $country['phone_code']; } endforeach; endif; ?>
                    </span>
                    <input type="text" class="form-control" style="margin:0" name="input-current-mobile" pattern="/d{10}/" value="<?=$master_data['mobile']?>" placeholder="Cell" />
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="input-email" value="<?=$master_data['email_id']?>" placeholder="Email-id" />
                </div>
              </div>
            </div>
            </fieldset>
            <fieldset>
            <div class="row">
              <div class="col-md-12">
                <legend>Address in  UAE</legend>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <select class="form-control-input" name="select-emirates">
                    <option value="0" >Emirates</option>
                    <option value="Abu-Dhabi" <?php if($master_data['emirates'] == 'Abu-Dhabi'){ echo "selected"; }?>>Abu Dhabi</option>
                    <option value="Ajman" <?php if($master_data['emirates'] == 'Ajman'){ echo "selected"; }?>>Ajman</option>
                    <option value="Al-Fujerah" <?php if($master_data['emirates'] == 'Al-Fujerah'){ echo "selected"; }?>>Al Fujerah</option>
                    <option value="Dubai" <?php if($master_data['emirates'] == 'Dubai'){ echo "selected"; }?>>Dubai</option>
                    <option value="Ras-Al-Khaimah" <?php if($master_data['emirates'] == 'Ras-Al-Khaimah'){ echo "selected"; }?>>Ras Al Khaimah</option>
                    <option value="Sharjah" <?php if($master_data['emirates'] == 'Sharjah'){ echo "selected"; }?>>Sharjah</option>
                    <option value="Umm-Al-Quwain" <?php if($master_data['emirates'] == 'Umm-Al-Quwain'){ echo "selected"; }?>>Umm Al Quwain</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="input-current-phone" placeholder="Phone" value="<?=$master_data['uae_phone']?>" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" name="text-hotel-address" placeholder="UAE Hotel Address" rows="3"><?=$master_data['uae_hotel_address']?>
</textarea>
                </div>
              </div>
            </div>
            </fieldset>
            <fieldset>
            <div class="row">
              <div class="col-md-12">
                <legend>Emergency Contact</legend>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="input-emergency-person" placeholder="Name" value="<?=$master_data['emergency_name']?>" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="input-emergency-number" placeholder="Cell" value="<?=$master_data['emergency_phone']?>" />
                </div>
              </div>
            </div>
            </fieldset>
            <div class="row">
              <div class="col-md-12">
                <hr />
              </div>
              <div class="form-group col-md-3">
                <input type="button" class="btn btn-primary" onClick="$('#step_3').click();" value="Continue">
              </div>
            </div>
          </div>
          <!-- hotel search -->
          <div class="bhoechie-tab-content">
          <fieldset>
          <div class="row">
            <div class="col-md-12">
              <legend>Applicant # <span id="applicant_counter"></span> </legend>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="input-applicant-firstname" placeholder="First Name" value="<?=$master_data['applicant_firstname']?>" />
              </div>
              <div class="form-group">
                <select class="form-control" name="select-applicant-gender">
                  <option value="0">Gender</option>
                  <option value="male" <?php if($master_data['applicant_gender'] == 'male'){ echo "selected"; }?>>Male</option>
                  <option value="female" <?php if($master_data['applicant_gender'] == 'female'){ echo "selected"; }?>>Female</option>
                  <option value="transgender" <?php if($master_data['applicant_gender'] == 'transgender'){ echo "selected"; }?>>Transgender</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="<?=$master_data['applicant_birthplace']?>" placeholder="Birth Place" name="input-applicant-birthplace" />
              </div>
              <div class="form-group">
                <select class="form-control" name="select-applicant-religion">
                  <option value="0">Relegion</option>
                  <option value="BAHAI" <?php if($master_data['applicant_religion'] == 'BAHAI'){ echo "selected"; }?>> BAHAI</option>
                  <option value="BUDDHISM" <?php if($master_data['applicant_religion'] == 'BUDDHISM'){ echo "selected"; }?>> BUDDHISM</option>
                  <option value="CHRISTIAN" <?php if($master_data['applicant_religion'] == 'CHRISTIAN'){ echo "selected"; }?>> CHRISTIAN</option>
                  <option value="HINDU" <?php if($master_data['applicant_religion'] == 'HINDU'){ echo "selected"; }?>> HINDU</option>
                  <option value="ISLAM" <?php if($master_data['applicant_religion'] == 'ISLAM'){ echo "selected"; }?>> ISLAM</option>
                  <option value="JAINISM" <?php if($master_data['applicant_religion'] == 'JAINISM'){ echo "selected"; }?>> JAINISM</option>
                  <option value="JUDAISM" <?php if($master_data['applicant_religion'] == 'JUDAISM'){ echo "selected"; }?>> JUDAISM</option>
                  <option value="OTHERS" <?php if($master_data['applicant_religion'] == 'OTHERS'){ echo "selected"; }?>> OTHERS</option>
                  <option value="PARSI" <?php if($master_data['applicant_religion'] == 'PARSI'){ echo "selected"; }?>> PARSI</option>
                  <option value="SIKH" <?php if($master_data['applicant_religion'] == 'SIKH'){ echo "selected"; }?>> SIKH</option>
                  <option value="ZOROASTRIAN" <?php if($master_data['applicant_religion'] == 'ZOROASTRIAN'){ echo "selected"; }?>> ZOROASTRIAN</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="<?=$master_data['applicant_profession']?>" placeholder="Profession" name="input-applicant-profession" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="input-applicant-lastname" placeholder="Last name" value="<?=$master_data['applicant_lastname']?>" />
              </div>
              <div class="form-group">
                <input type="text" name="input-applicant-dob" class="form-control datepicker_dob" value="<?=$master_data['applicant_dob']?>" placeholder="DOB">
              </div>
              <div class="form-group">
                <select class="form-control" name="select-applicant-birthcountry">
                  <option value="0" >Birth Country</option>
                  <?php if(!empty($country_list)): foreach($country_list as $country): ?>
                  <option value="<?=$country['id']?>" <?php if($master_data['applicant_birthcountry'] == $country['id']){ echo "selected"; }?>><?=$country['country_name']?></option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="input-applicant-email" placeholder="Email-Id" value="<?=$master_data['email_id']?>" />
              </div>
              <div>Profession should be as per your passport.</div>
            </div>
          </div>
          </fieldset>
          <fieldset>
          <div class="row">
            <div class="col-md-12">
              <legend>Family Details</legend>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="input-applicant-fathername" placeholder="Father's Name" value="<?=$master_data['applicant_fathername']?>" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="input-applicant-mothername" placeholder="Mother's Name" value="<?=$master_data['applicant_mothername']?>" />
              </div>
            </div>
          </div>
          </fieldset>
          <fieldset>
          <div class="row">
            <div class="col-md-12">
              <legend>Applicant's Marital Status</legend>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="radio" name="input-applicant-maritalstatus" <?php if($master_data['applicant_marital'] == 'single'){ echo "checked='checked'"; }?> value="single" />
                <label class="control-label" >Single</label>
                <input type="radio" name="input-applicant-maritalstatus" <?php if($master_data['applicant_marital'] == 'married'){ echo "checked='checked'"; }?> value="married" />
                <label class="control-label" >Married</label>
              </div>
            </div>
          </div>
          </fieldset>
          <fieldset>
          <div class="row">
            <div class="col-md-12">
              <legend>Passport Information</legend>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="input-applicant-passportnumber" placeholder="Passport Number" value="<?=$master_data['applicant_passport_number']?>" />
              </div>
              <div class="form-group">
                <select class="form-control" name="select-appplicant-pissuecountry">
                  <option value="0" >Issuing Country</option>
                  <?php if(!empty($country_list)): foreach($country_list as $country): ?>
                  <option value="<?=$country['id']?>" <?php if($master_data['applicant_passport_issuingcountry'] == $country['id']){ echo "selected"; }?>>
                  <?=$country['country_name']?>
                  </option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control datepicker" placeholder="Expiry Date" name="input-applicant-expiry" value="<?=$master_data['applicant_passport_expiry']?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" value="<?=$master_data['applicant_passport_placeofissue']?>" placeholder="Place of Issue" name="input-applicant-placeofissue"  />
              </div>
              <div class="form-group">
                <input type="text" class="form-control datepicker_dob" placeholder="Issuing Date" name="input-applicant-issuedate" value="<?=$master_data['applicant_passport_issuedate']?>">
              </div>
            </div>
          </div>
          </fieldset>
          <fieldset>
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
						echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['coloured_passport']."\",\"".$master_data['id']."\",\"coloured_passport\")'>Delete existing file and Add new file</a>";
					} 
				?>
				<span id="add_new_coloured_passport" <?php if($applicant_files['coloured_passport'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file-applicant-passport"  value="" /></span>
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
						echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['return_ticket']."\",\"".$master_data['id']."\",\"return_ticket\")'>Delete existing file and Add new file</a>";
					} 
				?>
                <span id="add_new_return_ticket" <?php if($applicant_files['return_ticket'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up " name="file-applicant-returnticket" value="" /></span>
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
						echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['employee_id']."\",\"".$master_data['id']."\",\"employee_id\")'>Delete existing file and Add new file</a>";
					} 
				?>
                <span id="add_new_employee_id" <?php if($applicant_files['employee_id'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file-applicant-empid" value="" /></span>
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
						echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['residence_proof']."\",\"".$master_data['id']."\",\"residence_proof\")'>Delete existing file and Add new file</a>";
					} 
				?>
                <span id="add_new_residence_proof" <?php if($applicant_files['residence_proof'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file-applicant-residence" value="" /></span>
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
						echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['hotel_reservation']."\",\"".$master_data['id']."\",\"hotel_reservation\")'>Delete existing file and Add new file</a>";
					} 
				?>
                <span id="add_new_hotel_reservation" <?php if($applicant_files['hotel_reservation'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file-applicant-reservation" value="" /></span>
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
						echo "<a href='#' onclick='remove_user_file(event,\"".base_url('frontend/pages/delete_application_file')."\",\"".$applicant_files['misc_documents']."\",\"".$master_data['id']."\",\"misc_documents\")'>Delete existing file and Add new file</a>";
					} 
				?>
                <span id="add_new_misc_documents" <?php if($applicant_files['misc_documents'] != ''){ echo "style='display:none'"; } ?> ><input type="file" class="vs_doc_up" name="file-applicant-miscellanious" value="" /></span>
              </div>
            </div>
          </div>
          </fieldset>
          <div class="row">
            <div class="col-md-12">
              <hr />
            </div>
            <div class="col-md-12" id="applicant_details_more">
			<div class="col-md-3">Applicant Name</div><div class="col-md-3">DOB</div><div class="col-md-3">Passport No.</div><div class="col-md-3">Actions</div>
			<?php foreach($existing_applicant_data as $appl_data): ?>
			<div class="col-md-3"><?=$appl_data['applicant_firstname']?> <?=$appl_data['applicant_lastname']?></div>
			<div class="col-md-3"><?=$appl_data['applicant_dob']?></div>
			<div class="col-md-3"><?=$appl_data['applicant_passport_number']?></div>
			<?php if($appl_data['id'] == $parent_id){ ?> 
			<?php if($appl_data['id'] == $apl_id ){}else{ ?>
			<div class="col-md-3"><a href="<?=base_url('frontend/pages/edit_application/'.$appl_data['id'].'/'.$parent_id.'/'.$applicant_no);?>" >Edit</a></div>
			<?php } ?>
			<?php }else{ ?> 
			<div class="col-md-3"><?php if($appl_data['id'] == $apl_id ){}else{ ?><a href="<?=base_url('frontend/pages/edit_application/'.$appl_data['id'].'/'.$parent_id.'/'.$applicant_no);?>" >Edit</a><?php } ?> | <a href="#" onclick="del_applicant_master(event,'<?=base_url('frontend/pages/delete_application/');?>','<?=$appl_data['id']?>')" >Delete</a></div> <?php } ?>
			
			<?php endforeach; ?>
			</div>
            <div class="col-md-12"> <br/>
              <br/>
			  <div class="col-md-6">
				<input type="hidden" name="citizen_of" value="<?=$master_data['applicant_citizen_of']?>" />
				<input type="hidden" name="living_in" value="<?=$master_data['applicant_living_in']?>" />
				<input type="hidden" name="travelling_to" value="<?=$master_data['applicant_travelling_to']?>" />
				<input type="hidden" name="service_selected" value="<?=$master_data['selected_service']?>" />
				<input type="hidden" name="application_fee" value="<?=$master_data['payable_fee']?>" />
				<input type="hidden" name="temp_u_id" value="<?=md5(uniqid(rand(), true))?>" />
                <input type="hidden" name="ste_url" value="<?=base_url()?>" />
				<?php if($apl_id != $parent_id){ ?> 
				<input type="hidden" name="is_coapplicant" value="<?=$parent_id?>" />
				<?php } ?>
                <input type="button" class="btn btn-primary" onClick="form_submit_part_3_ed(event,<?=$apl_id?>)" value="Submit & Proceed" />
              </div>
              <div class="col-md-4"><a href="#" onClick="save_and_add_another_app(event,<?=$apl_id?>)">Add Another Applicant</a></div>
            </div>
          </div>
       </div>
    </div>
   </form>
  </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/applicationform.js"></script>
<script>$(document).ready(function() {  $('#step_3').click(); });</script>