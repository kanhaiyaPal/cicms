<div class="page-content">
    	<div class="row">
		<?php if(isset($sidebar)): ?>
		  <div class="col-md-2">
		  	<?php echo $sidebar; ?>
		  </div>
		  <?php endif; ?>
		  <div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Details of Submitted Visa Application</div>
								
								<div class="panel-options">
									<a href="<?=$back_url?>" data-rel="collapse"><i class="glyphicon glyphicon-circle-arrow-left"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				<table class="table table-bordered">
									<tr><td><h4>Primary Applicant details</h4></td></tr>
									<tr>
										<td>
										<table class="table table-bordered">
											<tr>
												<td><strong>Firstname</strong></td>
												<td><?=$page_data['applicant_firstname']?></td>
												<td><strong>Lastname</strong></td>
												<td><?=$page_data['applicant_lastname']?></td>
												<td><strong>DOB</strong></td>
												<td><?=$page_data['applicant_dob']?></td>
												<td><strong>Mobile</strong></td>
												<td><?=$page_data['mobile']?></td>
												<td><strong>E-Mail</strong></td>
												<td><?=$page_data['email_id']?></td>
											</tr>
											<tr>
												<td><strong>Present Address</strong></td>
												<td colspan="2"><?=$page_data['present_address']?></td>
												<td><strong>Present City</strong></td>
												<td><?=$page_data['city']?></td>
												<td><strong>Present Country</strong></td>
												<td><?php foreach($country_list as $country){ if($page_data['applicant_living_in'] == $country['id']){echo $country['country_name'];}  }?></td>
												<td><strong>Uae Hotel Address</strong></td>
												<td colspan="2"><?=$page_data['uae_hotel_address']?></td>
											</tr>
											<tr>
												<td><strong>Emirates</strong></td>
												<td><?=$page_data['emirates']?></td>
												<td><strong>Uae Phone</strong></td>
												<td><?=$page_data['uae_phone']?></td>
												<td><strong>Emergency Contact Name</strong></td>
												<td><?=$page_data['emergency_name']?></td>
												<td><strong>Emergency Contact Phone</strong></td>
												<td><?=$page_data['emergency_phone']?></td>
												<td><strong>E-Mail</strong></td>
												<td><?=$page_data['email_id']?></td>
											</tr>
											<tr>
												<td><strong>Applicant Gender</strong></td>
												<td><?=$page_data['applicant_gender']?></td>
												<td><strong>Birth Place</strong></td>
												<td><?=$page_data['applicant_birthplace']?></td>
												<td><strong>Birth Country</strong></td>
												<td><?php foreach($country_list as $country){ if($page_data['applicant_birthcountry'] == $country['id']){echo $country['country_name'];}  }?></td>
												<td><strong>Applicant Religion</strong></td>
												<td><?=$page_data['applicant_religion']?></td>
												<td><strong>Profession</strong></td>
												<td><?=$page_data['applicant_profession']?></td>
											</tr>
											<tr>
												<td><strong>Father's Name</strong></td>
												<td><?=$page_data['applicant_fathername']?></td>
												<td><strong>Mother's Name</strong></td>
												<td><?=$page_data['applicant_mothername']?></td>
												<td><strong>Applicant Marital Status</strong></td>
												<td colspan="5"><?=$page_data['applicant_marital']?></td>
											</tr>
											<tr>
												<td><strong>Passport Number</strong></td>
												<td><?=$page_data['applicant_passport_number']?></td>
												<td><strong>Place of Issue</strong></td>
												<td><?=$page_data['applicant_passport_placeofissue']?></td>
												<td><strong>Issuing Country</strong></td>
												<td><?php foreach($country_list as $country){ if($page_data['applicant_passport_issuningcountry'] == $country['id']){echo $country['country_name'];}  }?></td>
												<td><strong>Issue Date</strong></td>
												<td><?=$page_data['applicant_passport_issuedate']?></td>
												<td><strong>Expiry Date</strong></td>
												<td><?=$page_data['applicant_passport_expiry']?></td>
											</tr>
											<tr>
												<td><strong>View Uploaded Documents</strong></td>
												<td colspan="9"><a href="<?=base_url('manage/visaapplications/show_application_documents/'.$page_data['id'])?>"> View </a></td>
											</tr>
										</table>
										</td>
									</tr>
								</table>
								<?php if($coapplicants > 0){ ?>
								<?php for($i=1; $i<=$coapplicants; $i++){ ?>
								<table class="table table-bordered">
									<tr><td><h4>Co-Applicant # <?=$i?></h4></td></tr>
									<tr>
										<td>
										<table class="table table-bordered">
											<tr>
												<td><strong>Firstname</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_firstname']?></td>
												<td><strong>Lastname</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_lastname']?></td>
												<td><strong>DOB</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_dob']?></td>
												<td><strong>Mobile</strong></td>
												<td><?=$coapplicants_data[$i-1]['mobile']?></td>
												<td><strong>E-Mail</strong></td>
												<td><?=$coapplicants_data[$i-1]['email_id']?></td>
											</tr>
											<tr>
												<td><strong>Present Address</strong></td>
												<td colspan="2"><?=$coapplicants_data[$i-1]['present_address']?></td>
												<td><strong>Present City</strong></td>
												<td><?=$coapplicants_data[$i-1]['city']?></td>
												<td><strong>Present Country</strong></td>
												<td><?php foreach($country_list as $country){ if($coapplicants_data[$i-1]['applicant_living_in'] == $country['id']){echo $country['country_name'];}  }?></td>
												<td><strong>Uae Hotel Address</strong></td>
												<td colspan="2"><?=$coapplicants_data[$i-1]['uae_hotel_address']?></td>
											</tr>
											<tr>
												<td><strong>Emirates</strong></td>
												<td><?=$coapplicants_data[$i-1]['emirates']?></td>
												<td><strong>Uae Phone</strong></td>
												<td><?=$coapplicants_data[$i-1]['uae_phone']?></td>
												<td><strong>Emergency Contact Name</strong></td>
												<td><?=$coapplicants_data[$i-1]['emergency_name']?></td>
												<td><strong>Emergency Contact Phone</strong></td>
												<td><?=$coapplicants_data[$i-1]['emergency_phone']?></td>
												<td><strong>E-Mail</strong></td>
												<td><?=$coapplicants_data[$i-1]['email_id']?></td>
											</tr>
											<tr>
												<td><strong>Applicant Gender</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_gender']?></td>
												<td><strong>Birth Place</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_birthplace']?></td>
												<td><strong>Birth Country</strong></td>
												<td><?php foreach($country_list as $country){ if($coapplicants_data[$i-1]['applicant_birthcountry'] == $country['id']){echo $country['country_name'];}  }?></td>
												<td><strong>Applicant Religion</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_religion']?></td>
												<td><strong>Profession</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_profession']?></td>
											</tr>
											<tr>
												<td><strong>Father's Name</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_fathername']?></td>
												<td><strong>Mother's Name</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_mothername']?></td>
												<td><strong>Applicant Marital Status</strong></td>
												<td colspan="5"><?=$coapplicants_data[$i-1]['applicant_marital']?></td>
											</tr>
											<tr>
												<td><strong>Passport Number</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_passport_number']?></td>
												<td><strong>Place of Issue</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_passport_placeofissue']?></td>
												<td><strong>Issuing Country</strong></td>
												<td><?php foreach($country_list as $country){ if($coapplicants_data[$i-1]['applicant_passport_issuningcountry'] == $country['id']){echo $country['country_name'];}  }?></td>
												<td><strong>Issue Date</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_passport_issuedate']?></td>
												<td><strong>Expiry Date</strong></td>
												<td><?=$coapplicants_data[$i-1]['applicant_passport_expiry']?></td>
											</tr>
											<tr>
												<td><strong>View Uploaded Documents</strong></td>
												<td colspan="9"><a href="<?=base_url('manage/visaapplications/show_application_documents/'.$coapplicants_data[$i-1]['id'])?>"> View </a></td>
											</tr>
										</table>
										</td>
									</tr>
								</table>	
								<?php } ?>
								<?php } ?>
								<br /><br />
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  </div>
		</div>
    </div>