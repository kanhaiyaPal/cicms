var remove_user_file;

$(document).ready(function() {
	
	remove_user_file = function(event,del_url,filename,applicant_id,field_name){
		event.preventDefault();
		
		$.post( del_url, { file: filename, field: field_name, applicant: applicant_id } ).done(function( data ) { 
		
			alert('File Deleted Successfully, You can now upload new file');  
			$(".preview_existing_image_"+field_name).remove(); 
			$(".preview_existing_file_"+field_name).remove(); 
			
			$('#add_new_'+field_name).show(); 
			$(event.target).remove();
			
		});
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
	
	
});