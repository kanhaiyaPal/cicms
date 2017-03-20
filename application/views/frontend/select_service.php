<div class="inner-banner">
  <div class="container">
    <h2>
      Select Visa Service
    </h2>
  </div>
</div>
<div class="container">
  <h1>Select Visa Service<span></span></h1>
  <p>&nbsp;</p>
	<table width="80%" border="1" cellspacing="0" cellpadding="5" bordercolor="#98C6E2" class="priceTable1 posRelative">
		<tbody>
			<tr>
			<td style="width:16%"><h3 class="fontweightNone row boxsizing">&nbsp;</h3></td>
			<?php if($meet_greet): ?>
			<td class="redBG" style="position:relative;width:28%"><h4 class="fontweightNone col-sm-9 boxsizing white">Visa + Meet &amp; Greet Combo Service </h4><span style="position:absolute; top:15px; right:5px;"></span>
			</td>  
			<?php endif; ?>
			<td style="width:28%" class="grey666"><h4 class="fontweightNone col-sm-9 boxsizing white">Regular Service</h4></td>
		</tr>
		<tr>
			<td valign="top">Type of Visa</td>
			<?php if($meet_greet): ?>
			<td valign="top">Single Entry</td>
			<?php endif; ?>
			<td valign="top">Single Entry</td>
		</tr>
		<tr>
			<td valign="top">Visa Validity</td>
			<?php if($meet_greet): ?>
			<td valign="top" class="posRelative"><?=$visa_service_data['visa_validity']?> days from the date of issue</td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['visa_validity']?> days from the date of issue</td>
		</tr>
		<tr>
			<td valign="top">Stay Validity</td>
			<?php if($meet_greet): ?>
			<td valign="top"><?=$visa_service_data['visa_max_stay']?> days from the date of entry</td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['visa_max_stay']?> days from the date of entry</td>
		</tr>
		<tr>
			<td valign="top">Processing Time</td>
			<?php if($meet_greet): ?>
			<td valign="top"><?=$visa_service_data['processing_time']?> Hours</td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['processing_time']?> Hours</td>
		</tr>
		<tr>
			<td valign="top">Visa Fee ($)</td>
			<?php if($meet_greet): ?>
			<td valign="top"><?=$visa_service_data['embassy_fee']?></td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['embassy_fee']?></td>
		</tr>
		<tr>
			<td valign="top">Service Fee ($)</td>
			<?php if($meet_greet): ?>
			<td valign="top"><?=$visa_service_data['extended_service_fee']?></td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['service_fee']?></td>
		</tr>
		<tr>
			<td valign="top">Total Fee ($)</td>
			<?php if($meet_greet): ?>
			<td valign="top"><?=$visa_service_data['extended_service_fee']+$visa_service_data['embassy_fee']?></td>
			<?php endif; ?>
			<td valign="top"><?=$visa_service_data['service_fee']+$visa_service_data['embassy_fee']?></td>
		</tr>
		<tr bgcolor="#fff">
			<td class="whiteBG">&nbsp;</td>
			<?php if($meet_greet): ?>
			<td class="whiteBG"><div class="col-sm-6">
			<form action="<?=base_url('frontend/pages/start_application')?>" method="post" >
			<input type="hidden" name="visa_service_select" value="<?=$visa_service_data['id']?>"/>
			<input type="hidden" name="total_amount" value="<?=$visa_service_data['extended_service_fee']+$visa_service_data['embassy_fee']?>"/>
			<input type="submit" class="btn-sm green-btn marginBottomNone alignCenter" value="Get Started" name="submit_m" id="submit_m">
			</form>
			</div></td>
			<?php endif; ?>
			<td class="whiteBG"><div class="col-sm-6">
			<form action="<?=base_url('frontend/pages/start_application')?>" method="post" >
			<input type="hidden" name="visa_service_select" value="<?=$visa_service_data['id']?>"/>
			<input type="hidden" name="total_amount" value="<?=$visa_service_data['service_fee']+$visa_service_data['embassy_fee']?>"/>
			<input type="submit" class="btn-sm green-btn marginBottomNone alignCenter" value="Get Started" name="submit_r" id="submit_r"></form></div></td>
		</tr>
	</tbody>
	</table>
  <p>&nbsp;</p>
</div>
