$(document).ready(function() {
	
	var $citizen_select = $('select[name="citizen_user"]');
	var $living_select = $('select[name="living_user"]');
	var $travelling_select = $('select[name="travelling_user"]');
	var $visa_display = $('select[name="visa_service_type"]');
	
	generate_visa_options();
	
	function select_visa_type(value){
		$visa_display.val(value);
		$visa_display.selectpicker('refresh');
	}
	
	function generate_visa_options(){
		if($citizen_select.val()==0){
			return false;
		}
		if($living_select.val()==0){
			return false;
		}
		if($travelling_select.val()==0){
			return false;
		}
		
		$.ajax({
		  url: $('#base_url').val()+'frontend/visas_front/get_visas_acc',
		  type: 'POST',
		  data: { 
				  citzen_id: $citizen_select.val(), 
				  living_id: $living_select.val(), 
				  travelling_id: $travelling_select.val()
				}
		}).done(function( data ) {
			if ( console && console.log ) {
							
				var jsonData = JSON.parse(data);
				if(jsonData.length > 0){
					$('#no_results').hide();
					cb='';
					for (var i = 0; i < jsonData.length; i++) {
						var enty = '';
						if(jsonData[i].visa_type == '4'){
							enty = 'Single Entry';
						}else{
							enty = 'Multiple Entry';
						}
						cb+='<option value="'+jsonData[i].id+'">'+jsonData[i].service_title+' days Visa('+enty+')</option>';
					}
					$visa_display.append(cb);
					$visa_display.selectpicker("refresh");
				}else{
					$('#no_results').show();
					$visa_display.html('');
					$visa_display.html('<option value="0" >Visa Type:</option>');
					$visa_display.selectpicker("refresh");
					//disable submit button
				}
			}
		});
	}
	
	$citizen_select.on('change', function() {
	  generate_visa_options();
	})
	$living_select.on('change', function() {
	  generate_visa_options();
	})
	$travelling_select.on('change', function() {
	  generate_visa_options();
	})
	
	
	
    $("#form_show_plans").on("click",function(e) {
		e.preventDefault();
		
		var is_error = false;
		if($citizen_select.val()==0){
			$('#citizen_user_error').show();
			is_error = true;
		}else{
			$('#citizen_user_error').hide();
		}
		if($living_select.val()==0){
			$('#living_user_error').show();
			is_error = true;
		}else{
			$('#living_user_error').hide();
		}
		if($travelling_select.val()==0){
			$('#travelling_user_error').show();
			is_error = true;
		}else{
			$('#travelling_user_error').hide();
		}
		if($visa_display.val()==0){
			$('#visa_service_type_error').show();
			is_error = true;
		}else{
			$('#visa_service_type_error').hide();
		}
		
		if(is_error){ return false; }
		this.form.submit();
    }); 
});