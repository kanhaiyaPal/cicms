<form action="<?=base_url('frontend/pages/select_service')?>" method="post" >
	<div class="row">
	  <div class="col-sm-3 col-xs-6"> 
		<select>
			<option value="0">Citizens of:</option>
			<?php if(!empty($country_list)): foreach($country_list as $country): ?>
			<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
			<?php endforeach; endif; ?>
		</select>
	  </div>
	  <div class="col-sm-3 col-xs-6"> 
		<select>
			<option value="0">Living in:</option>
			<?php if(!empty($country_list)): foreach($country_list as $country): ?>
			<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
			<?php endforeach; endif; ?>
		</select>
	  </div>
	  <div class="col-sm-3 col-xs-6"> 
		<select>
			<option value="0">Traveling to:</option>
			<?php if(!empty($country_list)): foreach($country_list as $country): if($country['id']=='221'): ?>
			<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
			<?php endif; endforeach; endif; ?>
		</select>
	  </div>
	  <div class="col-sm-2 col-xs-4"> 
		<select name="visa_service_type">
		  <option value="0" >Visa Type:</option>
		  <?php if(!empty($visa_services)): foreach($visa_services as $visa): ?>
			<option value="<?=$visa['id']?>"><?=ucfirst($visa['service_title'])?></option>
			<?php endforeach; endif; ?>
		</select>
	  </div>
	  <div class="col-sm-1 col-xs-2"> 
		<input type="submit" value="Go" >
	  </div>
	</div>
</form>