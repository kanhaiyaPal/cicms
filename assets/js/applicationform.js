var step_1_validate = false;
var step_2_validate = false;
var step_3_validate = false;
var applicant_more_name = ['applicant1','applicant2','applicant3','applicant4','applicant5','applicant6','applicant7','applicant8','applicant9','applicant10'];

var form_submit_part_1;
var form_submit_part_2;
var show_error;
var hide_error;
var add_another_app;
var set_up_fields;
var validate_form_p3;
var add_table_header;
var check_size_cokkie;
var single_entry_warning;
var remove_applicant_data;
var edit_applicant_data

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
		var vald = validate_form_p3();
		if(vald){
			/*redirect to thank you page*/
			var ad_fl = check_size_cokkie();
			if(ad_fl >= 1){
			var index;
				for (index = 0; index < applicant_more_name.length; ++index) {
					var x = readCookie(applicant_more_name[index]);
					if(x){
						/*create hidden field for each applicant details*/
						$('<input>').attr({
							type: 'hidden',
							name: applicant_more_name[index],
							value: x
						}).appendTo('form[name="application_form_vsa"]');
					}
				}
			}else{
				
				console.log('error creating field'+ad_fl);
			}
			$('form[name="application_form_vsa"]').submit();
			//return false;
			//window.location.replace("<?=base_url('thank-you')?>");
		}
		
	}
	
	validate_form_p3 = function(){
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
	
	add_another_app = function(event){
		event.preventDefault();
		console.log(document.cookie);
		var a_vald = validate_form_p3();
		
		if(!a_vald){
			return false;
		}
		
		var sz = check_size_cokkie();
		if(sz >= 10){ alert('You cannot add more than 10 applicants'); return false; }
		
		var $firstname = $('input[name="input-applicant-firstname"]');
		var $lastname = $('input[name="input-applicant-lastname"]');
		var $gender = $('select[name="input-applicant-gender"]');
		var $dob = $('input[name="input-applicant-dob"]');
		var $birthplace = $('input[name="input-applicant-birthplace"]');
		var $birthcountry = $('select[name="select-applicant-birthcountry"]');
		var $religion = $('select[name="input-applicant-religion"]');
		var $email = $('input[name="input-applicant-email"]');
		var $profession = $('input[name="input-applicant-profession"]');
		var $father = $('input[name="input-applicant-fathername"]');
		var $mother = $('input[name="input-applicant-mothername"]');
		var $marital_st = $('input[name="input-applicant-maritalstatus"]');
		var $passno = $('input[name="input-applicant-passportnumber"]');
		var $passissp = $('input[name="input-applicant-placeofissue"]');
		var $passissc = $('select[name="select-appplicant-pissuecountry"]');
		var $passissd = $('input[name="input-applicant-issuedate"]');
		var $passexp = $('input[name="input-applicant-expiry"]');
		var $passupd = $('input[name="file-applicant-passport"]');
		var $resprofupd = $('input[name="file-applicant-residence"]');
		var $retickupd = $('input[name="file-applicant-returnticket"]');
		var $horesupd = $('input[name="file-applicant-reservation"]');
		var $empidupd = $('input[name="file-applicant-empid"]');
		var $miscupd = $('input[name="file-applicant-miscellanious"]');
		
		var applicant = { 
					firstname: $firstname.val() ,
					lastname: $lastname.val(),
					gender: $gender.val(),
					dob: $dob.val(),
					birth_place: $birthplace.val(),
					birth_country: $birthcountry.val(),
					religion: $religion.val(),
					mail: $email.val(),
					profession: $profession.val(),
					father: $father.val(),
					mother: $mother.val(),
					marital_st: $marital_st.val(),
					passport_no: $passno.val(),
					passport_issue_place: $passissp.val(),
					passport_issue_country: $passissc.val(),
					passport_issue_date: $passissd.val(),
					passport_expiry: $passexp.val(),
					color_passport: $passupd.val(),
					residence_proof: $resprofupd.val(),
					return_ticket: $retickupd.val(),
					emp_id: $empidupd.val(),
					misc_docs: $miscupd.val(),
					hotel_reservation: $horesupd.val()
		}
		var json_str = JSON.stringify(applicant);
		
		//check if there are existing applicant data
		var available_cookie_name = get_available_cookiename();
 		createCookie(available_cookie_name, json_str,1);
		set_up_fields();
		increase_label();
	}
	
	increase_label = function(){
		var sze = check_size_cokkie();
		$("#applicant_counter").html('');
		$("#applicant_counter").html(sze+1);
		 $("html, body").delay(2000).animate({scrollTop: $("#applicant_counter").offset().top}, 1000);
	}
	
	check_size_cokkie = function(){
		var size = 0;
		for (index = 0; index < applicant_more_name.length; ++index) {
			var x = readCookie(applicant_more_name[index]);
			if (x != null) {
				size++;
			}
		}
		return size;
	}
	
	get_available_cookiename = function(){
		var ret_val;
		var index;
		for (index = 0; index < applicant_more_name.length; ++index) {
			var x = readCookie(applicant_more_name[index]);
			if (x == null) {
				ret_val = applicant_more_name[index];
				break;
			}
		}
		return ret_val;
	}
	
	set_up_fields = function(){
		/*function to display table for each applicant stored in cookie*/
		var $show_div = $('#applicant_details_more');
		var ret_html = '';
		var index;
		var header_on = 0;
		
		for (index = 0; index < applicant_more_name.length; ++index) {
			var x = readCookie(applicant_more_name[index]);
			if(x){
				var inter_data = JSON.parse(x);
				ret_html += add_table_header(header_on);
				header_on = 1;
				ret_html += '<div class="col-md-3">'+inter_data.firstname+' '+inter_data.lastname+'</div>';
				ret_html += '<div class="col-md-3">'+inter_data.dob+'</div>';
				ret_html += '<div class="col-md-3">'+inter_data.passport_no+'</div>';
				var inter_szs_ck = single_entry_warning();
				if(inter_szs_ck){
					ret_html += '<div class="col-md-3"><a href="#" onclick="edit_applicant_data(event,\''+applicant_more_name[index]+'\')">Edit</a></div>';
				}else{
					ret_html += '<div class="col-md-3"><a href="#" onclick="edit_applicant_data(event,\''+applicant_more_name[index]+'\')">Edit</a> | <a href="#" onclick="remove_applicant_data(event,\''+applicant_more_name[index]+'\')">Remove</a></div>';
				}
				
			}
		}
		$show_div.html('');
		$show_div.append(ret_html);
		clear_third_step();
	}
	
	single_entry_warning = function(){
		var cur_sz = check_size_cokkie();
		if(cur_sz == 1){
			return true;
		}else{
			return false;
		}
	}
	
	add_table_header = function(hstatus){
		var table_head_html = '<div class="col-md-3">Applicant Name</div><div class="col-md-3">DOB</div><div class="col-md-3">Passport No.</div><div class="col-md-3">Actions</div>';
		if(hstatus == 0){
			return table_head_html;
		}else{
			return '';
		}
	}
	
	remove_applicant_data = function(event,cookie_name){
		event.preventDefault();
		eraseCookie(cookie_name);
	}
	
	clear_third_step = function(){
		$('input[name="input-applicant-firstname"]').val('');
		$('input[name="input-applicant-lastname"]').val('');
		$('select[name="input-applicant-gender"]').val('0');
		$('input[name="input-applicant-dob"]').val('');
		$('input[name="input-applicant-birthplace"]').val('');
		$('select[name="select-applicant-birthcountry"]').val('0');
		$('select[name="input-applicant-religion"]').val('0');
		$('input[name="input-applicant-profession"]').val('');
		$('input[name="input-applicant-fathername"]').val('');
		$('input[name="input-applicant-mothername"]').val('');
		$('input[name="input-applicant-maritalstatus"]').val('');
		$('input[name="input-applicant-passportnumber"]').val('');
		$('input[name="input-applicant-placeofissue"]').val('');
		$('select[name="select-appplicant-pissuecountry"]').val('0');
		$('input[name="input-applicant-issuedate"]').val('');
		$('input[name="input-applicant-expiry"]').val('');
		$('input[name="file-applicant-passport"]').val('');
		$('input[name="file-applicant-residence"]').val('');
		$('input[name="file-applicant-returnticket"]').val('');
		$('input[name="file-applicant-reservation"]').val('');
		$('input[name="file-applicant-empid"]').val('');
		$('input[name="file-applicant-miscellanious"]').val('');
	}
	
	edit_applicant_data = function(event,cookie_name){
		event.preventDefault();
		for (index = 0; index < applicant_more_name.length; ++index) {
			if(applicant_more_name[index] == cookie_name){
				var x = readCookie(applicant_more_name[index]);
				if(x){
					var inter_data = JSON.parse(x);
					
					$('input[name="input-applicant-firstname"]').val(inter_data.firstname);
					$('input[name="input-applicant-lastname"]').val(inter_data.lastname);
					$('select[name="input-applicant-gender"]').val(inter_data.gender);
					$('input[name="input-applicant-dob"]').val(inter_data.dob);
					$('input[name="input-applicant-birthplace"]').val(inter_data.birth_place);
					$('select[name="select-applicant-birthcountry"]').val(inter_data.birth_country);
					$('select[name="input-applicant-religion"]').val(inter_data.religion);
					$('input[name="input-applicant-profession"]').val(inter_data.mail);
					$('input[name="input-applicant-fathername"]').val(inter_data.father);
					$('input[name="input-applicant-mothername"]').val(inter_data.mother);
					$('input[name="input-applicant-maritalstatus"]').val(inter_data.marital_st);
					$('input[name="input-applicant-passportnumber"]').val(inter_data.passport_no);
					$('input[name="input-applicant-placeofissue"]').val(inter_data.passport_issue_place);
					$('select[name="select-appplicant-pissuecountry"]').val(inter_data.passport_issue_country);
					$('input[name="input-applicant-issuedate"]').val(inter_data.passport_issue_date);
					$('input[name="input-applicant-expiry"]').val(inter_data.passport_expiry);
					$('input[name="file-applicant-passport"]').val(inter_data.color_passport);
					$('input[name="file-applicant-residence"]').val(inter_data.residence_proof);
					$('input[name="file-applicant-returnticket"]').val(inter_data.return_ticket);
					$('input[name="file-applicant-reservation"]').val(inter_data.hotel_reservation);
					$('input[name="file-applicant-empid"]').val(inter_data.emp_id);
					$('input[name="file-applicant-miscellanious"]').val(inter_data.misc_docs);
				}else{
					console.log('Cookie is null');
				}
			}else{
				console.log('cookie name not found');
			}
		}
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
	
	$('.datepicker_ar').datepicker({
		format: 'dd-mm-yyyy',
		startDate:new Date(),
		autoclose: true
	}).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf()+ (1000 * 60 * 60 * 24 * 1));
        $('.datepicker_dep').datepicker('setStartDate', minDate);
    });
	$('.datepicker_dep').datepicker({
		format: 'dd-mm-yyyy',
		startDate:new Date(),
		autoclose: true
	});
	$('.datepicker_dob').datepicker({
		format: 'dd-mm-yyyy',
		endDate: '+0d',
        autoclose: true
	});
	
	$('.input-arrival-date').click(function(event){
		event.preventDefault();
		$('input[name="input-arrival-date"]').datepicker('show');
	});
	$('.input-departure-date').click(function(event){
		event.preventDefault();
		$('input[name="input-departure-date"]').datepicker('show');
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
	
	
	
	/*File Input Intialize*/
	var base_uri = $('input[name="ste_url"]').val();
	var temp_id_val = $('input[name="temp_u_id"]').val();
	$(".vs_doc_up").fileinput({	
								uploadUrl: base_uri + '/uploads/upload_userdocs',
								uploadExtraData: {temp_id: temp_id_val},
								deleteUrl:  base_uri + 'uploads/userdoc_delete',
								maxFileCount: 1,
								showPreview: false,
								allowedFileExtensions: ["jpg", "JPG", "jpeg", "JPEG","png","PNG","gif","GIF","PDF","pdf"],
								initialPreviewAsData: true, // identify if you are sending preview data only and not the markup
							});
	$(".vs_doc_up").on('fileclear', function(event) {
		console.log($(this).closest('input').attr('name'));
	});						
	/*File Input Intialize Ends*/
});
/*function to support cookie operations*/
function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
	console.log(document.cookie);
    createCookie(name,"",-1);
	set_up_fields();
}