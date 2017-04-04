$(document).ready(function() {
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