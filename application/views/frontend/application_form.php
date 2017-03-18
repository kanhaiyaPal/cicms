<div class="inner-banner">
  <div class="container">
    <h2>
      <?=$title?>
    </h2>
  </div>
</div>
<style>
/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 20px;
  margin-left: 50px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #5A55A3;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #5A55A3;
  background-image: #5A55A3;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #5A55A3;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
</style>
<div class="container">
  <h1><?=$title?><span></span></h1>
	<div class="row">
		<div class="col-lg-11 col-md-11 col-sm-8 col-xs-9 bhoechie-tab-container">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
			  <div class="list-group">
				<a href="#" class="list-group-item active text-center" id="step_1">
				  <!--<h4 class="glyphicon glyphicon-plane">--></h4><br/>Travelling Information
				</a>
				<a href="#" class="list-group-item text-center" id="step_2">
				  <!--<h4 class="glyphicon glyphicon-road">--></h4><br/>Contact Details
				</a>
				<a href="#" class="list-group-item text-center" id="step_3">
				  <!--<h4 class="glyphicon glyphicon-home">--></h4><br/>Applicant Information
				</a>
			  </div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
				<!-- flight section -->
				<div class="bhoechie-tab-content active">
					<form name="dates_form" action="">
						<fieldset>
						<div class="form-group col-md-6">
							<div class="input-group " >
								<label class="control-label">Arrival Date in UAE</label>
								<input type="text" name="input-arrival-date" class="form-control datepicker" >
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="input-group " >
								<label class="control-label">Departure Date from UAE</label>
								<input type="text" name="input-departure-date" class="form-control datepicker">
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
									<label class="control-label">Current Address</label>
									<textarea class="form-control" name="text-current-address" rows="5"></textarea>
								</div>
								<div class="form-group">
									<label class="control-label">Country</label>
									<input type="text" disabled class="form-control" name="input-current-country" value="Argentena" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">City</label>
									<input type="text" class="form-control" name="input-current-city" value="" />
								</div>
								<div class="form-group">
									<label class="control-label">Mobile</label>
									<input type="text" class="form-control" name="input-current-mobile" pattern="/d{10}/" value="" />
								</div>
								<div class="form-group">
									<label class="control-label">Email</label>
									<input type="email" class="form-control" name="input-email" value="" />
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Address in  UAE</legend>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Emirates</label>
									<select class="form-control-input" name="input-emirates">
										<option value="0">Select Emirates</option>
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
									<label class="control-label">Phone</label>
									<input type="text" class="form-control" name="input-current-phone" value="" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Hotel Address / Address where will to stay in UAE</label>
									<textarea class="form-control" name="text-hotel-address" rows="6"></textarea>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Emergency Contact</legend>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Contact Person</label>
									<input type="text" class="form-control" name="input-emergency-person" value="" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Mobile Number</label>
									<input type="text" class="form-control" name="input-emergency-number" value="" />
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
									<label class="control-label">First Name</label>
									<input type="text" class="form-control" name="input-applicant-firstname" value="" />
								</div>
								<div class="form-group">
									<label class="control-label">Gender</label>
									<select class="form-control" name="input-applicant-gender">
										<option value="0">Select Gender</option>
										<option>Male</option>
										<option>Female</option>
										<option>Transgender</option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label">Birth Place</label>
									<input type="text" class="form-control" value="" name="input-applicant-birthplace" />
								</div>
								<div class="form-group">
									<label class="control-label">Religion</label>
									<select class="form-control" name="input-applicant-religion">
										<option value="0">Select Relegion</option>
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
									<label class="control-label">Professoin</label>
									<div>Profession should match as mentioned on your Passport or Residence Visa or Iqama. Note: If there is a mismatch in Profession entered then you might be denied boarding by airlines or entry in UAE.</div>
									<input type="text" class="form-control" value="" name="input-applicant-profession" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Last name</label>
									<input type="text" class="form-control" name="input-applicant-lastname" value="" />
								</div>
								<div class="form-group">
									<label class="control-label">Date of Birth</label>
									<input type="text" name="input-applicant-dob" class="form-control  datepicker_dob">
								</div>
								<div class="form-group">
									<label class="control-label">Birth Country</label>
									<input type="text" class="form-control" name="input-applicant-birthcountry" value="" />
								</div>
								<div class="form-group">
									<label class="control-label">Email</label>
									<input type="email" class="form-control" name="input-applicant-email" value="" />
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Family Details</legend>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Father's Name</label>
									<input type="text" class="form-control" name="input-applicant-fathername" value="" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Mother's Name</label>
									<input type="text" class="form-control" name="input-applicant-mothername" value="" />
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
									<label class="control-label">Passport Number</label>
									<input type="text" class="form-control" name="input-applicant-passportnumber" value="" />
								</div>
								<div class="form-group">
									<label class="control-label">Issuing Country</label>
									<select class="form-control" name="input-applicant-issuingcountry">
										<option value="0">Select Country</option>
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
									<label class="control-label">Expiry Date</label>
									<input type="text" class="form-control datepicker" name="input-applicant-expiry">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Place of Issue</label>
									<input type="text" class="form-control" value="" name="input-applicant-placeofissue" />
								</div>
								<div class="form-group">
									<label class="control-label">Issuing Date</label>
									<input type="text" class="form-control datepicker_dob" name="input-applicant-issuedate">
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
<script>
var step_1_validate = false;
var step_2_validate = false;
var step_3_validate = false;

var form_submit_part_1;
var form_submit_part_2;
var show_error;
var hide_error;

$(document).ready(function() {
	form_submit_part_1 = function(){
		
		var date_arr_val = $("input[name='input-arrival-date']").val();
		var date_dep_val = $("input[name='input-departure-date']").val();
		
		var date_arr = $("input[name='input-arrival-date']").datepicker('getDate');
		var date_dep = $("input[name='input-departure-date']").datepicker('getDate');
		
		if((date_arr_val != '') && (date_dep_val != '')){
			$("input[name='input-arrival-date']").parent().closest('div.form-group').removeClass("has-error");
			$("input[name='input-departure-date']").parent().closest('div.form-group').removeClass("has-error");
			
			if(((date_arr - date_dep) == 0)||((date_arr - date_dep) > 0)){
				$("input[name='input-departure-date']").parent().closest('div.form-group').addClass("has-error");
				return false;
			}else{
				$("input[name='input-departure-date']").parent().closest('div.form-group').removeClass("has-error");
				return true;
			}
		}else{
			$("input[name='input-arrival-date']").parent().closest('div.form-group').addClass("has-error");
			$("input[name='input-departure-date']").parent().closest('div.form-group').addClass("has-error");
			return false;
		}
		
	}
	
	form_submit_part_2 = function(){
		var has_error = false;
		var phoneno = /^\d{10}$/;
		var email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		
		var cr_add = $("textarea[name='text-current-address']");
		var cr_city = $("input[name='input-current-city']");
		var cr_mobile = $("input[name='input-current-mobile']");
		var mail = $("input[name='input-email']");
		var emi = $("select[name='input-emirates']");
		var phone = $("input[name='input-current-phone']");
		var em_per = $("input[name='input-emergency-person']");
		var ho_add = $("textarea[name='text-hotel-address']");
		var em_no = $("input[name='input-emergency-number']");
		
		if(cr_add.val() == ''){
			has_error = true;
			show_error(cr_add);
		}else{
			hide_error(cr_add);
		}
		
		if(cr_city.val() == ''){
			has_error = true;
			show_error(cr_city);
		}else{
			hide_error(cr_city);
		}
		
		if(cr_mobile.val() == ''){
			has_error = true;
			show_error(cr_mobile);
		}else{
			  
			if(cr_mobile.val().match(phoneno)){ 
				hide_error(cr_mobile);
			}else{ 
				show_error(cr_mobile); 
				has_error = true;	
			}  
		}
		
		if(mail.val() == ''){
			has_error = true;
			show_error(mail);
		}else{
			
			if(mail.val().match(email)){ 
				hide_error(mail);
			}else{ 
				show_error(mail); 
				has_error = true;	
			}  
		}
		
		if(emi.val() == '0'){
			has_error = true;
			show_error(emi);
		}else{
			hide_error(emi);
		}
		
		if(phone.val() == ''){
			has_error = true;
			show_error(phone);
		}else{
			if(phone.val().match(phoneno)){ 
				hide_error(phone);
			}else{ 
				show_error(phone); 
				has_error = true;	
			}  
		}
		
		if(ho_add.val() == ''){
			has_error = true;
			show_error(ho_add);
		}else{
			hide_error(ho_add);
		}
		
		if(em_per.val() == ''){
			has_error = true;
			show_error(em_per);
		}else{
			hide_error(em_per);
		}
		
		if(em_no.val() == ''){
			has_error = true;
			show_error(em_no);
		}else{
			if(em_no.val().match(phoneno)){ 
				hide_error(em_no);
			}else{ 
				show_error(em_no); 
				has_error = true;	
			}  
		}
		
		if(has_error){
			return false;
		}
		
		return true;
	}
	
	form_submit_part_3 = function(){
		var is_error = false;
		var email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		
		var ap_fn = $("input[name='input-applicant-firstname']");
		var ap_ln = $("input[name='input-applicant-lastname']");
		var ap_dob = $("input[name='input-applicant-dob']");
		var ap_gen = $("select[name='input-applicant-gender']");
		var ap_bplace = $("input[name='input-applicant-birthplace']");
		var ap_bcount = $("input[name='input-applicant-birthcountry']");
		var ap_rel = $("select[name='input-applicant-religion']");
		var ap_mail = $("input[name='input-applicant-email']");
		var ap_prof = $("input[name='input-applicant-profession']");
		var ap_fath = $("input[name='input-applicant-fathername']");
		var ap_moth = $("input[name='input-applicant-mothername']");
		var ap_st = $("input[name='input-applicant-maritalstatus']");
		var ap_pasno = $("input[name='input-applicant-passportnumber']");
		var ap_pli = $("input[name='input-applicant-placeofissue']");
		var ap_pic = $("select[name='input-applicant-issuingcountry']");
		var ap_pid = $("input[name='input-applicant-issuedate']");
		var ap_ped = $("input[name='input-applicant-expiry']");
		
		if(ap_fn.val() == ''){
			is_error = true;
			show_error(ap_fn);
		}else{
			hide_error(ap_fn);
		}
		
		if(ap_ln.val() == ''){
			is_error = true;
			show_error(ap_ln);
		}else{
			hide_error(ap_ln);
		}
		
		if(ap_dob.val() == ''){
			is_error = true;
			show_error(ap_dob);
		}else{
			hide_error(ap_dob);
		}
		
		if(ap_gen.val() == '0'){
			is_error = true;
			show_error(ap_gen);
		}else{
			hide_error(ap_gen);
		}
		
		if(ap_bplace.val() == ''){
			is_error = true;
			show_error(ap_bplace);
		}else{
			hide_error(ap_bplace);
		}
		
		if(ap_bcount.val() == ''){
			is_error = true;
			show_error(ap_bcount);
		}else{
			hide_error(ap_bcount);
		}
		
		if(ap_rel.val() == '0'){
			is_error = true;
			show_error(ap_rel);
		}else{
			hide_error(ap_rel);
		}
		
		if(ap_mail.val() == ''){
			is_error = true;
			show_error(ap_mail);
		}else{
			
			if(ap_mail.val().match(email)){ 
				hide_error(ap_mail);
			}else{ 
				show_error(ap_mail); 
				is_error = true;	
			}  
		}
		
		if(ap_prof.val() == ''){
			is_error = true;
			show_error(ap_prof);
		}else{
			hide_error(ap_prof);
		}
		
		if(ap_fath.val() == ''){
			is_error = true;
			show_error(ap_fath);
		}else{
			hide_error(ap_fath);
		}
		
		if(ap_moth.val() == ''){
			is_error = true;
			show_error(ap_moth);
		}else{
			hide_error(ap_moth);
		}
		
		if(ap_st.filter(":checked").length <= 0)
		{
			is_error = true;
			show_error(ap_st);
		}else{
			hide_error(ap_st);
		}
		
		if(ap_pasno.val() == ''){
			is_error = true;
			show_error(ap_pasno);
		}else{
			hide_error(ap_pasno);
		}
		
		if(ap_pli.val() == ''){
			is_error = true;
			show_error(ap_pli);
		}else{
			hide_error(ap_pli);
		}
		
		if(ap_pic.val() == '0'){
			is_error = true;
			show_error(ap_pic);
		}else{
			hide_error(ap_pic);
		}
		
		if(ap_pid.val() == ''){
			is_error = true;
			show_error(ap_pid);
		}else{
			hide_error(ap_pid);
		}
		
		if(ap_ped.val() == ''){
			is_error = true;
			show_error(ap_ped);
		}else{
			hide_error(ap_ped);
		}
		
		if(is_error){
			return false;
		}
		
		return true;
	}
	
	show_error = function(ele){
		ele.parent().closest('div.form-group').addClass("has-error");
	}
	
	hide_error = function(ele){
		ele.parent().closest('div.form-group').removeClass("has-error");
	}
	
	$('.datepicker').datepicker({
		format: 'dd-mm-yyyy',
		startDate:new Date(),
		autoclose: true
	});
	$('.datepicker_dob').datepicker({
		format: 'dd-mm-yyyy',
		endDate: '+0d',
        autoclose: true
	});
    $("div.bhoechie-tab-menu>div.list-group>a#step_1").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
	$("div.bhoechie-tab-menu>div.list-group>a#step_2").click(function(e) {
        e.preventDefault();

		if(form_submit_part_1()){
			$(this).siblings('a.active').removeClass("active");
			$(this).addClass("active");
			var index = $(this).index();
			$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
			$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
		}
	});
	$("div.bhoechie-tab-menu>div.list-group>a#step_3").click(function(e) {
        e.preventDefault();
		if(form_submit_part_1() && form_submit_part_2()){
			$(this).siblings('a.active').removeClass("active");
			$(this).addClass("active");
			var index = $(this).index();
			$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
			$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
		}
    });
});

</script>
