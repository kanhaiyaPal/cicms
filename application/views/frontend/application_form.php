<link href="<?php echo base_url(); ?>assets/css/applicationform.css" media="all" rel="stylesheet" type="text/css"/>
<div class="inner-banner">
  <div class="container">
    <h2>
      <?=$title?>
    </h2>
  </div>  
</div>
<div class="container">
  <h1><?=$title?><span></span></h1>
	<div class="bhoechie-tab-container">
    <div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
			  <div class="list-group">
				<a href="#" class="list-group-item active text-center" id="step_1">
				  <!--<h4 class="glyphicon glyphicon-plane">--></h4>Travelling Information
				</a>
				<a href="#" class="list-group-item text-center" id="step_2">
				  <!--<h4 class="glyphicon glyphicon-road">--></h4>Contact Details
				</a>
				<a href="#" class="list-group-item text-center" id="step_3">
				  <!--<h4 class="glyphicon glyphicon-home">--></h4>Applicant Information
				</a>
			  </div>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
				<!-- flight section -->
				<div class="bhoechie-tab-content active">
					<form name="dates_form" action="">
						<fieldset>
                        <div class="row">
                        <div class="col-md-12">&nbsp;</div>
						<div class="form-group col-md-6">
							<div class="input-group" >
                            
								<input type="text" name="input-arrival-date" class="form-control datepicker" placeholder="Arrival Date in UAE" >
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="input-group" >
                            
								<input type="text" name="input-departure-date" class="form-control datepicker" placeholder="Departure Date from UAE">
							</div>
						</div>
                        </div>
						</fieldset>
						<div class="form-group col-md-3">
							<input type="button" class="btn btn-primary" onclick="$('#step_2').click();" value="Continue">
						</div>
					
				</div>
				<!-- train section -->
				<div class="bhoechie-tab-content">
					
						<fieldset>
							<legend>Current Address</legend>
							<div class="col-md-6">
								<div class="form-group">
									<textarea class="form-control" name="text-current-address" placeholder="Current Address" rows="5"></textarea>
								</div>
								<div class="form-group">
									<input type="text" disabled class="form-control" name="input-current-country" placeholder="Country" value="Argentena" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="input-current-city" placeholder="City" value="" />
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="input-current-mobile" pattern="/d{10}/" value="" placeholder="Mobile" />
								</div>
								<div class="form-group">
									<input type="email" class="form-control" name="input-email" value="" placeholder="Email" />
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Address in  UAE</legend>
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control-input" name="input-emirates">
										<option value="0">Emirates</option>
										<option value="1">Abu Dhabi</option>
										<option value="4">Ajman</option>
										<option value="7">Al Fujerah</option>
										<option value="2">Dubai</option>
										<option value="6">Ras Al Khaimah</option>
										<option value="3">Sharjah</option>
										<option value="5">Umm Al Quwain</option>
                                    </select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="input-current-phone" placeholder="Phone" value="" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<textarea class="form-control" name="text-hotel-address" placeholder="Hotel Address / Address where will to stay in UAE" rows="6"></textarea>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Emergency Contact</legend>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="input-emergency-person" placeholder="Contact Person" value="" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="input-emergency-number" placeholder="Mobile Number" value="" />
								</div>
							</div>
						</fieldset>
						<div class="form-group col-md-3">
							<input type="button" class="btn btn-primary" onclick="$('#step_3').click();" value="Continue">
						</div>
				</div>
	
				<!-- hotel search -->
				<div class="bhoechie-tab-content">
						<fieldset>
							<legend>Applicant #1 </legend>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="input-applicant-firstname" placeholder="First Name" value="" />
								</div>
								<div class="form-group">
									<select class="form-control" name="input-applicant-gender">
										<option value="0">Gender</option>
										<option>Male</option>
										<option>Female</option>
										<option>Transgender</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" value="" placeholder="Birth Place" name="input-applicant-birthplace" />
								</div>
								<div class="form-group">
									<select class="form-control" name="input-applicant-religion">
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
									<input type="text" name="input-applicant-dob" class="form-control  datepicker_dob" placeholder="Date of Birth">
								</div>
								<div class="form-group">
									<select class="form-control">
									<option value="0">Birth Country</option>
									<?php if(!empty($country_list)): foreach($country_list as $country): ?>
									<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
									<?php endforeach; endif; ?>
									</select>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" name="input-applicant-email" placeholder="Email" value="" />
								</div>
								<div>Profession should be as per your passport.</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Family Details</legend>
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
						</fieldset>
						<fieldset>
							<legend>Applicant's Marital Status</legend>
							<div class="col-md-6">
								<div class="form-group">
									<input type="radio" name="input-applicant-maritalstatus" value="single" /> <label class="control-label">Single</label>
									<input type="radio" name="input-applicant-maritalstatus" value="married" /> <label class="control-label">Married</label>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Passport Information</legend>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="input-applicant-passportnumber" placeholder="Passport Number" value="" />
								</div>
								<div class="form-group">
									<select class="form-control">
									<option value="0">Issuing Country</option>
									<?php if(!empty($country_list)): foreach($country_list as $country): ?>
									<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
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
						</fieldset>
						<fieldset>
							<legend>Uploads</legend>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Coloured Passport Scanned Copy</label>
									<input type="file" class="form-control" name="file-applicant-passport" value="" />
								</div>
								<div class="form-group">
									<label class="control-label">Return Ticket Copy</label>
									<input type="file" class="form-control" name="file-applicant-returnticket" value="" />
								</div>
								<div class="form-group">
									<label class="control-label">Employee ID Copy / Company Badge</label>
									<input type="file" class="form-control" name="file-applicant-empid" value="" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Proof of Residence</label>
									<input type="file" class="form-control" name="file-applicant-residence" value="" />
								</div>
								<div class="form-group">
									<label class="control-label">Hotel Reservation Copy</label>
									<input type="file" class="form-control" name="file-applicant-reservation" value="" />
								</div>
								<div class="form-group">
									<label class="control-label">Miscellaneous Document</label>
									<input type="file" class="form-control" name="file-applicant-miscellanious" value="" />
								</div>
							</div>
						</fieldset>
						<div class="col-md-12">
							<br/><br/>
							<div class="col-md-6">
							<input type="button" class="btn btn-primary" onclick="form_submit_part_3()" value="Submit & Proceed" />
							</div>
							<div class="col-md-4"><a href="#" onclick="">Add Another Applicant</a></div>
						</div>
					</form>
				</div>
			</div>	
	</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC1/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/applicationform.js"></script>