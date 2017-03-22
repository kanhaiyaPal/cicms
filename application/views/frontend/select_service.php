<div class="inner-banner">
  <div class="container">
    <h2>
      Select Visa Service
    </h2>	
  </div>
  
<div class="search-panel">
     <div class="container">
      <?=$visa_form?>
     </div>
  </div>
  
</div>
<div class="container">
  <h1>Select Visa Service<span></span></h1>
	<table width="100%" cellspacing="0" cellpadding="0" class="tbl1">
		<tbody>
			<tr>
			<th width="20%">&nbsp;</th>
			<?php if($meet_greet): ?>
			<th width="40%">Visa + Meet &amp; Greet Combo Service</th>
			<?php endif; ?>
			<th width="40%">Regular Service</th>
		</tr>
		<tr>
			<td class="grey">Type of Visa</td>
			<?php if($meet_greet): ?>
		  <td valign="top">Single Entry</td>
			<?php endif; ?>
			<td valign="top">Single Entry</td>
		</tr>
		<tr>
			<td class="grey">Visa Validity</td>
			<?php if($meet_greet): ?>
		  <td valign="top" class="posRelative"><?=$visa_service_data['visa_validity']?> days from the date of issue</td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['visa_validity']?> days from the date of issue</td>
		</tr>
		<tr>
			<td class="grey">Stay Validity</td>
			<?php if($meet_greet): ?>
		  <td valign="top"><?=$visa_service_data['visa_max_stay']?> days from the date of entry</td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['visa_max_stay']?> days from the date of entry</td>
		</tr>
		<tr>
			<td class="grey">Processing Time</td>
			<?php if($meet_greet): ?>
		  <td valign="top"><?=$visa_service_data['processing_time']?> Hours</td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['processing_time']?> Hours</td>
		</tr>
		<tr>
			<td class="grey">Visa Fee ($)</td>
			<?php if($meet_greet): ?>
		  <td valign="top"><?=$visa_service_data['embassy_fee']?></td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['embassy_fee']?></td>
		</tr>
		<tr>
			<td class="grey">Service Fee ($)</td>
			<?php if($meet_greet): ?>
		  <td valign="top"><?=$visa_service_data['extended_service_fee']?></td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['service_fee']?></td>
		</tr>
		<tr>
			<td class="grey">Total Fee ($)</td>
			<?php if($meet_greet): ?>
		  <td valign="top"><?=$visa_service_data['extended_service_fee']+$visa_service_data['embassy_fee']?></td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['service_fee']+$visa_service_data['embassy_fee']?></td>
		</tr>
		<tr>
			<td class="grey">&nbsp;</td>
			<?php if($meet_greet): ?>
			<td class="grey"><div>
			<form action="<?=base_url('frontend/pages/start_application')?>" method="post" >
			<input type="hidden" name="visa_service_select" value="<?=$visa_service_data['id']?>"/>
			<input type="hidden" name="total_amount" value="<?=$visa_service_data['extended_service_fee']+$visa_service_data['embassy_fee']?>"/>
			<input type="submit" value="Get Started" name="submit_m" id="submit_m">
			</form>
			</div></td>
			<?php endif; ?>
			<td class="grey"><div>
			<form action="<?=base_url('frontend/pages/start_application')?>" method="post" >
			<input type="hidden" name="visa_service_select" value="<?=$visa_service_data['id']?>"/>
			<input type="hidden" name="total_amount" value="<?=$visa_service_data['service_fee']+$visa_service_data['embassy_fee']?>"/>
			<input type="submit" value="Get Started" name="submit_r" id="submit_r"></form></div></td>
		</tr>
	</tbody>
	</table>
</div>
<div class="container2">
<div class="container dynamic">
<?=$visa_service_data['intro_content']?>
</div>
</div>
