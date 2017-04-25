<div class="inner-banner">
<div class="container">
<div class="search-panel" data-spy="affix" data-offset-top="150">
<?=$visa_form?>
</div>    
</div>
</div>

<div class="container">
  <h1><?=$visa_service_data['service_title']?> Days Visa (<?php if($visa_service_data['visa_type']){ echo "Single Entry"; }else{ echo "Multiple Entry"; } ?>)<span></span></h1>
  <?php $content_part = explode('|-|',$visa_service_data['intro_content']); ?>
  <div><?=$content_part[0]?></div>
	<table width="100%" cellspacing="0" cellpadding="0" class="tbl1">
		<tbody>
			<tr>
			<th width="10%">Description</th>
			<th width="23%">Express Visa Services</th>
			<th width="23%">Premium Visa Service</th>
			<th width="23%">Regular Service</th>
		</tr>
		<tr>
			<td class="grey">Type of Visa</td>
			<td valign="top"><?php if($visa_service_data['visa_type']){ echo "Single Entry"; }else{ echo "Multiple Entry"; } ?></td>
			<td valign="top"><?php if($visa_service_data['visa_type']){ echo "Single Entry"; }else{ echo "Multiple Entry"; } ?></td>
			<td valign="top"><?php if($visa_service_data['visa_type']){ echo "Single Entry"; }else{ echo "Multiple Entry"; } ?></td>
		</tr>
		<tr>
			<td class="grey">Visa Validity</td>
			<td valign="top" class="posRelative"><?=$visa_service_data['visa_validity']?> days from the date of issue</td>
			<td valign="top" class="posRelative"><?=$visa_service_data['visa_validity']?> days from the date of issue</td>
			<td valign="top"><?=$visa_service_data['visa_validity']?> days from the date of issue</td>
		</tr>
		<tr>
			<td class="grey">Stay Validity</td>
			<td valign="top"><?=$visa_service_data['visa_max_stay']?> days from the date of entry</td>
			<td valign="top"><?=$visa_service_data['visa_max_stay']?> days from the date of entry</td>
			<td valign="top"><?=$visa_service_data['visa_max_stay']?> days from the date of entry</td>
		</tr>
		<tr>
			<td class="grey">Processing Time</td>
			<?php $processing_time = explode('|-|',$visa_service_data['processing_time']); ?>
			<td valign="top"><?=$processing_time[2]?> </td>
			<td valign="top"><?=$processing_time[1]?> </td>
			<td valign="top"><?=$processing_time[0]?> </td>
		</tr>
		<tr>
			<td class="grey">Visa Fee ($)</td>
			<?php $embassy_fee = explode('|-|',$visa_service_data['embassy_fee']); ?>
			<td valign="top"><?=$embassy_fee[2]?></td>
			<td valign="top"><?=$embassy_fee[1]?></td>
			<td valign="top"><?=$embassy_fee[0]?></td>
		</tr>
		<tr>
			<td class="grey">Service Fee ($)</td>
			<?php $service_fee = explode('|-|',$visa_service_data['service_fee']); ?>
			<td valign="top"><?=$service_fee[2]?></td>
			<td valign="top"><?=$service_fee[1]?></td>
			<td valign="top"><?=$service_fee[0]?></td>
		</tr>
		<tr>
			<td class="grey">Total Fee ($)</td>
			<td valign="top"><?=$embassy_fee[2]+$service_fee[2]?></td>
			<td valign="top"><?=$embassy_fee[1]+$service_fee[1]?></td>
			<td valign="top"><?=$embassy_fee[0]+$service_fee[0]?></td>
		</tr>
		<tr>
			<td class="grey">&nbsp;</td>
			<td class="grey"><div>
			<form action="<?=base_url('frontend/pages/start_application')?>" method="post" >
				<input type="hidden" name="citizen_of" value="<?=$this->input->post('citizen_user')?>" />
				<input type="hidden" name="living_in" value="<?=$this->input->post('living_user')?>" />
				<input type="hidden" name="travelling_to" value="<?=$this->input->post('travelling_user')?>" />
				<input type="hidden" name="visa_service_select" value="<?=$visa_service_data['id']?>"/>
				<input type="hidden" name="total_amount" value="<?=$embassy_fee[2]+$service_fee[2]?>"/>
				<input type="submit" value="Get Started" name="submit_m" id="submit_m">
			</form>
			</div></td>
			<td class="grey"><div>
			<form action="<?=base_url('frontend/pages/start_application')?>" method="post" >
				<input type="hidden" name="citizen_of" value="<?=$this->input->post('citizen_user')?>" />
				<input type="hidden" name="living_in" value="<?=$this->input->post('living_user')?>" />
				<input type="hidden" name="travelling_to" value="<?=$this->input->post('travelling_user')?>" />
				<input type="hidden" name="visa_service_select" value="<?=$visa_service_data['id']?>"/>
				<input type="hidden" name="total_amount" value="<?=$embassy_fee[1]+$service_fee[1]?>"/>
				<input type="submit" value="Get Started" name="submit_m" id="submit_m">
			</form>
			</div></td>
			<td class="grey"><div>
			<form action="<?=base_url('frontend/pages/start_application')?>" method="post" >
			<input type="hidden" name="citizen_of" value="<?=$this->input->post('citizen_user')?>" />
			<input type="hidden" name="living_in" value="<?=$this->input->post('living_user')?>" />
			<input type="hidden" name="travelling_to" value="<?=$this->input->post('travelling_user')?>" />
			<input type="hidden" name="visa_service_select" value="<?=$visa_service_data['id']?>"/>
			<input type="hidden" name="total_amount" value="<?=$embassy_fee[0]+$service_fee[0]?>"/>
			<input type="submit" value="Get Started" name="submit_r" id="submit_r"></form></div></td>
		</tr>
	</tbody>
	</table>
</div>
<div class="container2">
<div class="container dynamic">
<?=$content_part[1]?>
</div>
</div>