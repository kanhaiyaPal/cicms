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
		
		/*redirect to thank you page*/
		window.location.replace("<?=base_url('thank-you')?>");
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