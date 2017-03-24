<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap-select.min.css" />

<form action="<?=base_url('frontend/pages/select_service')?>" method="post" >
	<div class="row" id="no_results" style="display:none"><span class="col-md-12" style="color:red">Currently we do not provide the service for the selected countries, Kindly modify the search criteria!</span></div>
	<div class="row">
	  <div class="col-sm-3 col-xs-6"> 
		<select name="citizen_user" class="selectpicker" data-live-search="true">
			<option value="0">Citizen of:</option>
			<?php if(!empty($country_list)): foreach($country_list as $country): ?>
			<option value="<?=$country['id']?>" <?php echo set_select('citizen_user', $country['id']); ?>><?=$country['country_name']?></option>
			<?php endforeach; endif; ?>
		</select>
		<span id="citizen_user_error" style="color:red; display:none">This field is required!</span>
	  </div>
	  <div class="col-sm-3 col-xs-6"> 
		<select name="living_user" class="selectpicker" data-live-search="true">
			<option value="0">Living in:</option>
			<?php if(!empty($country_list)): foreach($country_list as $country): ?>
			<option value="<?=$country['id']?>" <?php echo set_select('living_user', $country['id']); ?>><?=$country['country_name']?></option>
			<?php endforeach; endif; ?>
		</select>
		<span id="living_user_error" style="color:red; display:none">This field is required!</span>
	  </div>
	  <div class="col-sm-3 col-xs-6"> 
		<select name="travelling_user" class="selectpicker" data-live-search="true">
			<option value="0"  class="selectpicker" data-live-search="true">Traveling to:</option>
			<?php if(!empty($country_list)): foreach($country_list as $country): if($country['id']=='221'): ?>
			<option value="<?=$country['id']?>" <?php echo set_select('travelling_user', $country['id']); ?>><?=$country['country_name']?></option>
			<?php endif; endforeach; endif; ?>
		</select>
		<span id="travelling_user_error" style="color:red; display:none">This field is required!</span>
	  </div>
	  <div class="col-sm-2 col-xs-6"> 
		<select name="visa_service_type" class="selectpicker" data-live-search="true">
		  <option value="0" >Visa Type:</option>
		</select>
		<span id="visa_service_type_error" style="color:red; display:none">This field is required!</span>
	  </div>
	  <div class="col-sm-1 col-xs-12"> 
		<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
		<input type="submit" value="Go" id="form_show_plans" />
	  </div>
	</div>
</form>
<script type="text/javascript" src="<?=base_url('assets/js/form_vald.js')?>" ></script>
<?php if(isset($_POST['visa_service_type'])): ?>
<script>
$(document).ready(function() { setTimeout(function() {
$('select[name="visa_service_type"]').val(<?=$_POST['visa_service_type']?>);
$('select[name="visa_service_type"]').selectpicker('refresh');
}, 1000); });
</script>
<?php endif; ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>