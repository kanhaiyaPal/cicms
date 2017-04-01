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
				   <span class="fa fa-calendar input-arrival-date"></span>
				</label>  
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="input-group" >
                <input style="margin:0" type="text" name="input-departure-date" class="form-control datepicker_dep" placeholder="Deaparture Date" value="<?=$master_data['departure_date']?>">
				<label class="input-group-addon btn" for="input-departure-date">
				   <span class="fa fa-calendar input-departure-date"></span>
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
                  <input type="text" class="form-control" name="input-current-city" placeholder="City" value="<?=$master_data['input-current-city']?>" />
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
                  <option value="male" >Male</option>
                  <option value="female">Female</option>
                  <option value="transgender">Transgender</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="" placeholder="Birth Place" name="input-applicant-birthplace" />
              </div>
              <div class="form-group">
                <select class="form-control" name="select-applicant-religion">
                  <option value="0">Relegion</option>
                  <option value="BAHAI"> BAHAI</option>
                  <option value="BUDDHISM"> BUDDHISM</option>
                  <option value="CHRISTIAN"> CHRISTIAN</option>
                  <option value="HINDU"> HINDU</option>
                  <option value="ISLAM"> ISLAM</option>
                  <option value="JAINISM"> JAINISM</option>
                  <option value="JUDAISM"> JUDAISM</option>
                  <option value="OTHERS"> OTHERS</option>
                  <option value="PARSI"> PARSI</option>
                  <option value="SIKH"> SIKH</option>
                  <option value="ZOROASTRIAN"> ZOROASTRIAN</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" value="" placeholder="Profession" name="input-applicant-profession" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="input-applicant-lastname" placeholder="Last name" value="" />
              </div>
              <div class="form-group">
                <input type="text" name="input-applicant-dob" class="form-control  datepicker_dob" placeholder="DOB">
              </div>
              <div class="form-group">
                <select class="form-control" name="select-applicant-birthcountry">
                  <option value="0" >Birth Country</option>
                  <?php if(!empty($country_list)): foreach($country_list as $country): ?>
                  <option value="<?=$country['id']?>"><?=$country['country_name']?></option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="input-applicant-email" placeholder="Email-Id" value="" />
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
                <input type="text" class="form-control" name="input-applicant-fathername" placeholder="Father's Name" value="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="input-applicant-mothername" placeholder="Mother's Name" value="" />
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
                <input type="radio" name="input-applicant-maritalstatus" value="single" />
                <label class="control-label">Single</label>
                <input type="radio" name="input-applicant-maritalstatus" value="married" />
                <label class="control-label">Married</label>
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
                <input type="text" class="form-control" name="input-applicant-passportnumber" placeholder="Passport Number" value="" />
              </div>
              <div class="form-group">
                <select class="form-control" name="select-appplicant-pissuecountry">
                  <option value="0" >Issuing Country</option>
                  <?php if(!empty($country_list)): foreach($country_list as $country): ?>
                  <option value="<?=$country['id']?>">
                  <?=$country['country_name']?>
                  </option>
                  <?php endforeach; endif; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control datepicker" placeholder="Expiry Date" name="input-applicant-expiry">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" value="" placeholder="Place of Issue" name="input-applicant-placeofissue" />
              </div>
              <div class="form-group">
                <input type="text" class="form-control datepicker_dob" placeholder="Issuing Date" name="input-applicant-issuedate">
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
                <input type="file" class="vs_doc_up" name="file-applicant-passport"  value="" />
              </div>
              <div class="form-group">
                <label class="control-label">Return Ticket Scanned Copy</label>
                <input type="file" class="vs_doc_up " name="file-applicant-returnticket" value="" />
              </div>
              <div class="form-group">
                <label class="control-label">Employee ID</label>
                <input type="file" class="vs_doc_up" name="file-applicant-empid" value="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Residence Proof</label>
                <input type="file" class="vs_doc_up" name="file-applicant-residence" value="" />
              </div>
              <div class="form-group">
                <label class="control-label">Hotel Reservation Copy</label>
                <input type="file" class="vs_doc_up" name="file-applicant-reservation" value="" />
              </div>
              <div class="form-group">
                <label class="control-label">Misc Documents</label>
                <input type="file" class="vs_doc_up" name="file-applicant-miscellanious" value="" />
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
			<div class="col-md-3"><a href="<?=base_url('frontend/pages/edit_application/'.$appl_data['id'].'/'.$parent_id.'/'.$applicant_no);?>" >Edit</a></div>
			<?php }else{ ?> 
			<div class="col-md-3"><a href="<?=base_url('frontend/pages/edit_application/'.$appl_data['id'].'/'.$parent_id.'/'.$applicant_no);?>" >Edit</a> | <a href="<?=base_url('frontend/pages/delete_application/'.$appl_data['id']);?>" >Delete</a></div> <?php } ?>
			
			<?php endforeach; ?>
			</div>
            <div class="col-md-12"> <br/>
              <br/>
              <div class="col-md-6">
				<input type="hidden" name="citizen_of" value="<?=$master_data['citizen_of']?>" />
				<input type="hidden" name="living_in" value="<?=$master_data['living_in']?>" />
				<input type="hidden" name="travelling_to" value="<?=$master_data['travelling_to']?>" />
				<input type="hidden" name="service_selected" value="<?=$master_data['service_selected']?>" />
				<input type="hidden" name="application_fee" value="<?=$master_data['application_fee']?>" />
				<input type="hidden" name="temp_u_id" value="<?=md5(uniqid(rand(), true))?>" />
				<input type="hidden" name="is_coapplicant" value="<?=$parent_id?>" />
                <input type="hidden" name="ste_url" value="<?=base_url()?>" />
                <input type="button" class="btn btn-primary" onClick="form_submit_part_3()" value="Submit & Proceed" />
              </div>
              <div class="col-md-4"><a href="#" onClick="add_another_app(event)">Add Another Applicant</a></div>
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