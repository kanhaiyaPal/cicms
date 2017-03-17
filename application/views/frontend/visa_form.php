<form action="<?=base_url('frontend/pages/start_application')?>" method="post" >
	<div class="row">
	  <div class="col-sm-3 col-xs-6"> Citizens of:<br>
		<select>
			<option value="0">Select</option>
			<?php if(!empty($country_list)): foreach($country_list as $country): ?>
			<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
			<?php endforeach; endif; ?>
		</select>
	  </div>
	  <div class="col-sm-3 col-xs-6"> Living in:<br>
		<select>
			<option value="0">Select</option>
			<?php if(!empty($country_list)): foreach($country_list as $country): ?>
			<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
			<?php endforeach; endif; ?>
		</select>
	  </div>
	  <div class="col-sm-3 col-xs-6"> Traveling to:<br>
		<select>
			<option value="0">Select</option>
			<?php if(!empty($country_list)): foreach($country_list as $country): if($country['id']=='221'): ?>
			<option value="<?=$country['id']?>"><?=$country['country_name']?></option>
			<?php endif; endforeach; endif; ?>
		</select>
	  </div>
	  <div class="col-sm-2 col-xs-4"> Visa Type:<br>
		<select>
		  <option value="0">Select</option>
		  <?php if(!empty($visa_services)): foreach($visa_services as $visa): ?>
			<option value="<?=$visa['id']?>"><?=ucfirst($visa['service_title'])?></option>
			<?php endforeach; endif; ?>
		</select>
	  </div>
	  <div class="col-sm-1 col-xs-2"> <br>
		<input type="submit" value="Go" >
	  </div>
	</div>
</form>